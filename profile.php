<?php
    include "inc/header.php";
    include "lib/User.php";
    Session::checkSession();
    $userid = $_GET['id'];
    $user = new User();
$userdata = $user->getUserIdBy($userid);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['update']){
    $updateUser = $user->updateUserDataById($userid, $_POST);
}
?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>User Profile <a href="index.php" class="btn btn-info pull-right">Back</a></h4>
        </div>
        <div class="panel-body">
            <?php if (isset($updateUser)){ echo $updateUser; } ?>
            <div style="width: 600px; margin: auto;">
                <?php if (isset($userdata)){ ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name address" value="<?php echo $userdata->name; ?>">
                    </div>
                    <div class="form-group">
                        <label id="username">Your username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username address" value="<?php echo $userdata->username; ?>">
                    </div>
                    <div class="form-group">
                        <label id="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="<?php echo $userdata->email; ?>">
                    </div>
                    <?php
                        $session_id = Session::get('id');
                        if($userid == $session_id){
                    ?>
                    <input type="submit" name="update" value="Update" class="btn btn-success">
                            <a href="change-password.php?id=<?php echo urldecode($userid) ?>" class="btn btn-info">Change Password</a>
                    <?php } ?>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>


<?php include "inc/footer.php"; ?>