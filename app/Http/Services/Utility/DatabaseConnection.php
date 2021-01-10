<?php
namespace App\Http\Services\Utility;

use \PDO;

class DatabaseConnection {
    /**
     * getConnection method connecting to the database.
     * @return $connection after executing the mysqli_connect.
     */
    function getConnection()
    {
         //properties
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        $connection = mysqli_connect($servername, $username, $password, $dbname, 3306);

        if($connection->connect_error)
        {
            echo "Connection Failed " . $connection->connect_error . "<br>";
        }
        else
        {
            return $connection;
        }
    }
}

