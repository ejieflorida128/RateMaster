<?php 
session_start();
include("connection.php");

// Function to validate username, password, and option
function validate_credentials($username, $password, $option, $conn) {
    // Sanitize user input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // For example:
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password_hash'])) {
            // Check if the selected option matches the user's option
            if (($username === 'build_admin' || $username === 'file_admin' || $username === 'Irate_admin' || $username === 'hype_admin') && $option === 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['option'] = 'admin';
                return true;
            } elseif ($option === 'buildrate' && $user['option'] === 'buildrate') {
                $_SESSION['username'] = $username;
                $_SESSION['option'] = 'buildrate';
                return true;
            } elseif ($option === 'hypebeast' && $user['option'] === 'hypebeast') {
                $_SESSION['username'] = $username;
                $_SESSION['option'] = 'hypebeast';
                return true;
            } elseif ($option === 'filerate' && $user['option'] === 'filerate') {
                $_SESSION['username'] = $username;
                $_SESSION['option'] = 'filerate';
                return true;
            } elseif ($option === 'irate' && $user['option'] === 'irate') {
                $_SESSION['username'] = $username;
                $_SESSION['option'] = 'irate';
                return true;
            }
        }
    }
    return false;
}

// Login action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $option = $_POST['option'];

    $_SESSION['Data'] = $_POST['username'];

    if (validate_credentials($username, $password, $option, $conn)) {
        // Redirect to appropriate dashboard page based on option
        switch ($_SESSION['option']) {
            case 'admin':
                header('Location: ADMIN_FILES/' . $_SESSION['username'] . '.php'); // Redirect to admin's page
                exit;
            case 'buildrate':
                header('Location: buildrate/buildratepage.php');
                exit;
            case 'hypebeast':
                header('Location: E-hype/E_hypebeastpage.php');
                exit;
            case 'filerate':
                header('Location: FileRate/fileratepage.php');
                exit;
            case 'irate':
                header('Location: Irate/Iratepage.php');
                exit;
            default:
                header('Location: index.php');
                exit;
        }
    } else {
        $_SESSION['error'] = 'Invalid username or password';
        header('Location: index.php');
        exit;
    }
}
// Register action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selected_system = $_POST['systems'];
    $is_admin = (in_array($username, array("build_admin", "file_admin", "Irate_admin", "hype_admin"))) ? 1 : 0;

    // Check if the username already exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'Username already exists. Please choose a different username.';
        header('Location: index.php');
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user's information into the database
    $sql = "INSERT INTO users (username, password_hash, option, is_admin) VALUES ('$username', '$hashed_password', '$selected_system', '$is_admin')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Registration successful! Please log in.';
    } else {
        $_SESSION['error'] = 'Registration failed. Please try again.';
    }

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Assets/style.css">
    <style>
   
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php 
            // Display error message if set
            if(isset($_SESSION['error'])) {
                echo '<p style="color:red;">'.$_SESSION['error'].'</p>';
                unset($_SESSION['error']); // Clear session variable
            }
        ?>
        <form action="index.php" method="POST" id="login-form">
            <input type="hidden" name="action" value="login">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()"> Show Password
            </div>
            <div class="input-group">
                <label for="option">Options</label>
                <select id="option" name="option" required>
                    <option value="admin">Admin</option>
                    <option value="buildrate">BuildRate</option>
                    <option value="hypebeast">E-HypeBeast</option>
                    <option value="filerate">FileRate</option>
                    <option value="irate">I-Rate</option>
                    <?php 
                        // Check if the user is an administrator
                        if (isset($_SESSION['username']) && ($_SESSION['username'] === 'admin1' || $_SESSION['username'] === 'admin2' || $_SESSION['username'] === 'admin3' || $_SESSION['username'] === 'admin4')) {
                            echo '<option value="admin">Admin</option>';
                        }
                    ?>
                </select>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Didn't have account? Click here! <a href="#" id="register-link">Register</a></p>
    </div>

    <div class="register-container" style="display:none;">
        <h2>Register</h2>
        <?php 
            // Display error message if set
            if(isset($_SESSION['error'])) {
                echo '<p style="color:red;">'.$_SESSION['error'].'</p>';
                unset($_SESSION['error']); // Clear session variable
            }
            // Display success message if set
            if(isset($_SESSION['success'])) {
                echo '<p style="color:green;">'.$_SESSION['success'].'</p>';
                unset($_SESSION['success']); // Clear session variable
            }
        ?>
        <form action="index.php" method="POST" id="register-form">
            <input type="hidden" name="action" value="register">
            <div class="input-group">
                <label for="reg_username">Username:</label>
                <input type="text" id="reg_username" name="username" required>
            </div>
            <div class="input-group">
                <label for="reg_password">Password:</label>
                <input type="password" id="reg_password" name="password" required>
                <input type="checkbox" id="show-reg-password" onclick="toggleRegPasswordVisibility()"> Show Password
            </div>
            <div class="input-group">
                <label for="reg_systems">Systems:</label>
                <select id="reg_systems" name="systems" required>
                    <option value="selectoptions">Admin</option>
                    <option value="buildrate">BuildRate</option>
                    <option value="hypebeast">E-HypeBeast</option>
                    <option value="filerate">FileRate</option>
                    <option value="irate">I-Rate</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="#" id="login-link">Login</a></p>
    </div>

    <script>
        //login show password
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
        //register show password
        function toggleRegPasswordVisibility() {
            var passwordField = document.getElementById("reg_password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        document.getElementById("register-link").addEventListener("click", function(event) {
            event.preventDefault();
            document.querySelector(".login-container").style.display = "none";
            document.querySelector(".register-container").style.display = "block";
        });
        document.getElementById("login-link").addEventListener("click", function(event) {
            event.preventDefault();
            document.querySelector(".register-container").style.display = "none";
            document.querySelector(".login-container").style.display = "block";
        });
    </script>
</body>
</html>
