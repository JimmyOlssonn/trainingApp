<!-- 
  Navbar 
  Include with: include_once("navbar.php") 
 -->
<div class="navbar">
  <a href="#home">Hem</a>
  <a href="#about">Om oss</a>
  <a href="#price">Priser</a>
  <?php
  if (isset($_SESSION['Username'])) { // If a user is logged in
    echo '
            <div class="dropdown">
              <a class="dropdown-button">' . $_SESSION['Username'] . '</a>
              <div class="dropdown-container">
                <a href="profile.php">Profile</a>
                <a href="#">Runs</a>
                <a href="#">Membership</a>
                <a href="#">Settings</a>
                <a href="logout.php">Sign out</a>
              </div>
            </div>
            ';
  } else { // If no user is logged in
    echo '
    <a onclick="toggleRegModal()">Registrera</a>
    <a onclick="toggleLoginModal()">Logga in</a>
          ';
  }
  ?>
</div>