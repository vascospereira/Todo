<?php

// configuration
require("../includes/config.php");

// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] === "GET")
    render("login.php", ["title" => "User"]);
else if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // validate submission
    if (empty($_POST["username"])){
        $error = 'you need a username';
        render("login.php", ["user_error" => $error, "title" => "Log In"]);
    }
    else if (empty($_POST["password"])){
        $error = 'password please';
        render("login.php", ["psw_error" => $error, "title" => "Log In"]);
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($_POST["username"]));
    $user = $stmt->fetch();

    if ($user !== false) {

        if (password_verify($_POST["password"], $user['password'])) {

            $_SESSION["id"] = $user['id'];
            $_SESSION["username"] = $_POST["username"];

            redirect("/todo/public");

        }

    }

    $error = 'invalid username and/or password.';
    render("login.php", ["user_pwd_error" => $error, "title" => "Log In"]);
}