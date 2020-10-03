<?php
    include "inc/header.php";
    include "lib/User.php";
    Session::checkLogin();
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        $userLogin = $user->userLogin($_POST);
    }
?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Login System</h4>
        </div>
        <div class="panel-body">
            <div style="width: 600px; margin: auto;">
                <?php if (isset($userLogin)){
                    echo $userLogin;
                } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label id="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label id="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter email password" aria-describedby="basic-addon1">
                    </div>
                    <input type="submit" name="login" value="Login" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>


<?php include "inc/footer.php"; ?>