<?php
session_start();
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // Prepared Statement zur Sicherheit
    $stmt = $con->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["username"] = $user["username"];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>WebShop - Login</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="login-page">
    <section id="login" class="login">
        <div class="wrapper">
            <form action="login.php" method="POST">
                <h1>Login</h1>

                <?php if (!empty($error)): ?>
                    <p style="color:red;"><?= htmlspecialchars($error); ?></p>
                <?php endif; ?>

                <div class="input-box">
                    <input type="text" name="username" placeholder="Username required" required>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password required" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" name="submit" class="btn">Login</button>

                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
