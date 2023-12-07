<?php
class UserSession
{
    /**This function will return a session ID if username and password is correct.
    * 
    * @return SessionID 
    */
    public static function authenticate($user , $pass)
    {
    $username = User::login($user, $pass);
    $user = new User($username);
    if($username) {
        $conn = Database::getConnection();
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0, 999999) . ip . $agent . time());
        $sql = "INSERT INTO `session` (`uid`, `token`,`login_time`, `ip`, `user_agent`, `active`) VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
        if($conn->query($sql)) {
            Session::set('session_token', $token);
            return $token;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

public static function authorize($token)
{
    $sess = new UserSession($token);
}

     public function __construct($token)
     {
        $this->conn = Database::getConnection();
        $this->token = $token;
        $this->data = null;
        $sql = "SELECT * FROM `session` WHERE `token`= $token LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid']; //updating this from database
        } else {
            throw new Exception("Session is invalid");
        }
     }

     public function getUser()
     {
        return new User($this->uid);
     }

     /**
      * Check if the validate of the session is within one hour, else it inactive.
      *
      * @return boolean
      */

      public function isValid()
      {
      }

      public function getIP(){

      }

      public function getUserAgent(){

      }

      public function deactivate(){

      }
}