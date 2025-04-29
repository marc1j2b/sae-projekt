<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Benutzereingaben erfassen
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Überprüfen, ob der Benutzername oder die E-Mail schon existieren
    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE username=:username OR email=:email");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    // Benutzer existiert bereits
    if ($stmt->fetchColumn() > 0) {
        $error = "Username or Email already taken!";
    } else {
        // Benutzer registrieren, wenn er nicht existiert
        registerUser($username, $email, $password);
        header("Location: login.php");
        exit(); // Beendet das Skript, um eine doppelte Weiterleitung zu vermeiden
    }
}

function registerUser($username, $email, $password) {
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebShop - Register</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="register-page">
    <section id="register" class="register">
        <div class="wrapper">
            <form action="register.php" method="POST">
                <h1>Create an account</h1>

                <?php if (isset($error)): ?>
                    <p style="color:red;"><?= htmlspecialchars($error); ?></p>
                <?php endif; ?>

                <div class="input-box">
                    <input type="text" placeholder="Username" name="username" autocomplete="off" required>
                    <i class="bx bx-user"></i>
                </div>

                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" autocomplete="off" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <button type="submit" name="submit" class="btn">Create</button>
            </form>
        </div>
    </section>
</body>
</html>
