<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="initial-scale=1, width=device-width" name="viewport"/>
    <link href="/todo/public/css/styles.css" rel="stylesheet"/>
    <!--<script src="https://code.jquery.com/jquery-latest.min.js"></script>-->
    <!--async script will be executed asynchronously as soon as it is available-->
    <script async src="../public/js/scripts.js"></script>
    <title>Todo App</title>
</head>
<body>
<div id="info">
    <?php if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')){ ?>
    <h1><a href="index.php">Todo List</a></h1>
    <?php } ?>
    <img src="/todo/public/img/logo.svg">
</div>
<div id="user">
    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != '') { ?>
        <form action="logout.php" method="post">
            <a href="#"><?= $_SESSION['username'] ?></a>
            <input type="submit" value="Logout">
        </form>
    <?php } ?>
</div>
<main>
    <div class="container">