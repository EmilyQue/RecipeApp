<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeModel;
use App\Http\Services\Business\RecipeBusinessService;

class RecipeController extends Controller {
    //add a recipe
    public function index(Request $request){
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

    //find recipes
    public function read(Request $request){
       //call recipe business service
       $service = new RecipeBusinessService();
       $jobs = $service->findAll();
       //render a response view
       if ($jobs) {
        return view('displayRecipes');
       }
    }

    public function home(Request $request){
        $service = new RecipeBusinessService();
        $jobs = $service->findAll();
        //render a response view
        if ($jobs) {
            return view('home')->with($jobs);
        }
    }
}
?>
