# PROJECT安裝說明

## 安裝環境

* php8.1以上
* composer 
* php-extension
  + sqlite3
  + imagick
  + zip
  + curl
  + xml

## TinyMCE
因爲有使用到tinyMCE編輯器，故需先取得API Key備用
1. 在 [tinyMCE](https://www.tiny.cloud/)註冊 
2. 登入[tinyMCE](https://www.tiny.cloud/)， 在Approved Domains 加入網站網域
3. 回到 Dashboard， 下方copy API KEY 保存備用。

## 安裝順序
在該目錄底下，依下列步驟執行:
1. composer install 
2. npm i 
3. cp .env.example .env
4. php artisan key:generate 
5. php artisan migrate
6. php artisan createUser <你的email> <你的密碼>
7. 到 /resources/js/Components/Pages/Admin/newsEditor.vue，找到Editor標籤，將tinyMCE取得的API KEY貼上
8. npm run build

安裝大致完成
