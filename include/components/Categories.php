<?php
  session_start();
  if(!isset($_SESSION["id"]) && !isset($_SESSION['email'])){
		header("location: login.php");
		exit;
	}

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
    <link rel="stylesheet" href="../../asset/css/style.css">
    <title>Categories</title>
</head>
<body>
    <!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4" id="listGroup">
          <a
            href="Satistique.php"
            class="list-group-item list-group-item-action py-2 ripple active listGroup"
            aria-current="true"
          >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>dashboard</span>
          </a>
          <a href="Categories.php" class="list-group-item list-group-item-action py-2 ripple listGroup">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Categories</span>
          </a>
          <a href="Songs.php" class="list-group-item list-group-item-action py-2 ripple listGroup">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Songs</span>
          </a>
          <a href="Artistes.php" class="list-group-item list-group-item-action py-2 ripple listGroup">
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
            src="../../asset/img/logo.png"
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
                src="../../asset/img//user.png"
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
                <a class="dropdown-item" href="../../logout.php">Logout</a>
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
    <div class="d-flex justify-content-between pb-3">
    <h3>Categories</h3>
    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" id="modal" class="btn btn-primary btn-floating btn-lg" data-mdb-toggle="modal" data-mdb-target="#myModal">
        <i class="fas fa-plus-circle"></i>
        </button>
    </div>
</div>
<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tbody">
    
  </tbody>
 
</table>


 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
        <form action="" method="post" id="form" class="row g-3 needs-validation" novalidate>
            <div class="modal-body">
                <input type="hidden" name="id_category" id="id_category" value="">
                <div class="form-outline mb-4" id="demo">
                    <input type="text" class="form-control" id="category" required />
                    <label for="category" class="form-label">name Category</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please choose a Category.</div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-floating btn-lg me-3" id="MultiArtist">
                  <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-danger btn-floating btn-lg me-3" id="MultiDelete">
                  <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="submit" id="saveCategory" class="btn btn-primary save" >Save</button>
                <button type="submit" id="editCategory" class="btn btn-warning edit" >Edit</button>
                <button type="submit" id="deleteCategory" class="btn btn-danger delete" >Delete</button>
            </div>
        </form>
     </div>
    </div>
</div>

    </div>
  </main>
  <!--Main layout-->
    
</body>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../asset/js/main.js"></script>
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
<script src="../../asset/js/validationForms.js"></script>
</html>