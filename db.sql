# 언어 인코딩 설정(이모지 저장, 수정)
SET NAMES utf8mb4;

# DB 생성
DROP DATABASE IF EXISTS site102;
CREATE DATABASE site102;
USE site102;



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
    summary CHAR(250) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `body` LONGTEXT CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    thumbImgUrl CHAR(250)
   
);

ALTER TABLE article ADD COLUMN delStatus TINYINT(1) UNSIGNED NOT NULL; # 삭제상태
ALTER TABLE article ADD COLUMN delDate DATETIME NOT NULL; # 삭제날짜


#카테고리 아이템 테이블 생성
DROP TABLE IF EXISTS cateItem;
CREATE TABLE cateItem(
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    `name` CHAR(100) NOT NULL UNIQUE
    #같은 이름의 카테고리가 중복으로 생성될 수 없음.
    

);

# 카테고리에 CODE 추가
ALTER TABLE cateItem ADD COLUMN `code` CHAR(20) NOT NULL;


# 카테고리 아이템 추가
INSERT INTO cateItem SET regDate = NOW(), `name` = 'Bangul';
INSERT INTO cateItem SET regDate = NOW(), `name` = 'HTML/CSS';
INSERT INTO cateItem SET regDate = NOW(), `name` = 'JavaScript';
INSERT INTO cateItem SET regDate = NOW(), `name` = 'Design';


# 멤버 테이블 생성
CREATE TABLE `member`(
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    loginId CHAR(50) NOT NULL UNIQUE, #로그인 아이디
    loginPw CHAR(200) NOT NULL, # 로그인 비번
    `name` CHAR(100) NOT NULL, # 이름
    `nickname` CHAR(100) NOT NULL, # 닉네임
    `email` CHAR(100) NOT NULL, # 이메일
    `phone` CHAR(20) NOT NULL # 휴대전화번호
);

# 관리자 계정 생성
INSERT INTO `member` 
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'highcolor_12',
loginPw = 'tmvpf2020',
`name` = '김방울',
`nickname` = '김방울';


SELECT * FROM article

