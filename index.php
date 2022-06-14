<?php

// グー・チョキ・パーを配列に代入
$hands = ['グー','チョキ','パー'];

// プレイヤーの手がPOSTされたら
if(isset($_POST['hand'])) {
    // プレイヤーの手を代入
    $playerHand = $_POST['hand'];

    // PCの手をランダムで選択
    $key = array_rand($hands);
    $pcHand = $hands[$key];

    // 勝敗を判定
    if($playerHand == $pcHand) {
        $result = 'あいこ';
    } elseif ($playerHand == 'チョキ' && $pcHand == 'パー') {
        $result = '勝ち';
    } elseif ($playerHand == 'パー' && $pcHand == 'グー') {
        $result = '勝ち';
    } elseif ($playerHand == 'グー' && $pcHand == 'チョキ') {
        $result = '勝ち';
    } else {
        $result = '負け';
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
        
        <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>
        <dl>
            <dt>自分: <?php echo $playerHand; ?></dt>
            <dt>相手: <?php echo $pcHand; ?></dt>
            <dt>結果: <?php echo $result; ?></dt>
            
        </dl>
        
        <?php }?>



        <form method="post">
            <label>グー<input type="radio" name="hand" value="グー" required></label>
            <label>チョキ <input type="radio" name="hand" value="チョキ" required ></label>
            <label>パー <input type="radio" name="hand"  value="パー" required ></label>
            <input style="display:block;" type="submit" value="勝負">
        </form>

        <?php if($_SERVER['REQUEST_METHOD']){?>
        <p><a href="index.php"></p>
        <?php }?>

    </body>
</html>