<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>GameOver</title>
   <style>
     div{color:red;font-size: 150px;position: absolute;top: 30%;left: 30%;}
     body{background: url("./resource/GameOver.png");background-repeat: no-repeat;background-attachment: fixed;background-position: center;background-color: black;}
     button{position: absolute;top: 60%;left: 38%;width: 30%;height: 10%;font-size: 50px;}
   </style>
   <script>
     function retry() {
      document.location.href="RPG.php";
     }
   </script>
</head>
<body>

<div>Game Over</div>
<button onclick="retry()">重新開始</button>

</body>
</html>
