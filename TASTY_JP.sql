-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.22-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- phpdb 데이터베이스 구조 내보내기
DROP DATABASE IF EXISTS `phpdb`;
CREATE DATABASE IF NOT EXISTS `phpdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `phpdb`;

-- 테이블 phpdb.connection_m 구조 내보내기
DROP TABLE IF EXISTS `connection_m`;
CREATE TABLE IF NOT EXISTS `connection_m` (
  `con_m_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) DEFAULT NULL,
  `ingre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`con_m_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `ingre_id` (`ingre_id`),
  CONSTRAINT `connection_m_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_movie` (`recipe_id`),
  CONSTRAINT `connection_m_ibfk_2` FOREIGN KEY (`ingre_id`) REFERENCES `ingre_m` (`ingre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.connection_m:~7 rows (대략적) 내보내기
DELETE FROM `connection_m`;
/*!40000 ALTER TABLE `connection_m` DISABLE KEYS */;
INSERT INTO `connection_m` (`con_m_id`, `recipe_id`, `ingre_id`) VALUES
	(10, 10, 10),
	(11, 11, 11),
	(12, 12, 12),
	(13, 13, 13),
	(15, 15, 15),
	(21, 21, 21),
	(52, 54, 52);
/*!40000 ALTER TABLE `connection_m` ENABLE KEYS */;

-- 테이블 phpdb.connection_w 구조 내보내기
DROP TABLE IF EXISTS `connection_w`;
CREATE TABLE IF NOT EXISTS `connection_w` (
  `con_w_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) DEFAULT NULL,
  `ingre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`con_w_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `ingre_id` (`ingre_id`),
  CONSTRAINT `connection_w_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_write` (`recipe_id`),
  CONSTRAINT `connection_w_ibfk_2` FOREIGN KEY (`ingre_id`) REFERENCES `ingre_w` (`ingre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.connection_w:~4 rows (대략적) 내보내기
DELETE FROM `connection_w`;
/*!40000 ALTER TABLE `connection_w` DISABLE KEYS */;
INSERT INTO `connection_w` (`con_w_id`, `recipe_id`, `ingre_id`) VALUES
	(39, 73, 39),
	(40, 74, 40),
	(71, 107, 71),
	(77, 113, 77);
/*!40000 ALTER TABLE `connection_w` ENABLE KEYS */;

-- 테이블 phpdb.cooking_img 구조 내보내기
DROP TABLE IF EXISTS `cooking_img`;
CREATE TABLE IF NOT EXISTS `cooking_img` (
  `recipe_id` int(11) NOT NULL,
  `img_1` varchar(100) DEFAULT NULL,
  `img_2` varchar(100) DEFAULT NULL,
  `img_3` varchar(100) DEFAULT NULL,
  `img_4` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`recipe_id`),
  CONSTRAINT `cooking_img_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_write` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.cooking_img:~4 rows (대략적) 내보내기
DELETE FROM `cooking_img`;
/*!40000 ALTER TABLE `cooking_img` DISABLE KEYS */;
INSERT INTO `cooking_img` (`recipe_id`, `img_1`, `img_2`, `img_3`, `img_4`) VALUES
	(73, './upload/김치국수_조리방법1.PNG', './upload/김치국수_조리방법2.PNG', './upload/김치국수_조리방법3.PNG', './upload/김치국수_조리방법4.PNG'),
	(74, './upload/잔치국수_조리방법1.PNG', './upload/잔치국수_조리방법2.PNG', './upload/잔치국수_조리방법3.PNG', './upload/잔치국수_조리방법4.PNG'),
	(107, './upload/짜글이_조리1.PNG', './upload/짜글이_조리2.PNG', './upload/짜글이_조리3.PNG', './upload/짜글이_조리4.PNG'),
	(113, '', '', '', '');
/*!40000 ALTER TABLE `cooking_img` ENABLE KEYS */;

-- 테이블 phpdb.ingre_m 구조 내보내기
DROP TABLE IF EXISTS `ingre_m`;
CREATE TABLE IF NOT EXISTS `ingre_m` (
  `ingre_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_name_1` varchar(100) DEFAULT NULL,
  `i_name_2` varchar(100) DEFAULT NULL,
  `i_name_3` varchar(100) DEFAULT NULL,
  `i_name_4` varchar(100) DEFAULT NULL,
  `i_name_5` varchar(100) DEFAULT NULL,
  `i_name_6` varchar(100) DEFAULT NULL,
  `i_num_1` varchar(100) DEFAULT NULL,
  `i_num_2` varchar(100) DEFAULT NULL,
  `i_num_3` varchar(100) DEFAULT NULL,
  `i_num_4` varchar(100) DEFAULT NULL,
  `i_num_5` varchar(100) DEFAULT NULL,
  `i_num_6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ingre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.ingre_m:~7 rows (대략적) 내보내기
DELETE FROM `ingre_m`;
/*!40000 ALTER TABLE `ingre_m` DISABLE KEYS */;
INSERT INTO `ingre_m` (`ingre_id`, `i_name_1`, `i_name_2`, `i_name_3`, `i_name_4`, `i_name_5`, `i_name_6`, `i_num_1`, `i_num_2`, `i_num_3`, `i_num_4`, `i_num_5`, `i_num_6`) VALUES
	(10, '8インチのトルティーヤ、チェダーチーズ', '卵', '牛乳', 'バター', 'トマト', 'マヨソース', '2個', '2個', '4個', '15g', '１個', '2個'),
	(11, '鶏', '生姜パウダー、おろしにんにく、コショウ', '酒', '小麦粉', 'ソース. ', '薬味', '350g   ', '0.5スプーン', '３スプーン', '2~3人糞', '2~3人糞', '2~3人糞'),
	(12, '素麺', '出汁', 'ゴマソース', '豚肉', '半熟卵', 'ゆでたチンゲンサイ', '110g', '600ml', '映像参照', '映像参照', '映像参照', '66g'),
	(13, 'ッツァレラチーズ', '小麦粉', '砂糖', 'ト·ドライスト', '温かい牛乳', 'ガーリックソース', '140g', ' 200g', '20g', ' 4g ', ' 80ml ', '映像参照'),
	(15, '鶏', 'ハクサイ.', '椎茸', '玉ねぎ、長ネギ、ニラ', '豚肉', '薬味', '250g ', '3個, 110g ', '5個, 90g', '1/4個', ' 100g', '映像参照'),
	(21, '小麦粉', '温かい牛乳', 'インスタント·ドライスト', '砂糖', 'クリーム', 'トッピング', '200g ', '120g ', '3g', '30g / 3g', '卵黄3個(52g)/砂糖60g(6スプーン)/牛乳250g/でんぷん粉2.5スプーン(2.5Tbsp)', 'スライス オレンジ 5個(直径6~7cm) / スライスアーモンド / シュガーパウダー'),
	(52, 'うどん', 'トマト', '砂糖', '玉ねぎ', 'カレー粉', '卵ソース', '200g ', '1個', '2g', '1/4개', '30g', '水 200ml /でんぷん 7g(0.7スプーン) 種類なし / 濃口醤油 16g(2スプーン) / 卵 1個 / 砂糖 3g(1ティースプーン)');
/*!40000 ALTER TABLE `ingre_m` ENABLE KEYS */;

-- 테이블 phpdb.ingre_w 구조 내보내기
DROP TABLE IF EXISTS `ingre_w`;
CREATE TABLE IF NOT EXISTS `ingre_w` (
  `ingre_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_name_1` varchar(100) DEFAULT NULL,
  `i_name_2` varchar(100) DEFAULT NULL,
  `i_name_3` varchar(100) DEFAULT NULL,
  `i_name_4` varchar(100) DEFAULT NULL,
  `i_name_5` varchar(100) DEFAULT NULL,
  `i_name_6` varchar(100) DEFAULT NULL,
  `i_num_1` varchar(100) DEFAULT NULL,
  `i_num_2` varchar(100) DEFAULT NULL,
  `i_num_3` varchar(100) DEFAULT NULL,
  `i_num_4` varchar(100) DEFAULT NULL,
  `i_num_5` varchar(100) DEFAULT NULL,
  `i_num_6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ingre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.ingre_w:~4 rows (대략적) 내보내기
DELETE FROM `ingre_w`;
/*!40000 ALTER TABLE `ingre_w` DISABLE KEYS */;
INSERT INTO `ingre_w` (`ingre_id`, `i_name_1`, `i_name_2`, `i_name_3`, `i_name_4`, `i_name_5`, `i_name_6`, `i_num_1`, `i_num_2`, `i_num_3`, `i_num_4`, `i_num_5`, `i_num_6`) VALUES
	(39, '麺', 'キムチ', 'コチュジャン、砂糖、酢', 'ゴマの実', '食用油、醤油、唐辛子粉、ごま油', 'オリゴ糖', '1.5人分', '2/3カップ', '大さじ1', 'わずか', '大さじ1', '100ml'),
	(40, '麺', 'かぼちゃ、にんじん、たまご、のり粉、キムチ', '醤油', '唐辛子粉、梅液、ごま油', 'ごま、刻み唐辛子、刻み長ネギ', '肉汁', '1.5人分', '2/3カップ', 'スプーン4杯', '1スプーン', '1スプーン', '1400ml'),
	(71, '豆腐', '玉ねぎ', '青唐辛子', '玉ねぎ', '薬味', '肉汁', '1.5人分', '1/2', '2個', '1/2', '唐辛子粉 1.5T / コチュジャン 1T / 醤油 2T / 砂糖 1T / きざみにんにく 1/2T', '200ml'),
	(77, '麵', '油', '', '', '', '', '2人分', '200ml', '', '', '', '');
/*!40000 ALTER TABLE `ingre_w` ENABLE KEYS */;

-- 테이블 phpdb.member 구조 내보내기
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.member:~3 rows (대략적) 내보내기
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `pw`, `nickname`, `email`, `name`, `birthday`, `phone`) VALUES
	('aapp76', 'ASD123', 'ジュン', 'aapp76sun@gmail.com', '이준용', '19990303', '01073716400'),
	('kkppoo11', 'jung4935', 'edyy', 'c4pass@gmail.com', '이정용', '19970220', '01049355301'),
	('test_login', 'test0607', '테스트사용자', 'fly@gmail.com', 'test_check', '19990503', '01012341234');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- 테이블 phpdb.my_movie 구조 내보내기
DROP TABLE IF EXISTS `my_movie`;
CREATE TABLE IF NOT EXISTS `my_movie` (
  `my_movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_m_id` int(11) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`my_movie_id`),
  KEY `con_m_id` (`con_m_id`),
  KEY `id` (`id`),
  CONSTRAINT `my_movie_ibfk_1` FOREIGN KEY (`con_m_id`) REFERENCES `connection_m` (`con_m_id`),
  CONSTRAINT `my_movie_ibfk_2` FOREIGN KEY (`id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.my_movie:~7 rows (대략적) 내보내기
DELETE FROM `my_movie`;
/*!40000 ALTER TABLE `my_movie` DISABLE KEYS */;
INSERT INTO `my_movie` (`my_movie_id`, `con_m_id`, `id`) VALUES
	(10, 10, 'aapp76'),
	(11, 11, 'aapp76'),
	(12, 12, 'aapp76'),
	(13, 13, 'aapp76'),
	(15, 15, 'aapp76'),
	(21, 21, 'aapp76'),
	(52, 52, 'kkppoo11');
/*!40000 ALTER TABLE `my_movie` ENABLE KEYS */;

-- 테이블 phpdb.my_recipe 구조 내보내기
DROP TABLE IF EXISTS `my_recipe`;
CREATE TABLE IF NOT EXISTS `my_recipe` (
  `my_recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_w_id` int(11) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`my_recipe_id`),
  KEY `con_w_id` (`con_w_id`),
  KEY `id` (`id`),
  CONSTRAINT `my_recipe_ibfk_1` FOREIGN KEY (`con_w_id`) REFERENCES `connection_w` (`con_w_id`),
  CONSTRAINT `my_recipe_ibfk_2` FOREIGN KEY (`id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.my_recipe:~4 rows (대략적) 내보내기
DELETE FROM `my_recipe`;
/*!40000 ALTER TABLE `my_recipe` DISABLE KEYS */;
INSERT INTO `my_recipe` (`my_recipe_id`, `con_w_id`, `id`) VALUES
	(39, 39, 'aapp76'),
	(40, 40, 'aapp76'),
	(71, 71, 'kkppoo11'),
	(77, 77, 'aapp76');
/*!40000 ALTER TABLE `my_recipe` ENABLE KEYS */;

-- 테이블 phpdb.recipe_movie 구조 내보내기
DROP TABLE IF EXISTS `recipe_movie`;
CREATE TABLE IF NOT EXISTS `recipe_movie` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(100) DEFAULT NULL,
  `recipe_introduce` text DEFAULT NULL,
  `writer` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `recipe_url` text DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.recipe_movie:~7 rows (대략적) 내보내기
DELETE FROM `recipe_movie`;
/*!40000 ALTER TABLE `recipe_movie` DISABLE KEYS */;
INSERT INTO `recipe_movie` (`recipe_id`, `recipe_title`, `recipe_introduce`, `writer`, `regdate`, `recipe_url`, `hits`) VALUES
	(10, '簡単な材料でエッグブリトー作り', '冷蔵庫によくある材料でブリトーを作ってみました。\r\n柔らかい卵とトマトの組み合わせがとてもおいしいです。\r\n\r\n✤ TIP\r\n  - 練乳の代わりに蜂蜜やオリゴ糖に代替可能、ただし練乳よりも甘いため、\r\n    スプーン2杯だけ入れてください。 はちみつは香りのないものを使ってください。\r\n  - ハラペーニョの代わりに青唐辛子使用可能\r\n  - トマトサルサにもともとレモン汁が入りますが、ドロドロ感を避けるために省略しました。', 'ジュン', '2022-06-07 13:38:50', '/P-cseza8K0I', 3465),
	(11, 'タッカンジョン', '柔らかい鶏ヒレでタッカンジョンを作ってみました。\r\nヒレ肉は油や皮のない骨抜き好きな方にぴったりです。\r\n骨付き鶏は家で煮るのが大変です。 揚げる二度としない 音が出ます^^\r\n\r\n✤ TIP\r\n  - 天ぷら粉がない場合は、小麦粉とトウモロコシ澱粉を1:1で混ぜて使用してください。\r\n    そして塩2串追加。\r\n  - 米粉100%で作ると硬いです。\r\n  - 青陽唐辛子を入れなければあまり辛い方ではありません。\r\n  - 唐辛子油がない場合は、唐辛子粉を0.5スプーン追加し、植物油に置き換えてください。', 'ジュン', '2022-06-06 23:18:14', '/wZjJvTdKY2o', 83255),
	(12, 'ラ-メン', 'とても簡単に専門店に劣らないラーメンを作ることができます。\r\n豆乳で牛骨スープの味がする不思議なレシピです。\r\n普通のラーメンとは違って健康的な気分になり、\r\nスープまで飲み干す美味しいラーメンです。\r\n\r\n✤ TIP\r\n  - タハニソースはゴマ100%すりおろしたソースです。 サラダソースを作る時にも役立ちますので、気になる方は買って召し上がってみてください。 本当に香ばしいです。\r\n  - 辛くないラーメンを食べる程度の辛さで、最後に私のように唐辛子油をトッピングに加えると辛くて辛いスープで食べられます。\r\n  - 無砂糖豆乳がなければスーパーで売っている豆汁にしてもいいです。粗粒なのではなく、パックに入った牛乳のように澄んだ豆乳', 'ジュン', '2023-02-11 18:45:10', '/NiPZY3UwQn0', 1022),
	(13, 'チ-ズガ-リックパン', 'ちぎって食べる楽しさがあるチーズガーリックトーストを作ってみました。\r\nふんわりとしたパンを手作りして、温かいうちに食べるパンの味、本当においしいですよね。\r\nほのかなニンニクの香りとぐん伸びるモッツァチーズの組み合わせは最高です。\r\n\r\n✤ TIP\r\n  - 小麦粉はなるべく強力粉を使ってください。 中力粉は食感があまりふわふわしていません。\r\n  - 発酵はお湯に漬けて湯煎発酵してもいいです。\r\n  - エアフライヤーの温度もオーブンと似ています。 色を見ながら温度を調節してください。\r\n  - グルテンが形成されてこそ、ふわふわでコシのあるパンが作られます。\r\n  - 私はオーブンのコンベクションモードで焼きました（170℃10分）。 \r\n    通常のオーブンモードは180℃~15分焼きます。', 'ジュン', '2023-02-11 18:45:38', '/J6ujTlepWo0', 560),
	(15, '麻婆白菜ちゃんぽん作り', '海鮮がたくさん入るチャンポンは、なんだか最初から作るのが面倒に感じますよね。\r\n家に残っている野菜を使って麻婆スタイルのチャンポンを作ってみました。\r\n不思議なことにチャンポンの味もするし、麻婆豆腐の味もするんですが、\r\nスープがとろみがあるので、麺にも味が染み込んでおいしいですよ。\r\n\r\n✤ TIP\r\n  - 2~3分以内に早く煮える麺は、別に茹でる必要なく、すぐに入れて煮込めばいいです。\r\n  - 豆板醬の代わりに(コチュジャン0.5+サムジャン0.5スプーン)で代替できますが、\r\n    味が同じではありません。', 'ジュン', '2022-06-06 18:13:45', '/ebpEZCEolRk', 128),
	(21, 'カスタマイズクリ-ムパン', 'カスタードクリームにオレンジの香りがいっぱい染み込んでいて、香り高くとてもおいしいパンです。\r\nカスタマイズドーナツとはクリームを違うように充填しますが、\r\n道具や高級技術は別に必要ありません。\r\nこうやって作ると、焼き方も新鮮で もっときれいだと思います。\r\n\r\n✤ TIP\r\n  - オレンジは小さいサイズに上げると形がきれいになります。\r\n  - オレンジの皮は剥いて載せても構いません。\r\n  - 皮ごと使う場合、オレンジは必ずきれいに洗って使ってください。', 'ジュン', '2023-02-11 18:46:14', '/1qmEbVo9O5k', 2005),
	(54, 'トマトカレーうどん', 'トマトとカレーの組み合わせだけで食べても本当に美味しいですが、\r\n私が教えるソースも添えてみてください。 \r\nより深く高級感のある料理に変わります。\r\n刺激的ではなくまろやかな味わいなので大人も子供も好きな味ですし、作り方も超簡単ですので是非作ってみてください。~^^\r\n\r\n✤ TIP\r\n  - 生トマト、トマトピューレのうち1種類の材料だけ入れても大丈夫です。\r\n  - 生トマトは完熟で入れて、酸味が出たら砂糖を入れて調節してください。\r\n  - でんぷんは平たいスプーン1杯から70%だけ入れます。', 'edyy', '2022-06-07 20:16:47', '/2qSenhF13kI', 10);
/*!40000 ALTER TABLE `recipe_movie` ENABLE KEYS */;

-- 테이블 phpdb.recipe_write 구조 내보내기
DROP TABLE IF EXISTS `recipe_write`;
CREATE TABLE IF NOT EXISTS `recipe_write` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(100) DEFAULT NULL,
  `recipe_introduce` text DEFAULT NULL,
  `writer` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `recipe_thum` varchar(100) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 phpdb.recipe_write:~4 rows (대략적) 내보내기
DELETE FROM `recipe_write`;
/*!40000 ALTER TABLE `recipe_write` DISABLE KEYS */;
INSERT INTO `recipe_write` (`recipe_id`, `recipe_title`, `recipe_introduce`, `writer`, `regdate`, `recipe_thum`, `hits`) VALUES
	(73, '超簡単10分料理キムチビビン麺', '1。 麺は1人前の分量だが、夫があまりにも麺をよく食べるので、多めに作った。 実は1人前だけ作ればきっと足りないだろう。\r\n\r\n2.通常のそうめんを茹でるときと同じように沸騰したお湯にそうめんを入れて\r\n食用油も大さじ1杯入れて煮る。 湯が沸いたら冷水を入れて\r\nもう一度煮込む、そして冷水ですすぎ、そうめんを冷水ですすぎたら油気があるから感じがちょっと違う！\r\n\r\n3.分量のタレを準備し、キムチを切って混ぜる。\r\n\r\n4。麺を茹でる間、タレを作ってキムチと混ぜれば、キムチにタレが染み込み、甘酸っぱくなる。大さじ1杯の食用油を入れて茹でたそうめんが\r\nつやが出る~\r\n\r\n5. キムチのタレを入れてごま油とごまをかけて完成~!!', 'ジュン', '2022-06-02 11:08:29', './upload/김치비빔국수.jpg', 112),
	(74, 'にゅうめん黄金レシピ', '1.カタクチイワシ一握りと昆布5センチ程度で2枚、玉ねぎ半個、長ネギ2切れ、大根半切れを一緒に入れて煮込みました。 カタクチイワシと昆布だけで淹れても大丈夫です。 大根と長ネギと玉ねぎが入ると出汁の味がもっとよくなります。 涼しさも生気球です。\r\n\r\n2. 強火でお湯が沸いたら昆布を取り出して15分~20分間中火でもっと沸かしてください。 そして薄口醤油スプーン1杯入れて味をつけてください。 1400ml入れた時、スプーン1杯がぴったりでした。\r\n\r\n3. にんじんとカボチャを千切りにしてフライパンで軽く炒めてください。 私は少し塩加減もしてあげましたね。\r\n\r\n4.卵1個をまんべんなく溶かし、弱火でフライパンで火を通してください。 白身、黄身を別々にしていただいても構いません。 私は混ぜて長く錦糸卵を用意してあげました。 好みに合わせて作ってください。\r\n\r\n5。 タレを作ってください。 醤油4スプーン、唐辛子粉1スプーン、刻み唐辛子1スプーン、刻みニンニク0.5スプーン、刻みネギ1スプーン、梅液1スプーン、ごま油1スプーン、ごま1スプーンを入れて作りました。 タレも人によって作るのが違うそうです。 このように入ったのが私の口にぴったりのタレの黄金レシピです。 もし足りないものはお好みに合わせて調節してください。\r\n\r\n6。 沸騰したお湯で麺を茹でてください。 500ウォン玉くらいの量が1人前だなんて、分量に合わせてください。 \r\n\r\n7。 麺を一番最初に入れて薬味をのせた後、出汁を入れてくだされば完成です。', 'ジュン', '2022-06-07 14:15:49', './upload/잔치국수.jpg', 43),
	(107, '他のおかずが要らない豆腐のチャグリ', '1.まず玉ねぎ1/2個と青陽唐辛子2個を食べやすく切ってください。\r\n\r\n2.唐辛子粉1.5T、コチュジャン1.5T、醤油2T、砂糖1T、にんにくのみじん切り1/2Tを混ぜてタレを作ってください。	\r\n\r\n3.低いフライパンに玉ねぎを乗せ、豆腐をぐるっと巻いてのせてください。	\r\n\r\n4.水は豆腐がたっぷり浸かる程度だけ入れていただいて \r\n5。 タレをその上にのせてください。	\r\n\r\n6. 蓋をして弱火で煮詰めてください。	\r\n\r\n7。 ふたをしばらく開けて長ネギと青陽唐辛子2個を入れて煮詰めてください。汁がなくなるほど煮詰めてください。', 'edyy', '2022-06-07 20:25:03', './upload/두부짜글이.PNG', 20),
	(113, 'クリ-ムパスタ', 'パスタ麺とクリ-ムソ-スをよく混ぜてください。\r\nとろりと召し上がりたければ長く煮込んでください。\r\nただ薄く召し上がりたければ、少し沸かしてすぐに召し上がってください！\r\n私はとろっとしたクリームパスタが好きなので、長く煮込んでくれますよ！\r\nこの辺で器に移します。', 'ジュン', '2023-02-11 19:16:49', './upload/dasdasd.JPG', 2);
/*!40000 ALTER TABLE `recipe_write` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
