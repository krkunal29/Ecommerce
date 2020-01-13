<?php
extract($_GET);
if(isset($_GET['userId']) && isset($_GET['roleId']) && isset($_GET['username'])){
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['roleId'] = $roleId;
    $_SESSION['username'] = $username;
    header('Location:dashboard.php');
}else{
    header('Location:index.php');
}
?>
