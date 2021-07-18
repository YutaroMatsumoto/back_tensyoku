## enviroment
- laravel: 8.49.1
- php 8.0.2

## local環境構築
- 参考サイト
    - [最強のLaravel開発環境をDockerを使って構築する](https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4)
- frontendも上記サイトを参考に作れそうな気がするので次回dockerの勉強とfrontend環境作成やってみようと思う。

## マイグレーションファイルの命名
- テーブル作成
    - YYYY_MM_DD_HHMMSS_create_テーブル名_table.php
- テーブル削除
    - YYYY_MM_DD_HHMMSS_remove_テーブル名_table.php
- カラム追加
    - YYYY_MM_DD_HHMMSS_add_columns_テーブル名_table.php
- カラム削除
    - YYYY_MM_DD_HHMMSS_remove_columns_テーブル名_table.php

```
テーブル作成
php artisan make:migration create_テーブル名_table --create=テーブル名


それ以外
php artisan make:migration add_column_テーブル名_table --table=テーブル名

```