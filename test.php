<pre>
<?php
include 'libs/load.php';

// $cookie_name = "testscript";
// $cookie_value = $_SERVER['REQUEST_URI'];
// setcookie("testcookie","testvalue", time() + (86400 * 30), "/");
// print("_SERVER \n");
// print_r($_SERVER);
// print("_GET \n");
// print_r($_GET);
// print("_POST \n");
// print_r($_POST);
// print("_FILES \n");
// print_r($_FILES);
// print("_COOKIES \n");
// print_r($_COOKIE);

// if (signup("jarvis", "password", "jarvis@gmail.com", "9999999999")){
//     echo "Success";
// } else {
//     echo "Fail";
// }

$mic1 = new Mic("Roda"); //constructing the object
$mic2 = new Mic("HyperX"); //constructing the object

Mic::testFunction(); //no construction,no distruction;

$mic1->setLight("White");
$mic2->setLight("Green");

printf(ucwords("hyper quad cast"));
$mic1->setModel("hyper quad cast");
print("Model of 1st mic is ".$mic1->getModelproxy());
print("\n".$mic1->getBrand());
print("\n".$mic2->getBrand());
echo $mic1->getVoltage("hello", array(1,2,3,4,5), new Mic("Bose"));

$conn = Database::getConnection();
$conn = Database::getConnection();

?>
</pre>