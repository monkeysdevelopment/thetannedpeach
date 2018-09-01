<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top <?php if (strpos($_SERVER['SCRIPT_NAME'], 'index.php')) echo 'transparent make_transparent';  ?>">
  <!-- Navbar content -->
  <a class="navbar-brand" href="index.php">
    <img src="assets/images/logo/logo_hori_white.png" height="50" alt="Verde Logo">
  </a>
  <!-- Toggler -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarVerde" aria-controls="navbarVerde" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarVerde">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">NEW IN</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CLOTHING
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Tops</a>
          <a class="dropdown-item" href="#">Skirts</a>
          <a class="dropdown-item" href="#">Jeans</a>
          <a class="dropdown-item" href="#">Dresses</a>
          <a class="dropdown-item" href="#">Skirts</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Shoes</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ACCESSORIES</a>
      </li>
    </ul>

      <div class="search-box">
        <input type="text" class="search-focus" id="searchbar" placeholder="search here..." autocomplete="off">
        <i class="fas fa-search fa-lg" id="searchicon"></i>
        <div class="result"></div>
      </div>
    <ul class="navbar-nav mt-2 mt-lg-0 mr-0">
      <li class="nav-item">
        <!-- Button trigger modal -->

          <?php
            if($logged)
            {?>
              <button type="button" class="btn btn-link nav-link">
                <i class="fas fa-user-cog fa-lg"></i>
                <br><a href="logout.php">Log out</a>
              </button>
              <?php
            }else{ ?>
              <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#accountModal">
                <i class="fas fa-user fa-lg"></i>
              </button> <?php } ?>

        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-heart fa-lg"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-shopping-bag fa-lg"></i>
          </a>
        </li>
      </ul>
    </div>
</nav>
