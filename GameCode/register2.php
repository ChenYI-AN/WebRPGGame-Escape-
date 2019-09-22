<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("RPG_Connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
if($id != null && $pw != null)
{
        $sql = "insert into account(userName, userpass, playerX, playerY, mapNum ) values ('$id', '$pw', '11', '8', '1')";
        if(mysqli_query($conn, $sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=LoginPage.htm>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=LoginPage.htm>';
        }
}
else
{
        echo '請輸入新的帳號密碼';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=登入.php>';
}
?>