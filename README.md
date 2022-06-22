phpで作ったジャンケンゲームです

https://yuta610-portfolio.info/janken/index.php

三回コンピューターとじゃんけんをしていただき最後に勝敗結果が表示されます。

通常のじゃんけんとは違い出せる手の数が決まっており、最大二回まで同じ手が出せます。

ラジオボタンで自分が出す手を選んでいただき、勝負ボタンを押すとじゃんけんをします。

勝敗の途中でもリセットボタンを押すと最初の画面に戻ります。

リセットボタンを押した時の処理として、全てセッションをリセットして最初の画面に戻れるようにしています。

お互いの手を配列にして、セッションに保存させます。

じゃんけんが終わり次第、配列から選んだ手を引いて行くことで出せる手を限定していきます。

