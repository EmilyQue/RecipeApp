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

    public function createRecipe(RecipeModel $recipe) {
        //select variables and see if the row exists
        $title = $recipe->getTitle();
        $ingredients = $recipe->getIngredients();
        $directions = $recipe->getDirections();
        $time = $recipe->getTime();


        //prepared statements is created
        $stmt = $this->conn->prepare("INSERT INTO `recipes` (`title`, `ingredients`, `directions`, `time`) VALUES (:title, :ingredients, :directions, :time)");
        //binds parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':ingredients', $ingredients);
        $stmt->bindParam(':directions', $directions);
        $stmt->bindParam(':time', $time);

        /*see if user existed and return true if found
        else return false if not found*/
        if ($stmt->execute() >= 1) {
            return true;
        }

        else {
            return false;
        }
    }
}
