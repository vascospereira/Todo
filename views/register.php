<form class="forms" action="register.php" method="post">
    <div>
        <input type="text" placeholder="Username" name="username" required>
    </div>
    <?php if(!empty($name_error)): ?>
        <span class="error"><?=$name_error?></span>
    <?endif;?>
    <div>
        <input type="password" placeholder="Password" name="password" required>
    </div>
    <?php if(!empty($psw_error)): ?>
        <span class="error"><?=$psw_error?></span>
    <?endif;?>
    <div>
        <input type="password" placeholder="Confirm" name="confirmation" required>
    </div>
    <?php if(!empty($confirm_error)): ?>
        <span class="error"><?=$confirm_error?></span>
    <?endif;?>
    <?php if(!empty($user_exists)): ?>
        <span class="error"><?=$user_exists?></span>
    <?endif;?>
    <div>
        <button type="submit">Register</button>
        <a href="login.php">Login</a>
    </div>
</form>
