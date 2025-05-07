<?php
if(!empty($_POST["txtFName"])){
    if(!empty($_POST["txtLName"])){
        if(!empty($_POST["txtPhone"])){
            if(!empty($_POST["txtEmail"])){
                if(!empty($_POST["txtAddress"])){
                    if(!empty($_POST["txtCity"])){
                        if(!empty($_POST["txtZipCode"])){
                            if(!empty($_POST["txtState"])){
                                if(!empty($_POST["txtPassword"])){
                                    if($_POST["txtPassword"]==$_POST["txtPasswordVerify"]){

                                        $txtFName = $_POST["txtFName"];
                                        $txtLName = $_POST["txtLName"];
                                        $txtPhone = $_POST["txtPhone"];
                                        $txtEmail = $_POST["txtEmail"];
                                        $txtAddress = $_POST["txtAddress"];
                                        $txtCity = $_POST["txtCity"];
                                        $txtZipCode = $_POST["txtZipCode"];
                                        $txtState = $_POST["txtState"];
                                        $txtPassword = $_POST["txtPassword"];

                                        try{
                                            include "../includes/db.php";

                                            $sql = mysqli_prepare($con, "insert into customerListing (FirstName, LastName, Phone, Email, Address, City, Zip, State, Password) values (?,?, ?, ?, ?, ?, ?, ?, ?)");
                                            mysqli_stmt_bind_param($sql, "sssssssss", $txtFName,$txtLName,$txtPhone, $txtEmail, $txtAddress, $txtCity, $txtZipCode, $txtState, $txtPassword);
                                            mysqli_stmt_execute($sql);

                                            header("Location:index.php");

                                        }catch (mysqli_sql_exception $ex){
                                            echo $ex;
                                        }

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Customer</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <style>

        .item1 {grid-area: header}
        .item2 {grid-area: FirstName}
        .item3 {grid-area: FirstNameInput}
        .item4 {grid-area: LastName}
        .item5 {grid-area: LastNameInput}
        .item6 {grid-area: PhoneNumber}
        .item7 {grid-area: PhoneNumberInput}
        .item8 {grid-area: Email}
        .item9 {grid-area: EmailInput}
        .item10 {grid-area: Address}
        .item11 {grid-area: AddressInput}
        .item12 {grid-area: City}
        .item13 {grid-area: CityInput}
        .item14 {grid-area: ZipCode}
        .item15 {grid-area: ZipCodeInput}
        .item16 {grid-area: State}
        .item17 {grid-area: StateInput}
        .item18 {grid-area: Password}
        .item19 {grid-area: PasswordInput}
        .item20 {grid-area: PasswordValid}
        .item21 {grid-area: PasswordValidInput}
        .item22 {grid-area: footer}

        .gc{
            margin-top: 50px;
            display: grid;
            grid-template-areas:
            'header header'
            'FirstName FirstNameInput'
            'LastName LastNameInput'
            'PhoneNumber PhoneNumberInput'
            'Email EmailInput'
            'Address AddressInput'
            'City CityInput'
            'ZipCode ZipCodeInput'
            'State StateInput'
            'Password PasswordInput'
            'PasswordValid PasswordValidInput'
            'footer footer'
        ;
            padding 0;
            border: 0;
        }

        div{
            border: 1px solid black;
            text-align: center;
            padding: 10px 0;
            font-size: 15px;
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

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>Add New Customer</h3></div>
            <div class="item2">First Name</div>
            <div class="item3"><input type="text" name="txtFName" id="txtFName" /></div>
            <div class="item4">Last Name</div>
            <div class="item5"><input type="text" name="txtLName" id="txtLName"/></div>
            <div class="item6">Phone Number</div>
            <div class="item7"><input type="text" name="txtPhone" id="txtPhone"/></div>
            <div class="item8">Email</div>
            <div class="item9"><input type="text" name="txtEmail" id="txtEmail"/></div>
            <div class="item10">Address</div>
            <div class="item11"><input type="text" name="txtAddress" id="txtAddress"/></div>
            <div class="item12">City</div>
            <div class="item13"><input type="text" name="txtCity" id="txtCity"/></div>
            <div class="item14">Zip Code</div>
            <div class="item15"><input type="text" name="txtZipCode" id="txtZipCode"/></div>
            <div class="item16">State</div>
            <div class="item17"><input type="text" name="txtState" id="txtState"/></div>
            <div class="item18">Password</div>
            <div class="item19"><input type="password" name="txtPassword" id="txtPassword"/></div>
            <div class="item20">Password Verification</div>
            <div class="item21"><input type="password" name="txtPasswordVerify" id="txtPasswordVerify"/></div>
            <div class="item22"><input type="submit" value="Add New Customer" /> </div>
        </div>
    </form>

</main>
<footer>
    <?php include '../includes/footer.php'; ?>
</footer>

</body>
</html>

