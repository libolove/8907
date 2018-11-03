<?php

   $id = $_GET["id"];
   
   
   echo $id;
   
    
	   $link = mysqli_connect("127.0.0.1", "root", "root", "k8907") or die("数据库链接失败!!");
	   
	   mysqli_set_charset($link, "utf8");
	   
	   $sql = "select * from stus where sid=$id";
	   
	   //echo $sql;
	   
	   $result = mysqli_query($link, $sql);
	   
	  $row = mysqli_fetch_assoc($result);
	  
	  mysqli_free_result($result);
	  
	  mysqli_close($link);
	  
	  print_r($row);
   
   ?>
   
   
   <html>
   	<head>
   		<title></title>
   		<meta name="" charset="utf-8" content=""/>
   		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   	</head>
   	<body>
   		   <form action="saveAction.php?id=<?php echo $id ;?>" method="post">
   		   	
   		   	  <!--<input type="hidden" name="id" id="id" value="<?php echo $id ;?>" />-->
   		   	
   		   	<table class="table table-hover table-bordered" style="width:600px">
   		   		<tr>
   		   			
   		   			<th class="text-center" colspan="2">修改用户</th>
   		   			
   		   			
   		   		</tr>
   		   		<tr>
   		   			<td>用户名</td>
   		   			<td>
   		   				
   		   				<input type="text" name="user"  id="" value="<?php echo $row["memeda"];?>" />
   		   			</td>
   		   			
   		   		</tr>
   		   		
   		   		
   		   		<tr>
   		   			<td>性别</td>
   		   			<td>
   		   				 <?php
   		   				 	 if($row["sex"] == '男'){
   		   				 	 	$man = "checked";
   		   				 	 }elseif($row["sex"] == '女'){
   		   				 	 	
								$woman = "checked";
   		   				 	 }else{
   		   				 	 	 $scre = "checked";
   		   				 	 }
   		   				 	?>
   		   				
   		   				<input type="radio" name="sex" <?php echo $man; ?> id="sex" value="男" />男
   		   				<input type="radio" name="sex" <?php echo $woman; ?> id="sex" value="女" />女
   		   				<input type="radio" name="sex" <?php echo $scre; ?> id="sex" value="保密" />保密
   		   			</td>
   		   			
   		   		</tr>
   		   			<tr>
   		   			<td>年龄</td>
   		   			<td>
   		   				
   		   				<input type="number" name="age" min="18" max="120" id="sex" value="<?php echo $row["age"];?>" />
   		   			
   		   			</td>
   		   			
   		   		</tr>
   		   		
   		   			<tr>
   		   			<td>电话</td>
   		   			<td>
   		   				
   		   				<input type="tel" name="tel" id="tel" value="<?php echo $row["tel"];?>" />
   		   				
   		   			</td>
   		   			
   		   		</tr>
   		   			<tr>
   		   			<td>地址</td>
   		   			<td>
   		   				
   		   				<input type="text" name="address" id="sex" value="<?php echo $row["address"];?>" />
   		   				
   		   			</td>
   		   			
   		   		</tr>
   		   			<tr>
   		   			
   		   			<td colspan="2">
   		   				
   		   				
   		   					<input class="btn  btn-block btn-success" type="submit" value="修改"/>
   		   			</td>
   		   			
   		   		</tr>
   		   	</table>
   		   	
   		   
   		   </form>
   	</body>
   </html>
   
