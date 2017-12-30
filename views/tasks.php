<div class="list">
    <?php if (!empty($tasks)): ?>
        <ul class="tasks">
            <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="task<?= $task["done"] ? ' done' : '' ?>"><?= $task["name"]; ?></span>
                    <?php if (!$task["done"]): ?>
                        <a href="mark.php?task=<?= $task["id"]; ?>" class="done-button">X</a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h4>You don't have tasks.</h4>
    <?php endif; ?>
    <?php if(!empty($task_error)): ?>
        <span class="error"><?=$task_error?></span>
    <?endif;?>
    <form class="add-task" action="add.php" method="post">
        <input type="text" name="name" placeholder="Type a task" class="input" autocomplete="off" autofocus required>
        <input type="submit" value="Add Task" class="submit">
    </form>
</div>