/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : travel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-04-20 01:06:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `F_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单编号',
  `C_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL COMMENT '游客编号',
  `R_id` int(11) NOT NULL COMMENT '旅游路线编号',
  `R_name` varchar(60) NOT NULL,
  `F_Stime` datetime NOT NULL COMMENT '订单开始时间',
  `F_Etime` datetime DEFAULT NULL COMMENT '订单结束时间',
  `F_state` int(11) NOT NULL COMMENT '订单状态 未支付(0),【已支付】未受理(1),退单中(2),退单成功(3),退单失败(4),预约成功(5)',
  PRIMARY KEY (`F_id`),
  KEY `f_tp` (`P_id`),
  KEY `f_r` (`R_id`),
  KEY `f_tccc` (`C_id`),
  CONSTRAINT `f_r` FOREIGN KEY (`R_id`) REFERENCES `route` (`R_id`),
  CONSTRAINT `f_tccc` FOREIGN KEY (`C_id`) REFERENCES `tourc` (`C_id`),
  CONSTRAINT `f_tp` FOREIGN KEY (`P_id`) REFERENCES `tourp` (`P_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5007 DEFAULT CHARSET=utf8 COMMENT='订单信息表 用来记录订单的信息。';

-- ----------------------------
-- Records of form
-- ----------------------------
INSERT INTO `form` VALUES ('5001', '1001', '2001', '4001', '成都-西藏', '2016-04-20 01:01:07', '0000-00-00 00:00:00', '1');
INSERT INTO `form` VALUES ('5002', '1002', '2001', '4002', '长沙韶山、张家界、凤凰双飞', '2016-04-20 01:02:01', '0000-00-00 00:00:00', '2');
INSERT INTO `form` VALUES ('5003', '1003', '2001', '4003', '【魅力阳光】重庆-三峡', '2016-04-20 01:02:16', '0000-00-00 00:00:00', '1');
INSERT INTO `form` VALUES ('5004', '1006', '2001', '4006', '洛阳', '2016-04-20 01:02:31', '0000-00-00 00:00:00', '2');
INSERT INTO `form` VALUES ('5005', '1003', '2001', '4009', '大连', '2016-04-20 01:02:44', '0000-00-00 00:00:00', '0');
INSERT INTO `form` VALUES ('5006', '1003', '2001', '4015', '青海湖', '2016-04-20 01:02:58', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for route
-- ----------------------------
DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `R_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '旅游路线编号',
  `C_id` int(11) NOT NULL COMMENT '旅游公司编号',
  `R_name` varchar(60) NOT NULL COMMENT '旅游路线名称',
  `R_point` varchar(200) NOT NULL COMMENT '途经景点',
  `R_start` datetime NOT NULL COMMENT '旅游开始时间',
  `R_end` datetime NOT NULL COMMENT '旅游结束时间',
  `R_price` int(20) NOT NULL COMMENT '旅游价格',
  `R_food` varchar(200) NOT NULL COMMENT '餐饮',
  `R_hotel` varchar(200) NOT NULL COMMENT '住宿',
  `R_traffic` varchar(200) NOT NULL COMMENT '交通',
  `R_plan` varchar(1000) NOT NULL COMMENT '旅游安排',
  PRIMARY KEY (`R_id`),
  KEY `r_tc` (`C_id`),
  CONSTRAINT `r_tc` FOREIGN KEY (`C_id`) REFERENCES `tourc` (`C_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4037 DEFAULT CHARSET=utf8 COMMENT='旅游路线信息表 用来记录旅游路线的信息。';

-- ----------------------------
-- Records of route
-- ----------------------------
INSERT INTO `route` VALUES ('4001', '1001', '成都-西藏', '拉萨、日喀则、纳木错', '2016-04-20 00:20:41', '2016-04-30 00:20:44', '2180', '只包早餐，午餐晚餐自费', '当地五星级酒店', '飞机往返', '自由行，只需在早餐时回到酒店享用早餐即可。');
INSERT INTO `route` VALUES ('4002', '1002', '长沙韶山、张家界、凤凰双飞', '韶山、张家界、凤凰', '2016-04-04 00:23:13', '2016-05-07 00:23:16', '2750', '三餐全包', '当地四星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4003', '1003', '【魅力阳光】重庆-三峡', '重庆-三峡', '2016-04-20 00:25:57', '2016-05-08 00:25:59', '800', '三餐全不包', '自行联系当地的酒店', '单程机票', '自由行');
INSERT INTO `route` VALUES ('4004', '1004', '莫高窟', '人类敦煌，千年莫高', '2016-04-20 00:27:22', '2016-05-06 00:27:25', '2000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4005', '1005', '桂林', '诗情画意，山水走廊', '2016-03-28 00:28:09', '2016-04-22 00:28:14', '1500', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4006', '1006', '洛阳', '千年帝都，华夏圣城', '2016-04-21 00:28:41', '2016-05-01 00:28:44', '2500', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4007', '1001', '恩施', '十里不同天，百里不同俗', '2016-04-29 00:29:18', '2016-04-15 00:29:21', '5000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4008', '1002', '荷兰', '世界上最浪漫的春天', '2016-04-14 00:29:59', '2016-04-19 00:30:01', '20000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4009', '1003', '大连', '金色沙滩，浪漫之地', '2016-04-20 00:31:43', '2016-04-20 00:31:47', '3000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4010', '1004', '凤凰', '湘西寻梦，迷走边城', '2016-04-20 00:32:12', '2016-04-20 00:32:15', '1000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4011', '1005', '北海', '一海一岛一沉迷', '2016-04-20 00:32:36', '2016-04-20 00:32:38', '2200', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4012', '1006', '戛纳', '青山小城，电影圣地', '2016-04-20 00:33:09', '2016-04-20 00:33:11', '3200', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4013', '1001', '泸沽湖', '女儿国的前世今生', '2016-04-20 00:33:35', '2016-04-20 00:33:37', '2100', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4014', '1002', '贵阳', '贵山之南，山国之都', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '1234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4015', '1003', '青海湖', '金黄花海，万顷碧波', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '2234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4016', '1004', '青岛', '红瓦绿树，碧海蓝天', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '3234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4017', '1005', '香格里拉', '寻找心中的日月', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '4234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4018', '1006', '新西兰', '田园中的酷玩胜地', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '5234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4019', '1001', '凤凰', '边城春日的风华旧梦', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '6234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4020', '1002', '西塘', '乘乌篷船体验静水祥和', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '7234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4021', '1003', '南浔', '小城故事，醉美南浔', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '8234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4022', '1004', '宏村', '漫步宏村，水灵画卷', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '9234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4023', '1005', '丽江', '雪山脚下的柔软时光', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '1234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4024', '1006', '大连', '白色栅栏，金色沙滩', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '2234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4025', '1001', '北海', '一海一岛一沉迷', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '3234', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4026', '1002', '巴厘岛', '千岛之国的掌上明珠', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '4541', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4027', '1003', '沙巴', '热带雨林边的潜水胜地', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '2351', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4028', '1004', '厦门', '琴岛漫步，聆听思考', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '452', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4029', '1005', '马赛', '港口之都，浪漫马赛', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '2500', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4030', '1006', '新加坡', '找寻一段海上记忆', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '4800', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4031', '1001', '下龙湾', '开启海上奇幻旅程', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '4100', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4032', '1002', '法国', '欧洲邮轮奇妙之旅', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '25000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4033', '1003', '巴哈马', '海上云淡风轻的日子', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '14500', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4034', '1004', '鼓浪屿', '厦门动车鼓浪屿全透明三日游', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '2000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4035', '1005', '南普陀寺', '千年古刹', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '1000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');
INSERT INTO `route` VALUES ('4036', '1006', '泰国', '泰国独特的东南亚风光', '2016-04-20 00:33:35', '2016-04-20 00:33:35', '12000', '自由享受当地风味美食', '当地五星级酒店', '飞机往返', '由当地导游带领各位旅客前往景点游玩。');

-- ----------------------------
-- Table structure for tourc
-- ----------------------------
DROP TABLE IF EXISTS `tourc`;
CREATE TABLE `tourc` (
  `C_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '旅游公司编号',
  `C_Uname` varchar(16) NOT NULL COMMENT '用户名',
  `C_pwd` varchar(8) NOT NULL COMMENT '密码',
  `C_name` varchar(60) NOT NULL COMMENT '公司名',
  `C_man` varchar(60) NOT NULL COMMENT '法人',
  `C_address` varchar(60) NOT NULL COMMENT '地址',
  `C_introduce` varchar(200) DEFAULT NULL COMMENT '公司介绍',
  PRIMARY KEY (`C_id`,`C_Uname`),
  KEY `C_id` (`C_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8 COMMENT='旅游公司账户信息表 用来记录旅游公司的账户信息。';

-- ----------------------------
-- Records of tourc
-- ----------------------------
INSERT INTO `tourc` VALUES ('1001', 'jiuyang', '000000', '旧杨旅业', 'Andy', '九八省七六市', '旧杨旅业，专注旅游服务。');
INSERT INTO `tourc` VALUES ('1002', 'huachuan', '000000', '桦川旅游有限公司', '苏阿山', '五四省三二市', '桦川旅游公司，是您旅游的好选择。');
INSERT INTO `tourc` VALUES ('1003', 'mingmei', '000000', '明媚旅游', '孙明', '一零省零一市', '明媚旅游让您明媚着前行。');
INSERT INTO `tourc` VALUES ('1004', 'fenghua', '000000', '丰华旅游服务公司', '丰华集团', '二三省四五市', '丰华集团名下的著名旅游公司。');
INSERT INTO `tourc` VALUES ('1005', 'shasha', '000000', '莎莎情侣旅游定制', '莎莎国际', '六七省八九市', '莎莎国际特别打造的莎莎情侣旅游定制业务，为伤害单身狗而生。');
INSERT INTO `tourc` VALUES ('1006', 'tiantian', '000000', '天天爱玩', '天天', '石狮省试试市', '天天爱玩，天天旅游。');

-- ----------------------------
-- Table structure for tourn
-- ----------------------------
DROP TABLE IF EXISTS `tourn`;
CREATE TABLE `tourn` (
  `root` varchar(4) NOT NULL COMMENT '管理员账户',
  `pwd` varchar(8) NOT NULL COMMENT '密码',
  PRIMARY KEY (`root`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理局账户信息表 用来记录管理局的账户信息。该账户具有唯一性。';

-- ----------------------------
-- Records of tourn
-- ----------------------------
INSERT INTO `tourn` VALUES ('root', '000');

-- ----------------------------
-- Table structure for tourp
-- ----------------------------
DROP TABLE IF EXISTS `tourp`;
CREATE TABLE `tourp` (
  `P_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '游客编号',
  `P_Uname` varchar(16) NOT NULL COMMENT '用户名',
  `P_pwd` varchar(8) NOT NULL COMMENT '密码',
  `P_phone` varchar(15) NOT NULL COMMENT '手机',
  `P_idcard` varchar(18) NOT NULL COMMENT '身份证号',
  `P_name` varchar(16) NOT NULL COMMENT '姓名',
  `P_sex` varchar(2) DEFAULT NULL COMMENT '性别',
  `P_age` int(3) DEFAULT NULL COMMENT '年龄',
  PRIMARY KEY (`P_id`,`P_Uname`),
  KEY `P_id` (`P_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2009 DEFAULT CHARSET=utf8 COMMENT='用户账户信息';

-- ----------------------------
-- Records of tourp
-- ----------------------------
INSERT INTO `tourp` VALUES ('2001', '光明', '000000', '131000000001', '441802199605086548', '光明', '男', '21');
INSERT INTO `tourp` VALUES ('2002', '花花', '000000', '1310000000', '441802199605086548', '花花', '男', '21');
INSERT INTO `tourp` VALUES ('2003', '小胡', '000000', '13100000000000', '4417954265129546', '小胡', '男', '22');
INSERT INTO `tourp` VALUES ('2004', '丹丹', '000000', '13100000000', '441802199605086548', '丹丹', '女', '12');
INSERT INTO `tourp` VALUES ('2005', '天鹅', '000000', '13100000000', '441802199605086547', '天鹅', '男', '55');
INSERT INTO `tourp` VALUES ('2006', '凤飞飞', '000000', '13100000000', '441802199605086541', '凤飞飞', '女', '22');
INSERT INTO `tourp` VALUES ('2007', '薇薇安', '000000', '13100000000', '441802199605086546', '薇薇安', '男', '22');
INSERT INTO `tourp` VALUES ('2008', '九龙', '000000', '13100000000', '441802199605086548', '九龙', '女', '22');

-- ----------------------------
-- Table structure for viewspot
-- ----------------------------
DROP TABLE IF EXISTS `viewspot`;
CREATE TABLE `viewspot` (
  `V_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '景点编号',
  `V_name` varchar(60) NOT NULL COMMENT '景点名称',
  `V_address` varchar(60) NOT NULL COMMENT '景点位置',
  `V_content` varchar(200) DEFAULT NULL COMMENT '游览项目及价格',
  `V_introduce` varchar(200) DEFAULT NULL COMMENT '景点介绍',
  `V_price` int(20) DEFAULT NULL COMMENT '景点价格',
  PRIMARY KEY (`V_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3024 DEFAULT CHARSET=utf8 COMMENT='景点信息表 用来记录景点的信息。';

-- ----------------------------
-- Records of viewspot
-- ----------------------------
INSERT INTO `viewspot` VALUES ('3001', '横店影视城', '横店影视城', '广州街·香港街、明清宫苑、秦王宫、清明上河图、梦幻谷（江南水乡、横店老街）、屏岩洞府、大智禅寺等13个跨越几千年历史时空的影视拍摄基地！', '横店影视城是全球规模最大的影视拍摄基地。广州街·香港街、明清宫苑、秦王宫、清明上河图、梦幻谷（江南水乡、横店老街）、屏岩洞府、大智禅寺等13个跨越几千年历史时空的影视拍摄基地！', '500');
INSERT INTO `viewspot` VALUES ('3002', '厦门', '厦门', '厦门阳光充沛，一年四季花木繁盛，总体气温比较温和，年平均温度21℃，最低4℃。这里夏季较为炎热，7~8月份一般都在30℃以上。夏季穿短袖、短裤即可。', '厦门春秋两季最适合旅行，冬季也比较温暖。', '1000');
INSERT INTO `viewspot` VALUES ('3003', '三亚', '三亚', '三亚市气候独特。三亚地处低纬度，受海洋气候的影响较大，属热带海洋季风性气候。年平均气温25度，气温最高为7月，平均为28度，气温最低为1月份，平\r\n均气温为21度。全年日照时间2563小时，年平均降雨量1279毫米。这里四季如春可谓三冬不见霜和雪，四季鲜花常盛开，素有东方夏威夷之称。', '海南三亚，一个让人恋恋不舍的迷人海岛。', '4000');
INSERT INTO `viewspot` VALUES ('3004', '九寨沟', '九寨沟', '如果说西方有童话世界，有高耸入云的洁白天堂，那么东方就有神话世界和炫彩的七色天池，梦幻的神色风光，不曾见过的山清水美，都会在这里曾现在你的眼前，将神话里的天堂世。', '九寨归来不看水，这里的溪河湖瀑飞动与静谧结合，一步一色、变幻无穷，美丽到让人失语。', '2000');
INSERT INTO `viewspot` VALUES ('3005', '莫高窟', '莫高窟', '人类敦煌，千年莫高', '人类敦煌，千年莫高', '100');
INSERT INTO `viewspot` VALUES ('3006', '桂林', '桂林', '诗情画意，山水走廊', '诗情画意，山水走廊', '200');
INSERT INTO `viewspot` VALUES ('3007', '洛阳', '洛阳', '千年帝都，华夏圣城', '千年帝都，华夏圣城', '300');
INSERT INTO `viewspot` VALUES ('3008', '恩施', '恩施', '十里不同天，百里不同俗', '十里不同天，百里不同俗', '400');
INSERT INTO `viewspot` VALUES ('3009', '荷兰', '荷兰', '世界上最浪漫的春天', '世界上最浪漫的春天', '500');
INSERT INTO `viewspot` VALUES ('3010', '大连', '大连', '金色沙滩，浪漫之地', '金色沙滩，浪漫之地', '600');
INSERT INTO `viewspot` VALUES ('3011', '凤凰', '凤凰', '湘西寻梦，迷走边城', '湘西寻梦，迷走边城', '700');
INSERT INTO `viewspot` VALUES ('3012', '北海', '北海', '一海一岛一沉迷', '一海一岛一沉迷', '800');
INSERT INTO `viewspot` VALUES ('3013', '戛纳', '戛纳', '青山小城，电影圣地', '青山小城，电影圣地', '900');
INSERT INTO `viewspot` VALUES ('3014', '泸沽湖', '泸沽湖', '女儿国的前世今生', '女儿国的前世今生', '800');
INSERT INTO `viewspot` VALUES ('3015', '贵阳', '贵阳', '贵山之南，山国之都', '贵山之南，山国之都', '700');
INSERT INTO `viewspot` VALUES ('3016', '青海湖', '青海湖', '金黄花海，万顷碧波', '金黄花海，万顷碧波', '600');
INSERT INTO `viewspot` VALUES ('3017', '青岛', '青岛', '红瓦绿树，碧海蓝天', '红瓦绿树，碧海蓝天', '500');
INSERT INTO `viewspot` VALUES ('3018', '香格里拉', '香格里拉', '寻找心中的日月', '寻找心中的日月', '400');
INSERT INTO `viewspot` VALUES ('3019', '新西兰', '新西兰', '田园中的酷玩胜地', '田园中的酷玩胜地', '300');
INSERT INTO `viewspot` VALUES ('3020', '西塘', '西塘', '乘乌篷船体验静水祥和', '乘乌篷船体验静水祥和', '200');
INSERT INTO `viewspot` VALUES ('3021', '南浔', '南浔', '小城故事，醉美南浔', '小城故事，醉美南浔', '100');
INSERT INTO `viewspot` VALUES ('3022', '宏村', '宏村', '漫步宏村，水灵画卷', '漫步宏村，水灵画卷', '200');
INSERT INTO `viewspot` VALUES ('3023', '丽江', '丽江', '雪山脚下的柔软时光', '雪山脚下的柔软时光', '300');