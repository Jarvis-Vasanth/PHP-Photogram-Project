<?php
include 'libs/load.php';

$user = "root";
$pass = isset($_GET['pass']) ? $_GET['pass'] :'';
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>login again</a>");
}
if (Session::get('is_loggedin')) {
    $userdata = Session::get('session_user');
    print("welcome back, $userdata[username]");
    $result = $userdata;
} else {
    print("No Session foung,trying to login now. <br>");
    $result = User::login($user, $pass);
}
if ($result) {
    echo "Login success, $result[username]"; 
    Session::set('is_loggedin',true);
    Session::set('session_user', $result);
} else {
    echo "Login failed, $user <br>";
}
echo <<<EOL
<br><br><a href="logintest.php?logout">logout</a>
EOL;