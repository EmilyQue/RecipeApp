<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeModel;
use App\Http\Services\Business\RecipeBusinessService;
use App\Http\Services\Utility\MyLogger;
use Exception;

class RecipeController extends Controller {
    //add a recipe
    public function index(Request $request){
        MyLogger::info("Entering RecipeController.index()");

        try{
            //recieves data inputed from user
            $title = $request->input('title');
            $description = $request->input('description');
            $ingredients = $request->input('ingredients');
            $directions = $request->input('directions');
            $time = $request->input('time');
            $image = $request->input('image');

            //2. create object model
            //save posted form data in recipe object model
            $recipe = new RecipeModel(-1, $title, $description, $ingredients, $directions, $time, $image);

            //3. execute business service
            //call recipe business service
            $service = new RecipeBusinessService();
            $status = $service->create($recipe);

            //4. process results from business service (navigation)
            //render a failed or success response view and pass the recipe model to it
            if ($status) {
                return redirect('/allRecipes');
            }

            else {
                return view("registerFail");
            }
        }
        catch(Exception $e) {
            MyLogger::error("Exception: ", array("message" => $e->getMessage()));
        }
    }

    //find recipes
    public function read(Request $request){
        MyLogger::info("Entering RecipeController.read()");

        try{
            //call recipe business service
            $service = new RecipeBusinessService();
            $jobs = $service->findAll();
            //render a response view
            if ($jobs) {
                return view('displayRecipes');
            }
        }

        catch (Exception $e){
            MyLogger::error("Exception: ", array("message" => $e->getMessage()));
        }
    }

    public function home(Request $request){
        MyLogger::info("Entering RecipeController.home()");

        try{
            $service = new RecipeBusinessService();
            $jobs = $service->findAll();
            //render a response view
            if ($jobs) {
                return view('home')->with($jobs);
            }
        }
        catch(Exception $e){
            MyLogger::error("Exception: ", array("message" => $e->getMessage()));
        }
    }
}
?>
