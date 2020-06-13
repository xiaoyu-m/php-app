/*
 Navicat MySQL Data Transfer

 Source Server         : xiaoyu
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost:3306
 Source Schema         : person

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : 65001

 Date: 13/06/2020 17:20:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'xiaoyu', 'admin');

-- ----------------------------
-- Table structure for dept
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept`  (
  `deptNo` int(11) NOT NULL,
  `deptName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`deptNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES (1, '技术部');
INSERT INTO `dept` VALUES (2, '后勤部');
INSERT INTO `dept` VALUES (123, '123');

-- ----------------------------
-- Table structure for emp
-- ----------------------------
DROP TABLE IF EXISTS `emp`;
CREATE TABLE `emp`  (
  `empNo` int(20) NOT NULL,
  `empName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` int(3) NULL DEFAULT NULL,
  `native` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dept` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jobTitle` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `likes` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `state` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`empNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of emp
-- ----------------------------
INSERT INTO `emp` VALUES (1, '0001', '男', 19, '小于', '技术部', '前端', '打代码', '在职', '哈哈哈');
INSERT INTO `emp` VALUES (2, '小慧', '女', 20, '四川眉山', '技术部', '前端', '打小于', '在职', '嘻嘻嘻');
INSERT INTO `emp` VALUES (3, '213', '男', 213, '213', '技术部', '前端', '123', '在职', '213');
INSERT INTO `emp` VALUES (4, '213', '男', 231, '132', '技术部', '前端', '123', '在职', '213');
INSERT INTO `emp` VALUES (5, '123', '男', 312, '321', '技术部', '前端', '231', '在职', '123');

-- ----------------------------
-- Table structure for partjob
-- ----------------------------
DROP TABLE IF EXISTS `partjob`;
CREATE TABLE `partjob`  (
  `empNo` int(20) NOT NULL,
  `jobInfo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `allowance` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`empNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partjob
-- ----------------------------

-- ----------------------------
-- Table structure for req
-- ----------------------------
DROP TABLE IF EXISTS `req`;
CREATE TABLE `req`  (
  `empNo` int(20) NOT NULL,
  `date` datetime(0) NULL DEFAULT NULL,
  `reqInfo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reqAmount` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reqState` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`empNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of req
-- ----------------------------

-- ----------------------------
-- Table structure for task
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task`  (
  `taskNo` int(20) NOT NULL,
  `taskType` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `taskName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `taskInfo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `taskNum` int(20) NULL DEFAULT NULL,
  `taskSum` int(30) NULL DEFAULT NULL,
  PRIMARY KEY (`taskNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES (1, '技术类', 'web静态界面', '完成首页、我的、个人信息三个页面', 60, 60);
INSERT INTO `task` VALUES (2, '后端', 'php全栈网页', '完成php+mysql+bootstrap动态网页', 100, 60);

-- ----------------------------
-- Table structure for wage
-- ----------------------------
DROP TABLE IF EXISTS `wage`;
CREATE TABLE `wage`  (
  `empNo` int(20) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `basicWage` int(10) NULL DEFAULT NULL,
  `jobWage` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`empNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wage
-- ----------------------------
INSERT INTO `wage` VALUES (10001, '小于', 80000, 80000);
INSERT INTO `wage` VALUES (10002, '小慧', 90000, 90000);

-- ----------------------------
-- Table structure for wagetotal
-- ----------------------------
DROP TABLE IF EXISTS `wagetotal`;
CREATE TABLE `wagetotal`  (
  `empNo` int(20) NOT NULL,
  `subTotal` int(20) NULL DEFAULT NULL,
  `after` int(10) NULL DEFAULT NULL,
  `afterInfo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `taskName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `wage` int(20) NULL DEFAULT NULL,
  PRIMARY KEY (`empNo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wagetotal
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
