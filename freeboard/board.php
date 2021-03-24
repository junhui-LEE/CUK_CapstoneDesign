<?php
#session_start();       #login session
$list_size=5;           #list_size

?>

<html>
<style>
</style>
<body>

<?php
include ('conn.php');  #mysql-connect 
  
#printboard
if(!isset($_GET['idx'])){ 
        echo "<script>location.href='board.php?idx=1';</script>";
}
else{
        $idx=$_GET['idx']; }

$idx=($idx-1)*$list_size;    #5
#$query="select * from { } order by idx desc limit " . $idx . "," . $list_size;
$query="select * from test order by idx desc limit " . $idx . "," . $list_size;
$result=mysql_query($query,$conn);

#table
echo "<table border='1'>";
while($row=mysql_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['idx'] . "</td>";
        echo "<td> <a href='board.php?idx=" . ($row['idx']) . "'>" . $row['subject'] . "</a></td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . date("Y-m-d",strtotime($row['date'])) . "</td>";
        echo "</tr>";
}
echo "</table>";


$cquery="select * from test";
#$cquery="select * from { }";
$cresult=mysql_query($cquery,$conn);
$page_cnt=mysql_num_rows($cresult);
$page_cnt=ceil($page_cnt/$list_size);

#paging button
for($i=0;$i<$page_cnt;$i++){
        if($i+1==$_GET['idx']){ #selected
                echo "<input type='button' style='margin:3px;' value='" . ($i+1) . "' onclick=\"location.href='board.php?idx=" . ($i+1) . "'\"disabled>";
        }
        else{
                echo "<input type='button' value='" . ($i+1) . "' style='margin:3px;' onclick=\"location.href='board.php?idx=" . ($i+1) . "'\" >";
        }
}
?>
