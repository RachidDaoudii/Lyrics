<?php
  session_start();
  if(!isset($_SESSION["id"]) && !isset($_SESSION['email'])){
		header("location: login.php");
		exit;
	}

  // include_once('DB/db.php');
  // include_once('Models/categories.model.php');
  // include_once('Models/artistes.model.php');

  // $categoey = new categoriesModel();
  // $artist = new artistesModel();
  // $options = $categoey->getCategories();
  // $artistes = $artist->getArtistes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Lyrics</title>
</head>
<body>
    <!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4" id="listGroup">
          <a
            href="index.php"
            class="list-group-item list-group-item-action py-2 ripple active listGroup"
            aria-current="true"
          >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>dashboard</span>
          </a>
          <a href="index.php?page=Categories" class="list-group-item list-group-item-action py-2 ripple listGroup">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Categories</span>
          </a>
          <a href="index.php?page=Songs" class="list-group-item list-group-item-action py-2 ripple listGroup">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Songs</span>
          </a>
          <a href="index.php?page=Artistes" class="list-group-item list-group-item-action py-2 ripple listGroup">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Artistes</span>
          </a>
        </div>
      </div>
    </nav>
    <!-- Sidebar  -->
  
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Brand -->
        <a class="navbar-brand bg-secondary rounded-pill" href="#">
          <img
            class="ms-3"
            src="asset/img/logo.png"
            height="30"
            alt="Lyrics"
            loading="lazy"
          />
        </a>
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="asset/img//user.png"
                class="rounded-circle"
                height="22"
                alt="Avatar"
                loading="lazy"
              />
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
            >
              <li>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main style="margin-top: 58px;">
    <div class="container pt-4">
    <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == "Songs") {
              include_once('include/components/Songs.php');
            } elseif ($page == "Categories") {
              include_once('include/components/Categories.php');
            }elseif ($page == "Artistes") {
              include_once('include/components/Artistes.php');
            }
        } else {
            // page default
            include_once('include/components/Satistique.php');
        }
    ?>
    </div>
  </main>
  <!--Main layout-->
    
</body>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="asset/js/main.js"></script>
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
<script src="asset/js/validationForms.js"></script>
</html>