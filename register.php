<?php include "inc/header.php"; ?>


    <div class="panel panel-default" style="margin-top: 50px;">
        <div class="panel-heading">
            <h4>User Registration System</h4>
        </div>
        <div class="panel-body">
            <div style="width: 600px; margin: auto;">
                <form action="">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name address" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label id="username">Your username</label>
                        <input type="email" class="form-control" name="username" placeholder="Enter username address" aria-describedby="basic-addon1">
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