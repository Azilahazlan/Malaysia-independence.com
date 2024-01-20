<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTrack Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ecf0f1;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
            text-align: center;
        }

        th {
            background-color: #8C001C;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .file-button {
            display: inline-block;
            padding: 8px 12px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .file-button:hover {
            background-color: blue;
        }
        
        .logo{
            margin-left: 37%;
            height: 100px;
            width: auto;
        }
        
        .btn{
            text-align: center;
            color: #ffff;
            text-decoration: none;
            padding: 10px 40px;
            background-color: #8C001C;
            border-radius: 8px;
            margin-left: 81%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div>
    <img src="img/logo.png" class="logo">
    <h2>WEBSITE ARCHIVE EXPLORATION (HTTRACK)</h2>
    <a class="btn" href="index.html">Home</a>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Topic Name</th>
                <th>Website Name</th>
                <th>Archive Success (YES/NO/INCOMPLETE)</th>
                <th>Duration</th>
                <th>Size of File Archived</th>
                <th>No. of File Archived</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'malaysia_independence');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM httrack";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['website_id']}</td>";
                        echo "<td>{$row['topic_name']}</td>";
                        echo "<td>{$row['website_name']}</td>";
                        echo "<td>{$row['httrack_success']}</td>";
                        echo "<td>{$row['httrack_duration']}</td>";
                        echo "<td>{$row['httrack_filesize']}</td>";
                        echo "<td>{$row['httrack_filenum']}</td>";
                        echo "<td><a class='file-button' href='{$row['httrack_url']}' target='_blank'>File</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
