<!-- 
  Navbar 
  Include with: include_once("navbar.php") 
 -->
<header id="navbar" class="navbar">
  <div class="meny">
    <a>trainingApp</a>
    <a onclick="toggleNavbar()"><i class="fa fa-bars"></i></a>
  </div>
  <a href="/trainingApp">Hem</a>
  <a href="/trainingApp/tjanster/">Tjänster</a>
  <a href="/trainingApp/priser/">Priser</a>
  <a href="#">Om oss</a>
  <?php
  if (isset($_SESSION['Username'])) { // If a user is logged in
    echo '
        <a href="/trainingApp/profil/">Profil</a>
        <a href="/trainingApp/shared/logout.php">Logga ut</a>
          ';
  } else { // If no user is logged in
    echo '
        <a onclick="toggleLoginModal()">Logga in</a>
        <a href="/trainingApp/register/">Registrera</a>
        ';
  }
  ?>
  </div>
</header>