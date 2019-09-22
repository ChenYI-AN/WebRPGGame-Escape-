<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RPG test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

window.onload = function() {
	
	setUp();
	document.onkeydown = function(event) {
			
		var keycode = event.which || event.keyCode;

		if(dialogWindow){
			if(keycode == "Z".charCodeAt() || keycode == " ".charCodeAt()){
				hideDialog();
				hideQuestion();
				hideItem();
			}
			if(document.getElementById('question').style.display == "inline"){
				if(keycode == "1".charCodeAt() || keycode == "A".charCodeAt())
					setAnswer(1);
				else if(keycode == "2".charCodeAt() || keycode == "B".charCodeAt())
					setAnswer(2);
				else if(keycode == "3".charCodeAt() || keycode == "C".charCodeAt())
					setAnswer(3);
				else if(keycode == "4".charCodeAt() || keycode == "D".charCodeAt())
					setAnswer(4);
				else if(keycode == "5".charCodeAt() || keycode == "E".charCodeAt())
					setAnswer(5);
			}
		}
		else{
			if     (keycode == "W".charCodeAt())
				moveUp();
			else if(keycode == "A".charCodeAt())
				moveLeft();
			else if(keycode == "S".charCodeAt())
				moveDown();
			else if(keycode == "D".charCodeAt())
				moveRight();
			else if(keycode == "Z".charCodeAt() || keycode == " ".charCodeAt())
				survey();
			else if(keycode == "P".charCodeAt())
				setMap(3);
			else if(keycode == "O".charCodeAt())
				setMap(2,1);
			else if(keycode == "R".charCodeAt())
				setUp();
		}
	}
}
	
<?php
	include("RPG_Connect.inc.php");
if ( !empty($_POST['playerX']) 
	){
		$sql="UPDATE account SET level = '{$_POST["level"]}', ";
		$sql.="playerX = '{$_POST["playerX"]}',";
		$sql.="playerY = '{$_POST["playerY"]}',";
		$sql.="mapNum = '{$_POST["mapNum"]}',";
		$sql.="r1Chest = '{$_POST["r1Chest"]}'," ;
		$sql.="r1Wall = '{$_POST["r1Wall"]}',";
		$sql.="r2FloorDoor = '{$_POST["r2FloorDoor"]}'," ;
		$sql.="r3Box = '{$_POST["r3Box"]}', ";
		$sql.="r3Ladder = '{$_POST["r3Ladder"]}', ";
		$sql.="r3LadderLock = '{$_POST["r3LadderLock"]}', ";
		$sql.="itemHammer = '{$_POST["itemHammer"]}', ";
		$sql.="itemPuzzle1 = '{$_POST["itemPuzzle1"]}', ";
		$sql.="itemPuzzle2 = '{$_POST["itemPuzzle2"]}', ";
		$sql.="itemPuzzle3 = '{$_POST["itemPuzzle3"]}', ";
		$sql.="itemPuzzle4 = '{$_POST["itemPuzzle4"]}',";
		$sql.="itemLadder = '{$_POST["itemLadder"]}',";
		$sql.="itemBox = '{$_POST["itemBox"]}',";
		$sql.="itemCoin = '{$_POST["itemCoin"]}',";
		$sql.="itemKey = '{$_POST["itemKey"]}',";
		$sql.="score = '{$_POST["score"]}'";
      $sql.="  WHERE userName = '{$_POST["userName"]}' ";
	mysqli_query($conn, $sql);
	}
	$rowUpdated=mysqli_affected_rows($conn);

if ($rowUpdated >0){
  echo "alert('資料更新成功');";
}
	//get map
	$getMap = mysqli_query($conn, "SELECT scene FROM map WHERE 1");
	$totalMaps = mysqli_num_rows($getMap);
	for($i=1;$i<=$totalMaps;$i++){
		${"scene".$i} = mysqli_fetch_array($getMap);
	}

	//get dialog
	$getDialog = mysqli_query($conn, "SELECT keyWord,dialogue FROM dialog WHERE 1");
	$totalDialogs = mysqli_num_rows($getDialog);
	$dialog = array();
	for($i=1;$i<=$totalDialogs;$i++){
		$getD = mysqli_fetch_array($getDialog);
		$newD = array("$getD[0]"=>"$getD[1]");
		$dialog = array_merge($dialog,$newD);
	}

	//get info
	$getInfo = mysqli_query($conn, "SELECT name,bool FROM info WHERE 1");
	$totalInfos = mysqli_num_rows($getInfo);
	$info = array();
	for($i=1;$i<=$totalInfos;$i++){
		$getI = mysqli_fetch_array($getInfo);
		$newI = array("$getI[0]"=>"$getI[1]");
		$info = array_merge($info,$newI);
	}

	//get question
	$getQuestion = mysqli_query($conn, "SELECT * FROM question WHERE 1");
	$totalQuestions = mysqli_num_rows($getQuestion);

	//get save info
	$getSaved = mysqli_query($conn, "SELECT * FROM account WHERE userName='{$_POST["userName"]}'");//{$_POST["userName"]}
	$totalSaved = mysqli_num_rows($getSaved);
	$saved = mysqli_fetch_array($getSaved);

	$getHelp = mysqli_query($conn, "SELECT str FROM help WHERE 1");
	$totalhelp = mysqli_num_rows($getHelp);
	for($i=1;$i<=$totalhelp;$i++){
		${"help".$i} = mysqli_fetch_array($getHelp);
	}
