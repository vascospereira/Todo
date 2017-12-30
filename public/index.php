<?php
// configuration
require("../includes/config.php");
// select all shares from portfolio
$stmt = $conn->prepare('SELECT * FROM items WHERE user_id = ?');
$stmt->execute(array($_SESSION["id"]));
$tasks = $stmt->fetchAll();

//dump($items);

render("tasks.php", ["tasks" => $tasks,  "title" => "Todo"]);
