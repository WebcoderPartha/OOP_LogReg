<?php include "inc/header.php"; ?>


    <div class="panel panel-default" style="margin-top: 50px;">
        <div class="panel-heading">
            <h4>User Profile <a href="index.php" class="btn btn-info pull-right">Back</a></h4>
        </div>
        <div class="panel-body">
            <div style="width: 600px; margin: auto;">
                <form action="">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name address" value="partha">
                    </div>
                    <div class="form-group">
                        <label id="username">Your username</label>
                        <input type="email" class="form-control" name="username" placeholder="Enter username address" value="dksjf">
                    </div>
                    <div class="form-group">
                        <label id="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="dksjf@gmail.com">
                    </div>
                    <div class="form-group">
                        <label id="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter email password" value="dksjf">
                    </div>
                    <input type="submit" name="update" value="Update" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>


<?php include "inc/footer.php"; ?>