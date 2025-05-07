<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Listing</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <style>
        table{
            border-width: 1px;
            table-layout: auto;
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
    <h3>Customer Listing</h3>
    <table border="1" width="90%">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php

        try {
            include '../includes/db.php';

            $rs = mysqli_query($con, "Select * from customerListing");

            while ($row = mysqli_fetch_array($rs)) {

                $ID = $row['CustomerID'];
                $FName = $row['FirstName'];
                $LName = $row['LastName'];
                $Address = $row['Address'];
                $City = $row['City'];
                $State = $row['State'];
                $Zip = $row['Zip'];
                $Phone = $row['Phone'];
                $Email = $row['Email'];
                $Password = $row['Password'];


                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td><a href='customerupdate.php?id=$ID'> $FName</td>";
                echo "<td><a href='customerupdate.php?id=$ID'>$LName</td>";
                echo "<td>$Address</td>";
                echo "<td>$City</td>";
                echo "<td>$State</td>";
                echo "<td>$Zip</td>";
                echo "<td>$Phone</td>";
                echo "<td>$Email</td>";
                echo "<td>$Password</td>";
                echo "<tr>";
            }
        }catch (mysqli_sql_exception $ex){
            echo $ex;
        }

        ?>

    </table>
    <a href="customeradd.php">Add Customer</a>

</main>
<footer>
    <?php include '../includes/footer.php'; ?>
</footer>

</body>
</html>

