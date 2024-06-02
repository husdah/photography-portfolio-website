<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn'])){
    $name=$_POST['name'];
    $description=$_POST['description'];

    $image = $_FILES['image']['name'];
    $path="../uploads";
    $image_ext =pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $displayInHomePage= isset( $_POST['displayInHomePage']) ? "1":"0";

    $category_check_query= "SELECT * FROM categories WHERE name='$name';";
    $category_check_query_run = mysqli_query($con,$category_check_query);
    if(mysqli_num_rows($category_check_query_run) >0){
        redirect('category.php',"Category already exist!");
    }

    $category_query= "INSERT INTO categories (name,description,image,displayInHomePage) VALUES ('$name','$description','$filename','$displayInHomePage');";

    $cate_query_run = mysqli_query($con,$category_query);
    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect('category.php',"Category Added Successfully!");

    }else{
        redirect('category.php',"Something Went Wrong!");
    }

}else if(isset($_POST['update_category_btn'])){
    $category_id= $_POST['category_id'];
    $name=$_POST['name'];
    $description=$_POST['description'];

    $path="../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    $displayInHomePage= isset( $_POST['displayInHomePage']) ? "1":"0";

    if($new_image !=""){
        $image_ext =pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    $update_query= "UPDATE categories SET name='$name', description='$description', image='$update_filename', displayInHomePage='$displayInHomePage' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con,$update_query);
    if($update_query_run)
    {
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }

        redirect("edit-category.php?id=$category_id","Category Updated Successfully!");

    }else{
        redirect("edit-category.php?id=$category_id","Something Went Wrong!");

    }
}else if(isset($_POST['delete_category_btn'])){
    $category_id= mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query= "SELECT * FROM categories WHERE id='$category_id';";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data=mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];
    
    $delete_query= "DELETE FROM categories WHERE id='$category_id';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {  
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        echo 200;
    }else{
        echo 500;
    }
}
else if(isset($_POST['add_project_btn'])){
    $category_id = $_POST['category_id'];

    if(isset($_POST['type'])){
        if($_POST['type'] == "image"){
            $type = 1;
            $link = "";
            $displayInHomePage= isset( $_POST['displayInHomePage']) ? "1":"0";
        }
        else if($_POST['type'] == "video"){
            $type = 0;
            $link = $_POST['link'];
            $displayInHomePage= "0";
        }
    }

    $order = $_POST['order'];  

    $image = $_FILES['image']['name'];
    $path="../uploads";
    $image_ext =pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $project_query = "INSERT INTO projects 
    (category_id,media,type,link,orderInCategory,displayInHomePage)
    VALUES ('$category_id','$filename','$type','$link','$order','$displayInHomePage')";

    $project_query_run = mysqli_query($con,$project_query);
    if($project_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect('add-project.php',"Project Added Successfully!");

    }else{
        redirect('add-project.php',"Something Went Wrong!");
    }
}else if(isset($_POST['update_project_btn'])){
    $project_id= $_POST['project_id'];
    $category_id = $_POST['category_id'];

    if(isset($_POST['type'])){
        if($_POST['type'] == "image"){
            $type = 1;
            $link = "";
            $displayInHomePage= isset( $_POST['displayInHomePage']) ? "1":"0";
        }
        else if($_POST['type'] == "video"){
            $type = 0;
            $link = $_POST['link'];
            $displayInHomePage= "0";
        }
    }

    $order = $_POST['order'];
    
    $path="../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image !=""){
        $image_ext =pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    $update_project_query= "UPDATE projects SET category_id='$category_id', media='$update_filename', type='$type', link='$link', orderInCategory='$order', displayInHomePage='$displayInHomePage' WHERE id='$project_id'; ";

    $update_project_query_run = mysqli_query($con,$update_project_query);
    if($update_project_query_run)
    {
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }

        redirect("edit-project.php?id=$project_id","Project Updated Successfully!");

    }else{
        redirect("edit-project.php?id=$project_id","Something Went Wrong!");
    }

}else if(isset($_POST['delete_project_btn'])){

    $project_id= mysqli_real_escape_string($con, $_POST['project_id']);
    
    $project_query= "SELECT * FROM projects WHERE id='$project_id';";
    $project_query_run = mysqli_query($con,$project_query);
    $project_data=mysqli_fetch_array($project_query_run);
    $image = $project_data['media'];   
    
    $delete_query= "DELETE FROM projects WHERE id='$project_id';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }

      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['update_admin_btn'])){
    $admin_id= $_POST['admin_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $update_admin_query= "UPDATE admins SET name='$name', email='$email', password='$password' WHERE id='$admin_id'; ";

    $update_admin_query_run = mysqli_query($con,$update_admin_query);
    if($update_admin_query_run)
    {
        redirect("settings.php","Settings Updated Successfully!");

    }else{
        redirect("settings.php","Something Went Wrong!");
    }

}
else if(isset($_POST['catSelect'])){
    $category_id= $_POST['category_id'];

    if($_POST['type'] == "image"){
        $type = 1;
    }
    else if($_POST['type'] == "video"){
        $type = 0;
    }

    $query_order= "SELECT * FROM projects WHERE category_id='$category_id' AND type='$type'";

    $query_order_run = mysqli_query($con,$query_order);
    if($query_order_run)
    {
        $projectsNb=mysqli_num_rows($query_order_run);
        echo $projectsNb;

    }else{
        echo 500;
    }

}
else if(isset($_POST['radioButton'])){
    $category_id= $_POST['category_id'];

    if($_POST['type'] == "image"){
        $type = 1;
    }
    else if($_POST['type'] == "video"){
        $type = 0;
    }

    $query_order= "SELECT * FROM projects WHERE category_id='$category_id' AND type='$type'";

    $query_order_run = mysqli_query($con,$query_order);
    if($query_order_run)
    {
        $projectsNb=mysqli_num_rows($query_order_run);
        echo $projectsNb;

    }else{
        echo 500;
    }

}
else if(isset($_POST['update_order_btn'])){
    $project_id= $_POST['project_id'];
    $order= $_POST['order'];

    if($order ==""){
        echo 501;
    }else{

        $update_project_query= "UPDATE projects SET orderInCategory='$order' WHERE id='$project_id'; ";

        $update_project_query_run = mysqli_query($con,$update_project_query);
        if($update_project_query_run)
        {
            echo 200;  

        }else{
            echo 500;
        }

    }

}
else{
    header('Location: ../index.php');
}

?>