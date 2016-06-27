RMR single、及びRMR continuous APIのプログラム（PHP）
からの使用例について解説します。
APIの詳細については、別途API解説ドキュメントをご覧ください。
（TODO　API解説ドキュメントへのリンク要）

サンプルスクリプト、及びドキュメントの解説
1. rmr_functions.php: 
rmr(rmr_single、rmr_continuous)のAPI操作に必要な全関数をまとめたサンプルスクリプトです。
各APIのサンプルコードは、コードのコメントを参照下さい。

2. rmr_single_sample.php
TSV形式のファイルから情報を読み込み、rmr_singleに以下の操作を行います
・質問、回答ペアをファイルから読み込み、インデックスする（rmr_single_post.txtは質問、回答サンプル）
・質問をファイルから読み込み、回答取得を行い、結果をファイルに書き出す（rmr_single_get.txtは質問サンプル）

スクリプトを起動する際のオプションは以下です。
-m: 学習、または回答取得モードを指定、get、またはpostを指定
-a: ユーザに配布されているapi_keyの値を指定
-i: 入力ファイルを指定（省力した場合はpost時はrmr_single_post.txt、get時はrmr_single_get.txtが指定される）
-o: get時に、回答取得結果を書き出すファイルを指定（省略した場合、results.txtが指定される）

スクリプト起動例
・post時
rmr_single_sample.php -m post -a aaabbxxxxxxxx -i rmr_single_post.txt
・get時
rmr_single_sample.php -m get -a aaabbxxxxxxxx -i rmr_single_get.txt -o results.txt

3. rmr_continuous_sample.php
TSV形式のファイルから情報を読み込み、rmr_continuousに以下の操作を行います
・質問、回答ペアをファイルから読み込み、インデックスする（rmr_continuous_post.txtは質問、回答サンプル）
・質問をファイルから読み込み、回答取得を行い、結果をファイルに書き出す（rmr_continuous_get.txtは質問サンプル）

スクリプトを起動する際のオプションは以下です。
-m: 学習、または回答取得モードを指定、get、またはpostを指定
-a: ユーザに配布されているapi_keyの値を指定
-c: context_id（会話ID）を指定
-s: 会話のセッションIDを指定（省略した場合は、内部で自走生成される）
-i: 入力ファイルを指定（省力した場合はpost時はrmr_single_post.txt、get時はrmr_single_get.txtが指定される）
-o: get時に、回答取得結果を書き出すファイルを指定（省略した場合、results.txtが指定される）

スクリプト起動例
・post時
rmr_continuous_sample.php -m post -a aaabbxxxxxxxx -c rmrtest -i rmr_single_post.txt
・get時
rmr_continuous_sample.php -m get -a aaabbxxxxxxxx -c rmrtest -s testsession -i rmr_single_get.txt -o results.txt
