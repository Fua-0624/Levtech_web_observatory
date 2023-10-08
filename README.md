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

- **イメージマップ**機能：HOME画面では星をクリックすることで各天文台のHPに飛ぶことができます。
- **ポップアップ**機能：HOME画面では星にカーソルを合わせると天文台の情報がポップアップで表示されます。
- **ログイン**機能：他の人に自分のスレッドを書き換えられないよう、ログイン機能を追加しました。このログイン機能によって他の人のスレッドでは編集や削除ボタンが表示されなくなりました。
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
　既存のサイトとして、全国の天文台を表で示したものはありました。しかし、文字だけではその天文台がどこにあるのかがイメージしづらいです。このアプリでは地図を使うことで視覚的に天文台の位置をわかりやすくしました。
### 必要最低限の情報が載っている
　宿泊施設の有無は夜遅くまで天文台に滞在できるのかの判断の手助けになります。また、プラネタリウムの有無は天気が悪くても星空を楽しめるかどうかの判断の手助けになります。

## 使用技術
<table>
    <tbody>
        <tr><td>言語</td><td>PHP,HTML,CSS,JavaScript</td></tr> 
        <tr><td>フレームワーク</td><td>Laravel</td></tr> 
        <tr><td>その他</td><td>AWS,Breeze,TailWind</td></tr> 
    </tbody>
</table>
