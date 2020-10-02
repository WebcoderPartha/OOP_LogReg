<?php include "inc/header.php"; ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="l">Logout</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User List <span class="pull-right"><strong>Welcome!</strong> Parthad</span></h4>
            </div>
            <div class="panel-body">
                 <table class="table table-hover">
                  <thead>
                     <tr>
                         <th>Serial</th>
                         <th>Name</th>
                         <th>Username</th>
                         <th>Email</th>
                         <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                         <td>1</td>
                         <td>Partha</td>
                         <td>partha87</td>
                         <td>partha@gmail.com</td>
                         <td>
                             <a href="">Edit</a>
                             <a href="">Delete</a>
                         </td>
                     </tr>
                     <tr>
                         <td>1</td>
                         <td>Partha</td>
                         <td>partha87</td>
                         <td>partha@gmail.com</td>
                         <td>
                             <a href="">Edit</a>
                             <a href="">Delete</a>
                         </td>
                     </tr>
                     <tr>
                         <td>1</td>
                         <td>Partha</td>
                         <td>partha87</td>
                         <td>partha@gmail.com</td>
                         <td>
                             <a href="">Edit</a>
                             <a href="">Delete</a>
                         </td>
                     </tr>
                     <tr>
                         <td>1</td>
                         <td>Partha</td>
                         <td>partha87</td>
                         <td>partha@gmail.com</td>
                         <td>
                             <a href="">Edit</a>
                             <a href="">Delete</a>
                         </td>
                     </tr>
                  </tbody>
                  </table>
            </div>
        </div>

<?php include "inc/footer.php"; ?>