RMR single、及びRMR continuous APIのプログラム（PHP）
からの使用例について解説します。<br/>
APIの詳細については、別途API解説ドキュメントをご覧ください。
https://dev.alt.ai/getting_started<br/><br/>

サンプルスクリプト、及びドキュメントの解説<br/>
＊本スクリプトを実行するためには、お使いの開発環境にphp cURL(http://php.net/manual/ja/book.curl.php)がインストールされている必要があります。<br>

1 rmr_functions.php: <br/>
rmr(rmr_single、rmr_continuous)のAPI操作に必要な全関数をまとめたサンプルスクリプトです。<br/>
各APIのサンプルコードは、コードのコメントを参照下さい。<br/><br/>

2 rmr_single_sample.php<br/>
TSV形式のファイルから情報を読み込み、rmr_singleに以下の操作を行います<br/>
・質問、回答ペアをファイルから読み込み、インデックスする（rmr_single_post.txtは質問、回答サンプル）<br/>
・質問をファイルから読み込み、回答取得を行い、結果をファイルに書き出す（rmr_single_get.txtは質問サンプル）<br/><br/>

スクリプトを起動する際のオプションは以下です。<br/>
-m: 学習、または回答取得モードを指定、get、またはpostを指定<br/>
-a: ユーザに配布されているapi_keyの値を指定<br/>
-i: 入力ファイルを指定（省力した場合はpost時はrmr_single_post.txt、get時はrmr_single_get.txtが指定される）<br/>
-o: get時に、回答取得結果を書き出すファイルを指定（省略した場合、results.txtが指定される）<br/><br/>

スクリプト起動例<br/>
・post時<br/>
rmr_single_sample.php -m post -a aaabbxxxxxxxx -i rmr_single_post.txt<br/>
・get時<br/>
rmr_single_sample.php -m get -a aaabbxxxxxxxx -i rmr_single_get.txt -o results.txt<br/><br/>

3 rmr_continuous_sample.php<br/>
TSV形式のファイルから情報を読み込み、rmr_continuousに以下の操作を行います<br/>
・質問、回答ペアをファイルから読み込み、インデックスする（rmr_continuous_post.txtは質問、回答サンプル）<br/>
・質問をファイルから読み込み、回答取得を行い、結果をファイルに書き出す（rmr_continuous_get.txtは質問サンプル）<br/><br/>

スクリプトを起動する際のオプションは以下です。<br/>
-m: 学習、または回答取得モードを指定、get、またはpostを指定<br/>
-a: ユーザに配布されているapi_keyの値を指定<br/>
-l: memory_labelを指定<br/>
-s: 会話のセッションIDを指定（省略した場合は、内部で自走生成される）<br/>
-i: 入力ファイルを指定（省力した場合はpost時はrmr_single_post.txt、get時はrmr_single_get.txtが指定される）<br/>
-o: get時に、回答取得結果を書き出すファイルを指定（省略した場合、results.txtが指定される）<br/><br/>

スクリプト起動例<br/>
・post時<br/>
rmr_continuous_sample.php -m post -a aaabbxxxxxxxx -c rmrtest -i rmr_single_post.txt<br/>
・get時<br/>
rmr_continuous_sample.php -m get -a aaabbxxxxxxxx -l rmrtest -s testsession -i rmr_single_get.txt -o results.txt
