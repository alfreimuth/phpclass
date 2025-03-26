<?php
session_start();

$MemberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));



$err="";
if(!isset($_SESSION["UID"])){
    header("Location: index.php");
}

if(isset($_POST["btnSubmit"])){

    if(!empty($_POST["txtUsername"])) {
        $Username = $_POST["txtUsername"];
    }else{
        $err="Username Error";
    }
    if(!empty($_POST["txtPassword"])) {
        $Password = $_POST["txtPassword"];
    }else{
        $err="Password Error";
    }
    if(!empty($_POST["txtPassword2"])) {
        $Password2 = $_POST["txtPassword2"];
    }else{
        $Password2 = "";
    }
    if($Password != $Password2){
        $err = "Password Do Not Match";
    }
    if(!empty($_POST["txtRole"])) {
        $Role = $_POST["txtRole"];
    }else{
        $err="Role Error";
    }
    if(!empty($_POST["txtEmail"])) {
        $Email = $_POST["txtEmail"];
    }else{
        $err="Email Error";
    }

    if($err==""){

        include "../includes/db.php";

        $hashedPWD = md5($Password . $MemberKey);

        $sql = mysqli_prepare($con, "insert into memberLogin (memberName, memberEmail, memberPassword, roleID, memberKey) values (?,?,?,?,?)");
        mysqli_stmt_bind_param($sql, "sssis", $Username,$Email,$hashedPWD, $Role, $MemberKey);
        mysqli_stmt_execute($sql);

        $Username="";
        $Password="";
        $Password2="";
        $Email="";

        $err="Member Added to Database";
    }
}





//


//exit();




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin </title>
<link rel="stylesheet" type="text/css" href="../css/base.css">
<style>

    .item1 {grid-area: header}
    .item2 {grid-area: Username}
    .item3 {grid-area: UsernameInput}
    .item4 {grid-area: Password}
    .item5 {grid-area: PasswordInput}
    .item6 {grid-area: Password2}
    .item7 {grid-area: Password2Input}
    .item8 {grid-area: Role}
    .item9 {grid-area: RoleInput}
    .item10 {grid-area: Email}
    .item11 {grid-area: EmailInput}
    .item12 {grid-area: footer}

    .gc{
        margin-top: 50px;
        margin-right: auto;
        margin-left: auto;
        display: grid;
        grid-template-areas:
            'header header'
            'Username UsernameInput'
            'Password PasswordInput'
            'Password2 Password2Input'
            'Role RoleInput'
            'Email EmailInput'
            'footer footer'
    ;
        padding 0px;
        width: 60%;
    }

    div{
        border: 1px solid;
        text-align: center;
        padding: 10px 0;
        font-size: 20px;

    }
</style>
</head>
<body>
<header>
    <?php include '../includes/header.php'; ?>
</header>
<nav>
    <?php include '../includes/nav.php'; ?>
</nav>
<main>

    <h3 id="err"><?=$err?></h3>

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>Add New Member</h3></div>
            <div class="item2">Username</div>
            <div class="item3"><input type="text" name="txtUsername" id="txtUsername" value="<?=$Username?>"/></div>
            <div class="item4">Password</div>
            <div class="item5"><input type="password" name="txtPassword" id="txtPassword" value="<?=$Password?>"/></div>
            <div class="item6">ReType Password</div>
            <div class="item7"><input type="password" name="txtPassword2" id="txtPassword2" value="<?=$Password2?>"/></div>
            <div class="item8">Role</div>
            <div class="item9">
                <select name="txtRole" id="txtRole">
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                    <option value="3">Member</option>
                </select>
            </div>
            <div class="item10">Email</div>
            <div class="item11"><input type="text" name="txtEmail" id="txtEmail" value="<?=$Email?>"/></div>
            <div class="item12"><input type="submit" value="Create New User" name="btnSubmit"/></div>
        </div>
    </form>
</main>
    <footer>
        <?php include '../includes/footer.php'; ?>
    </footer>

</body>
</html>

