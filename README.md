# 網頁RPG學習遊戲

  以遊戲方式進行課程學習與測驗，檢驗學生對程式觀念的理解狀況
  主題:Java Exception Handling
  題目類型: 選擇題、填充題、是非題


-初始設定
  1.MySQL insert rpg.sql 資料庫檔案
  2.從 LoginPage.htm 進入登入頁面，可以使用預設帳號(帳號:test/密碼:1234)或自己建立新玩家，
    輸入正確帳號密碼即可進行遊戲


-操作說明:
  使用W,A,S,D移動，Z和空白鍵調查，
  遊戲中的問題可以用對應的數字鍵或英文鍵回答，也能用滑鼠點選，
  遊戲中遇到困難可以點選題示或是幫助。


-程式組成:
  RPG.php                 RPG主程式
  rpg.sql                 遊戲資料庫
  Login.php               登入/驗證帳號密碼功能
  register.php            申請帳號功能
  RPG_Connect.inc.php     連結資料庫功能
  Finish.php              過關頁面
  FinalResult.PHP         結算頁面
  GameOver.php            失敗頁面
