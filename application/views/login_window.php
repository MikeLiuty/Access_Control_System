<?php
echo form_open('Welcome/login_user');
require_once('templates/lgnheader.php');
?>

<div class="container" id="login">
    <div id="title" style="text-align: right">
        <img id="logo" src="<?php
echo base_url();
?>assets/logo.png">
    </div>

    <h2>Access Control System Demo</h2>
    <form action="Welcome.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" placeholder="Enter username" name="username" /><br>
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" placeholder="Enter password" name="password"><br>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<?php
require_once 'templates/footer.php';
?>