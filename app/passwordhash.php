<?php 
$time = microtime(true);
$options = [
    'cost' => 7,
];
echo password_hash("rasmuslerdorf",PASSWORD_BCRYPT, $options);
echo "\nTook".(microtime(true) - $time) ." sec";


// if (password_verify("rasmuslerdorf", '$2y$12$qSAJOMpC36YO95nS5YXft.Zlk3CrJqs3cqy.CMYPh.By4Ph.GK91i')) {
//     print("Correct password");
// } else {
//     print("Wrong password");
// }
?>
    
