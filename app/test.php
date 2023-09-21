<pre>
<?php
include 'libs/load.php';

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

$conn = Database::getConnection();
$conn = Database::getConnection();

?>
</pre>