<div id="navbar" class="header">
        <a to="index.php">
            <h1>Portfolio</h1>
        </a>
        <ul id="bar" class="nav-menu">
            <li>
                <a onclick="up()" href="index.php">Home</a>
            </li>
            <li>
                <a onclick="up()" href="projects.php">Projects</a>
            </li>
            <li>
                <a onclick="up()" href="about.php">About</a>
            </li>
            <li>
                <a onclick="up()" href="contact.php">Contact</a>
            </li>
        </ul>
        <div class="hamburger" id="hamburger" style="font-size: 2rem; color:#fff;">
                    <i id="close" class='bx bx-menu'></i>         
        </div>
</div>

<script>
const Navbar = () => {
    function up(){
        window.scrollTo(0, 0);
    }
}
</script>
