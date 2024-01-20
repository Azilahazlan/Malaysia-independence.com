<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Website</title>
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
            margin-bottom: 45px;
            text-align: center;
            letter-spacing: 2px;
            font-size: 30px;
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
            text-align: center;
            border-bottom: 1px solid #ecf0f1;
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
            background-color: green;
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
    <h2>WEBSITE INFORMATION</h2>
    <a class="btn" href="index.html">Home</a>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Topic Name</th>
                <th>Website Type</th>
                <th>Website Name</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'malaysia_independence');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT website_id, topic_name, website_type, website_name, website_url FROM website";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['website_id']}</td>
                                <td>{$row['topic_name']}</td>
                                <td>{$row['website_type']}</td>
                                <td>{$row['website_name']}</td>
                                <td><a class='file-button' href='{$row['website_url']}' target='_blank'>View</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
    
</div>
    
</body>
</html>
