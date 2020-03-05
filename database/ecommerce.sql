/*
 Navicat Premium Data Transfer

 Source Server         : localhost_mysql
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : ecommerce

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 05/03/2020 08:49:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Quần', 'quan', NULL);
INSERT INTO `categories` VALUES (2, 'Áo', 'ao', NULL);
INSERT INTO `categories` VALUES (3, 'Giày', 'giay', NULL);
INSERT INTO `categories` VALUES (4, 'Quần jean', 'quan-jean', 1);
INSERT INTO `categories` VALUES (5, 'Quần Kaki', 'quan-kaki', 1);
INSERT INTO `categories` VALUES (6, 'Quần Tây', 'quan-tay', 1);
INSERT INTO `categories` VALUES (7, 'Quần Short', 'quan-short', 1);
INSERT INTO `categories` VALUES (8, 'Quần Short Thun', 'quan-short-thun', 7);
INSERT INTO `categories` VALUES (9, 'Quần Short Kaki', 'quan-short-kaki', 7);
INSERT INTO `categories` VALUES (10, 'Quần Short Kaki loai 1', 'quan-short-kaki-loai-1', 9);
INSERT INTO `categories` VALUES (11, 'Quần Short Kaki loai 2', 'quan-short-kaki-loai-2', 9);
INSERT INTO `categories` VALUES (12, 'Quần Short Kaki loai 1 cao cấp', 'quan-short-kaki-loai-1-cao-cap', 10);
INSERT INTO `categories` VALUES (13, 'Quần Short Kaki loai 1 tầm trung', 'quan-short-kaki-loai-1-tam-trung', 10);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Quần Jean Rách Rã Ống Sau Màu Xám Xanh QJ1676', 'quan-jean-rach-ra-ong-sau-mau-xam-xanh-qj1676', 'Chất liệu: 99%cotton,1%spandex. Form: Slim-fit Đặc điểm: Không ôm quá chặt hay lỏng lẻo, slim-fit kiểu quần jeans thịnh hành nhất hiện nay. Form dáng này có xu hướng ôm dọc theo chiều dài chân, phần ống rộng ở bắp đùi và thu nhỏ xuôi dần (nhưng không bó s', 475000.00, 20, 4);
INSERT INTO `products` VALUES (2, 'Quần Jean Rách Gối Màu Xám Xanh QJ1674', 'quan-jean-rach-goi-mau-xam-xanh-qj1674', 'Chất liệu: 98,9%cotton,1.1%spandex. Form: Slim-fit Đặc điểm: Không ôm quá chặt hay lỏng lẻo, slim-fit kiểu quần jeans thịnh hành nhất hiện nay. Form dáng này có xu hướng ôm dọc theo chiều dài chân, phần ống rộng ở bắp đùi và thu nhỏ xuôi dần (nhưng không ', 445000.00, 35, 4);
INSERT INTO `products` VALUES (3, 'Quần Tây QT146', 'quan-tay-qt146', 'Quần Tây QT146 chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 350000.00, 100, 6);
INSERT INTO `products` VALUES (4, 'QUẦN TÂY XÁM CHUỘT ĐẬM QT137', 'quan-tay-xam-chuot-dam-qt137', 'Quần Tây Xám Chuột Đậm QT137 chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 475000.00, 50, 6);
INSERT INTO `products` VALUES (5, 'Quần Short Kaki QS148', 'quan-short-kaki-qs148', 'Quần Short Kaki QS148  Không ôm quá chặt hay lỏng lẻo, slim-fit kiểu quần jeans thịnh hành nhất hiện nay. Form dáng này có xu hướng ôm dọc theo chiều dài chân, phần ống rộng ở bắp đùi và thu nhỏ xuôi dần (nhưng không bó sát hay túm ống), chiếc quần này ph', 300000.00, 80, 9);
INSERT INTO `products` VALUES (6, 'Quần Short Kaki QS693', 'quan-short-kaki-qs693', 'Quần Tây QS693chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 300000.00, 35, 9);
INSERT INTO `products` VALUES (7, 'QUẦN KAKI ĐEN QK171', 'quan-kaki-den-qk171', 'Quần Kaki Đen QK171 chất vải dày dặn, bền màu, thoáng mát, thấm hút mồ hôi tốt. Form ống côn ôm nhẹ, có co giãn nên mặc rất thoải mái. Màu sắc thanh lịch, rất dễ phối trang phục khi đi làm, đi học, đi chơi...', 500000.00, 50, 5);
INSERT INTO `products` VALUES (8, 'QUẦN KAKI ĐEN QK170', 'quan-kaki-den-qk170', 'Quần Kaki Đen QK170 chất vải dày dặn, bền màu, thoáng mát, thấm hút mồ hôi tốt. Form ống côn ôm nhẹ, có co giãn nên mặc rất thoải mái. Màu sắc thanh lịch, rất dễ phối trang phục khi đi làm, đi học, đi chơi...', 500000.00, 100, 5);
INSERT INTO `products` VALUES (9, 'QUẦN SHORT JEAN XÁM CHUỘT ĐẬM QS158', 'quan-short-jean-xam-chuot-dam-qs158', 'Quần Short Jean Xám Chuột Đậm QS158 chất jean dày dặn, bền, có độ co giãn nhẹ, thấm hút tốt. Kiểu dáng năng động, thoải mái, bụi bặm, ngầu. Form ống suông đơn giản dễ phối cùng áo thun, sơ mi ngắn tay, áo khoác, giày thể thao, giày mọi..', 400000.00, 35, 7);
INSERT INTO `products` VALUES (10, 'QUẦN SHORT XANH QS157', 'quan-short-xanh-qs157', 'Quần Short Xanh QS157 chất jean dày dặn, bền, có độ co giãn nhẹ, thấm hút tốt. Kiểu dáng năng động, thoải mái. Form ống suông đơn giản dễ phối cùng áo thun, sơ mi ngắn tay, áo khoác, giày thể thao, giày mọi...', 500000.00, 100, 9);
INSERT INTO `products` VALUES (11, 'QUẦN SHORT LINEN XANH NGỌC QS162', 'quan-short-linen-xanh-ngoc-qs162', 'Quần Short Linen Xanh Ngọc QS162 thiết kế năng động, hiện đại. Màu sắc trẻ trung, mới lạ, dễ phối trang phục. Chất vải Linen bền màu, thoáng mát, đường may tỉ mỉ. Tạo sự tự tin và thoải mái, phù hợp cho các bạn trẻ năng động, hướng ngoại.', 475000.00, 100, 9);
INSERT INTO `products` VALUES (12, 'QUẦN SHORT LINEN VÀNG KEM QS160', 'quan-short-linen-vang-kem-qs160', 'Quần Tây Xám Chuột Đậm QT137 chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 0.00, 35, 10);
INSERT INTO `products` VALUES (13, 'Quần Short Linen Xám QS171 QUẦN SHORT LINEN XÁM QS171', 'quan-short-linen-xam-qs171-quan-short-linen-xam-qs171', 'Chất liệu: 98,9%cotton,1.1%spandex. Form: Slim-fit Đặc điểm: Không ôm quá chặt hay lỏng lẻo, slim-fit kiểu quần jeans thịnh hành nhất hiện nay. Form dáng này có xu hướng ôm dọc theo chiều dài chân, phần ống rộng ở bắp đùi và thu nhỏ xuôi dần (nhưng không ', 300000.00, 20, 12);
INSERT INTO `products` VALUES (14, 'Quần Short Ca Rô QS155 QUẦN SHORT CA RÔ QS155', 'quan-short-ca-ro-qs155-quan-short-ca-ro-qs155', 'Quần Tây QT146 chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 445000.00, 50, 12);
INSERT INTO `products` VALUES (15, 'QUẦN SHORT LINEN VÀNG KEM QS165', 'quan-short-linen-vang-kem-qs165', 'Quần Tây Xám Chuột Đậm QT137 chất vải âu cao cấp, dày dặn, sang trọng, không nhăn nhàu, bền màu. Form dáng chuẩn, ống côn ôm nhẹ đảm bảo gọn gàng, thanh lịch cho phái mạnh.', 350000.00, 100, 13);

SET FOREIGN_KEY_CHECKS = 1;
