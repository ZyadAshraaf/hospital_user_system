  <!-- ======= Top Bar ======= -->
  <?php 
session_start();

if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/hospital_user/index.php");
}
?>
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/hospital_user/index.php">Hospital</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#about">About</a></li>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#services">Services</a></li>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="/hospital_user/index.php/#contact">Contact</a></li>
      <?php if(isset($_SESSION['email'])){ ?>
          <li><a class="nav-link scrollto" href="/hospital_user/appointments/list.php">My Appointments</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <form action=""><button href="/hospital_user/index.php" class="appointment-btn bg-danger scrollto border-0"
          name='logout'>Log
          out</button></form>
      <?php }else{?>
      </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="/hospital_user/auth/login.php" class="appointment-btn scrollto">Login</a>
      <a href="/hospital_user/auth/signUp.php" class="appointment-btn bg-white border signUp">Sign up</a>
      <?php }?>
    </div>
  </header><!-- End Header -->