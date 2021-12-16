<?php 
ob_start();
include '../shared/header.php';
include '../shared/navbar.php';
include '../func/func.php';
include '../func/conn.php';
if($_SESSION['email']){

}else{
    header("location:/hospital_user/auth/login.php");
}
ob_end_flush();
$email=$_SESSION['email'];
$select="SELECT * FROM `patintes` WHERE email='$email'";
$s=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($s);
$patientName=$row['name'];
$patientEmail=$row['email'];
$patientPhone=$row['phone'];

$doctorName="";
$departmentName="";
$id="";
if(isset($_GET['make'])){
    $id=$_GET['make'];
    $selectD="SELECT doctors.name as docName ,department.name as depName  FROM `doctors` INNER JOIN department ON doctors.department_id=department.id WHERE doctors.id=$id;";
    $sD=mysqli_query($conn,$selectD);
    $rowD=mysqli_fetch_assoc($sD);
    $doctorName=$rowD['docName'];
    $departmentName=$rowD['depName'];
}

?>
<section class="appointment section-bg mt-5">
    <div class="container mt-5">

        <div class="section-title mt-5">
            <h2>Make an Appointment</h2>
        </div>
<?php 
if(isset($_POST['appointment'])){
    $patientName=$_POST['pName'];
    $patientEmail=$_POST['pEmail'];
    $patientPhone=$_POST['pPhone'];
    $doctorDepartment=$_POST['dDepartment'];
    $doctorName=$_POST['dName'];
    $appointmentDate=$_POST['appointmentDate'];
    $selectPatient="SELECT * FROM `patintes` WHERE email='$patientEmail';";
    $sPatient=mysqli_query($conn,$selectPatient);
    $patientRow=mysqli_fetch_assoc($sPatient);
    $patientID=$patientRow['id'];
    $selectDoctor="SELECT * FROM `doctors` WHERE id='$id';";
    $sDoctor=mysqli_query($conn,$selectDoctor);
    $doctorRow=mysqli_fetch_assoc($sDoctor);
    $doctorID=$doctorRow['id'];
    $date=$_POST['appointmentDate'];
    $insert="INSERT Into `appointments` VALUES(null,'$patientID','$doctorID','$date')";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"Added");
}
?>
        <form method="post" class="form-group">
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Your name :</label>
                    <input type="text" name="pName" class="form-control  " placeholder="Your Name"
                    value="<?php echo $patientName; ?>">
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Your Email :</label>
                    <input type="email"class="form-control  " name="pEmail" placeholder="Your Email"
                        value="<?php echo $patientEmail; ?>">

                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Your phone :</label>
                    <input type="tel"class="form-control  " name="pPhone" placeholder="Your Phone"
                        value="<?php echo $patientPhone;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Department :</label>
                    <input type="datetime" name="dDepartment" class="form-control  " placeholder="Department"
                        value="<?php echo $departmentName;;?>">

                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Doctor's name :</label>
                    <input type="datetime" name="dName"class="form-control  " placeholder="Doctor"
                        value="<?php echo $doctorName;?>">
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label for="" class="">Appointment Date :</label>
                    <input type="datetime-local" name="appointmentDate" class="form-control  " placeholder="Appointment Date">
                </div>
            </div>
            <div class="text-center "><button type="submit" name="appointment" class="appointment-btn border-0 mt-3">Make an
                    Appointment</button></div>
        </form>

    </div>
</section><!-- End Appointment Section -->





<?php
 include '../shared/scribt.php';
 ?>