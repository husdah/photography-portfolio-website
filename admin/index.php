<?php
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');

$projects= getAll("projects");
$projectsNb=mysqli_num_rows($projects);

$categories= getAll("categories");
$categoriesNb=mysqli_num_rows($categories);

$admins= getAll("admins");
$adminsNb=mysqli_num_rows($admins);

?>
    <!--services section design-->
    <section class="services section-p1" id="services">
        <h1 class="heading"><span>Dashboard</span></h1>
        <div class="services-container">
            <div class="services-box">
                <i class="fas fa-suitcase"></i>
                <h3>Categories</h3>
                <p><?= $categoriesNb ?></p>
            </div>
            <div class="services-box">
                <i class="fas fa-boxes"></i>
                <h3>Projects</h3>
                <p><?= $projectsNb ?></p>
            </div>
            <div class="services-box">
                <i class="fas fa-robot"></i>
                <h3>Admins</h3>
                <p><?= $adminsNb ?></p>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>