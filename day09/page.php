<?php
       
       // 分页逻辑
       // 当前页码值  $page
       //  分页起始值  $start
       //  每一页显示的记录数  $pageSize =10;
       
       $page =$_GET["page"] == null ? 1:$_GET["page"]; //确定一个当前页 
       
       //上下页
       $next = $page+1; //2
	   $prev = $page-1;
	   
       
       var_dump($page);
      // exit;
       $pageSize = 10;
	   
	   //算起始值
	    $start = ($page-1)*$pageSize;
       
       
       $link = mysqli_connect("127.0.0.1", "root", "root", "k8907") or die("数据链接失败");
	   
	   
	   mysqli_set_charset($link, "utf8");
	   
	   //准备要执行的sql
	    $sql = "select * from stus limit $start,$pageSize";
		
	   $result =	mysqli_query($link, $sql) or die("sql语句拼写有误");
	   
	   
	    // 获取总记录数
	       $countSql = "select count(1) sum from stus";
		   
		    $re = mysqli_query($link, $countSql); 
			
			   $rowCount = mysqli_fetch_assoc($re);
		   
		    print_r($rowCount);
			// 求尾页
			$totalPage = ceil($rowCount["sum"]/$pageSize);
			
			echo $totalPage;
	   
	   
	   
	   // 解析结果集
	   
	    $arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
	    
	   //释放结果集
	   mysqli_free_result($result);
	   
	   
	   mysqli_close($link);
	   
	  // print_r($arr);
       

?>


<html>
	<head>
		<title></title>
		<meta name="" charset="utf-8" content=""/>
	</head>
	<body>
		<table border="1" cellspacing="0" align="center" width="600" cellpadding="">
			<tr>
				
				<th>id</th>
				<th>姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>电话</th>
				<th>地址</th>
				<th>操作</th>
			</tr>
			
			<?php 
				foreach($arr as $v){
				?>
			<tr>
				<td><?php echo $v["sId"]?></td>
					<td><?php echo $v["memeda"]?></td>
					<td><?php echo $v["sex"]?></td>
						<td><?php echo $v["age"]?></td>
					<td><?php echo $v["tel"]?></td>
						<td><?php echo $v["address"]?></td>
						<td><a href="save.php?id=<?php echo $v["sId"]?>">修改</a></td>
			</tr>
			
		  <?php
				}
		  	?>	
		  	
		  	<tr>
		  		 <td colspan="7" align="center">
		  		 	 当前第<mark><?php echo $page; ?></mark>页 /共<mark><?php echo $totalPage; ?></mark>页
		  		 	 
		  		 	 <?php
		  		 	 	 // 首页  继续点上一页
		  		 	 	 if($page == 1){
		  		 	 	 	echo  ' 首页 ';
							 echo '&nbsp;';
							echo '上一页'; 
		  		 	 	 }else{
		  		 	 	?>
		  		 	 
		  		 	 <a href="page.php?page=1">首页</a>
		  		 	 <a href="page.php?page=<?php echo $prev;?>">上一页</a>
		  		 	 <?php
						 }

                        if($page >= $totalPage){
                        	echo  ' 下一页 ';
							 echo '&nbsp;';
							echo '尾页'; 
                        }else{
		  		 	 	?>
		  		 	 <a href="page.php?page=<?php echo $next;?>">下一页</a>
		  		 	 <a href="page.php?page=<?php echo $totalPage;?>">尾页</a>
		  		 	 
		  		 	 <?php
						}
		  		 	 	?>
		  		 </td>
		  	</tr>
		</table>
	</body>
</html>