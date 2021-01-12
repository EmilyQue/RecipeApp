<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecipeModel;
use App\Http\Services\Business\RecipeBusinessService;

class RecipeController extends Controller {
    public function index(Request $request){
        //recieves data inputed from user
        $title = $request->input('title');
        $ingredients = $request->input('ingredients');
        $directions = $request->input('directions');
        $time = $request->input('time');

        //2. create object model
        //save posted form data in recipe object model
        $recipe = new RecipeModel(-1, $title, $ingredients, $directions, $time);

        //3. execute business service
        //call recipe business service
        $service = new RecipeBusinessService();
        $status = $service->create($recipe);

        //4. process results from business service (navigation)
        //render a failed or success response view and pass the recipe model to it
        if ($status) {
            return view("registerSuccess");
            // return redirect('/login');
        }

        else {
            return view("registerFail");
        }
    }
}
?>
