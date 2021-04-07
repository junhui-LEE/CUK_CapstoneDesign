<?php
#session_start();
$list_size=5;

?>


<html>
<style>
</style>
<body>

<?php
include ('conn.php');		#mysql-connect
// global $conn;

if(!isset($_GET['idx'])){
	echo "<script>location.href='board.php?idx=1';</script>";
}
else{
	$idx=$_GET['idx']; }

$idx=($idx-1)*$list_size;
#
// $query="select * from test order by idx desc limit " . $idx . "," . $list_size;	//local
$query="select * from board order by idx desc limit " . $idx . "," . $list_size;
$result=mysqli_query($GLOBALS['conn'],$query);
// $result=mysqli_query($query);
// $result=mysql_query($query);
$page_cnt=mysqli_num_rows($result);

echo "<table border='1'>";
while($row=mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['idx'] . "</td>";
	echo "<td><a href='board.php?idx=" . ($row['idx']) . "'>" . $row['subject'] . "</a></td>";
        echo "<td>" . $row['user_name'] . "</td>";
        echo "<td>" . date("Y-m-d",strtotime($row['date'])) . "</td>";
        echo "</tr>";
}
echo "</table>";

$page_cnt=ceil($page_cnt/$list_size);

#paging button
for($i=0;$i<$page_cnt;$i++){
	if($i+1==$_GET['idx']){
		echo "<input type='button' style='margin:3px;' value='" . ($i+1) . "'onclick=\"location.href='board.php?idx=" . ($i+1) . "'\" disabled>";
    }

	else{
		echo "<input type='button' value='" . ($i+1) . "' style='margin:2px;' onclick=\"location.href='board.php?idx=" . ($i+1) . "'\" >";
	}
}
?>
