<?php
if(isset($_COOKIE['username']))
{
    echo "<h2> hello ".$_COOKIE['username']."</h2>";            
}else
{
    header("location:login.php?error=should login first");    

}
$conn= mysqli_connect("localhost","root","","php_project");
if(mysqli_connect_errno()){
trigger_error(mysqli_connect_errno());
}else{
$journalist=mysqli_query($conn,"select * from artical as a inner join user j on j.id=a.id ");
echo mysqli_error($conn);
if(mysqli_num_rows($journalist)>0){
   $id =$row['id'];
   $fname = $row['f_name'];
   $lname = $row['l_name'];
   $email = $row['email'];
   $username = $row['username'];
   $pass = $row['userpass'];
   $gender = $row['gender'];
   $birth = $row['birth'];
 
}
?>