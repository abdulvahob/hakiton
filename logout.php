<?php
// Страница разавторизации
$link=mysqli_connect("localhost", "root", "", "hackaton");
// Удаляем куки
if(isset($_COOKIE["password_cookie_token"])){
    print $_COOKIE["password_cookie_token"];
    $update_password_cookie_token = mysqli_query($link, "UPDATE users SET password_cookie_token = '' WHERE id = '".$_COOKIE["id"]."'");
     
    if(!$update_password_cookie_token){
        echo "Ошибка ".$link->error();
    }else{
        setcookie("password_cookie_token", "", time() - 3600, "/");
    }
}

setcookie("id", "", time() - 3600*24*30*12, "/");
setcookie("hash", "", time() - 3600*24*30*12, "/",null,null,true);

header("Location: index.php"); exit;

?>