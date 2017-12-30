<?php
// configuration
require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] === "GET")
    // else render form
    render("register.php", ["title" => "Register"]);
// else if user reached page via POST (as by submitting a form via POST)
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!preg_match('/^[a-z]{2,16}$/i', $_POST["username"])) {
        $error = 'minimum of 2 none special characters';
        render("register.php", ["name_error" => $error, "title" => "Register"]);
    } else if (!preg_match('/^(?=.*\d)(?=.*[A-z])[0-9A-z!@#$%]{4,50}$/', $_POST["password"])) {
        $error = 'minimum of 4 characters (letters and digits)';
        render("register.php", ["psw_error" => $error, "title" => "Register"]);
    } else if ($_POST["password"] !== $_POST["confirmation"]) {
        $error = 'passwords do not match';
        render("register.php", ["confirm_error" => $error, "title" => "Register"]);
    }

    //verify if username already exists
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($_POST["username"]));
    $user = $stmt->fetch();

    if ($user !== false){
        $error = "username already exists";
        render("register.php", ["user_exists" => $error,"title" => "Register"]);
    }
    else {
        $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES(?, ?)');
        $stmt->execute(array($_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)));
        $_SESSION['id'] = $conn->lastInsertId();
        $_SESSION['username'] = $_POST["username"];
        // redirect to portfolio
        redirect("/todo/public");
    }
}