<?php 
function createSession($username, $id){
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
}
?>