DROP DATABASE IF EXISTS training;
CREATE DATABASE training;

GRANT ALL ON training.* TO training;

USE training;

CREATE TABLE users (
  id BIGINT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  name_kana VARCHAR(255),
  gender VARCHAR(10),
  mail_address TEXT,
  age INT,
  created_at DATETIME,
  updated_at DATETIME,
  deleted_at DATETIME,
  PRIMARY KEY (id)
);

INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('松本 明日香', 'マツモト アスカ', 'woman', CEIL(20 + RAND() * 80), 'test1@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('中谷 玲一', 'ナカタニ レイイチ', 'man', CEIL(20 + RAND() * 80), 'test2@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('宮内 康三', 'ミヤウチ コウゾウ', 'man', CEIL(20 + RAND() * 80), 'test3@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('鈴木 保行', 'スズキ ヤスユキ', 'man', CEIL(20 + RAND() * 80), 'test4@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('平山 理沙', 'ヒラヤマ リサ', 'woman', CEIL(20 + RAND() * 80), 'test5@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('岡野 祐美', 'オカノ ユウミ', 'woman', CEIL(20 + RAND() * 80), 'test6@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('三好 幹也', 'ミヨシ ミキヤ', 'man', CEIL(20 + RAND() * 80), 'test7@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('田代 周平', 'タシロ シュウヘイ', 'man', CEIL(20 + RAND() * 80), 'test8@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('竹内 知子', 'タケウチ トモコ', 'woman', CEIL(20 + RAND() * 80), 'test9@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('沢田 則昭', 'サワダ ノリアキ', 'man', CEIL(20 + RAND() * 80), 'test10@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('稲垣 宗市', 'イナガキ ソウイチ', 'man', CEIL(20 + RAND() * 80), 'test11@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('谷川 房男', 'ヤガワ フサオ', 'man', CEIL(20 + RAND() * 80), 'test12@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('徳田 なつみ', 'トクタ ナツミ', 'woman', CEIL(20 + RAND() * 80), 'test13@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('篠田 征輝', 'シノダ マサテル', 'man', CEIL(20 + RAND() * 80), 'test14@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('横山 真理', 'ヨコヤマ マリ', 'woman', CEIL(20 + RAND() * 80), 'test15@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('小倉 哲子', 'オグラ テツコ', 'woman', CEIL(20 + RAND() * 80), 'test16@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('藤本 喜治', 'フジモト ヨシハル', 'man', CEIL(20 + RAND() * 80), 'test17@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('浜野 英則', 'ハマノ ヒデノリ', 'man', CEIL(20 + RAND() * 80), 'test18@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('青柳 彩', 'アオヤギ アヤ', 'woman', CEIL(20 + RAND() * 80), 'test19@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('太田 顕子', 'オオタ アキコ', 'woman', CEIL(20 + RAND() * 80), 'test20@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('岩本 康三', 'イワモト コウゾウ', 'man', CEIL(20 + RAND() * 80), 'test21@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('宮原 好和', 'ミヤバラ ヨシカズ', 'man', CEIL(20 + RAND() * 80), 'test22@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('甲斐 光保', 'カイ ミツホ', 'man', CEIL(20 + RAND() * 80), 'test23@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('西野 絵里', 'ニシノ エリ', 'woman', CEIL(20 + RAND() * 80), 'test24@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('岡村 良秋', 'オカムラ ヨシアキ', 'man', CEIL(20 + RAND() * 80), 'test25@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('河野 秋美', 'カワノ アキミ', 'woman', CEIL(20 + RAND() * 80), 'test26@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('上村 直広', 'カミムラ ナオヒロ', 'man', CEIL(20 + RAND() * 80), 'test27@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('小野 龍也', 'オノ タツヤ', 'man', CEIL(20 + RAND() * 80), 'test28@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('大場 咲子', 'オオバ サクコ', 'woman', CEIL(20 + RAND() * 80), 'test29@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('谷 八洲子', 'タニ ヤスコ', 'woman', CEIL(20 + RAND() * 80), 'test30@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('古田 喜久郎', 'コダ キクオ', 'man', CEIL(20 + RAND() * 80), 'test31@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('大城 善英', 'ダイジョウ ヨシヒデ', 'man', CEIL(20 + RAND() * 80), 'test32@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('岩田 喜代信', 'イワタ キヨノブ', 'man', CEIL(20 + RAND() * 80), 'test33@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('小林 順子', 'コバヤシ ノブコ', 'woman', CEIL(20 + RAND() * 80), 'test34@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('坂口 繁次', 'サカグチ シゲツグ', 'man', CEIL(20 + RAND() * 80), 'test35@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('柏木 道彦', 'カシワギ ミチヒコ', 'man', CEIL(20 + RAND() * 80), 'test36@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('大木 亜衣', 'オオキ アイ', 'woman', CEIL(20 + RAND() * 80), 'test37@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('笠井 凱次', 'カサイ カツジ', 'man', CEIL(20 + RAND() * 80), 'test38@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('中原 兵吉', 'ナカハラ ヒョウキチ', 'man', CEIL(20 + RAND() * 80), 'test39@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('秋山 克明', 'アキヤマ カツアキ', 'man', CEIL(20 + RAND() * 80), 'test40@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('萩原 正征', 'ハギワラ マサユキ', 'man', CEIL(20 + RAND() * 80), 'test41@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('高野 秀春', 'コウノ ヒデハル', 'man', CEIL(20 + RAND() * 80), 'test42@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('橋本 貫之', 'ハシモト カンジ', 'man', CEIL(20 + RAND() * 80), 'test43@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('岡部 克明', 'オカベ カツアキ', 'man', CEIL(20 + RAND() * 80), 'test44@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('東 忠助', 'アズマ タダスケ', 'man', CEIL(20 + RAND() * 80), 'test45@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('福井 満生', 'フクイ ミツオ', 'man', CEIL(20 + RAND() * 80), 'test46@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('上村 記代', 'カミムラ キヨ', 'woman', CEIL(20 + RAND() * 80), 'test47@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('小池 譲介', 'コイケ ジョウスケ', 'man', CEIL(20 + RAND() * 80), 'test48@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('丹羽 伸次郎', 'ニワ シンジロウ', 'man', CEIL(20 + RAND() * 80), 'test49@example.com', now(), now());
INSERT INTO users (name, name_kana, gender, age, mail_address, created_at, updated_at) VALUES ('田中 正輝', 'タナカ マサキ', 'man', CEIL(20 + RAND() * 80), 'test50@example.com', now(), now());
