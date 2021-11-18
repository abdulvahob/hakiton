<?php
// Скрипт проверки

$link=mysqli_connect("localhost", "root", "", "hackaton");
if(isset($_COOKIE["password_cookie_token"]) and !empty($_COOKIE["password_cookie_token"]))
{
    $select_user_data = mysqli_query($link, "SELECT * FROM users WHERE password_cookie_token = '".trim($_COOKIE["password_cookie_token"])."'");
    
    if(!$select_user_data){
        echo "<p class='message_error'>Ошибка выборки БД.</p>".$mysqli->error();
    }else{
        $array_user_data = mysqli_fetch_assoc($select_user_data);
        if($array_user_data['password_cookie_token'] == $_COOKIE["password_cookie_token"]){
            header("Location: cabinet.php"); exit();
        }
        else{
            header("Location: login.php"); exit();
        }
        
    }
}
else if (isset($_COOKIE['id']) && isset($_COOKIE['hash']) && !empty($_COOKIE['id']) && !empty($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE id = '".parse_str($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['hash'] != $_COOKIE['hash']) or ($userdata['id'] != $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null);
        header("Location: register.php"); exit();
    }
    else
    {
        setcookie("id", $userdata['id']);
        header("Location: cabinet.php"); exit();
    }
}
else
{
    header("Location: login.php"); exit();
}

?>