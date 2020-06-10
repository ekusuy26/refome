# refome
![トップページ](readme_img/toppage.png)

## 概要
【本番環境】http://18.180.46.64/<br><br>
冷蔵庫の中に何入ってたっけ？と忘れたり、スーパーで買ってきたが冷蔵庫に残っていた！ということはありませんか？<br>
refomeでは冷蔵庫に残っている食材を管理することが出来ます。<br>
また、作った料理のレシピを投稿することもできます。<br>
レシピは公開されますので気に入ったレシピには「いいね」をあげましょう！<br>

## テストアカウント
* username【test】
* Email&emsp;&emsp;【test@test.com】
* password【11111111】

## 開発環境
* macOS Catalina10.15.5
* PHP 7.3.11 
* laravel/framework 6.18.15  
* HTML/SCSS
* JavaScript/JQuery
* Bootstrap 4
* mySQL5.6.47
* AWS(EC2,S3,RDS)

## 実装内容
* ユーザー機能<br>
ユーザー登録、ログイン、ログアウトができます。<br>
同じメールアドレスでは登録出来ない様になっております。
* 冷蔵庫に食材を入れる、取り出す<br>
買ってきた食材を登録できます。また、使った食材は「取り出す」ことで冷蔵庫から削除できます。<br>
最大3種類まで同時に登録が可能です。<br>
今、冷蔵庫に何が入っているかはトップページで確認できます。<br>
![インデックス](readme_img/index.jpg)
![新規投稿](readme_img/food_new.png)
![編集画面](readme_img/food_edit.png)
* いいね機能<br>
気に入ったレシピにはいいねをつけることができます。<br>
いいねの数はカウントして表示されます。<br>
<img src="readme_img/like1.png" height="50" width="250"></img>
<img src="readme_img/like2.png" height="50" width="250"></img>
* レシピを投稿する<br>
自分の作った料理をみんなにシェアできます。<br>
使った食材は自動的に冷蔵庫から消費されます。<br>
![レシピ投稿](readme_img/post_new.png)

## 今後実装したいこと
* 一度に登録できる食材の数を増やす
* googleを用いたログイン、会員登録