?>

	var map1 = {src: "./resource/backGround.png", //15 X 27
	scene: <?php echo $scene1[0];?>};
	var map2 = {src: "./resource/room2.png", //15 X 27
	scene: <?php echo $scene2[0];?>};
	var map3 = {src: "./resource/room3.png", //15 X 27
	scene: <?php echo $scene3[0];?>};

	<?php
		if($totalSaved > 0)
			foreach ($saved as $key => $value) {
				if(!is_numeric($key) && is_numeric($value))
				echo "var ".$key." = ".$value.";\r\n";
			}
		else{
			foreach ($info as $key => $value) {
				echo "var ".$key." = ".$value.";\r\n";
			}
			echo "var score = 0;\r\n";
		}
	?>

	var question = [
		<?php
			for($i=1;$i<=$totalQuestions;$i++){
				$getQ = mysqli_fetch_array($getQuestion);
				echo "[\"$getQ[1]\",\"$getQ[2]\",\"$getQ[3]\",\"$getQ[4]\",\"$getQ[5]\",\"$getQ[6]\"],";
			}
		?>
	];

	var player = {face: "S", Y: <?php echo $info["playerY"]?>,X: <?php echo $info["playerX"]?>};

	var answer = 0;
	var dialogWindow = false;

	function moveLeft() {
		player.face = "W";
		var next;
		if(mapNum == 1)
			next = map1.scene[player.Y][player.X-1];
		else if(mapNum == 2)
			next = map2.scene[player.Y][player.X-1];
		else if(mapNum == 3)
			next = map3.scene[player.Y][player.X-1];
		if(next == 0){
			document.getElementById('chracter').src = './resource/LeftW1.png';
			$("#chracter").animate({
				left: '-=0.7%',
			},50,function() {
				document.getElementById('chracter').src = './resource/LeftW2.png';
			});
			$("#chracter").animate({
				left: '-=0.6%',
			},50,function() {
				document.getElementById('chracter').src = './resource/Left.png';
			});
			$("#chracter").animate({
				left: '-=0.7%',
			},50);
			
			player.X = player.X-1;
		}
		else
			document.getElementById('chracter').src='./resource/Left.png';
	}
	function moveRight() {
		player.face = "E";
		var next;
		if(mapNum == 1)
			next = map1.scene[player.Y][player.X+1];
		else if(mapNum == 2)
			next = map2.scene[player.Y][player.X+1];
		else if(mapNum == 3)
			next = map3.scene[player.Y][player.X+1];
		if(next == 0){
			document.getElementById('chracter').src = './resource/RightW1.png';
			$("#chracter").animate({
				left: '+=0.7%',
			},50,function() {
				document.getElementById('chracter').src = './resource/RightW2.png';
			});
			$("#chracter").animate({
				left: '+=0.6%',
			},50,function() {
				document.getElementById('chracter').src = './resource/Right.png';
			});
			$("#chracter").animate({
				left: '+=0.7%',
			},50);

			player.X = player.X+1;
		}
		else
			document.getElementById('chracter').src='./resource/Right.png';
	}
	function moveUp() {
		player.face = "N";
		var next;
		if(mapNum == 1)
			next = map1.scene[player.Y-1][player.X];
		else if(mapNum == 2)
			next = map2.scene[player.Y-1][player.X];
		else if(mapNum == 3)
			next = map3.scene[player.Y-1][player.X];
		if(next == 0){
			document.getElementById('chracter').src = './resource/BackW1.png';
			$("#chracter").animate({
				top: '-=1.5%',
			},50,function() {
				document.getElementById('chracter').src = './resource/BackW2.png';
			});
			$("#chracter").animate({
				top: '-=1.5%',
			},50,function() {
				document.getElementById('chracter').src = './resource/Back.png';
			});
			$("#chracter").animate({
				top: '-=1.5%',
			},50);
			
			player.Y = player.Y-1;
		}
		else
			document.getElementById('chracter').src='./resource/Back.png';
	}
	function moveDown() {
		player.face = "S";
		var next;
		if(mapNum == 1)
			next = map1.scene[player.Y+1][player.X];
		else if(mapNum == 2)
			next = map2.scene[player.Y+1][player.X];
		else if(mapNum == 3)
			next = map3.scene[player.Y+1][player.X];
		if(next == 0){
			document.getElementById('chracter').src = './resource/FrontW1.png';
			$("#chracter").animate({
				top: '+=1.5%',
			},50,function() {
				document.getElementById('chracter').src = './resource/FrontW2.png';
			});
			$("#chracter").animate({
				top: '+=1.5%',
			},50,function() {
				document.getElementById('chracter').src = './resource/Front.png';
			});
			$("#chracter").animate({
				top: '+=1.5%',
			},50);

			player.Y = player.Y+1;
		}
		else
			document.getElementById('chracter').src='./resource/Front.png';
	}
	
	function survey() {
		var check = [0, 0];
		if(player.face == "E")
			check = [[player.Y], [player.X+1]];
		else if(player.face == "W")
			check = [player.Y, player.X-1];
		else if(player.face == "N")
			check = [player.Y-1, player.X];
		else if(player.face == "S")
			check = [player.Y+1, player.X];
		//-------------------------map 1 event------------------------------------------------------------
		if(mapNum == 1){
			//displayGameInfo();
			if(check[0] == 6 && check[1] == 12)
				talk('<?php echo $dialog["r1GameInfo"]?>');

			//chest
			else if((check[0] == 7 || check[0] == 8) && check[1] == 25){
				if(r1Chest == 0){
					talk('<?php echo $dialog["r1LockChest"];?>');
					setQuestion(0);
					questionOpen();
					if(answer == 3){
						setScore('add');
						hideQuestion();
						openBox();
						level++;
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["WrongAnswer"];?>');
					}
					answer = 0;
				}
				else
					talk('<?php echo $dialog["r1EmptyChest"];?>')
			}
			//paint
			else if(check[0] == 0 && (check[1] == 14 || check[1] == 13 || check[1] == 20 || check[1] == 22))
				talk('<?php echo $dialog["r1Paint"];?>')
			//bookshelf
			else if(check[0] == 1 && (check[1] == 17 || check[1] == 18 || check[1] == 19))
				talk('<?php echo $dialog["r1BookShelf"];?>');
			//cabinet
			else if(check[0] == 1 && (check[1] == 7 || check[1] == 8 || check[1] == 10 || check[1] == 11))
				talk('<?php echo $dialog["r1Cabinet"];?>');
			//bottle on table
			else if(check[0] == 0 && check[1] == 9)
				talk('<?php echo $dialog["r1Bottle"];?>');
			//cup on table
			else if(check[0] == 12 && (check[1] == 10 || check[1] == 11))
				talk('<?php echo $dialog["r1Cup"];?>');

			else if((check[0] == 12 || check[0] == 13) && check[1] == 22 || check[0] == 11 && (check[1] == 23 || check[1] == 24 || check[1] == 25))
				talk('<?php echo $dialog["r1Box"];?>');
			//wall
			else if(check[0] == 0 && check[1] == 6){
				if(itemHammer == 1 && r1Wall == 0){
					talk('<?php echo $dialog["r1TryBreak"];?>');
					setQuestion(1);
					questionOpen();
					if(answer == 1){
						setScore('add');
						hideQuestion();
						wallBreak();
						document.getElementById('item1').style.display = "none";
						level++;
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["r1BreakFail"];?>');
					}
					answer = 0;
				}
				else if(r1Wall == 0)
					talk('<?php echo $dialog["r1Wall"];?>');
				else if(r1Wall == 1)
					setMap(2,1);
			}
			//clock
			else if(check[0] == 0 && check[1] == 12){
				if(itemCoin == 0)
					talk('<?php echo $dialog["r1Clock"];?>');
				else if(itemCoin == 1){
					talk('<?php echo $dialog["r1SearchClock"];?>');
					setQuestion(5);
					questionOpen();
					if(answer == 2){
						setScore('add');
						hideQuestion();
						talk('<?php echo $dialog["r1FoundKey"];?>');
						getItem("key");
						level++;
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["r1BreakFail"];?>');
					}
					answer = 0;
				}
			}
			//drawer
			else if(check[0] == 0 && check[1] == 15)
				talk('<?php echo $dialog["r1Drawer"];?>');
			//door
			else if(check[0] == 9 && check[1] == -1){
				if(itemKey == 0)
					talk('<?php echo $dialog["r1Door"];?>');
				else if(itemKey == 1){
					setQuestion(6);
					questionOpen();
					if(answer == 4){
						setScore('add');
						hideQuestion();
						escape();
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["r1BreakFail"];?>');
					}
					answer = 0;
				}
			}
		}
		//-------------------------map 2 event------------------------------------------------------------
		if(mapNum == 2){
			if(check[0] == 13 && check[1] == 4)
				setMap(1);
			else if(check[0] == 11 && check[1] == 4){
				if(itemPuzzle1 == 0){
					talk('<?php echo $dialog["r2Puzzle"];?>');
					getItem("puzzle1");
				}
				else
					talk('<?php echo $dialog["r2EmptyBag"];?>');
			}
			else if(check[0] == 1 && check[1] == 3){
				if(itemPuzzle2 == 0){
					talk('<?php echo $dialog["r2Puzzle"];?>');
					getItem("puzzle2");
				}
				else
					talk('<?php echo $dialog["r2EmptyBag"];?>');
			}
			else if(check[0] == 10 && check[1] == 7){
				if(itemPuzzle3 == 0){
					talk('<?php echo $dialog["r2Puzzle"];?>');
					getItem("puzzle3");
				}
				else
					talk('<?php echo $dialog["r2EmptyBag"];?>');
			}
			else if(check[0] == 1 && check[1] == 15){
				if(itemPuzzle4 == 0){
					talk('<?php echo $dialog["r2Puzzle"];?>');
					getItem("puzzle4");
				}
				else
					talk('<?php echo $dialog["r2EmptyBag"];?>');
			}
			else if((check[0] == 5 && check[1] == 1) || ((check[0] == 4 || check[0] == 3) && check[1] == 2))
				talk('<?php echo $dialog["r2Stone"];?>');
			else if(check[0] == 0 && check[1] == 4)
				talk('<?php echo $dialog["r2Mirror"];?>');
			else if(check[0] == 0 && check[1] == 9)
				talk('<?php echo $dialog["r2Heater"];?>');
			else if(check[0] == 1 && check[1] == 11)
				talk('<?php echo $dialog["r2CutBoard"];?>');
			else if(check[0] == 1 && check[1] == 14)
				talk('<?php echo $dialog["r2Sink"];?>');
			else if(check[0] == 1 && check[1] == 13){
				if(r3Box == 0)
					talk('<?php echo $dialog["r2Knife"];?>');
				else if(r3Box == 1){
					setQuestion(4);
					questionOpen();
					if(answer == 3){
						setScore('add');
						hideQuestion();
						breakBox();
						level++;
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["r1BreakFail"];?>');
					}
					answer = 0;
				}
			}
			else if(((check[0] == 5 || check[0] == 7) && check[1] == 18) || (check[0] == 6 && (check[1] == 17 || check[1] == 19))){
				if(r2FloorDoor == 1){
					setMap(3);
				}
				else if(r2FloorDoor == 0){
					if(itemPuzzle1 == 0 || itemPuzzle2 == 0 || itemPuzzle3 == 0 || itemPuzzle4 == 0)
						talk('<?php echo $dialog["r2CloseFloorDoor"];?>');
					else{
						talk('<?php echo $dialog["r2LockFloorDoor"];?>');
						setDropQuestion(7);
						dropQuestionOpen();
						if(answer == 1342){
							setScore('add');
							hideQuestion();
							openFloorDoor();
							level++;
						}
						else if(answer > 0){
							setScore('sub');
							hideQuestion();
							talk('<?php echo $dialog["r1BreakFail"];?>');
						}
						answer = 0;
					}
				}
			}
		}
	//-------------------------map 3 event------------------------------------------------------------
		if(mapNum == 3){
			if(check[0] == 0 && check[1] == 12){
				if(r3Ladder == 1)
					setMap(2,3);
				else if(r3Ladder == 0){
					talk('<?php echo $dialog["r3Climb"];?>');
					if(itemLadder == 1){
						talk('<?php echo $dialog["r3PutLadder"];?>');
						setQuestion(3);
						questionOpen();
						if(answer == 2){
							setScore('add');
							hideQuestion();
							putLadder();
							document.getElementById('item2').style.display = "none";
							level++;
						}
						else if(answer > 0){
							setScore('sub');
							hideQuestion();
							talk('<?php echo $dialog["r1BreakFail"];?>');
						}
						answer = 0;
					}
				}
			}
			else if(check[0] == 1 && check[1] == 1){
				if(r3LadderLock == 0){
					talk('<?php echo $dialog["r3LockLadder"];?>');
					setQuestion(2);
					questionOpen();
					if(answer == 4){
						setScore('add');
						hideQuestion();
						getItem("ladder");
						talk('<?php echo $dialog["r3GetLadder"];?>');
						level++;
					}
					else if(answer > 0){
						setScore('sub');
						hideQuestion();
						talk('<?php echo $dialog["r1BreakFail"];?>');
					}
					answer = 0;
				}
			}
			else if(check[0] == 1 && check[1] == 7){
				if(r3Box == 0){
					talk('<?php echo $dialog["r3WoodBox"];?>');
					getItem("woodbox");
				}
			}
			else if(check[0] == 8 && check[1] == 13)
				talk('<?php echo $dialog["r3Statue1"];?>');
			else if(check[0] == 1 && (check[1] == 5 || check[1] == 9))
				talk('<?php echo $dialog["r3Statue2"];?>');
			else if(check[0] == 1 && (check[1] == 6 || check[1] == 8))
				talk('<?php echo $dialog["r3Candle"];?>');
		}
	}
	function setUp() {
		setMap(mapNum);
		player.Y = playerY;
		player.X = playerX;
		if(mapNum == 1){
			document.getElementById('chracter').style.top=19+playerY*4.5+"%";
			document.getElementById('chracter').style.left=22.7+playerX*2+"%";

		}
		else if(mapNum == 2){
			document.getElementById('chracter').style.top=21.5+playerY*4.5+"%";
			document.getElementById('chracter').style.left=28.7+playerX*2+"%";
		}
		else if(mapNum == 3){
			document.getElementById('chracter').style.top=38+playerY*4.5+"%";
			document.getElementById('chracter').style.left=34.7+playerX*2+"%";
		}
		if(r1Chest == 1)
			document.getElementById('chest').src = "./resource/OpenChest.png";
		document.getElementById('chest').style.top = "53%";
		document.getElementById('chest').style.left = "73.2%";
		if(r1Wall == 1)
			document.getElementById('wall').src = "./resource/breakWall.png";
		document.getElementById('wall').style.top = "18%";
		document.getElementById('wall').style.left = "35%";
		if(r2FloorDoor == 1)
			document.getElementById('floordoor').src = "./resource/r2FloorDoorOpen.png";
		document.getElementById('floordoor').style.top = "52.5%";
		document.getElementById('floordoor').style.left = "65%";
		document.getElementById('statue').style.top = "71%";
		document.getElementById('statue').style.left = "61%";
		if(r3Ladder == 0){
			document.getElementById('ladder').style.top = "43%";
			document.getElementById('ladder').style.left = "37%";
		}
		else{
			document.getElementById('ladder').src = "./resource/r3Ladder.png";
			document.getElementById('ladder').style.top = "38%";
			document.getElementById('ladder').style.left = "59%";
		}
		if(r3Box == 1)
			document.getElementById('box').style.display = "none";
		document.getElementById('box').style.top = "46.5%";
		document.getElementById('box').style.left = "49.25%";
		setScore();
	}
	function setMap(num, type) {
		if(num == 1) {
			document.body.style.backgroundImage = "url('./resource/backGround.png')";
			document.getElementById('chracter').style.top="23.5%";
			document.getElementById('chracter').style.left="34.7%";
			player.Y = 1;
			player.X = 6;
			var getClass = document.getElementsByClassName('r1');
			for (var i=0;i<getClass.length; i++) {
    			getClass[i].style.display = "inline";
			}
			var hideClass1 = document.getElementsByClassName('r2');
			for (var i=0;i<hideClass1.length; i++) {
    			hideClass1[i].style.display = "none";
			}
			var hideClass2 = document.getElementsByClassName('r3');
			for (var i=0;i<hideClass2.length; i++) {
    			hideClass2[i].style.display = "none";
			}
			mapNum = 1;
		}
		else if(num == 2) {
			document.body.style.backgroundImage = "url('./resource/room2.png')";
			if(type == 1){
				document.getElementById('chracter').style.top="75.5%";
				document.getElementById('chracter').style.left="36.7%";
				player.Y = 12;
				player.X = 4;
			}
			else if(type == 3){
				document.getElementById('chracter').style.top="44%";
				document.getElementById('chracter').style.left="64.7%";
				player.Y = 5;
				player.X = 18;
			}
			var getClass = document.getElementsByClassName('r2');
			for (var i=0;i<getClass.length; i++) {
    			getClass[i].style.display = "inline";
			}
			var hideClass1 = document.getElementsByClassName('r1');
			for (var i=0;i<hideClass1.length; i++) {
    			hideClass1[i].style.display = "none";
			}
			var hideClass2 = document.getElementsByClassName('r3');
			for (var i=0;i<hideClass2.length; i++) {
    			hideClass2[i].style.display = "none";
			}
			mapNum = 2;
		}
		else if(num == 3) {
			if(r3Ladder == 0)
				talk('<?php echo $dialog["r3Fall"];?>');
			document.body.style.backgroundImage = "url('./resource/room3.png')";
			document.getElementById('chracter').style.top="42.5%";
			document.getElementById('chracter').style.left="58.7%";
			player.Y = 1;
			player.X = 12;
			var getClass = document.getElementsByClassName('r3');
			for (var i=0;i<getClass.length; i++) {
    			getClass[i].style.display = "inline";
			}
			var hideClass1 = document.getElementsByClassName('r1');
			for (var i=0;i<hideClass1.length; i++) {
    			hideClass1[i].style.display = "none";
			}
			var hideClass2 = document.getElementsByClassName('r2');
			for (var i=0;i<hideClass2.length; i++) {
    			hideClass2[i].style.display = "none";
			}
			mapNum = 3;
		}
	}
	function openBox() {
		document.getElementById('chest').src = "./resource/OpenChest.png";
		r1Chest = 1;
		talk('<?php echo $dialog["r1GetHammer"]?>');
		getItem("hammer");
	}
	function wallBreak() {
		document.getElementById('wall').src = "./resource/breakWall.png";
		talk('<?php echo $dialog["r1BreakWall"]?>');
		r1Wall = 1;
	}
	function openFloorDoor() {
		document.getElementById('floordoor').src = "./resource/r2FloorDoorOpen.png";
		talk('<?php echo $dialog["r2OpenFloorDoor"];?>');
		r2FloorDoor = 1;
	}
	function putLadder() {
		r3Ladder = 1;
		itemLadder = 0;
		document.getElementById('ladder').style.display = "inline";
		document.getElementById('ladder').src = "./resource/r3Ladder.png";
		document.getElementById('ladder').style.top = "38%";
		document.getElementById('ladder').style.left = "59%";
	}
	function breakBox() {
		talk('<?php echo $dialog["r3BreakBox"];?>');
		getItem("coin");
		r3Box == 0;
	}
	function escape() {
		//////////////////////////////////////////////////////////////////
		esave();
	}

	function setAnswer(n) {
		answer = n;
		survey();
	}
	function talk(str) {
		document.getElementById('dialog').innerHTML = str;
		document.getElementById('dialog').style.opacity = "0.8";
		dialogWindow = true;
	}
	function getItem(item) {
		document.getElementById('item').style.opacity = "1";
		if(item == "hammer"){
			document.getElementById('item').src = "./resource/Hammer.png";
			document.getElementById('item1').src = "./resource/Hammer.png";
			document.getElementById('item1').style.display = "inline";
			document.getElementById('d11').innerHTML = '<?php echo $dialog["hammerInfo"];?>';
			itemHammer = 1;
		}
		else if(item == "key"){
			document.getElementById('item').src = "./resource/Key.png";
			document.getElementById('item2').src = "./resource/Key.png";
			document.getElementById('item2').style.display = "inline";
			itemKey = 1;
		}
		else if(item == "puzzle1"){
			document.getElementById('item').src = "./resource/PuzzlePiece.png";
			document.getElementById('draggable1').style.display = "inline";
			itemPuzzle1 = 1;
		}
		else if(item == "puzzle2"){
			document.getElementById('item').src = "./resource/PuzzlePiece.png";
			document.getElementById('draggable2').style.display = "inline";
			itemPuzzle2 = 1;
		}
		else if(item == "puzzle3"){
			document.getElementById('item').src = "./resource/PuzzlePiece.png";
			document.getElementById('draggable3').style.display = "inline";
			itemPuzzle3 = 1;
		}
		else if(item == "puzzle4"){
			document.getElementById('item').src = "./resource/PuzzlePiece.png";
			document.getElementById('draggable4').style.display = "inline";
			itemPuzzle4 = 1;
		}
		else if(item == "woodbox"){
			document.getElementById('item').src = "./resource/WoodBox.png";
			document.getElementById('box').style.display = "none";
			document.getElementById('item1').src = "./resource/WoodBox.png";
			document.getElementById('item1').style.display = "inline";
			document.getElementById('d11').innerHTML = '<?php echo $dialog["boxInfo"];?>';
			itemBox = 1;
			r3Box = 1;
		}
		else if(item == "ladder"){
			document.getElementById('item').src = "./resource/Ladder.png";
			document.getElementById('ladder').style.display = "none";
			document.getElementById('item2').src = "./resource/Ladder.png";
			document.getElementById('item2').style.display = "inline";
			r3LadderLock = 1;
			itemLadder = 1;
		}
		else if(item == "coin"){
			document.getElementById('item').src = "./resource/Coin.png";
			document.getElementById('item1').src = "./resource/Coin.png";
			document.getElementById('item1').style.display = "inline";
			document.getElementById('d11').innerHTML = '<?php echo $dialog["coinInfo"];?>';
			itemCoin = 1;
		}
	}
	function questionOpen() {
		document.getElementById('question').style.display = "inline";
		dialogWindow = true;
	}
	function dropQuestionOpen() {
		document.getElementById('dropQuestion').style.display = "inline";
	}
	function setQuestion(n) {
		var count = 0;
		if(count < question[n].length)
			document.getElementById('topic').innerHTML = question[n][count++];
		while(count < question[n].length)
			document.getElementById('answer'+count).innerHTML = question[n][count++];
	}
	function setDropQuestion(n) {
		var count = 0;
		if(count < question[n].length)
			document.getElementById('dropTopic').innerHTML = question[n][count++];
		while(count < 5)
			document.getElementById('d'+count).innerHTML = question[n][count++];
	}
	function hideDialog() {
		document.getElementById('dialog').style.opacity = "0";
		dialogWindow = false;
	}
	function hideQuestion() {
		document.getElementById('question').style.display = "none";
		document.getElementById('dropQuestion').style.display = "none";
		var count = 1;
		document.getElementById('topic').innerHTML = "";
		while(count < 6)
			document.getElementById('answer'+count++).innerHTML = "";
	}
	function hideItem() {
		document.getElementById('item').style.opacity = "0";
	}
	function setScore(type) {
		if(type == 'add')
			score += 5;
		else if(type == 'sub')
			score -= 3;
		document.getElementById('score').innerHTML = "score<br>&nbsp&nbsp"+score;
		if(score < -10)
			document.location.href="GameOver.php";
	}


	function AllowDrop(event){
    	event.preventDefault();
	}
	function Drag(event){
	    event.dataTransfer.setData("text",event.currentTarget.id);
	}
	function Drop(event){
	    event.preventDefault();
	    var data=event.dataTransfer.getData("text");
	    event.currentTarget.appendChild(document.getElementById(data));
	}
	function getDropIn(){
		var first = document.getElementById("droppable1").childNodes;
		var one = first[1].id[9];
		var second = document.getElementById("droppable2").childNodes;
		var two = second[1].id[9];
		var third = document.getElementById("droppable3").childNodes;
		var three = third[1].id[9];
		var fourth = document.getElementById("droppable4").childNodes;
		var four = fourth[1].id[9];
		answer = one+two+three+four;
		setAnswer(answer);
	}
	var show = true;
	function showWindow(i) {
		if(show){
			document.getElementById('help').style.display = "inline";
			show = false;
		}
		else{
			document.getElementById('help').style.display = "none";
			show = true;
		}
		if(i == 1)
			document.getElementById('help').innerHTML = "<?php echo $help1[0]?>";
		else
			document.getElementById('help').innerHTML = "<?php echo $help2[0]?>";
	}
	$countNum=30*60;   
       
