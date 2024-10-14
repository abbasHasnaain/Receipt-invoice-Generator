<?php
session_start();
// Assuming you have a database connection established
include 'connection.php';

// Function to check login credentials without password hashing
function checkLogin($username, $password, $conn)
{
    // Prepare the SQL statement to fetch the password for the given username
    $stmt = $conn->prepare("SELECT admin_id, password_hash FROM logindata WHERE username = ?");

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameter to the prepared statement
    $stmt->bind_param("s", $username);

    // Execute the query
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }


}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check login credentials
    $admin_id = checkLogin($username, $password, $conn);

    if ($admin_id !== false) {
        // Successful login, redirect or perform actions as needed
        $_SESSION['loggedin'] = true;
        // Store additional information like user ID, username, etc.
        $_SESSION['user_id'] = $admin_id;
        $_SESSION['username'] = $username;
        // Redirect to the desired page (e.g., index.php)
        header("Location: index.php");
        exit();
    } else {
        // Incorrect login credentials
        $error = "Invalid Password or Username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #495057;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
            margin-top: 20px;
        }

        .error-text {
            color: #dc3545;
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
        }
    </style>
    <title>Login Page</title>
</head>

<body>
    <div class="container login-container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Login Page</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <?php if (isset($error)): ?>
                        <div class="error-text"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>