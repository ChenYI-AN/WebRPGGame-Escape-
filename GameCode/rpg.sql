-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 11:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `num` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `userName` text NOT NULL,
  `userpass` int(11) NOT NULL,
  `playerX` int(11) NOT NULL,
  `playerY` int(11) NOT NULL,
  `mapNum` int(11) NOT NULL,
  `r1Chest` int(11) NOT NULL,
  `r1Wall` int(11) NOT NULL,
  `r2FloorDoor` int(11) NOT NULL,
  `r3Box` int(11) NOT NULL,
  `r3Ladder` int(11) NOT NULL,
  `r3LadderLock` int(11) NOT NULL,
  `itemHammer` int(11) NOT NULL,
  `itemPuzzle1` int(11) NOT NULL,
  `itemPuzzle2` int(11) NOT NULL,
  `itemPuzzle3` int(11) NOT NULL,
  `itemPuzzle4` int(11) NOT NULL,
  `itemLadder` int(11) NOT NULL,
  `itemBox` int(11) NOT NULL,
  `itemCoin` int(11) NOT NULL,
  `itemKey` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`num`, `level`, `userName`, `userpass`, `playerX`, `playerY`, `mapNum`, `r1Chest`, `r1Wall`, `r2FloorDoor`, `r3Box`, `r3Ladder`, `r3LadderLock`, `itemHammer`, `itemPuzzle1`, `itemPuzzle2`, `itemPuzzle3`, `itemPuzzle4`, `itemLadder`, `itemBox`, `itemCoin`, `itemKey`, `score`) VALUES
(1, 1, 'test', 1234, 11, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, '2', 2, 24, 8, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 30),
(3, 0, '123', 123, 16, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 25),
(4, 1, '5', 5, 1, 2, 3, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 111),
(6, 3, '12', 12, 15, 6, 2, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dialog`
--

CREATE TABLE `dialog` (
  `num` int(11) NOT NULL,
  `keyWord` text NOT NULL,
  `dialogue` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dialog`
--

INSERT INTO `dialog` (`num`, `keyWord`, `dialogue`) VALUES
(1, 'r1LockChest', '一個上鎖的箱子，需要輸入密碼'),
(2, 'r1EmptyChest', '箱子裡已經沒有東西了'),
(3, 'r1Paint', '一幅畫'),
(4, 'r1BookShelf', '書架上堆滿了老舊的書籍'),
(5, 'r1Wall', '牆壁充滿裂縫，十分脆弱'),
(6, 'r1Clock', '一個舊時鐘，已經不會動了'),
(7, 'r1Drawer', '抽屜堆滿雜物'),
(8, 'r1Door', '門被鎖上了'),
(9, 'r1GetHammer', '你找到一把錘子'),
(10, 'r1BreakWall', '使用錘子破壞了牆壁'),
(11, 'r1Cup', '杯子裡裝著混濁的液體'),
(12, 'r1Bottle', '桌上放著空瓶'),
(13, 'r1Box', '箱子被封死了，打不開'),
(14, 'r1Cabinet', '櫃子都是灰塵'),
(15, 'r1GameInfo', '你被關在這裡是因為你JAVA錯誤處理的觀念太差了，為了加強你的觀念，你必須解開謎題獲得鑰匙才能離開這裡，時間只有30分鐘，努力試著逃出去吧'),
(16, 'WrongAnswer', '答錯了'),
(17, 'r2Puzzle', '袋子裡裝著一個碎片，也許能在哪用到'),
(18, 'r2EmptyBag', '袋子裡沒有其他東西'),
(19, 'r2Stone', '被石塊擋住了，過不去'),
(20, 'r2Mirror', '鏡面裂開了'),
(21, 'r2Heater', '暖爐裡面結網了'),
(22, 'r2CutBoard', '砧板上有血跡'),
(23, 'r2Sink', '水槽被垃圾堵住了'),
(24, 'r1TryBreak', '試著用鐵槌破壞牆壁'),
(25, 'r1BreakFail', '失敗了，再試一次'),
(26, 'r3Fall', '爬到一半時繩子斷了'),
(27, 'r3Climb', '繩子太高了，需要能墊腳的東西'),
(28, 'r3LockLadder', '梯子被密碼鎖鎖著'),
(29, 'r3GetLadder', '拿起了梯子'),
(30, 'r3WoodBox', '一個腐朽的木塊，裡面好像有什麼東西'),
(31, 'r3BreakBox', '用刀子切開木塊，裡面有枚硬幣'),
(32, 'r3Statue1', '一個高大的雕像，感覺隨時會動起來'),
(33, 'r3Statue2', '祈禱的雕像，破損的很嚴重'),
(34, 'r3Candle', '熄滅的蠟燭'),
(35, 'r3PutLadder', '架上了梯子'),
(36, 'r2Knife', '桌上有把鋒利的刀'),
(37, 'r2CloseFloorDoor', '地板門打不開，上面有幾個缺口'),
(38, 'r2LockFloorDoor', '把拼圖碎片放入缺口'),
(39, 'r2OpenFloorDoor', '把地板門打開了'),
(40, 'r1Escape', '門打開了，可以離開了'),
(41, 'r1FoundKey', '仔細檢查後發現時鐘後面藏了一把鑰匙'),
(42, 'r1SearchClock', '試著仔細檢查時鐘'),
(43, 'hammerInfo', '可以破壞一些脆弱的東西'),
(44, 'boxInfo', '裡面似乎有什麼，有能切割的工具嗎'),
(45, 'coinInfo', '硬幣上刻著Time，找找什麼跟時間相關');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `num` int(11) NOT NULL,
  `str` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`num`, `str`) VALUES
