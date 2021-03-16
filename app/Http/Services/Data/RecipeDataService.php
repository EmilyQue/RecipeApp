<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work
namespace App\Http\Services\Data;

use App\Http\Services\Utility\MyLogger;
use App\Models\RecipeModel;
use PDOException;
use App\Http\Services\Utility\DatabaseException;

//Database interacts with the data from the Recipe class
class RecipeDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to add recipe to database
    public function createRecipe(RecipeModel $recipe) {
        MyLogger::info("Entering RecipeDataService.createRecipe()");

        try{
            //select variables and see if the row exists
            $title = $recipe->getTitle();
            $description = $recipe->getDescription();
            $ingredients = $recipe->getIngredients();
            $directions = $recipe->getDirections();
            $time = $recipe->getTime();
            $image = $recipe->getImage();

            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `recipes` (`title`, `description`, `ingredients`, `directions`, `time`, `image`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $title, $description, $ingredients, $directions, $time, $image);

            /*see if user existed and return true if found
            else return false if not found*/
            if ($stmt->execute()) {
                return true;
            }

            else {
                echo "ERROR: " . mysqli_error($this->conn);
                return false;
            }
        }
        catch (PDOException $e){
            MyLogger::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    //Method to get data from database
    public function readAllRecipes() {
        MyLogger::info("Entering RecipeDataService.readAllRecipes()");

        try{
            //prepared statement is created to display recipes
            $stmt = "SELECT * from `recipes`";
            //executes prepared query
            // $stmt->execute();
            $result = mysqli_query($this->conn, $stmt);

            if ($result->num_rows > 0) {
                //recipe array is created
                $recipeArray = array();
                //fetches result from prepared statement and returns as an array
                while ($recipe = mysqli_fetch_assoc($result)) {
                    //inserts variables into end of array
                    array_push($recipeArray, $recipe);
                }

                //return recipe array
                return $recipeArray;
            }
        }
        catch (PDOException $e){
            MyLogger::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
