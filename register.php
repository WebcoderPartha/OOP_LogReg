<?php include "inc/header.php"; ?>

<?php
    include 'lib/User.php';
    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $userRegi = $user->userRegistration($_POST);
    }
?>

    <div class="panel panel-default" >
        <?php
            if (isset($userRegi)){
                echo $userRegi;
            }
        ?>
        <div class="panel-heading">
            <h4>User Registration System</h4>
        </div>
        <div class="panel-body">
            <div style="width: 600px; margin: auto;">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name " aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label id="username">Your username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username " aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label id="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label id="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter email password" aria-describedby="basic-addon1">
                    </div>
                    <input type="submit" name="register" value="Register" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>


<?php include "inc/footer.php"; ?>