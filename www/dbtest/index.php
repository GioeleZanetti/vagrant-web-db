<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test db connection</title>

    <style>

        * {
            box-sizing: border-box;
        }

        table, tr, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        td, th {
            width: 25%;
            padding: 20px;
            text-align: center;
        }

        .content {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-container {
            width: 80%;
        }

        table tr:nth-child(odd){
            background-color: #acacac;
        }

        th{
            background-color: orange;
        }

        a{
            text-decoration: none;
            color: black;
            width: 100%;
        }
    </style>

</head>
<body>
    <?php
    require_once 'database.php';
    $conn = Database::getConnection();//mysqli_connect($host, $user, $password, $dbname, $port) or die('erororrrrr');
    $result = $conn->query('SELECT * FROM test');
    ?>
        <div class="content">
            <div class="table-container">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Message</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <?php foreach ($row as $field): ?>
                                <td><?php echo $field; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
</body>
</html>