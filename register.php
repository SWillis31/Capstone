<?php

include("db_connect.php");
$conn = OpenDB();
$username = $password = $confirmPassword = $role = "";
$username_error = $password_error = $confirmPass_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validate username    
    if (empty(trim($_POST["username"]))) {
        $username_error = "Please enter a username";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($statement = $conn->prepare($sql)) {
            $statement->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);

            if ($statement->execute()) {
                $statement->store_result();

                if ($statement->num_rows == 1) {
                    $username_error = "This username is already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            }
            $statement->close();
        }
    }

    //validate password
    if (empty(trim($_POST["password"]))) {
        $password_error = "Please enter a password";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_error = "Password must be at least 6 characters long";
    } else {
        $password = trim($_POST["password"]);
    }

    //validate confirm password
    if (empty(trim($_POST["confirmPassword"]))) {
        $confirmPass_error = "Please enter your password again";
    } else {
        $confirmPassword = trim($_POST["confirmPassword"]);
        if (empty($password_error) && ($password != $confirmPassword)) {
            $confirmPass_error = "Passwords do not match";
        }
    }

    if (!empty(trim($_POST["role"]))) {
        $role = trim($_POST["role"]);
    }
    //Check for errors
    if (empty($confirmPass_error) && empty($password_error) && empty($username_error)) {

        //Prepare MYSQL insert statement

        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";

        if ($statement = $conn->prepare($sql)) {
            $statement->bind_param("sss", $param_username, $param_password, $param_role);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_role = $role;

            if ($statement->execute()) {
                header("location: login.php");
            } else {
                echo "Something went wrong, please try again";
            }
        }

        $statement->close();
    }

    $conn->close();
}

include('header.php');
?>

<h2>Sign Up</h2>
<p>Please fill in this form to create an account</p>
<br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_error; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_error; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($confirmPass_error)) ? 'has-error' : ''; ?>">
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" value="<?php echo $confirmPassword; ?>">
        <span class="help-block"><?php echo $confirmPass_error; ?></span>
    </div>
    <div class="form-group">
        <label>Admin</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <p>This option will not be available in the finished product, it is only here to test admin-istrator privileges</p><br>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</form>
<?php
include('footer.php');
?>