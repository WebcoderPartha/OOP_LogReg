<?php
include "inc/header.php";
include "lib/User.php";
Session::checkSession();
$userId = $_GET['id'];
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['updatePassword']){
    $cngPass = $user->changePassword($userId, $_POST);
}
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Change Password <a href="profile.php?id=<?php echo urldecode($userId) ?>" class="btn btn-info pull-right">Back</a></h4>
        </div>
        <div class="panel-body">
            <?php
                if (isset($cngPass)){
                    echo $cngPass;
                }
            ?>
            <div style="width: 600px; margin: auto;">
                    <form action="change-password.php?id=<?php echo urldecode($userId) ?>" method="POST">
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
                        </div>
                        <div class="form-group">
                            <label id="password">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                        </div>
                        <input type="submit" name="updatePassword" class="btn btn-primary" value="Update Password">
                    </form>
            </div>
        </div>
    </div>


<?php include "inc/footer.php"; ?>