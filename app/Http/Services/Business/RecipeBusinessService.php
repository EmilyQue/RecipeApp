<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work

/*Handles user business logic and connections to database*/
namespace App\Http\Services\Business;

use \mysqli;
use \PDO;
use App\Models\RecipeModel;
use App\Http\Services\Data\RecipeDataService;

class RecipeBusinessService {
/**
     * Create Recipe
     * @param RecipeModel $recipe
     * @return boolean
     */
    public function create(RecipeModel $recipe) {
        // Azure
        // $conn = new mysqli("localhost", "azure", "6#vWHD_$", "recipebook", "56270");

        // Heroku
        $conn = new mysqli( "hwr4wkxs079mtb19.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "kxoo44tqs98lmh9u", "b6bx71p6xk9slozg", "njeg1pp8k5we8dk2" );

        //create a recipe service dao with this connection and try to create recipe
        $service = new RecipeDataService($conn);
        $flag = $service->createRecipe($recipe);

        //return the finder results
        return $flag;
    }

    public function findAll() {
        // Azure
        // $conn = new mysqli("localhost", "azure", "6#vWHD_$", "recipebook", "56270");

        //Heroku
        $conn = new mysqli( "hwr4wkxs079mtb19.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "kxoo44tqs98lmh9u", "b6bx71p6xk9slozg", "njeg1pp8k5we8dk2" );

        //create a recipe service dao with this connection and try to find all recipes in database
        $service = new RecipeDataService($conn);
        $flag = $service->readAllRecipes();

        //return the finder results
        return $flag;
    }
}

?>
