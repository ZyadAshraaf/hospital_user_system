<?php 
include '../shared/header.php';
include '../shared/navbar.php';
include '../func/conn.php';
include '../func/func.php';


if(isset($_POST['signUp'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $insert="INSERT INTO `patintes` VALUES(null,'$name',$phone,'$email','$password',null,null)";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"Signned");
}
?>
<section id="Add" class="appointment section-bg mt-5">
    <div class="container mt-5">

        <div class="section-title mt-5">
            <h2>Sign up</h2>
        </div>

        <form method="post" class="m-auto">
            <div class="col-lg-5 form-group mx-auto">
                <input type="text" name="name" class="form-control py-2" placeholder="Your name">
            </div>
            <div class="col-lg-5 form-group mt-3  mx-auto">
                    <input type="text" name="phone" class="form-control py-2" placeholder="Your phone">
                </div>
            <div class="col-lg-5 form-group mt-3  mx-auto">
                <input type="text" name="email" class="form-control py-2"  placeholder="Your Email">
            </div>
            <div class="col-lg-5 form-group mt-3  mx-auto">
                <input type="password" class="form-control py-2" name="password" placeholder="Your Password">
            </div>
            <div class="text-center mt-3"><button type="submit" class="appointment-btn border-0" name="signUp">Sign up</button></div>
        </form>

    </div>
</section>
<?php
 include '../shared/scribt.php';
 ?>