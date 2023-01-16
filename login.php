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
    <title>Login</title>
</head>
<body>
<div class="container">
        <div class="w-50 mx-auto">
            <div class="w-100 mt-5">
                <!-- session erreur -->
                <?php if(isset($_SESSION['message'])):  ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>Erreur!</strong>
                        <?php 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                        ?>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert"></span>
                    </div>
                <?php endif ?>
                <!-- session erreur -->
                <?php if(isset($_SESSION['erreur'])):  ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Erreur!</strong>
                        <?php 
                            echo $_SESSION['erreur']; 
                            unset($_SESSION['erreur']);
                        ?>
                        <button type="button" class="btn-close" data-mdb-dismiss="alert"></span>
                    </div>
                <?php endif ?>
                <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                class="nav-link active"
                id="tab-login"
                data-mdb-toggle="pill"
                href="#pills-login"
                role="tab"
                aria-controls="pills-login"
                aria-selected="true"
                >Login</a
                >
            </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form>
                <div class="text-center mb-3">
                    <p>Sign in with:</p>
                    <button type="button" class="btn btn-secondary btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-secondary btn-floating mx-1">
                    <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-secondary btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-secondary btn-floating mx-1">
                    <i class="fab fa-github"></i>
                    </button>
                </div>

                <p class="text-center">or:</p>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="loginName" class="form-control" />
                    <label class="form-label" for="loginName">Email or username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
</html>