-- データベースの作成
CREATE DATABASE IF NOT EXISTS `git-test`;

-- 作成したデータベースを使用
USE `git-test`;

-- comments テーブルの作成
CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100),
    `mail` VARCHAR(100),
    `message` VARCHAR(100)
);
