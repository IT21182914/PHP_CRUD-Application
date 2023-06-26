<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>

    <style>
      body {
        font-family: sans-serif;
        background-image: url('../images/laptop1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100%;
      }

      .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .btn-large {
        font-size: 24px;
        padding: 15px 30px;
      }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/styles.css" /> -->
</head>
<body>
    <div class="container my-5">
        <br>
        <br>
        <h2>List of Clients</h2>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";
                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);
                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                // Read all rows from the table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                // Read data of each row 
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/myshop/php/edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/myshop/php/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;">
        <a class="btn btn-primary btn-lg" href="/myshop/php/create.php" role="button">New Client</a>
    </div>
</body>
</html>
