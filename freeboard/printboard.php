<?php 
 #session_start();
 #include ('conn.php');
 $idx=$_GET['idx'];
 $squery="select * from test where count='{$idx}'";
 $result=mysql_query($squery,$conn);
 $row=mysql_fetch_array($result);
#if(isset($_SESSION['name'])){    ##
#	if($row['pw']==NULL|| (!strcmp($_POST['pw'],$row['pw'])) || ($_SESSION['enter']==true))
#}		
?>

<html>
<style>
  </style>
<body>
  <p style=text-align:right;>
		<input type="button" onclick="location.href='writeboard.php?idx=<?=$idx?>'" id="button_s" value="수정">
    <input type="button" onclick="location.href='deleteboard.php?idx=<?=$idx?>'" id="button_s" value="삭제">
    <input type="button" onclick="location.href='board.php?idx=<?$idx?>'" id="button_s" style="margin-right:20%;" value="목록">
    </p>
  

 <?php
  
	#print
	echo "<table style='width:60%; height:40%;'><tr><td>" . $row['idx'] . "</td><td colspan='2'>" . $row['subject'] . "</td></tr>";
	echo "<tr><td>" . $row['name'] . "</td><td>" . $row['date'] . "</td></tr>";
	echo "<tr valign='top' align='left' height='420'><td colspan='3'>".$row['']."</td></tr>";
	echo "</table>";
			
 ?>
	

</body>
</html>
