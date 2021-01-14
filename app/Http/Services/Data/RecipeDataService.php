<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work
namespace App\Http\Services\Data;

use App\Models\RecipeModel;

//Database interacts with the data from the Recipe class
class RecipeDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to add recipe to database
    public function createRecipe(RecipeModel $recipe) {
        //select variables and see if the row exists
        $title = $recipe->getTitle();
        $description = $recipe->getDescription();
        $ingredients = $recipe->getIngredients();
        $directions = $recipe->getDirections();
        $time = $recipe->getTime();
        $image = $recipe->getImage();

        //prepared statements is created
        $stmt = $this->conn->prepare("INSERT INTO `recipes` (`title`, `description`, `ingredients`, `directions`, `time`, `image`) VALUES (:title, :description, :ingredients, :directions, :time, :image)");
        //binds parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':ingredients', $ingredients);
        $stmt->bindParam(':directions', $directions);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':image', $image);

        /*see if user existed and return true if found
        else return false if not found*/
        if ($stmt->execute() >= 1) {
            return true;
        }

        else {
            return false;
        }
    }

    //Method to get data from database
    public function readAllRecipes() {
        //prepared statement is created to display recipes
        $stmt = $this->conn->prepare('SELECT * from recipes');
        //executes prepared query
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            //recipe array is created
            $recipeArray = array();
            //fetches result from prepared statement and returns as an array
            while ($recipe = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                //inserts variables into end of array
                array_push($recipeArray, $recipe);
            }

            //return recipe array
            return $recipeArray;
        }
    }
}
