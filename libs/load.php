<?php

function load_template($name)
{
    // print("including ".__DIR__."../_templates/$name.php");

    //include __DIR__. "/../_templates/$name.php"; //not consistant.
    include $_SERVER['DOCUMENT_ROOT'] . "/app/_templates/$name.php"; //not consistent;
}

function validate_credentials($username, $password)
{
    print("validate_credentials()");
    if($username == "jarvis@gmail.com" and $password == "password") {
        return true;
    } else {
        return false;
    }
}
