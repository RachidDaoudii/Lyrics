<?php
  session_start();
  if(!isset($_SESSION["id"]) && !isset($_SESSION['email'])){
		header("location: login.php");
		exit;
	}

      include_once('../../DB/db.php');
  include_once('../../Models/categories.model.php');
  include_once('../../Models/artistes.model.php');
  include_once('../../Models/songs.model.php');

  $categoey = new categoriesModel();
  $artist = new artistesModel();
  $song = new songModel();
  $options = $categoey->getCategories();
  $artistes = $artist->getArtistes();
  
  $getSongs = $song->getSongs();

//   var_dump($getSongs);

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
    <title>Songs</title>
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
    <h3>Songs</h3>
    <div class="form-outline w-50">
      <input type="text" class="form-control" name="Search" id="Search" />
      <label for="Search" class="form-label">Search</label>
    </div>
    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" id="modal" class="btn btn-primary btn-floating btn-lg" data-mdb-toggle="modal" data-mdb-target="#myModal">
        <i class="fas fa-plus-circle"></i>
        </button>
    </div>
</div>
<div class="row" id="Songs">
<?php 


?>
</div>



 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Songs</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
        <form action="" method="POST" id="form"  class="row g-3 needs-validation" novalidate>
                <div class="modal-body">
                    <div id="demo">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-outline mb-3">
                        <input type="text" class="form-control" name="Title" id="Title" required />
                        <label for="Title" class="form-label">Title</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please choose a title.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <textarea name="" id="Song" class="form-control" cols="5" rows="5" required>

                            </textarea>
                            <!-- <input type="text"  id=""  /> -->
                            <label for="Song" class="form-label">Song</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a song.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="date" class="form-control" id="Add_the" required />
                            <label for="Add_the" class="form-label">Add the</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Add the.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <select  name="name_Artist" id="name_Artist" class="form-select" aria-label="Filter select" required>
                                <option selected>Artistes</option>
                                <?php foreach($artistes as $ar){
                                    echo '<option value="'.$ar['id'].'">'.$ar['name'].'</option>';
                                 }?>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Name Artist.</div>
                        </div>
                        <div class="form-outline mb-3">
                            <select  name="category" id="category" class="form-select" aria-label="Filter select" required>
                            <option selected>Categories</option>
                            <?php foreach($options as $cat){
                                    echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                                 }?>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please choose a Name Categories.</div>
                        </div>
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
                <button type="submit" name="saveSong" id="saveSong" class="btn btn-primary save" >Save</button>
                <button type="submit" id="editSong" class="btn btn-warning edit" data-mdb-dismiss="modal" >Edit</button>
                <button type="submit" id="deleteSong" class="btn btn-danger delete" data-mdb-dismiss="modal" >Delete</button>
            </div>
        </form>
     </div>
    </div>
</div>
    </div>
  </main>
  <!--Main layout-->
    
</body>
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../asset/js/main.js"></script>

<script src="../../asset/js/validationForms.js"></script>
</html>
