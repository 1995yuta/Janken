<?php if($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>
    <dl>
        <dt>2回目の勝負結果！</dt>
        <dt>自分: <?php echo $playerHand; ?></dt>
        <dt>相手: <?php echo $pcHand; ?></dt>
        <dt>結果: <?php echo $result; ?></dt>
    </dl>
<?php }?>