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
$pId=$_SESSION['id'];
$select="SELECT appointments.id as appId,docctor_id,department.name as dpname, doctors.name as dname,date FROM `appointments` 
INNER JOIN `doctors` ON appointments.docctor_id=doctors.id 
INNER JOIN `department` ON doctors.department_id=department.id WHERE patient_id=$pId";
$s=mysqli_query($conn,$select);
?>


<h1 class="text-primary mt-5 text-center display-4">My Appointments</h1>
<div class="container mt-5 col-md-6">
    <?php
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `appointments` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    testMessage($d,"Deleted");
    header("location:/hospital_user/appointments/list.php");
}?>
    <div class="card bg-light">
        <div class="card-body">
            <table class="table table-primary">
                <tr>
                    <th>Doctor name</th>
                    <th>Department</th>
                    <th>Appointment Date</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <td><?php echo $data['dname']; ?></td>
                    <td><?php echo $data['dpname']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><a onclick="return confirm('Are you sure?')"
                            href="/hospital_user/appointments/list.php?delete=<?php echo $data['appId']; ?>"
                            class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php

ob_end_flush();
 include '../shared/scribt.php';
 ?>