var t = setInterval(function(){   
    $countSec=$countNum % 60;   
    $countdown=Math.floor($countNum/60);   
    $countMin=$countdown % 60; 
	if($countSec<10){
		$countSec="0"+$countSec;
		
	}
	if($countMin<10){
		$countMin="0"+$countMin;
		
	}
    $countTime="Time  "+$countMin+":"+$countSec;   
    $("#countdown").text($countTime);   
	if($countNum+1==0){
		document.location.href="GameOver.php";
	}
	
    $countNum=$countNum-1;   
},1000);   
function save(){
		document.getElementById("num").value = num;
		document.getElementById("level").value = level;
		document.getElementById("userName").value = userName;
		document.getElementById("playerX").value = player.X;
		document.getElementById("playerY").value = player.Y;
		document.getElementById("mapNum").value = mapNum;
		document.getElementById("r1Chest").value = r1Chest;
		document.getElementById("r1Wall").value = r1Wall;
		document.getElementById("r2FloorDoor").value = r2FloorDoor;
		document.getElementById("r3Box").value = r3Box;
		document.getElementById("r3Ladder").value = r3Ladder;
		document.getElementById("r3LadderLock").value = r3LadderLock;
		document.getElementById("itemHammer").value = itemHammer;
		document.getElementById("itemPuzzle1").value = itemPuzzle1;
		document.getElementById("itemPuzzle2").value = itemPuzzle2;
		document.getElementById("itemPuzzle3").value = itemPuzzle3;
		document.getElementById("itemPuzzle4").value = itemPuzzle4;
		document.getElementById("itemLadder").value = itemLadder;
		document.getElementById("itemBox").value = itemBox;
		document.getElementById("itemCoin").value = itemCoin;
		document.getElementById("itemKey").value = itemKey;
		document.getElementById("score").value = score;
		document.accountForm.submit();
		
	}
