<?php
session_start();
 $amount= $_POST['amount'];
 $recieverid=$_POST['reciever'];
$sender=$_SESSION['senderid'];
include("connection.php");
$name2=mysqli_query($con,"select balance from user_info where id=".$sender);
$sendername=mysqli_fetch_assoc($name2);
$name1=mysqli_query($con,"select balance from user_info where id=".$recieverid);
$recievername=mysqli_fetch_assoc($name1);
if($amount>=$sendername['balance'])
{
    
 
    header("Location:failure.php");

}else{
$amount1=$sendername['balance']-$amount;
$amount2=$recievername['balance']+$amount;

$sql="UPDATE user_info
SET balance=$amount1
 where id=".$sender;
 $sql2="UPDATE user_info
 SET balance=$amount2
  where id=".$recieverid;
if(mysqli_query($con,$sql)&&mysqli_query($con,$sql2))
	{
		header("Location:Successful.php");
	}
	else
	{
		echo mysqli_error($con);
    }
}


?>