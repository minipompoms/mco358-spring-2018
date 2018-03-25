<?php
session_start();
include "config.php";
if (isset($_POST['username'], $_POST['password']))
{
    
    $USERS = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = ("SELECT username, password FROM AUTHORIZED_USERS WHERE USERNAME = '".$USERS."' AND password = '".$password."'");
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    if($count > 0 )
    {
        $_SESSION['logged'] = $myusername;
        header("location: myAccount.php");
    }
    else
    {
        $my_centered_word = 'Invalid login credentials';
        echo "<div style='text-align:center; color:white; margin-top:100px;'><h2>$my_centered_word</h2></div>";
    }
}
?>
<?php
 include "header.php";
?>

<html>
<title>Login</title>
<body>
<div class = "login">
<form action="" method="post">
<div>

<br>
<label for="username">User Name:</label>
<input name="username" required><br><br>
<label for="password">Password: </label>
<input type="password" name="password" required><br>
<input style=margin-top:20px;color:#318131; type="submit" value="sign in" />
<span class ="submit">
<label for="checkbox">Remember Me</label>
<input type="checkbox" name="rememberme" value="1">
</span>

</div><br>

</form>
</div>
</body>

<?php include "footer.php"; ?>   
</html>