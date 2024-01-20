<?php

include 'libs/load.php';

$user = "root";
// $password = "root";
$pass = isset($_GET['password']) ? $_GET['password'] : '';
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>login Again</a>");
}
/**
 * check if session_token in PHP Session is available
 * If yes,construct UserSession and see if its successful.
 * Check if the session is vaild one
 * If vaild, print "Session validated"
 * Else, print "Invailed Session" and ask user to login.
 */
if(Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome Back" . $userobj->getFirstname());
    // print("<br>" . $userobj->getBio());
    $userobj->setBio("Making New things..");
    // $userobj->setModel("Human");
} else {
    printf("NO session found, <br>tring to login now. <br>");
    $result = User::login($user, $pass);
    if ($result) {
        $userobj = new User($user);
        echo "Login Success",$userobj->getUsername();
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login failed, $user <br>";
    }
}

echo <<<EOL
<a href="logintest.php?logout">Logout</a>
EOL;
