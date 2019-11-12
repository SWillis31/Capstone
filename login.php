<?php

include("db_connect.php");
$conn = OpenDB();
$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter password";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";

        if ($statement = $conn->prepare($sql)) {
            $statement->bind_param("s", $param_username);

            $param_username = $username;

            if ($statement->execute()) {
                $statement->store_result();

                if ($statement->num_rows == 1) {
                    $statement->bind_result($id, $username, $hashed_password, $role);
                    if ($statement->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["role"] = $role;
                            header("location: welcome.php");
                        } else {
                            $password_err = "Invalid password";
                        }
                    }
                } else {
                    $username_err = "Username not found";
                }
            }
        }
        $statement->close();
    }
    $conn->close();
}
include('header.php');
?>

<h2>Login</h2>
<p>Please enter your username and password</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login">
    </div>
    <p>Don't have an account? <a href="register.php">Register now!</a></p>
</form>
<?php
include('footer.php');
?>