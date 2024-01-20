<?php

include 'libs/load.php';

$user = "root";

if (isset($_GET['logout'])) {
    if (Session::isset("session_token")) 
    {
         $Session = new UserSession(Session::get("session_token"));
         if (Session->removeSession()) 
         {
             echo "<h3> Pervious Session removing from db </h3>";
         } else 
         {
             echo "<h3> Pervious Session not removing from db </h3>";
         }
     }
    Session::destroy();
    die("Session destroyed, <a href='logintest2.php'>login Again</a>");
}

/**
 * check if session_token in PHP Session is available
 * If yes,construct UserSession and see if its successful.
 * Check if the session is vaild one
 * If vaild, print "Session validated"
 * Else, print "Invailed Session" and ask user to login.
 */
if (Session::isset("session_token")) {
    if (UserSession::authorize(Session::get("session_token"))) {
        echo "<h1>Session Login, Welcome $user <h1>";
    } else {
        Session::destroy();
        die("<h1>Invailed Session, <a href='logintest2.php'>Login Again</a><h1>");
    }
} else {
    $pass = isset($_GET['pass']) ? $_GET['pass'] : '';
    if (!$pass) {
    die("<h1>Password is Empty</h1>");
    if (UserSession::authenticate($user, $pass)) {
        echo "<h1>New Login Success, Welcome $user</h1>";
    } else echo "<h1>New Login Failed! $user</h1>";
  }
}

echo <<<EOL
<a href="logintest.php?logout">Logout</a>
EOL;
