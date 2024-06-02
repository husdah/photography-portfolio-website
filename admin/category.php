<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

    <div class="form">      
        <form action="code.php" method="post" enctype="multipart/form-data">
            <h1 class="heading"><span>Add Category</span></h1>

            <label>Category Name</label>
            <input required type="text" name="name" placeholder="Enter Category Name"></input>

            <label>Description (optional)</label>
            <textarea rows="4" name="description" placeholder="Enter description"></textarea>             
            
            <label>Upload Image</label>
            <input required type="file" name="image">

            <label class="check-container">Display In Home Page
                <input type="checkbox" name="displayInHomePage">
                <span class="checkmark"></span>
            </label>
            
            <button type="submit" name="add_category_btn" class="btn-red">Add</button>
        </form>
    </div>

    <section id="cart" class="section-p1">
        <div class="cart-header">
            <h1 class="heading"><span>Categories</span></h1>
        </div>
        <table width="100%" id="categories_table">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $categories= getAllCategories();
                    if(mysqli_num_rows($categories) >0){
                        foreach($categories as $item)
                        {
                            ?>
                                <tr>                                                      
                                    <td><?= $item['name']; ?></td>                  
                                    <td>
                                        <a href="../uploads/<?= $item['image']; ?>" class="imageLB">
                                            <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn-edit"><i class="fas fa-edit"></i><span>Edit</span></a>                                        
                                    </td>
                                    <td>
                                        <button type="button" class="btn-delete delete_category_btn" value="<?= $item['id']; ?>"><i class="fas fa-trash-alt"></i><span>Delete</span></button>                                       
                                    </td>
                                </tr>

                            <?php

                        }

                    }else{
                        echo "<tr><td colspan ='5'>no categories found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

<?php include('includes/footer.php'); ?>