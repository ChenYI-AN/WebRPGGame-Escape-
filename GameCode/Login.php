<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>驗證頁面</title>
   <style>
     body{text-align:center;font-size: 30px}
     div.welcome{color:green}
     div.error{color:red}
     body{background: url("back-120.gif")
   </style>
</head>
<body>
	<form name="accountForm" method="post" action="RPG.php">
		<input type="hidden" name="userName" id="userName" value="">
	</form>
<script>
<?php
include("RPG_Connect.inc.php");

if ( ! $_POST['uname'] || ! $_POST['upass'] ){

  echo "alert('請輸入帳號密碼!');";
  echo "window.location.replace('LoginPage.htm');";

} else {
	$sql = "SELECT userpass FROM account WHERE userName = '{$_POST["uname"]}'";
	$result = mysqli_query($conn, $sql);
	$totalhelp = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	if($totalhelp<=0){
		echo "alert('查無帳號!');";
		echo "window.location.replace('LoginPage.htm');";
		
	}else if($_POST['upass']!=$row[0]){
		echo "alert('帳號密碼錯誤!');";
		echo "window.location.replace('LoginPage.htm');";
	}else{
		echo "function save(){
		document.getElementById('userName').value = '{$_POST["uname"]}';
		document.accountForm.submit();}
		";
		echo "save();";
	}
}  
?>



</script>

</body>
</html>
