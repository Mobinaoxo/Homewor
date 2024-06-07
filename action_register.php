<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sanat</title>
</head>
<body>
<?php
include ("include/header.php");


if (isset($_POST['realname'])  && !empty($_POST['realname']) && 
 isset($_POST['username']) && !empty($_POST['username']) && 
 isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
 isset($_POST['email']) && !empty($_POST['email'])) {

    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");


if ($password != $repassword)
    exit("كلمه عبور و تكرار آن مشابه نيست");


if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    exit(" ایمیل وارد شده صحيح نیست");

$link = mysqli_connect("localhost", "root", "", "sanat");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "INSERT INTO users (realname,username,password,email) VALUES ('$realname','$username','$password','$email')";

if (mysqli_query($link, $query)) {
    echo "   خوش آمدید  ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($link);
?>



<?php

include ("include/footer.php");


?>

<?php

if (isset($_POST['realname'])  && !empty($_POST['realname']) && 
 isset($_POST['username']) && !empty($_POST['username']) && 
 isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
 isset($_POST['email']) && !empty($_POST['email'])) {

    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");


$link = mysqli_connect("localhost", "root", "", "sanat"); 

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($link, $query);   

$row = mysqli_fetch_array($result);   
if($row){
 echo("<p style='color:green;'><b>ورود موفقیت آمیز بود</b></p>");
}
else
echo("<p style='color:red;'><b>     شما قبلا وارد شده اید </b></p>");

mysqli_close($link);   

?>
</body>
</html>