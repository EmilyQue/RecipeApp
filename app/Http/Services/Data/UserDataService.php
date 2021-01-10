<?php
//Activity 1
//Emily Quevedo
//January 7, 2021
//This is my own work
namespace App\Http\Services\Data;

use App\Models\UserModel;

//Database interacts with the data from the User class
class UserDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createNewUser(UserModel $user) {
        //select variables and see if the row exists
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $role = $user->getRole();

        //prepared statements is created
        $stmt = $this->conn->prepare("INSERT INTO `users` (`firstName`, `lastName`, `email`, `username`, `password`, `role`) VALUES (:firstname, :lastname, :email, :username, :password, :role)");
        //binds parameters
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

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