function esave(){
		document.getElementById("enum").value = num;
		document.getElementById("elevel").value = level;
		document.getElementById("euserName").value = userName;
		document.getElementById("eplayerX").value = player.X;
		document.getElementById("eplayerY").value = player.Y;
		document.getElementById("emapNum").value = mapNum;
		document.getElementById("er1Chest").value = r1Chest;
		document.getElementById("er1Wall").value = r1Wall;
		document.getElementById("er2FloorDoor").value = r2FloorDoor;
		document.getElementById("er3Box").value = r3Box;
		document.getElementById("er3Ladder").value = r3Ladder;
		document.getElementById("er3LadderLock").value = r3LadderLock;
		document.getElementById("eitemHammer").value = itemHammer;
		document.getElementById("eitemPuzzle1").value = itemPuzzle1;
		document.getElementById("eitemPuzzle2").value = itemPuzzle2;
		document.getElementById("eitemPuzzle3").value = itemPuzzle3;
		document.getElementById("eitemPuzzle4").value = itemPuzzle4;
		document.getElementById("eitemLadder").value = itemLadder;
		document.getElementById("eitemBox").value = itemBox;
		document.getElementById("eitemCoin").value = itemCoin;
		document.getElementById("eitemKey").value = itemKey;
		document.getElementById("escore").value = score;
		document.endForm.submit();
		
	}
