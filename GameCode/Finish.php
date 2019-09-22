<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Finish</title>
   <style>
     div{color:red;font-size: 150px;position: absolute;top: 30%;left: 30%;}
     body{background: url("./resource/Free.png");background-repeat: no-repeat;background-attachment: fixed;background-position: center;background-color: black;}
   </style>
   <script>
     function retry() {
      document.location.href="RPG.php";
     }
	 function scoreBoard() {
		 document.location.href="end.php";
	 }
   </script>
</head>
<body>
<form name="accountForm" method="post" action="RPG.php">
		<input type="hidden" name="userName" id="userName" value="">
	</form>
<form name="endForm" method="post" action="end.php">
		<input type="hidden" name="score" id="escore" value="">
	</form>
	<script>
<?php
include("RPG_Connect.inc.php");
if ( !empty($_POST['score']) 
	){
		$sql="UPDATE account SET  ";
		$sql.="score = '{$_POST["score"]}'";
      $sql.="  WHERE userName = '{$_POST["userName"]}' ";
	mysqli_query($conn, $sql);
	}
	$rowUpdated=mysqli_affected_rows($conn);

if ($rowUpdated >0){
  echo "alert('資料更新成功');";
}
echo "
function esave(){
		document.getElementById('escore').value = {$_POST["score"]};
		document.endForm.submit();
		
	}
	function save(){
		document.getElementById('userName').value = '{$_POST["userName"]}';
		document.accountForm.submit();}";
		
	?>
</script>
<div>You Are Free</div>
<button style="position: absolute;top: 60%;left: 36%;width: 30%;height: 10%;font-size: 50px;" onclick="save()">重新開始</button>
<button style="position: absolute;top: 80%;left: 36%;width: 30%;height: 10%;font-size: 50px;" onclick="esave()">排行榜</button>
</body>
</html>
