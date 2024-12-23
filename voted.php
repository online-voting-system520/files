<?php
require 'dbconn.php';
session_start();

$aadhar = $_SESSION["aadhar"];
$voter = $_SESSION['voter'];

$sql = "SELECT * FROM people WHERE aadharnumber = '$aadhar' AND voterid = '$voter'";
$rs = $conn->query($sql);

if ($rs->num_rows > 0) {
    $rec = $rs->fetch_assoc();
    $message = "You already casted your vote on " . date("F j, Y, g:i a", strtotime($rec['date'])) . ".";
} else {
    $message = "No vote found for this session.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin-top: 50px;
            color: #333;
        }

        .container {
            margin: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .message {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .date {
            font-size: 16px;
            color: #4CAF50;
            font-weight: bold;
        }

        button {
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #3e8e41;
        }

        @media (max-width: 768px) {
            .container {
                margin: 15px;
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .message {
                font-size: 16px;
            }

            button {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <h1>Voting Status</h1>
    <div class="container">
        <div class="message">
            <?php echo $message; ?>
        </div>
        <?php if ($rs->num_rows > 0): ?>
            <div class="date">Your vote was cast on: <?php echo date("F j, Y, g:i a", strtotime($rec['date'])); ?></div>
        <?php endif; ?>
        <a href="homepage.php"><button>Go Back to Home</button></a>
    </div>
</body>
</html>
