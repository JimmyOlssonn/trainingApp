<!-- 
  Navbar 
  Include with: include_once("navbar.php") 
 -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">TrainingApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar" aria-controls="navbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="topNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="price.php">Pricing</a>
          </li>
        </ul>

        <ul class="navbar-nav d-flex">
        <?php 
        if (isset($_SESSION['Username'])) { // If a user is logged in
          echo '
          <li class="nav-item dropdown ">
            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">
              <strong>' . $_SESSION['Username'] . '</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownUser">
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="#">Runs</a></li>
              <li><a class="dropdown-item" href="#">Membership</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul> 
          </li>';
        }else { // If no user is logged in
          echo '
            <button type="button" class="btn btn-light btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log-in</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign-up</button>
          ';
        }
          ?>
        </ul>
      </div>
    </div>
  </nav>