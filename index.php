<?php
// エラー内容の非表示
ini_set("error_reporting", 0);

session_start();

// じゃんけんを何回行ったかカウント
$_SESSION['count'];

// グー・チョキ・パーを配列に代入
$_SESSION['computer_hands'] == ['グー','チョキ','パー','グー','チョキ','パー'];
$_SESSION['playerhand'] == ['グー','チョキ','パー','グー','チョキ','パー'];

$_SESSION['player_win'] == 0;
$_SESSION['computer_win'] == 0;

// プレイヤーの手がPOSTされたら
if(isset($_POST['hand'])) {
    // プレイヤーの手を代入
    $playerHand = $_POST['hand'];

    // PCの手をランダムで選択
    $key = array_rand($_SESSION['computer_hands']);
    $pcHand = $_SESSION['computer_hands'][$key];

    // コンピューターの持っている手を使ったカードで削除
    unset($_SESSION['computer_hands'][$key]);
    // pcの手札のindexを振り直し
    $_SESSION['computer_hands'] = array_merge($_SESSION['computer_hands']);

    // 勝敗を判定
    if($playerHand == $pcHand) {
        $result = 'あいこ';
    } elseif ($playerHand == 'チョキ' && $pcHand == 'パー') {
        $result = '勝ち'; 
        $_SESSION['player_win']++;
    } elseif ($playerHand == 'パー' && $pcHand == 'グー') {
        $result = '勝ち';
        $_SESSION['player_win']++;
    } elseif ($playerHand == 'グー' && $pcHand == 'チョキ') {
        $result = '勝ち';
        $_SESSION['player_win']++;
    } else {
        $result = '負け';
        $_SESSION['computer_win']++;
    }

    // プレイヤーが選んだ手札で配列の内容を削除
    foreach ($_SESSION['playerhand'] as $key => $val) {
        if ($val == $playerHand) {
            unset($_SESSION['playerhand'][$key]);
            $_SESSION['playerhand'] = array_merge($_SESSION['playerhand']);
            break;
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>じゃんけん</title>
    </head>
    <body>
        <h1>じゃんけん勝負</h1>
        <p>自分の勝利回数 <?php echo $_SESSION['player_win']; ?></p>
        <p>相手の勝利回数 <?php echo $_SESSION['computer_win']; ?></p>

        <?php

            if ($_SESSION['count'] === 1) {
                include("pages/result1.php");
            } else if ($_SESSION['count'] === 2) {
                include("pages/result2.php");
            } else if ($_SESSION['count'] === 3) {
                include("pages/result3.php");
            } else if ($_SESSION['count'] > 3) {
                echo "なにもしません";
            } 
        
        ?>

        <?php if ($_SESSION['count'] === 3) {
            echo "<p>決着！！</p>";
            if ($_SESSION['player_win'] > $_SESSION['computer_win']) {
                echo "<p>おめでとうございます！</br>あなたの勝ちです！</p>";
            } else if ($_SESSION['player_win'] === $_SESSION['computer_win']) {
                echo "今回の勝負は引き分けです";
            } else {
                echo "<p>残念...</br>あなたの負けです...</p>";
            }
        }?>

        <?php if ($_SESSION['count'] < 3) {?>
        <form method="post">
            <?php
                $goo = [];
                $choki = [];
                $par = [];
                foreach ($_SESSION['playerhand'] as $key => $val) {
                    if ($val === 'グー') {
                        array_push($goo, $val);
                    } else if ($val === 'チョキ') {
                        array_push($choki, $val);
                    } else if ($val === 'パー') {
                        array_push($par, $var);
                    }
                }

                if (count($goo) == 0) {
                    $no_goo = 'no_goo';
                }

                if (count($choki) == 0) {
                    $no_choki = 'no_choki';
                }
                
                if (count($par) == 0) {
                    $no_par = 'no_par';
                }

                $cp_goo = [];
                $cp_choki = [];
                $cp_par = [];
                foreach ($_SESSION['computer_hands'] as $key => $val) {
                    if ($val === 'グー') {
                        array_push($cp_goo, $val);
                    } else if ($val === 'チョキ') {
                        array_push($cp_choki, $val);
                    } else if ($val === 'パー') {
                        array_push($cp_par, $var);
                    }
                }

            ?>
            <label style="display:block;">相手の残り手札</label>
            <label>グー <?php echo "残り:".count($cp_goo)."個"; ?></label>
            <label>チョキ <?php echo "残り:".count($cp_choki)."個"; ?></label>
            <label>パー <?php echo "残り:".count($cp_par)."個"; ?></label>
            
            <label style="display:block;">自分の残り手札</label>
            <label>グー <?php echo "残り:".count($goo)."個"; ?><input id="<?php echo $no_goo; ?>" type="radio" name="hand" value="グー" required></label>
            <label>チョキ <?php echo "残り:".count($choki)."個"; ?><input id="<?php echo $no_choki; ?>" type="radio" name="hand" value="チョキ" required ></label>
            <label>パー <?php echo "残り:".count($par)."個"; ?><input id="<?php echo $no_par; ?>" type="radio" name="hand"  value="パー" required ></label>
            <input style="display:block;" type="submit" value="勝負">
            <?php $_SESSION['count']++; ?>
        </form>

        <?php }?>

        <div>
            <a href="session_reset.php" sytle="display:block;">リセットボタン</a>
        </div>
        <div>
            </div>
    <script>
        document.getElementById("no_goo").disabled = true;
        document.getElementById("no_choki").disabled = true;
        document.getElementById("no_par").disabled = true;
    </script>
    </body>
</html>