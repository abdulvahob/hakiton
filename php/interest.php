<?php

if(isset($_COOKIE['interest']) and !empty($_COOKIE['interest'])){
    $conn = mysqli_connect("localhost", "root", "", "hackaton");
    $query = mysqli_query($conn, "UPDATE user_information SET has_interest='1', interest='".$_COOKIE['interest']."' WHERE user_id = '".$_COOKIE['id']."'");

    setcookie("interest", "", time() - 3600, "/");
}

?>