(1, '使用W,A,S,D移動，Z和空白鍵調查<br>遊戲中的問題可以用對應的數字鍵或英文鍵回答，也能用滑鼠點選<br>遊戲遇到困難可以點選提示或的幫助<br><br><br><br>參考資料:<br>圖片素材:<br>https://forums.rpgmakerweb.com/index.php?threads/chiaras-mv-resources.48291/<br>https://forums.rpgmakerweb.com/index.php?threads/avys-mv-stuff.53317/page-7<br>https://www.alteredgamer.com/rpg-maker/105824-some-new-tilesets-vx/#imgn_1<br>http://www.rpgmakervx-fr.com/t20352-mv-horror-tileset<br>http://www.geocities.jp/kurororo4/looseleaf/<br>https://piq.codeus.net/picture/31537/Help-Me-to-Complete-the-Jigsaw-Puzzle<br>https://forums.rpgmakerweb.com/index.php?threads/whtdragons-joke-weapons-now-with-regular-weapons-too.59777/<br>https://piq.codeus.net/picture/313887/Coin<br>https://www.flickr.com/photos/kalyan02/4741751904/<br>網路素材:<br>https://www.w3schools.com<br>http://www.wibibi.com/info.php?tid=HTML5_Drag_and_Drop_%E6%8B%96%E6%9B%B3%E6%95%88%E6%9E%9C'),
(2, 'try catch專門用於處理錯誤事件，try裡的敍述句有可能會丟出例外資訊 ( Exception )<br> ，而丟出的例外資訊 ( Exception ) 型態就可以由catch來取得，做適當的處理。<br>finally則是在try catch完成後會執行的動作，一個\'try\'所包括的區塊，必須有對應的\'catch\'區塊，<br>它可以有多個\'catch\'區域，而\'finally\'可有可無，如果沒有定義 \'catch\'區塊<br>，則一定要有\'finally\'區塊。catch取得例外需由小範圍而後大範圍<br>，例如java.lang.NullPointException則需寫在Exception前面，<br>因為NullPointException所能處理的範圍比Exception還小。<br>若想要自行丟出例外，可以使用 \'throw\' 關鍵字，<br>並生成指定的例外物件，如果在方法中會有例外的發生，<br>但並不想在方法中直接處理，而想要由呼叫方法的呼叫者來處理，<br>則您可以使用 \'throws\' 關鍵字來宣告這個方法將會丟出例外');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `num` int(11) NOT NULL,
  `name` text NOT NULL,
  `bool` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`num`, `name`, `bool`) VALUES
(1, 'itemHammer', 0),
(2, 'itemKey', 0),
(3, 'r1Chest', 0),
(4, 'r1Wall', 0),
(5, 'mapNum', 1),
(6, 'playerX', 13),
(7, 'playerY', 8),
(8, 'itemPuzzle1', 0),
(9, 'itemPuzzle2', 0),
(10, 'itemPuzzle3', 0),
(11, 'itemPuzzle4', 0),
(12, 'itemLadder', 0),
(13, 'r3LadderLock', 0),
(14, 'itemBox', 0),
(15, 'r3Ladder', 0),
(16, 'r3Box', 0),
(17, 'r2FloorDoor', 0),
(18, 'itemCoin', 0),
(19, 'level', 1);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `Num` int(11) NOT NULL,
  `scene` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`Num`, `scene`) VALUES
