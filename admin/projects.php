<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

    <section id="cart" class="section-p1">
        <div class="cart-header">
            <h1 class="heading"><span>Projects</span></h1>
        </div>

        <form action="" method="get" class="searchForm">

            <select name="category_id" id="category_select" onchange="this.form.submit()">
                <option selected value="0">All</option>
                <?php
                    $categories = getAllCategories();
                    if(mysqli_num_rows($categories) >0){
                        foreach($categories as $item){
                            ?>
                            <option value="<?= $item['id']; ?>" <?php if(isset($_GET['category_id']) && $_GET['category_id'] == $item['id']){echo "selected";} ?>>
                                <?= $item['name']; ?>
                            </option>                                                           
                            <?php
                        }
                    }else{
                        echo "<span class='response'>No Category available</span>";
                    }
                ?>
            </select>

            <div class="radioBox">
                <div>             
                    <input onchange="this.form.submit()" type="radio" value="1" <?php if((isset($_GET['type']) && $_GET['type'] == '1') || !isset($_GET['type'])){ echo "checked";} ?> name="type" id="imageRadio" class="radioButton">
                    <label for="imageRadio" class="radioLabel">Image</label>
                </div>
                <div>                 
                    <input onchange="this.form.submit()" type="radio" value="0" <?php if(isset($_GET['type']) && $_GET['type'] == '0'){ echo "checked";} ?> name="type" id="videoRadio" class="radioButton">
                    <label for="videoRadio" class="radioLabel">Video</label>
                </div>
            </div>

        </form>

        <table width="100%" id="projects_table">
            <?php if(isset($_GET['category_id']) && $_GET['category_id'] != '0'){ 
                echo "<p class='response'>Note: Projects will be displayed to the user in a descending order.</p>";
                } 
            ?>
            <thead>
                <tr>
                    <td>Order</td>
                    <td>Image</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_GET['category_id'])){
                        if($_GET['category_id'] == 0){
                            if(isset($_GET['type'])){
                                $projects= getAllProjects($_GET['type']);
                            }else{
                                $projects= getAllProjects(1);
                            }
                        }else{
                            if(isset($_GET['type'])){
                                $projects= getProjectsByCategory($_GET['category_id'],$_GET['type']);
                            }else{
                                $projects= getProjectsByCategory($_GET['category_id'],1);
                            }
                        }
                        
                    }else{
                        if(isset($_GET['type'])){
                            $projects= getAllProjects($_GET['type']);
                        }else{
                            $projects= getAllProjects(1);
                        }
                    }
                    
                    if(mysqli_num_rows($projects) >0){
                        foreach($projects as $item)
                        {
                            ?>
                                <tr>
                                    <td class="order_row">
                                        <input class="order_input" id="<?= $item['id']; ?>" type="number" name="order" value="<?= $item['orderInCategory']; ?>">
                                        <button type="button" class="btn-save update_order_btn" value="<?= $item['id']; ?>"><i class="fas fa-save"></i></button>
                                    </td>                  
                                    <td>
                                        <a href="../uploads/<?= $item['media']; ?>" class="imageLB">
                                            <img class="image" src="../uploads/<?= $item['media']; ?>" alt="<?= $item['id']; ?>" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="edit-project.php?id=<?= $item['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i><span>Edit</span></a>                                        
                                    </td>
                                    <td>
                                        <button type="button" class="btn-delete delete_project_btn" value="<?= $item['id']; ?>"><i class="fas fa-trash-alt"></i><span>Delete</span></button>                                       
                                    </td>
                                </tr>

                            <?php

                        }

                    }else{
                        echo "<tr><td colspan ='5'>no projects found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

<?php include('includes/footer.php'); ?>