<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role != 'admin'){
      header('Location: index.html');
    }
?>
hi