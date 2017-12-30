/**
 * scripts.js
 *
 * Global JavaScript, if any.
 */

function todo() {
    var url = 'tasks.php?q=' + $('#form').val();
    $.getJSON(url, function(data) {
        $('#task').html(data.task);
        $('#form').val(''); //clear the form
    });
}

