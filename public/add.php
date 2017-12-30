<?php
// configuration
require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)
if($_SERVER["REQUEST_METHOD"] === "GET")
    // else render form
    render("tasks.php", ["title" => "Register"]);
// else if user reached page via POST (as by submitting a form via POST)
elseif($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = sanitize($_POST["name"]);

    if($name === ""){
        redirect("/todo/public");
        exit;
    }

    $stmt = $conn->prepare('INSERT INTO items (name, user_id) VALUES(?, ?)');
    $stmt->execute(array($name, $_SESSION["id"]));

    redirect("/todo/public");
}