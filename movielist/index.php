<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie List</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <style>
        table{
            border-width: 1px;
            table-layout: fixed;
            width: 90%;
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
    <a href="movieadd.php ">Add New Movie</a>
    <main>
        <h3>My Movie List</h3>

            <table border="1" width="90%">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Rating</th>
                </tr>

                <?php

                try {
                    include '../includes/db.php';

                    $rs = mysqli_query($con, "Select * from movielist");

                    while ($row = mysqli_fetch_array($rs)) {

                        $movieID = $row['movieID'];
                        $movieTitle = $row['movieTitle'];
                        $movieRating = $row['movieRating'];

                        echo "<tr>";
                        echo "<td>$movieID</td>";
                        echo "<td>$movieTitle</td>";
                        echo "<td>$movieRating</td>";
                        echo "<tr>";
                    }
                }catch (mysqli_sql_exception $ex){
                    echo $ex;
                }

                ?>

            </table>

    </main>
    <footer>
        <?php include '../includes/footer.php'; ?>
    </footer>

</body>
</html>

