<?php

// $password = isset($_GET['password']) ? $_GET['password']:"RandomPasswordThatIsSecure";
// echo(md5($password));

$str = <<<EOL
No String-to-array function exists because 
EOL;

$md5 = md5($str);
$md5len = strlen($md5);

// $b64 = base64_encode($str);
// $b64len = strlen($b64);

// echo("MD5:$md5(length: $md5len)<br>");
// echo("Base64 : $b64 <br>(lenght:$b64len)<br>");

?>