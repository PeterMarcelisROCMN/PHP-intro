<?php

// a predefined variable exists in the PHP language. (super globals)


// to find out which directory the entire site exists in
echo $_SERVER["DOCUMENT_ROOT"];

echo '<br>';
// to the path of which folder structure we are in
echo $_SERVER["PHP_SELF"];

echo '<br>';
echo $_SERVER["SERVER_NAME"];

echo '<br>';
echo $_SERVER["REQUEST_METHOD"];

echo '<br>';
echo $_GET['name'];
echo '<br>';
echo $_GET['age'];

// user defined variables (global variable)
// a regular variable is something we can define ourselves.
$name = "Peter";


// next to the super global get and post, we can use the (super) super global which holds data from:
// GET, POST and COOKIE
echo $_REQUEST['name'];

// while this might seem like a great way to handle both get and post, you are never sure what you're gonna get.
// if you use POST to send data, but also have that same tag appended in the URL, it might give some unkown behaviour
// it is also prone to security risks.


// when you send in an attachment, we can retrieve it using this.
$_FILES['fileToUpload'];

/* file holds more information in an array like
    (original) name, 
    type, 
    size, 
    tmp_name (how it was stored),
    error (error code associated with the file),
    full path (kinda useless)
*/

/*
PHP allows for retrieving and storing cookies on the users device
*/
$_COOKIE["name"];

/*
PHP allows for retrieving and storing data in sessions as well
Sessions are active for as long as you set in the 
*/
$_SESSION['username'];

// sets the lifetime of a session to an hour
ini_set('session.gc_maxlifetime', 3600);

// sets the lifetime of the php generated cookie to an hour
session_set_cookie_params(3600);

// starts a session
session_start();

// unsets all variables stored in the super global variable $_SESSION
session_unset();

// destroys the current session
session_destroy();

$firstName = htmlspecialchars($_POST['name']);

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    


} else
{
    header("location: ../index.php");
}