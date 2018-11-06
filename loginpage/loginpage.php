<?php
require_once('includes/db.php');

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) ||
    empty($_POST['password'])) {
        $error = "username or password is empty";
    } else {
        
        // Save username & password in a variable
        $username = $_POST['username'];
        $password = $_POST['password'];
        //2. Prepare query
        $query  = "SELECT username, password, level ";
        $query .= "FROM users ";
        $query .= "WHERE username = '$username' AND password ='$password' ";
        //3.Execute query
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query is wrong");
        }
        
        //save data to $row
        $row = mysqli_fetch_array($result);
        
        //Check how many answers did we get
        $numrows= mysqli_num_rows($result);
        if ($numrows == 1) {
            //Start to use sessions
            session_start();
            
            //Create session variable
            $_SESSION['login_user'] = $username;
            $_SESSION['login_level'] = $row['level'];       header('Location: index1/index.html');
        
        } else {
            echo"Login failed";
        }
        
        //4.Free results
        mysqli_free_result($result);
    }
}

//5. close db connection
mysqli_close($connection);

?>
    <?php
    if (isset($error)) {
        echo "<span>" . $error ."</span>";
    }
    ?>


<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Chengdu Metro</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#culture">Culture</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Chengdu Metro</h1>
          <a href="#signup" class="btn btn-primary js-scroll-trigger">Log in</a>
        </div>
      </div>
    </header>
      
<!-- Culture Section -->
    <section id="culture" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4">Enterprise Core Value</h2>
            <p class="text-white-50">Dedicated &nbsp;&emsp;Integrity &emsp;&nbsp;Responsible &nbsp;&emsp;Unity</p>
            <h2 class="text-white mb-4">Enterprise Mission</h2>
            <p class="text-white-50">Make passengers'trip faster, make Chengdu more prosperous.</p>
            <h2 class="text-white mb-4">Management Concept</h2>
            <p class="text-white-50">Solidarity and cooperation &emsp;&nbsp;&nbsp;&nbsp; Humanistic care</p>
          </div>
        </div>
      </div>
    </section>
   

    <!-- Signup Section -->
    <section id="signup" class="signup-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto text-center">

            <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
            <h2 class="text-white mb-5">Log in to access Chengdu Metro system!</h2>
              
            <form action="index.html" method="POST">
                <label><b>Username:&ensp;</b></label>
            <input type="text" name="username" Placeholder="username"> <br/>
            <pre> </pre>

                <label><b>Password:&ensp;</b></label>
            <input type="password" name="password" Placeholder="password"> <br/>
            <pre> </pre>
            <input class="btn btn-primary js-scroll-trigger" type="submit" name="submit" value="Login">
        </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-black">
      <div class="container">

        <div class="row">

            <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Wechat</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  
                  <img src="img/3.jpg"></div>
              </div>
            </div>
          </div>
            
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#">hello@ChengduMetro.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Phone</h4>
                <hr class="my-4">
                <div class="small text-black-50">+1 (555) 902-8832</div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Chengdu Metro Website 2018
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
