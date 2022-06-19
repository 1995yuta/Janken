<?php
// エラー内容の非表示
ini_set("error_reporting", 0);
session_start();

$_SESSION['count'];

$_SESSION['computer_hands'] = ['グー','チョキ','パー','グー','チョキ','パー'];

$_SESSION['playerhand'] = ['グー','チョキ','パー','グー','チョキ','パー'];

$_SESSION['player_win'] = 0;

$_SESSION['computer_win'] = 0;

unset($_SESSION['count']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リセット画面</title>
</head>
<body>
    <div><a href="index.php">元の画面に戻ります</a></div>
</body>
</html>