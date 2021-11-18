<?php
$conn = mysqli_connect("localhost", "root", "", "hackaton");

if(isset($_POST['submit'])){
    $firstName = $_POST['firstname'];
    $secondName = $_POST['secondname'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    if(!empty($_POST['gender'])){
        if($_POST['gender'] == "Male")
        $gender = '1';
        else 
        $gender = '0';
    }
    
    mysqli_query($conn, "UPDATE user_information SET first_name = '$firstName', second_name='$secondName', city='$city', age='$age', gender='$gender' WHERE user_id = '".$_COOKIE['id']."'");
    
}
$query = mysqli_query($conn, "SELECT u.id, u.login, u.phone, i.first_name, i.second_name, i.city, i.age, i.gender, i.has_interest, i.interest FROM users AS u JOIN user_information AS i ON i.user_id = u.id WHERE u.id = '".$_COOKIE['id']."'");
$data = mysqli_fetch_assoc($query);
$_COOKIE['user_information'] = $data;

?>