<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

if (isset($_SESSION['uid'])){
    unset($_SESSION['uid']);
}
if (isset($_SESSION['firstname'])){
    unset($_SESSION['firstname']);
}
if (isset($_SESSION['lastname'])){
    unset($_SESSION['lastname']);
}
if (isset($_SESSION['usertype'])){
    unset($_SESSION['usertype']);
}




// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header("location:../view/index.php")
?>