<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php
include("include/header.php");


//$link=mysqli_connect("localhost","root","","sanat");

//if(mysqli_connect_errno())
//exit("شرح خطا بدین گونه است:" .mysqli_connect_error());

//$query="SELECT * FROM product";
//$result= mysqli_query($link,$query);

?>
<table style=" width:100%;" border="1px">
<tr>
<?php


//$counter=0;
//while($row=mysqli_fetch_array($result))
// $counter++;
?>
<td style="border-style:dotted dashed; vertical-align:top; width:100%; "  align="center" >
<b>
ورود به سایت
<b>
</td>
<tr>
<td>
<form name="register" action="login.php" method="post">
<table style="width:50%; margin-left:auto; margin-right:auto;" border="0">
  
  
  <tr>
   <td>نام کاربری:<span style="color:red">*</span></td>
   <td><input type="text" name="username" id="username" /></td>
  </tr>
  
  <tr>
   <td>کلمه عبور:<span style="color:red">*</span></td>
   <td><input type="text" name="password" id="password" /></td>
  </tr>
  
  
  <tr>
   <td></br></br></td>
   <td><button type="submit">ارسال</button>&nbsp; &nbsp;&nbsp;
    <input type="reset" name="reset" value="جدید" />
   </td>
  </tr>





</br>


</table>
</form>
  
</td>

</tr>
</table>

<?php

if ((isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) &&
    !empty($_POST['password']))) {

    $username = $_POST['username']; 
    $password = $_POST['password'];  
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");


$link = mysqli_connect("localhost", "root", "", "sanat"); 

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($link, $query);   

$row = mysqli_fetch_array($result);   

if ($row) {
    $_SESSION["state_login"] = true;
    $_SESSION["realname"] = $row['realname'];
   
    $_SESSION["username"] = $row['username'];

?>
   
<?php
    

    echo ("<p style='color:green;'><b>{$row['realname']}    خوش آمديد</b></p>");
} else
    echo ("<p style='color:red;'><b>😢نام كاربري يا كلمه عبور يافت نشد</b></p>");


mysqli_close($link);   


?>








<?php
include("include/footer.php");
?>
</body>
</html>