(1, '[[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],[1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],[1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],[1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],[1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],[0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1],[1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1],[1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1],[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]]'),
(2, '[[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],[1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],[1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1],[1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1],[1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1],[1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1],[1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1],[1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]]'),
(3, '[[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],[1,1,1,0,0,1,1,1,1,1,0,0,0,0,1],[1,0,0,0,0,0,0,0,0,0,0,0,0,0,1],[1,0,0,0,1,0,0,0,0,0,0,0,0,1,1],[1,1,0,0,0,0,0,0,0,0,0,0,0,1,1],[1,1,1,0,1,1,1,0,0,1,0,0,1,0,1],[1,1,1,1,1,1,1,1,0,0,0,0,0,0,1],[1,1,1,1,1,1,1,1,0,0,0,1,0,0,1],[1,1,1,1,1,1,1,1,1,0,1,0,0,1,1],[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]]');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `num` int(11) NOT NULL,
  `topic` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerA` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerB` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerC` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerD` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answerE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`num`, `topic`, `answerA`, `answerB`, `answerC`, `answerD`, `answerE`) VALUES
(1, '在Java程式語言中處理例外狀況的try....catch...finally結構中，哪一個部分程式區塊一定會被執行?', '(A) try', '(B) catch', '(C) finally', '(D) all of the above', '(E) none of the above'),
(2, 'try {<br>int u=1/0;<br>}<br>catch(ArithmeticException e) {<br>System.out.println(\'1\');<br>}<br>catch(Exception e){<br>System.out.println(\'2\');<br>  }', '(A) 1', '(B) 2', '', '', ''),
(3, 'static void test() throws Exception {<br>&nbsp&nbspif(true)<br>&nbsp&nbsp&nbsp&nbspthrow new OutOfMemoryError();<br>}<br>public static void main(String[] args) {<br>try {<br>&nbsp&nbsptest();<br>&nbsp&nbspSystem.out.print(\'1\');<br>}<br>catch (Exception e) {<br>&nbsp&nbspSystem.out.print(\'2\');<br>}<br>finally {<br>&nbsp&nbspSystem.out.print(\'3\');<br>}<br>System.out.print(\'4\');<br>}', '(A) 1234 ', '(B) 234', '(C) 3 , A Throwable Error is thrown by main.', '(D) 34 , A Throwable Error is thrown by main.', '(E) An Throwable Error is thrown by main.'),
(4, '若想要自行丟出一個例外(Exception)應使用哪一個關鍵字?', '(A) throws', '(B) throw', '', '', ''),
(5, 'Compiler無法檢查出下列哪種錯誤?', '(A) Syntax error', '(B) Compile time error', '(C) Run time error', '', ''),
(6, '下列敘述何者錯誤?', '(A) finally一定會被執行', '(B) try..catch..finally結構至少要包含try…catch', '(C) catch部分可有兩個以上', '', ''),
(7, 'class A{<br>void run() throws Exception{<br>&nbsp&nbspSystem.out.println(\'A\');<br>&nbsp&nbspthrow new Exception();<br>}<br>}<br>class B extends A{<br>void run(){<br>&nbsp&nbspSystem.out.println(\'B\');<br>}<br>}<br>public class Main{<br>public static void main(String[] args){<br>&nbsp&nbspA a = new B();<br>&nbsp&nbspa.run();<br>&nbsp&nbspSystem.out.println(\'C\');<br>}<br>}', '(A) AC', '(B) A , followed by an Exception.', '(C) BC', '(D) Compilation fails', ''),
(8, 'class A{<br>&nbsp&nbspvoid run() //insert 1&nbsp&nbsp{<br>&nbsp&nbsp&nbsp&nbspSystem.out.print(\'A\');<br>&nbsp&nbsp&nbsp&nbsp//insert 2&nbsp&nbsp}<br>}<br>public class Main{<br>&nbsp&nbsppublic static void main(String[] args){<br>&nbsp&nbsp&nbsp&nbsptry{<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspnew A().run();<br>&nbsp&nbsp&nbsp&nbsp}<br>&nbsp&nbsp&nbsp&nbsp//insert 3&nbsp&nbsp{<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSystem.out.print(\'B\');<br>&nbsp&nbsp&nbsp&nbsp}<br>&nbsp&nbsp//insert 4&nbsp&nbsp{<br>&nbsp&nbsp&nbsp&nbspSystem.out.print(\'C\');<br>&nbsp&nbsp}<br>&nbsp&nbspfinally{<br>&nbsp&nbsp&nbsp&nbspSystem.out.print(\'D\');<br>&nbsp&nbsp&nbsp&nbsp}<br>&nbsp&nbsp}<br>}<br><br>如何使結果為ABD?', 'throws Exception', 'catch(Exception e)', 'throw new ArithmeticException();', 'catch(ArithmeticException ae)', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `dialog`
--
ALTER TABLE `dialog`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`Num`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dialog`
--
ALTER TABLE `dialog`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
