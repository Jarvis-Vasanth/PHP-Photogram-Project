<?php

$str = <<<EOL
No string-to-array function exists because it is not needed. if you referance a string with an offset like
EOL;

echo("Data Length: ".strlen($str)."\n);

$md5 = md5($str);
$md5len = strlen($md5);

$b64 = base64_encode($str);
$b64len = strlen($b64);

echo("MD5: $md5 (Lenght: $md5len)\n");
echo("Base64: $b64 \n(Lenth: $b64len)\n");

 