<?php include "inc/header.php"; ?>
<?php include "lib/User.php";
    Session::checkSession();
    $user = new User();
    if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }
?>

        <div class="panel panel-default">
            <?php
            $loginmsg = Session::get('loginmsg');
            if (isset($loginmsg)){
                echo $loginmsg;
            }
            if (isset($msg)){
                echo $msg;
            }
            Session::set('loginmsg', '');
            ?>
            <div class="panel-heading">
                <h4>User List <span class="pull-right"><strong>Welcome!</strong> <?php
                            $name = Session::get('name');
                            if (isset($name)){
                                echo $name;
                            }
                        ?></span></h4>
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
                  <?php
                    $userdata = $user->getUserAllData();
                    if ($userdata){
                        $i = 0;
                        foreach ($userdata as $sdata) {
                        $i++;

                  ?>
                     <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $sdata['name'] ?></td>
                         <td><?php echo $sdata['username'] ?></td>
                         <td><?php echo $sdata['email'] ?></td>
                         <td>
                             <a href="profile.php?id=<?php echo $sdata['id'] ?>">View</a>
                             <a href="">Delete</a>
                         </td>
                     </tr>
                        <?php } ?>
                        <?php } ?>

                  </tbody>
                  </table>
            </div>
        </div>

<?php include "inc/footer.php"; ?>