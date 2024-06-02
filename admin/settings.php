<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
    <?php
        if(isset($_SESSION['auth_user']['user_id']))
        {
            $id = $_SESSION['auth_user']['user_id'];
            $admin= getByID("admins",$id);

            if(mysqli_num_rows($admin) >0)
            {
                $data= mysqli_fetch_array($admin);

                ?>
                    <div class="form">      
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <h1 class="heading"><span>Admin Settings</span></h1>

                            <input type="hidden" value="<?= $data['id'];?>" name="admin_id">

                            <label>Name</label>
                            <input required type="text" name="name" value="<?=$data['name'];?>" placeholder="Enter Name"></input>

                            <label>Email</label>
                            <input required type="text" name="email" value="<?=$data['email'];?>" placeholder="Enter email"></input>

                            <label>Password</label>
                            <input required type="password" name="password" value="<?=$data['password'];?>" placeholder="Enter password"></input>
                                                
                            <button type="submit" name="update_admin_btn" class="btn-red">Update</button>
                        </form>
                    </div>
                
                <?php
            }else{
                echo "<span class='response'>admin not found for given id</span>";
            }       
        
        }else{
            echo "<span class='response'>Id missing</span>";
        }
    ?>   

<?php include('includes/footer.php'); ?>