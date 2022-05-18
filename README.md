# chat-system

## 利用方法
「chat/」以下のファイルをhtmlのドキュメントルートに配置して色々いじってデータベース作るだけ。
## 推奨環境
・SSL/TLSが利用可能な環境
## 動かすために
動かすためにはファイルをいくつか変更する必要があります。
**注意**
> php.iniの設定から「display_error」をオンにしておくことを推奨します。このファイル設定をいじる際に何が起こるかわからんので（）
### /config/database/cdb.php
データベース接続用のファイルです。この中に記述されている部分を修正してください。
```php
<?php
$pdo = new PDO('mysql:host=[ここにSQLサーバーのアドレスを入れる];dbname=chat;charset=utf8','SQL接続用のユーザーネーム','パスワード');
?>
```
### 以下のファイル
> ・/config/database/update.php

> ・/config/api/load.php

>・/chat/index.html

上記にファイルに記述されている`$_SERVER['HTTPS']`の記述は一般的に使用する場合には不要になります。
こちらが常軌を逸した仕様にしてるので()

これを外さないと動かない場合があります。if文の中も消してください。

また、update.phpにある`sys_loadavg`もレンタルサーバーでは動かない可能性があります。不要であれば削除してください(その際は/chat/index.html及び/config/api/post.jsも修正がいります)。

## コピーライト表記
あったほうが嬉しいですが不要です。

/config/template/footer.phpにそれ関係が記述されているので自由に編集してください。

## 問い合わせ
TwitterのDMにお願いします。

https://www.twitter.com/radiate038
