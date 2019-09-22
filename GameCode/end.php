<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<style type="text/css">
@import "結算.css";
</style>
</head>
<body>


<div id="header">
<h1 align=center>遊戲結束</h1>
</div>
<div id="score">
<h3 id="score" align=center></h3>
</div>

<div id="main">
<?php
include("RPG_Connect.inc.php");
$result=mysqli_query($conn, "SELECT userName,score FROM account");
$rank_score=array(-1,-2,-3,-4,-5,-6,-7,-8,-9,-10);
$rank_name=array(0,0,0,0,0,0,0,0,0,0);
$stemp;
$ntemp;
while ($row = mysqli_fetch_array($result)) {
	for($i=0;$i<10;$i++){
		if($rank_score[$i]<0){
			$rank_score[$i]=$row[1];
			$rank_name[$i]=$row[0];
			break;
		}elseif($row[1]>$rank_score[$i]){
			for($j=9;$j>$i;$j--){
				$rank_score[$j]=$rank_score[$j-1];
				$rank_name[$j]=$rank_name[$j-1];
				
			}
			$rank_score[$i]=$row[1];
			$rank_name[$i]=$row[0];
			break;
		}
		
		
	}
}

echo '<table id="ranktable" align="center"><tr><th>排名</th><th>玩家</th><th>分數</th></tr>';
for($i=0;$i<10;$i++){
	if($rank_score[$i]>=0){
		$j=$i+1;
		echo "<tr><td> $j </td><td> $rank_name[$i] </td><td> $rank_score[$i] </td></tr>";
		
	}else{
		break;
	}
	
}


echo '</table>';
?>

</div>
<script>
<?php
include("RPG_Connect.inc.php");
echo "

		document.getElementById('score').innerHTML = '本次分數:{$_POST["score"]}';

		
";
	?>
	</script>





</body>
