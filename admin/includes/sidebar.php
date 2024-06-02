<?php
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<nav class="SideNav">
    <button type="button" id="toggle-btn">
      <i class="fas fa-bars"></i>
    </button>
    <span>Catalog-Website</span>
    <ul class="sidebar-menu">
      <li><a href="index.php" class="<?= $page == 'index.php'? "active" : "";?>"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="category.php" class="<?= $page == 'category.php'? "active" : "";?>"><i class="fas fa-suitcase"></i>Categories</a></li>
      <li><a href="projects.php" class="<?= $page == 'projects.php'? "active" : "";?>"><i class="fas fa-boxes"></i>Projects</a></li>
      <li><a href="add-project.php" class="<?= $page == 'add-project.php'? "active" : "";?>"><i class="fas fa-plus"></i>Add-Project</a></li>
      <li><a href="settings.php" class="<?= $page == 'settings.php'? "active" : "";?>"><i class="fas fa-key"></i><?= $_SESSION['auth_user']['name']; ?></a></li>
      <li><a href="../logout.php"><i class="fas fa-sign-in-alt"></i>Logout</a></li>
    </ul>
</nav>