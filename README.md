<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/1a82ea16-f290-4ea2-8259-4020f87cd3a5" width="400" alt="全国の天文台"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 全国の天文台

　地図上での天文台の位置や、天文台の情報がわかるアプリです。天文台の情報としては、宿泊施設の有無、プラネタリウムの有無、住所が載っています。また、このアプリから各天文台のHPやGooglemapに飛ぶことができます。</br>
 [アプリはこちら](https://look-observatory-caba1ede8f07.herokuapp.com/)
 <table>
     <tbody>
         <tr>
             <td>アカウント名</td><td>tester</td>
             <td>メールアドレス</td><td>test3@example.com</td>
             <td>パスワード</td><td>testpass</td>
         </tr>
     </tbody>
 </table>

- **イメージマップ**機能：HOME画面では星をクリックすることで各天文台のHPに飛ぶことができます。
- **ポップアップ**機能：HOME画面では星にカーソルを合わせると天文台の情報がポップアップで表示されます。
- **ログイン**機能：他の人に自分のスレッドを書き換えられないよう、ログイン機能を追加しました。このログイン機能によって他の人のスレッドでは編集や削除ボタンが表示されなくなりました。※デプロイ先のページにはまだ反映されていません。
- **スレッド投稿**機能：各天文台に対してスレッドを立てることができます。また、スレッドは編集、削除ができます。
- **コメント投稿**機能：スレッドに対してコメントをすることができます。
- **スレッド順変更**機能：スレッド一覧を投稿が新しい順か古い順の選択によって順番が変わります。
- **もっと見る**機能：初期状態ではスレッドやコメントは10件のみしか表示されておらず、もっと見るボタンを押すことで表示件数を増やすことができます。

## 制作背景
- 多くの人に天文台を身近に感じて欲しいと思い作成しました。私自身、日々公開天文台にある研究室で研究をしてきました。そこで、流星群や月食など大型イベントでは沢山人が来てくださるのに、イベント以外ではあまり天文台に来てくれないなと思いました。
- 地図で天文台の位置を一覧で見れたら、距離的にも天文台が身近に感じて気軽に訪れてくれるようになるのではと考えました。
また、アプリ内から天文台のHPに飛べるようにしたことで、気になった天文台をすぐ調べられて行動に移しやすくしたいと思いました。

## アピールポイント
### 天文台の位置がわかりやすい！
- 既存のサイトとして、全国の天文台を表で示したものはありました。しかし、文字だけではその天文台がどこにあるのかがイメージしづらいと感じました。そのため、このアプリでは地図を使うことで視覚的に天文台の位置をわかりやすくしました。</p>
- また地図をフリー素材の県境だけ書かれたイラストにすることで、必要最低限の「どの県のどこら辺にあるのか」という情報だけが目に入るようにしました。そうすることで、情報過多になることを防ぎました。</p>
 
### 必要最低限の情報が載っている
- 宿泊施設の有無：夜遅くまで天文台に滞在できるのかの判断の手助けになります。
- プラネタリウムの有無：天気が悪くても星空を楽しめるかどうかの判断の手助けになります。
- 住所：マップアプリで経路を調べるときの手助けになります。

## 各ページの説明
### HOME画面
- **概要**：日本全体でサイズが100cm以上の望遠鏡を持っている天文台を紹介しています。日本地図の星印が天文台の位置、マウスオーバーで天文台の情報を見ることができます。また、星をクリックすることで天文台のHPに飛ぶことができます。
- **工夫点**：天文台の位置を地図で表示した点。ぱっと見で「見てみるか」と思っていただけるよう、文字の情報を減らしてその分地図に情報を載せました。
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/0e6bd2b5-8289-4695-bb6a-8a67eae0b075" alt="HOME画面"></p>

### 地域画面
- **概要**：各地域でサイズが50cm以上の望遠鏡を持っている天文台を紹介しています。地図上には天文台のある位置がプロットされています。丸の色と数字の意味は以下のテーブルに示しています。また、天文台の情報は表形式で表しました。
- **工夫点**：表にある青色の文字はすべてリンクになっていて、天文台のHPやgoogle mapに飛べるようにしたことです。この機能によって、興味を持った天文台をすぐに調べられるようにしました。
<table>
    <tbody>
        <tr><td>数値</td><td>各天文台につけられた番号。表の番号と対応</td></tr>
        <tr><td>赤色</td><td>50cm以上100cm未満の望遠鏡を持つ天文台</td></tr>
        <tr><td>青色</td><td>100cm以上200cm未満の望遠鏡を持つ天文台</td></tr>
        <tr><td>紫色</td><td>200cm以上の望遠鏡を持つ天文台</td></tr>
    </tbody>
</table>
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/b3d6e8b7-5669-410e-a333-0f062da3a99d" alt="地域画面"></p>
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/bc34ae88-7c7b-4cb7-aa00-4732c251eaa7" alt="地域画面の天文台情報"></p>

### スレッド画面
- **概要**：各天文台について感想交流やイベントの告知ができる画面です。各スレッドに対してコメントをすることができます。
- **工夫点**：スレッドの編集・削除ボタンが書いた人にしか表示されないようにした点。スレッドを立てる際やコメントを打つ際にログインを要求することで、誰が書いたのかの情報を取得し、他の人に内容を改ざんされないようにしました。
- 1枚目：ログインしていない状態の画面。スレッドの編集や削除ボタンが表示されていない。
- 2枚目：スレッドを立てた人にログインした状態の画面。編集や削除ボタンが表示されています。
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/4d33e795-3f89-4704-b075-5113fe0886c7" alt="ログインしていない人のスレッド画面"></p>
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/33ba436e-9018-4160-b870-052a5f951c70" alt="ログインした人のスレッド画面"></p>

## 使用技術
<table>
    <tbody>
        <tr><td>言語</td><td>PHP,HTML,CSS,JavaScript</td></tr> 
        <tr><td>フレームワーク</td><td>Laravel</td></tr> 
        <tr><td>その他</td><td>AWS,Breeze,TailWind</td></tr> 
    </tbody>
</table>

## ER図
- observatoriesテーブル：各天文台の情報が入ったテーブル
- regionsテーブル：日本の地方の情報が入ったテーブル
- threadsテーブル：ユーザーが入力したスレッドの情報が入ったテーブル
- commentsテーブル：各スレッドに対して行ったコメントの情報が入ったテーブル
- usersテーブル：ログインしたユーザーの情報が入ったテーブル
<p align="center"><img src="https://github.com/Fua-0624/Levtech_web_observatory/assets/134463043/e88037f9-5a36-43fb-89aa-2d5fb0d23e9b" alt="ER図"></p>