</script>
<style type="text/css">
	@import url(RPG.css);
</style>
</head>
<body>
	<img id="wall" class="r1" src="./resource/Null.png">
	<img id="box" class="r3" src="./resource/r3Box.png">
	<img id="ladder" class="r3" src="./resource/r3LockLadder.png">
	<img id="floordoor" class="r2" src="./resource/r2FloorDoorClose.png">
	<img id="chracter" src="./resource/Front.png">
	<img id="chest" class="r1" src="./resource/CloseChest.png">
	<img id="statue" class="r3" src="./resource/r3Statue.png">
	<img id="item" src="./resource/Null.png">

	<div id="dialog"></div>

	<div id="question">
		<p id="topic"></p>
		<p id="answer1" onclick="setAnswer(1)"></p>
		<p id="answer2" onclick="setAnswer(2)"></p>
		<p id="answer3" onclick="setAnswer(3)"></p>
		<p id="answer4" onclick="setAnswer(4)"></p>
		<p id="answer5" onclick="setAnswer(5)"></p>
	</div>
	
	<div id="dropQuestion">
		<p id="dropTopic"></p>
		
		<div id="droppable1" class="drop" ondrop="Drop(event)" ondragover="AllowDrop(event)">1</div>
		<div id="droppable2" class="drop" ondrop="Drop(event)" ondragover="AllowDrop(event)">2</div>
		<div id="droppable3" class="drop" ondrop="Drop(event)" ondragover="AllowDrop(event)">3</div>
		<div id="droppable4" class="drop" ondrop="Drop(event)" ondragover="AllowDrop(event)">4</div>
		<input type="button" style="float: left;" onclick="getDropIn();" value="Enter">
	</div>
	<div id="interface">
		<h1 id="countdown"></h1>	
		<div id="score">score<br>&nbsp0</div>
		<div id="Bag">
			<h1>背包</h1>
			<table>
			<tr>
			<td><div class="drag" style="display: inline"><img id="item1" src="./resource/Hammer.png"><span id="d11" class="dragtext"></span></div><div id="draggable1" class="drag" draggable="true" ondragstart="Drag(event)"><img style="width: 35px;" src="./resource/PuzzlePiece.png"><span id="d1" class="dragtext">1</span></div></td>
			<td><img id="item2" src="./resource/WoodBox.png"><div id="draggable2" class="drag" draggable="true" ondragstart="Drag(event)"><img style="width: 35px;" src="./resource/PuzzlePiece.png"><span id="d2" class="dragtext">2</span></div></td>
			<td><div id="draggable3" class="drag" draggable="true" ondragstart="Drag(event)"><img style="width: 35px;" src="./resource/PuzzlePiece.png"><span id="d3" class="dragtext">3</span></div></td>
			</tr>
			<tr>
			<td><div id="draggable4" class="drag" draggable="true" ondragstart="Drag(event)"><img style="width: 35px;" src="./resource/PuzzlePiece.png"><span id="d4" class="dragtext">4</span></div></td>
			<td></td>
			<td></td>
			</tr>
		
			</table>
			
			
			
			
		</div>
		<button id="explain" class="button" onclick="showWindow(1)">說明書</button>
		<button id="prompt" class="button" onclick="showWindow(2)">提示</button>
		<button id="save" class="button" onclick="save()">儲存</button>
	</div>
	<div id="help"></div>
	<form name="accountForm" method="post" action="RPG.php">

		<input type="hidden" name="num" id="num" value="">
		<input type="hidden" name="level" id="level" value="">
		<input type="hidden" name="userName" id="userName" value="">
		<input type="hidden" name="playerX" id="playerX" value="">
		<input type="hidden" name="playerY" id="playerY" value="">
		<input type="hidden" name="mapNum" id="mapNum" value="">
		<input type="hidden" name="r1Chest" id="r1Chest" value="">
		<input type="hidden" name="r1Wall" id="r1Wall" value="">
		<input type="hidden" name="r2FloorDoor" id="r2FloorDoor" value="">
		<input type="hidden" name="r3Box" id="r3Box" value="">
		<input type="hidden" name="r3Ladder" id="r3Ladder" value="">
		<input type="hidden" name="r3LadderLock" id="r3LadderLock" value="">
		<input type="hidden" name="itemHammer" id="itemHammer" value="">
		<input type="hidden" name="itemPuzzle1" id="itemPuzzle1" value="">
		<input type="hidden" name="itemPuzzle2" id="itemPuzzle2" value="">
		<input type="hidden" name="itemPuzzle3" id="itemPuzzle3" value="">
		<input type="hidden" name="itemPuzzle4" id="itemPuzzle4" value="">
		<input type="hidden" name="itemLadder" id="itemLadder" value="">
		<input type="hidden" name="itemBox" id="itemBox" value="">
		<input type="hidden" name="itemCoin" id="itemCoin" value="">
		<input type="hidden" name="itemKey" id="itemKey" value="">
		<input type="hidden" name="score" id="score" value="">

	</form><form name="endForm" method="post" action="finish.php">

		<input type="hidden" name="num" id="enum" value="">
		<input type="hidden" name="level" id="elevel" value="">
		<input type="hidden" name="userName" id="euserName" value="">
		<input type="hidden" name="playerX" id="eplayerX" value="">
		<input type="hidden" name="playerY" id="eplayerY" value="">
		<input type="hidden" name="mapNum" id="emapNum" value="">
		<input type="hidden" name="r1Chest" id="er1Chest" value="">
		<input type="hidden" name="r1Wall" id="er1Wall" value="">
		<input type="hidden" name="r2FloorDoor" id="er2FloorDoor" value="">
		<input type="hidden" name="r3Box" id="er3Box" value="">
		<input type="hidden" name="r3Ladder" id="er3Ladder" value="">
		<input type="hidden" name="r3LadderLock" id="er3LadderLock" value="">
		<input type="hidden" name="itemHammer" id="eitemHammer" value="">
		<input type="hidden" name="itemPuzzle1" id="eitemPuzzle1" value="">
		<input type="hidden" name="itemPuzzle2" id="eitemPuzzle2" value="">
		<input type="hidden" name="itemPuzzle3" id="eitemPuzzle3" value="">
		<input type="hidden" name="itemPuzzle4" id="eitemPuzzle4" value="">
		<input type="hidden" name="itemLadder" id="eitemLadder" value="">
		<input type="hidden" name="itemBox" id="eitemBox" value="">
		<input type="hidden" name="itemCoin" id="eitemCoin" value="">
		<input type="hidden" name="itemKey" id="eitemKey" value="">
		<input type="hidden" name="score" id="escore" value="">

	</form>

</body>
</html>