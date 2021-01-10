<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Http\Services\Business\UserBusinessService;

class RegistrationController extends Controller {
    public function index(Request $request){
        //recieves data inputed from user
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        //2. create object model
        //save posted form data in user object model
        $user = new UserModel(-1, $firstName, $lastName, $email, $username, $password, 0);

        //3. execute business service
        //call security business service
        $service = new UserBusinessService();
        $status = $service->register($user);

        //4. process results from business service (navigation)
        //render a failed or success response view and pass the user model to it
        if ($status) {

            return redirect('/login');
        }

        else {
            return view("registerFail");
        }
    }
}
?>
