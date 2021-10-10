<!-- 
  Navbar 
  Include with: include_once("navbar.php") 
 -->
<header id="navbar" class="navbar">
  <a href="/trainingApp">trainingApp</a>
  <nav>
    <ul class="nav-links">
      <li><a href="/trainingApp/tjanster/">Tjänster</a></li>
      <li><a href="/trainingApp/priser/">Priser</a></li>
      <li><a href="#">Om oss</a></li>
    </ul>
  </nav>
  <div>
    <?php
    if (isset($_SESSION['Username'])) { // If a user is logged in
      echo '
        <ul class="nav-links">
          <li><a href="/trainingApp/profil/">' . $_SESSION['Username'] . '</a></li>
          <li><a href="logout.php">Logga ut</a></li>
        </ul>
          ';
    } else { // If no user is logged in
      echo '
        <button onclick="toggleLoginModal()">Logga in</button>
        <a href="/trainingApp/register/"><button>Registrera</button></a>
        ';
    }
    ?>
  </div>
</header>