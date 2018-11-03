<?php

header("content-type:text/html;charset=utf-8");
  $id = $_GET["id"];
  
  $user=$_POST["user"];
  $sex=$_POST["sex"];
  $age = $_POST["age"];
  $address = $_POST["address"];
  $tel = $_POST["tel"];
  
   
	   $link = mysqli_connect("127.0.0.1", "root", "root", "k8907") or die("数据库链接失败!!");
	   
	   mysqli_set_charset($link, "utf8");
  
  
      $sql = "update stus set memeda='$user',tel='$tel',sex='$sex',address='$address',age='$age' where sid =$id";
	  
	  //echo $sql;
	  
	  mysqli_query($link, $sql);
	  
	 $rows =  mysqli_affected_rows($link);
	 
	 mysqli_close($link);
	 
	 if($rows > 0){
	 	header("location:page.php");
	 }else{
	 	header("location:save.php?id=".$id);
	 }
//print_r($_POST);