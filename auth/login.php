<?php 
include '../shared/header.php';
include '../shared/navbar.php';
include '../func/conn.php';

$_SESSION['email']="";
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select="SELECT * FROM `patintes` WHERE email='$email' AND password='$password'";
    $s=mysqli_query($conn,$select);
    $num_rows=mysqli_num_rows($s);
    $row=mysqli_fetch_assoc($s);
    $id=$row['id'];
    if($num_rows>0){
        $_SESSION['email']=$email;
        $_SESSION['id']=$id;
        header("location:/hospital_user/index.php");
    }else{
    }
}
?>
<section id="Add" class="appointment section-bg mt-5">
    <div class="container mt-5">

        <div class="section-title mt-5">
            <h2>Login</h2>
        </div>

        <form  method="post"  class=" m-auto">
                <div class="col-lg-5 form-group  mx-auto">
                    <input type="text" name="email" class="form-control py-2" placeholder="Your Email">
                </div>
                <div class="col-lg-5 form-group  mt-3  mx-auto">
                    <input type="password" class="form-control py-2" name="password"  placeholder="Your Password">
                </div>
            <div class="text-center mt-3 "><button type="submit" name="login" class="appointment-btn border-0">Login</button></div>
        </form>

    </div>
</section>
<?php
 include '../shared/scribt.php';
 ?>