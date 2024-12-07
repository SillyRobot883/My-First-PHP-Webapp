<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
    exit;
}

// Retrieve the FLAG from environment variables
$flag = getenv('FLAG');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            line-height: 1.6;
            padding: 20px;
        }

        .admin-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .admin-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .admin-header h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .flag-container {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 6px;
            margin-top: 2rem;
        }

        .flag-title {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .flag-value {
            font-family: monospace;
            font-size: 1.1rem;
            color: #28a745;
            padding: 0.5rem;
            background: #e9ecef;
            border-radius: 4px;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Panel</h1>
            <p>Welcome to the secure administration area</p>
        </div>
        <div class="flag-container">
            <div class="flag-title">Congratulations! Here's your flag:</div>
            <div class="flag-value"><?php echo htmlspecialchars($flag); ?></div>
        </div>
    </div>
</body>
</html>
