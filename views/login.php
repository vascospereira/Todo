<form class="forms" action="login.php" method="post">
    <div>
        <input type="text" placeholder="Username" name="username">
    </div>
    <?php if(!empty($user_error)): ?>
        <span class="error"><?=$user_error?></span>
    <?endif;?>
    <div>
        <input type="password" placeholder="Password" name="password">
    </div>
    <?php if(!empty($psw_error)): ?>
        <span class="error"><?=$psw_error?></span>
    <?endif;?>
    <?php if(!empty($user_pwd_error)): ?>
        <span class="error"><?=$user_pwd_error?></span>
    <?endif;?>
    <div>
        <input type="submit" value="Login">
        <a href="register.php">Register</a>
    </div>
</form>