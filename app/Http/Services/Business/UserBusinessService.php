<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work

/*Handles user business logic and connections to database*/
namespace App\Http\Services\Business;

use \PDO;
use App\Models\UserModel;
use App\Http\Services\Data\UserDataService;

class UserBusinessService {
/**
     * User registration
     * @param UserModel $user
     * @return boolean
     */
    public function register(UserModel $user) {
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a security service dao with this connection and try to find the password in user
        $service = new UserDataService($conn);
        $flag = $service->createNewUser($user);

        //return the finder results
        return $flag;
    }
}

?>
