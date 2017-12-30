<?php
// configuration
require("../includes/config.php");

if(isset($_GET["task"])){

    /*$stmt = $conn->prepare('UPDATE items SET done = 1 WHERE id = ? AND user_id = ?');
    $stmt->execute(array($_GET["task"], $_SESSION["id"]));*/

    $stmt = $conn->prepare('DELETE FROM items WHERE id = ? AND user_id = ?');
    $stmt->execute(array($_GET["task"], $_SESSION["id"]));

    redirect("/todo/public");

}