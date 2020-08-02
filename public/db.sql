# 언어 인코딩 설정(이모지 저장, 수정)
SET NAMES utf8mb4;

# DB 생성
DROP DATABASE IF EXISTS site;
CREATE DATABASE site;
USE site;




# 게시물 테이블 생성
DROP TABLE IF EXISTS article;
CREATE TABLE article(
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    updateDate DATETIME NOT NULL,
    displayStatus TINYINT(1) UNSIGNED NOT NULL,
    # tinyint = 작은 정수     
    cateItemId INT(10) UNSIGNED NOT NULL,
    title CHAR(250) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
    `body` LONGTEXT CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
);

#카테고리 아이템 테이블 생성
DROP TABLE IF EXISTS cateItem;
CREATE TABLE cateItem(
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    `name` CHAR(100) NOT NULL UNIQUE
    #같은 이름의 카테고리가 중복으로 생성될 수 없음.
    

);

# 카테고리 아이템 추가
INSERT INTO cateItem SET regDate = NOW(), `name` = 'Web Design';
INSERT INTO cateItem SET regDate = NOW(), `name` = 'Illust';
INSERT INTO cateItem SET regDate = NOW(), `name` = 'Bangul';


#게시물 추가
INSERT INTO article SET regDate = NOW(), updateDate = NOW(), cateItemId = 2,
title = '제목', `body` = '';

INSERT INTO article SET regDate = NOW(), updateDate = NOW(), cateItemId = 3,
title = '제목', `body` = '';
