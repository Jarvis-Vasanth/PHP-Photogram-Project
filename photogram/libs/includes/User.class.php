<?php

require_once "Database.class.php";


class User
{
    private $conn;

    public function __call($name, $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if (substr(name, 0, 3) == "get") {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) == "set") {
            return $this->_set_data($property, $arguments[0]);
        }
    }

    public static function signup($user, $pass, $email, $phone)
    {
        $options = [
          'cost' => 9,
        ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options); //Security through obscurity
        $conn = Database::getConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
            VALUES ('$user', '$pass', '$email', '$phone', '0', '1');";
        $error = false;
        if ($conn->query($sql) === true) {
            $error = false;
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $error = $conn->error;
        }

        // $conn->close();
        return $error;
    }

    public static function login($user, $pass)
    {

        $query = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            //    if($row['password'] == $pass) {
            if(password_verify($pass, $row['password'])) {
                return $row['username'];
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    //User object can be constructed with both UserID and Username.
    public function __construct($username)
    {
        //TODO: Write the code to fetch user data from Database for the given username. If username is not present, throw Exception.
        $this->conn = Database::getConnection();
        //TODO: Change this if username param is an email
        $this->username = $username;
        $this->id = null;
        $sql = "SELECT `id` FROM `auth` WHERE `username` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id']; //updating this from database
        } else {
            throw new Exception("Username does't exist");
        }

    }

    //this function helps to retrieve data from the database
    private function _get_data($var)
    {
        // print("hello $var");
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id` = $this->id";
        // print($sql);
        $result = $this->conn->query($sql);
        if ($result and $result->num_rows == 1) {
            // print("Res: ".$result->fetch_assoc()["$var"]); 1
            return $result->fetch_assoc()["$var"];
        } else {
            return null;
        }
    }

    //This function helps to set the data in the database
    private function _set_data($var, $data)
    {
        if(!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `users` SET `$var`='$data' WHERE `id`=$this->id;";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) { //checking data is valid
            return $this->_set_data('dob', "$year.$month.$day");
        } else {
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function authenticate() {
        
    }

    // public function setBio($bio)
    // {
    //     //TODO: Write UPDATE command to change new bio
    //     return $this->_set_data('bio', $bio);
    // }

    // public function getBio()
    // {
    //     //TODO: Write SELECT command to get the bio.
    //     return $this->_get_data('bio');
    // }

    // public function setAvatar($link)
    // {
    //     return $this->_set_data('avatar', $link);
    // }

    // public function getAvatar()
    // {
    //     return $this->_get_data('avatar');
    // }

    // public function setFirstname($name)
    // {
    //     return $this->_set_data("firstname", $name);
    // }

    // public function getFirstname()
    // {
    //     return $this->_get_data('firstname');
    // }

    // public function setLastname($name)
    // {
    //     return $this->_set_data("lastname", $name);
    // }

    // public function getLastname()
    // {
    //     return $this->_get_data('lastname');
    // }



    // public function getDob()
    // {
    //     return $this->_get_data('dob');
    // }

    // public function setInstagramlink($link)
    // {
    //     return $this->_set_data('instagram', $link);
    // }

    // public function getInstagramlink()
    // {
    //     return $this->_get_data('instagram');
    // }

    // public function setTwitterlink($link)
    // {
    //     return $this->_set_data('twitter', $link);
    // }

    // public function getTwitterlink()
    // {
    //     return $this->_get_data('twitter');
    // }
    // public function setFacebooklink($link)
    // {
    //     return $this->_set_data('facebook', $link);
    // }

    // public function getFacebooklink()
    // {
    //     return $this->_get_data('facebook');
    // }


}
