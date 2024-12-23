<html>
<?php
    require 'dbconn.php';
    session_start();
?>
<head>
    <title>Counting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }
        h3 {
            text-align: right;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: 20%;
            margin: 3px;
            border-radius: 10px;
            cursor: pointer;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
        }

        td {
            background-color: #fff;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button:hover {
            background-color: #0056b3;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        caption {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 30px;
            text-align: center;
        }

    </style>
</head>
<body>
    <h3><a href='add.html'><button>Add voter</button></a><a href='homepage.php'><button>Sign Out</button></a></h3>
    <div class="container">
        <h1>Vote Count Results</h1>
        <?php
            $html = "<table>
            <caption>Vote Count for Each Party</caption>
            <tr>
                <th>Rank</th>
                <th>Party</th>
                <th>Count</th>
            </tr>";
            $rowno = 1;
            $sql = "SELECT * FROM vote ORDER BY count DESC";
            $rs = $conn->query($sql);
            if($rs->num_rows > 0) {
                foreach($rs as $rec): 
                    $html .= "<tr>
                        <td>".$rowno++."</td>
                        <td>".'Party '.$rec["party"]."</td>
                        <td>".$rec["count"]."</td>
                    </tr>";
                endforeach;
            }
            $html .= "</table>";
            $_SESSION["data"] = $html;
            echo $html;
        ?>
    </div>

</body>
</html>
