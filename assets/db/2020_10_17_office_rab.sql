/*
 Navicat Premium Data Transfer

 Source Server         : local8
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : dbrab

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 17/10/2020 15:01:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, 32, 13, 'About Us', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><img src=\"http://localhost/iwebebs/assets/images/tmp/adb7805b11339988b1ab5fd31ae66a1c.jpeg\" xss=removed class=\"note-float-center note-float-right\" width=\"800px\"><br></p><div align=\"center\"><br></div><p><br></p>', 'about_us', 'Y');
INSERT INTO `articles` VALUES (2, 34, 12, 'Visi dan Misi', '<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"--\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin-top:0in;\r\n	mso-para-margin-right:0in;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0in;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><u><span style=\"font-size: 12pt; line-height: 107%; font-family: \"Source Sans Pro\";\">VISI, MISI, DAN NILAI </span></u><u><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:\"Times New Roman\",\"serif\"\"></span></u></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.25in\"><span style=\"font-family: \"Source Sans Pro\";\">Visi</span><span style=\"font-family:\"Times New Roman\",\"serif\"\"></span></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"margin-top:0in;margin-right:51.35pt;margin-bottom:\r\n8.0pt;margin-left:.5in;text-align:justify\"><i><span style=\"font-family: \"Source Sans Pro\";\">“Menjadi\r\nPerusahaan Yang Profesional, Berkembang dan Bermanfaat untuk Memenuhi Kebutuhan\r\nMasyarakat, Bangsa, dan Negara”</span></i></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.25in\"><span style=\"font-family: \"Source Sans Pro\";\">Misi</span><i><span style=\"font-family:\"Times New Roman\",\"serif\"\"></span></i></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"margin-left:.5in;text-align:justify\"><i><span style=\"font-family: \"Source Sans Pro\";\">“Membangun Bisnis dan Aset\r\nProduktif secara terintegrasi guna memberikan Manfaat & Memberikan layanan\r\njasa pemeliharaan yang profesional, handal dan berorientasi pada karakter\r\npelanggan” </span></i><span style=\"font-family:\"Times New Roman\",\"serif\"\"></span></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"text-align:justify;text-indent:.25in\"><span style=\"font-family: \"Source Sans Pro\";\">Nilai </span><span style=\"font-family:\"Times New Roman\",\"serif\"\"></span></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span><p class=\"MsoNormal\" style=\"text-indent:.5in\"><i><span style=\"font-family: \"Source Sans Pro\";\">“Cepat,\r\nTanggap dan Penuh Tanggung Tawab”</span></i></p><span style=\"font-family: \"Source Sans Pro\";\">\r\n\r\n</span>', 'visi_misi', 'Y');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `type` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'p',
  `class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for category_type
-- ----------------------------
DROP TABLE IF EXISTS `category_type`;
CREATE TABLE `category_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of category_type
-- ----------------------------

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `favicon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'assets/images/compro/favicon.ico',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES (1, 'Go School', 'Ketapang', 'Livia Ramadhani', 'Y', 'assets/images/compro/favicon.ico');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NULL DEFAULT NULL,
  `c_type` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_detail` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_url` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (2, 1, 'wa', '+6281 1860 6060', '628118606060', 'Halo%20Admin,%20Saya%20Membutuhkan%20Informasi%20di%20Perusahaan%20anda', 'Y');
INSERT INTO `contact` VALUES (3, 1, 'email', 'livia@gmail.com', '', '', 'Y');

-- ----------------------------
-- Table structure for contact_type
-- ----------------------------
DROP TABLE IF EXISTS `contact_type`;
CREATE TABLE `contact_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of contact_type
-- ----------------------------
INSERT INTO `contact_type` VALUES (1, 'p', 'Phone');
INSERT INTO `contact_type` VALUES (2, 'wa', 'Whatsapp');
INSERT INTO `contact_type` VALUES (3, 'email', 'Email');
INSERT INTO `contact_type` VALUES (4, 'handphone', 'Handphone');
INSERT INTO `contact_type` VALUES (5, 'other', 'Other');

-- ----------------------------
-- Table structure for daemons
-- ----------------------------
DROP TABLE IF EXISTS `daemons`;
CREATE TABLE `daemons`  (
  `Start` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Info` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of daemons
-- ----------------------------

-- ----------------------------
-- Table structure for data_absen_mapel
-- ----------------------------
DROP TABLE IF EXISTS `data_absen_mapel`;
CREATE TABLE `data_absen_mapel`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_ajar_siswa_id` int NULL DEFAULT NULL,
  `guru_id` int NULL DEFAULT NULL,
  `jam_mapel_id` int NULL DEFAULT NULL,
  `absen_status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_dibuat` date NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_absen_mapel
-- ----------------------------
INSERT INTO `data_absen_mapel` VALUES (34, 8, 7, 7, 'TK', '2020-06-22', 'Y');
INSERT INTO `data_absen_mapel` VALUES (35, 8, 5, 8, 'H', '2020-06-22', 'Y');
INSERT INTO `data_absen_mapel` VALUES (38, 5, 5, 7, 'A', '2020-06-22', 'Y');

-- ----------------------------
-- Table structure for data_absen_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_absen_siswa`;
CREATE TABLE `data_absen_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `jam_masuk` time(0) NULL DEFAULT NULL,
  `jam_pulang` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_absen_siswa
-- ----------------------------
INSERT INTO `data_absen_siswa` VALUES (76, 7, '2020-06-22', '12:12:50', '12:20:20');
INSERT INTO `data_absen_siswa` VALUES (77, 8, '2020-06-22', '12:12:54', '12:20:24');
INSERT INTO `data_absen_siswa` VALUES (78, 9, '2020-06-22', '12:12:57', '12:20:28');
INSERT INTO `data_absen_siswa` VALUES (79, 10, '2020-06-22', '12:13:01', '12:20:31');
INSERT INTO `data_absen_siswa` VALUES (80, 11, '2020-06-22', '12:13:04', '12:20:33');
INSERT INTO `data_absen_siswa` VALUES (81, 12, '2020-06-22', '12:13:07', '12:20:35');

-- ----------------------------
-- Table structure for data_agama
-- ----------------------------
DROP TABLE IF EXISTS `data_agama`;
CREATE TABLE `data_agama`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_agama
-- ----------------------------
INSERT INTO `data_agama` VALUES (1, 'Islam', 'Y');
INSERT INTO `data_agama` VALUES (2, 'Kristen Protestan', 'Y');
INSERT INTO `data_agama` VALUES (3, 'Kristen Katolik', 'Y');
INSERT INTO `data_agama` VALUES (4, 'Budha', 'Y');
INSERT INTO `data_agama` VALUES (5, 'Hindu', 'Y');

-- ----------------------------
-- Table structure for data_ajar
-- ----------------------------
DROP TABLE IF EXISTS `data_ajar`;
CREATE TABLE `data_ajar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `guru_id` int NULL DEFAULT NULL,
  `ruangan_id` int NULL DEFAULT NULL,
  `tahun_ajar_id` int NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_ajar
-- ----------------------------
INSERT INTO `data_ajar` VALUES (14, 5, 11, 1, 'Y');
INSERT INTO `data_ajar` VALUES (15, 9, 11, 1, 'Y');
INSERT INTO `data_ajar` VALUES (16, 5, 14, 1, 'Y');
INSERT INTO `data_ajar` VALUES (17, 5, 13, 1, 'Y');
INSERT INTO `data_ajar` VALUES (18, 5, 12, 1, 'Y');
INSERT INTO `data_ajar` VALUES (19, 6, 11, 1, 'Y');
INSERT INTO `data_ajar` VALUES (20, 6, 15, 1, 'Y');
INSERT INTO `data_ajar` VALUES (21, 10, 16, 1, 'Y');
INSERT INTO `data_ajar` VALUES (22, 7, 12, 1, 'Y');
INSERT INTO `data_ajar` VALUES (23, 7, 13, 1, 'Y');

-- ----------------------------
-- Table structure for data_ajar_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_ajar_siswa`;
CREATE TABLE `data_ajar_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kelas_id` int NULL DEFAULT NULL,
  `ruangan_id` int NULL DEFAULT NULL,
  `siswa_id` int NULL DEFAULT NULL,
  `tahun_ajar_id` int NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_ajar_siswa
-- ----------------------------
INSERT INTO `data_ajar_siswa` VALUES (5, 8, 11, 7, 1, 'Y');
INSERT INTO `data_ajar_siswa` VALUES (6, 8, 11, 8, 1, 'Y');
INSERT INTO `data_ajar_siswa` VALUES (7, 10, 12, 9, 1, 'Y');
INSERT INTO `data_ajar_siswa` VALUES (8, 10, 12, 10, 1, 'Y');
INSERT INTO `data_ajar_siswa` VALUES (9, 9, 14, 11, 1, 'Y');
INSERT INTO `data_ajar_siswa` VALUES (10, 9, 14, 12, 1, 'Y');

-- ----------------------------
-- Table structure for data_guru
-- ----------------------------
DROP TABLE IF EXISTS `data_guru`;
CREATE TABLE `data_guru`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NULL DEFAULT NULL,
  `mapel_id` int NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_guru
-- ----------------------------
INSERT INTO `data_guru` VALUES (5, 7, 8, 'Y');
INSERT INTO `data_guru` VALUES (6, 8, 7, 'Y');
INSERT INTO `data_guru` VALUES (7, 9, 9, 'Y');
INSERT INTO `data_guru` VALUES (8, 9, 7, 'Y');
INSERT INTO `data_guru` VALUES (9, 7, 9, 'Y');
INSERT INTO `data_guru` VALUES (10, 8, 8, 'Y');

-- ----------------------------
-- Table structure for data_jam_mapel
-- ----------------------------
DROP TABLE IF EXISTS `data_jam_mapel`;
CREATE TABLE `data_jam_mapel`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_time` time(0) NULL DEFAULT NULL,
  `end_time` time(0) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_jam_mapel
-- ----------------------------
INSERT INTO `data_jam_mapel` VALUES (7, 'Jam 1', '07:15:00', '08:00:00', 'Jam Pelajaran Pertama', 'Y');
INSERT INTO `data_jam_mapel` VALUES (8, 'Jam 2', '08:00:00', '08:45:00', 'Jam Pelajaran Kedua', 'Y');
INSERT INTO `data_jam_mapel` VALUES (9, 'Jam 3', '08:45:00', '09:30:00', 'Jam Pelajaran Ketiga', 'Y');
INSERT INTO `data_jam_mapel` VALUES (10, 'Jam 4', '09:30:00', '10:15:00', 'Jam Pelajaran Keempat', 'Y');
INSERT INTO `data_jam_mapel` VALUES (11, 'Jam 5', '10:15:00', '11:00:00', 'Jam Pelajaran Kelima', 'Y');
INSERT INTO `data_jam_mapel` VALUES (12, 'Jam 6', '11:00:00', '11:45:00', 'Jam Pelajaran Keenam', 'Y');
INSERT INTO `data_jam_mapel` VALUES (13, 'Jam 7', '11:45:00', '12:30:00', 'Jam Pelajaran Ketujuh', 'Y');
INSERT INTO `data_jam_mapel` VALUES (14, 'Jam 8', '12:30:00', '13:15:00', 'Jam Pelajaran Kedelapan', 'Y');

-- ----------------------------
-- Table structure for data_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `data_jurusan`;
CREATE TABLE `data_jurusan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_jurusan
-- ----------------------------
INSERT INTO `data_jurusan` VALUES (3, 'IPA', 'Y');
INSERT INTO `data_jurusan` VALUES (4, 'IPS', 'Y');

-- ----------------------------
-- Table structure for data_kartu
-- ----------------------------
DROP TABLE IF EXISTS `data_kartu`;
CREATE TABLE `data_kartu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `card_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_kartu
-- ----------------------------
INSERT INTO `data_kartu` VALUES (7, 7, '11111111', 'Y');
INSERT INTO `data_kartu` VALUES (8, 8, '22222222', 'Y');
INSERT INTO `data_kartu` VALUES (9, 9, '33333333', 'Y');
INSERT INTO `data_kartu` VALUES (10, 10, '44444444', 'Y');
INSERT INTO `data_kartu` VALUES (11, 11, '55555555', 'Y');
INSERT INTO `data_kartu` VALUES (12, 12, '66666666', 'Y');

-- ----------------------------
-- Table structure for data_kelas
-- ----------------------------
DROP TABLE IF EXISTS `data_kelas`;
CREATE TABLE `data_kelas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jurusan_id` int NULL DEFAULT NULL,
  `nama_kelas` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_kelas
-- ----------------------------
INSERT INTO `data_kelas` VALUES (8, 3, 'X', 'Y');
INSERT INTO `data_kelas` VALUES (9, 4, 'X', 'Y');
INSERT INTO `data_kelas` VALUES (10, 3, 'XI', 'Y');
INSERT INTO `data_kelas` VALUES (11, 3, 'XII', 'Y');
INSERT INTO `data_kelas` VALUES (12, 4, 'XI', 'Y');
INSERT INTO `data_kelas` VALUES (13, 4, 'XII', 'Y');

-- ----------------------------
-- Table structure for data_mapel
-- ----------------------------
DROP TABLE IF EXISTS `data_mapel`;
CREATE TABLE `data_mapel`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_mapel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mapel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_mapel
-- ----------------------------
INSERT INTO `data_mapel` VALUES (6, 'BIND', 'Bahasa Indonesia', 'Y');
INSERT INTO `data_mapel` VALUES (7, 'BING', 'Bahasa Inggris', 'Y');
INSERT INTO `data_mapel` VALUES (8, 'MTK', 'Matematika', 'Y');
INSERT INTO `data_mapel` VALUES (9, 'SJR', 'Sejarah', 'Y');
INSERT INTO `data_mapel` VALUES (10, 'PKN', 'PKN', 'Y');

-- ----------------------------
-- Table structure for data_orangtua_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_orangtua_siswa`;
CREATE TABLE `data_orangtua_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_orangtua_siswa
-- ----------------------------
INSERT INTO `data_orangtua_siswa` VALUES (5, '12345', 'Aciak', 'masni', '<p>Ketapang<br></p>', '082321831483', 'Y');
INSERT INTO `data_orangtua_siswa` VALUES (6, '54215', 'Toni', 'Tina', 'Ketapang<p><br></p>', '08454524878', 'Y');
INSERT INTO `data_orangtua_siswa` VALUES (7, '54875', 'isman', 'tanya', 'ketapang<p><br></p>', '084545785', 'Y');
INSERT INTO `data_orangtua_siswa` VALUES (8, '8754548', 'pasui', 'teni', 'ketapang<p><br></p>', '08522588', 'Y');
INSERT INTO `data_orangtua_siswa` VALUES (9, '89486', 'abri', 'anti', '<p>kayong utara<br></p><p><br></p>', '085256496', 'Y');
INSERT INTO `data_orangtua_siswa` VALUES (10, '98658', 'tedy', 'insita', '<p>Petapahan&nbsp;&nbsp;&nbsp; <br></p>', '04874515315', 'Y');

-- ----------------------------
-- Table structure for data_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `data_ruangan`;
CREATE TABLE `data_ruangan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kelas_id` int NULL DEFAULT NULL,
  `nama_ruangan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_ruangan
-- ----------------------------
INSERT INTO `data_ruangan` VALUES (11, 8, 'A', 'Y');
INSERT INTO `data_ruangan` VALUES (12, 10, 'A', 'Y');
INSERT INTO `data_ruangan` VALUES (13, 11, 'A', 'Y');
INSERT INTO `data_ruangan` VALUES (14, 9, 'A', 'Y');
INSERT INTO `data_ruangan` VALUES (15, 12, 'A', 'Y');
INSERT INTO `data_ruangan` VALUES (16, 13, 'A', 'Y');

-- ----------------------------
-- Table structure for data_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_siswa`;
CREATE TABLE `data_siswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_siswa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `jurusan_id` int NULL DEFAULT NULL,
  `kelas_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_siswa
-- ----------------------------
INSERT INTO `data_siswa` VALUES (7, '12345', 'Livia Ramadhani', 'Jakarta', '2000-06-22', 'P', 'islam', '<p>Ketapang<br></p>', 'assets/images/data_siswa/no_image1.jpg', 'Y', 3, 8);
INSERT INTO `data_siswa` VALUES (8, '54215', 'Tina Toon', 'Ketapang', '2000-06-22', 'P', 'islam', '<p>Ketapang&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', 'assets/images/data_siswa/no_image2.jpg', 'Y', 3, 8);
INSERT INTO `data_siswa` VALUES (9, '54875', 'Tedy Antono', 'Ketapang', '2020-06-10', 'L', 'islam', '<p>ketapang<br></p>', 'assets/images/data_siswa/no_image3.jpg', 'Y', 3, 10);
INSERT INTO `data_siswa` VALUES (10, '8754548', 'Rendy Pasui', 'Ketapang', '2000-08-19', 'L', 'kristen_protestan', '<p>Ketapang&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', 'assets/images/data_siswa/no_image4.jpg', 'Y', 3, 10);
INSERT INTO `data_siswa` VALUES (11, '89486', 'Isman Abri', 'Kayong Utara', '2000-06-27', 'L', 'islam', '<p>kayong utara<br></p>', 'assets/images/data_siswa/no_image5.jpg', 'Y', 4, 9);
INSERT INTO `data_siswa` VALUES (12, '98658', 'Rani Insita', 'Petapahan', '2000-06-09', 'P', 'kristen_protestan', '<p>Petapahan&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', 'assets/images/data_siswa/no_image6.jpg', 'Y', 4, 9);

-- ----------------------------
-- Table structure for data_tahun_ajar
-- ----------------------------
DROP TABLE IF EXISTS `data_tahun_ajar`;
CREATE TABLE `data_tahun_ajar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun_ajar` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of data_tahun_ajar
-- ----------------------------
INSERT INTO `data_tahun_ajar` VALUES (1, '2020/2021', 'Y');

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `is_active` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES (1, 'TK', 'Taman Kanak - Kanak', 1, 'Y');
INSERT INTO `education` VALUES (2, 'SD', 'Sekolah Dasar', 2, 'Y');
INSERT INTO `education` VALUES (3, 'SMP', 'Sekolah Menengah Pertama', 3, 'Y');
INSERT INTO `education` VALUES (4, 'SMA', 'Sekolah Menengah Atas', 4, 'Y');
INSERT INTO `education` VALUES (5, 'D3', 'Diploma Tiga', 5, 'Y');
INSERT INTO `education` VALUES (6, 'S1', 'Strata Satu', 1, 'Y');
INSERT INTO `education` VALUES (7, 'S2', 'Strata Dua', 1, 'Y');
INSERT INTO `education` VALUES (8, 'S3', 'Strata Tiga', 1, 'Y');

-- ----------------------------
-- Table structure for email
-- ----------------------------
DROP TABLE IF EXISTS `email`;
CREATE TABLE `email`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of email
-- ----------------------------
INSERT INTO `email` VALUES (1, 1, 'info@iwebebs.com', 'Y');
INSERT INTO `email` VALUES (2, 1, 'info.iwebe@yahoo.com', 'Y');
INSERT INTO `email` VALUES (3, 1, 'iwebebs@gmail.com', 'Y');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `position_id` int NOT NULL,
  `education_id` int NOT NULL,
  `id_agama` int NULL DEFAULT NULL,
  `nip` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pob` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES (1, '1', 8, 5, NULL, NULL, 1, 'Administrator', 'Padang', '1988-09-18', '0852475152748', 'didendiko@gmail.com', '<p>Jl Ketapang Indah</p>', NULL, 'Y', 'assets/images/employee/Administrator1.jpg');
INSERT INTO `employee` VALUES (7, '6', 3, 5, 1, '137111124521', 1, 'Dian Kosasih, A.Md', 'Padang', '1989-08-16', '085247458245', 'didendiko@gmail.com', '<p>Jl adinegoro No 22</p>', 'L', 'Y', 'assets/images/employee/employee-default.jpg');
INSERT INTO `employee` VALUES (8, '7', 3, 6, 1, '134715154125', 1, 'Ilfan Taufik, S.Kom', 'Bukittinggi', '1989-06-26', '085274578458', 'ilfan@gmail.com', '<p>Bukittinggi</p>', 'L', 'Y', 'assets/images/employee/employee-default.jpg');
INSERT INTO `employee` VALUES (9, '8', 3, 6, 1, '13548754525', 1, 'Indra Sentosa, S.Kom', 'Bukittinggi', '1985-06-22', '085657897864', 'insen@gmail.com', '<p>Bukitttinggi?</p>', 'L', 'Y', 'assets/images/employee/employee-default.jpg');

-- ----------------------------
-- Table structure for header
-- ----------------------------
DROP TABLE IF EXISTS `header`;
CREATE TABLE `header`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img_ori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of header
-- ----------------------------
INSERT INTO `header` VALUES (7, 'Bantu Mereka Yuk', 'Mari membatu', 'home', 'assets/images/slide/new_poor1.jpg', NULL, 'home', 'Y');
INSERT INTO `header` VALUES (11, 'Bantu Mereka', '<p>Bantu mereka<br></p>', 'home', 'assets/images/slide/volunteer21.JPG', NULL, 'home', 'Y');

-- ----------------------------
-- Table structure for icon
-- ----------------------------
DROP TABLE IF EXISTS `icon`;
CREATE TABLE `icon`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'flaticon-',
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of icon
-- ----------------------------
INSERT INTO `icon` VALUES (1, 'flaticon-worker', 'Y');
INSERT INTO `icon` VALUES (2, 'flaticon-gear', 'Y');
INSERT INTO `icon` VALUES (3, 'flaticon-ui', 'Y');
INSERT INTO `icon` VALUES (4, 'flaticon-ui-1', 'Y');
INSERT INTO `icon` VALUES (5, 'flaticon-property', 'Y');
INSERT INTO `icon` VALUES (6, 'flaticon-worker-1', 'Y');
INSERT INTO `icon` VALUES (7, 'flaticon-engineer', 'Y');
INSERT INTO `icon` VALUES (8, 'flaticon-car-radiator', 'Y');
INSERT INTO `icon` VALUES (9, 'flaticon-air-conditioner', 'Y');
INSERT INTO `icon` VALUES (10, 'flaticon-garage', 'Y');
INSERT INTO `icon` VALUES (11, 'flaticon-duct-tape', 'Y');
INSERT INTO `icon` VALUES (12, 'flaticon-pipe', 'Y');
INSERT INTO `icon` VALUES (13, 'flaticon-wire', 'Y');
INSERT INTO `icon` VALUES (14, 'flaticon-cctv', 'Y');
INSERT INTO `icon` VALUES (15, 'flaticon-password', 'Y');
INSERT INTO `icon` VALUES (16, 'flaticon-phone-call', 'Y');
INSERT INTO `icon` VALUES (17, 'flaticon-battery', 'Y');
INSERT INTO `icon` VALUES (18, 'flaticon-fire-alarm', 'Y');
INSERT INTO `icon` VALUES (19, 'flaticon-fire-alarm-1', 'Y');
INSERT INTO `icon` VALUES (20, 'flaticon-fire-button', 'Y');
INSERT INTO `icon` VALUES (21, 'flaticon-technical-support', 'Y');
INSERT INTO `icon` VALUES (22, 'flaticon-customer-support', 'Y');
INSERT INTO `icon` VALUES (23, 'flaticon-construction', 'Y');
INSERT INTO `icon` VALUES (24, 'flaticon-maintenance', 'Y');
INSERT INTO `icon` VALUES (28, 'flaticon-certificate', 'Y');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NULL DEFAULT NULL,
  `caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_admin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `as_guru` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `as_kepsek` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, NULL, 'Home', 'home', '<p>Halaman Utama Website<br></p>', 'Y', NULL, 'N', '', 'N', 'N');
INSERT INTO `menu` VALUES (10, NULL, 'Contact', 'contact', '', 'Y', NULL, 'N', '', 'N', 'N');
INSERT INTO `menu` VALUES (11, NULL, 'Chat Us', 'https://api.whatsapp.com/send?phone=6289612562019&text=Halo%20Admin,%20Saya%20Membutuhkan%20Informasi%20Aplikasi%20Go%20School%20ini', '', 'Y', NULL, 'N', '', 'N', 'N');
INSERT INTO `menu` VALUES (13, NULL, 'Pages', 'configuration', '', 'N', NULL, 'Y', 'fa fa-check-circle', 'N', 'N');
INSERT INTO `menu` VALUES (14, 13, 'Services', 'services', NULL, 'Y', NULL, 'Y', 'fa fa-cog', 'N', 'N');
INSERT INTO `menu` VALUES (17, 13, 'Header', 'slide', '', 'Y', NULL, 'Y', 'fa fa-picture-o', 'N', 'N');
INSERT INTO `menu` VALUES (18, NULL, 'Settings', '', NULL, 'Y', NULL, 'Y', 'fa fa-wrench', 'N', 'N');
INSERT INTO `menu` VALUES (19, 18, 'Karyawan', 'employee', '', 'Y', NULL, 'Y', 'fa fa-users', 'N', 'N');
INSERT INTO `menu` VALUES (20, 18, 'Pengguna', 'users', '', 'Y', NULL, 'Y', 'fa fa-key', 'N', 'N');
INSERT INTO `menu` VALUES (21, 18, 'Company', 'company', NULL, 'Y', NULL, 'Y', 'fa fa-building', 'N', 'N');
INSERT INTO `menu` VALUES (22, 18, 'Category', 'category', '', 'N', NULL, 'Y', 'fa fa-navicon', 'N', 'N');
INSERT INTO `menu` VALUES (23, 18, 'Menu', 'menu', NULL, 'Y', NULL, 'Y', 'fa fa-picture-o', 'N', 'N');
INSERT INTO `menu` VALUES (40, NULL, 'Master', '', '', 'Y', NULL, 'Y', 'fa fa-cog', 'N', 'N');
INSERT INTO `menu` VALUES (60, 40, 'Data Jurusan', 'data_jurusan', '', 'Y', NULL, 'Y', 'fa fa-chevron-right', 'N', 'N');
INSERT INTO `menu` VALUES (61, 40, 'Data Kelas', 'data_kelas', '', 'Y', NULL, 'Y', 'fa fa-university', 'N', 'N');
INSERT INTO `menu` VALUES (62, 40, 'Data Siswa', 'data_siswa', '', 'Y', NULL, 'Y', 'fa fa-group', 'N', 'N');
INSERT INTO `menu` VALUES (63, 40, 'Data Mata Pelajaran', 'data_mapel', '', 'Y', NULL, 'Y', 'fa fa-book', 'N', 'N');
INSERT INTO `menu` VALUES (64, 40, 'Data Guru', 'data_guru', '', 'Y', NULL, 'Y', 'fa fa-users', 'N', 'N');
INSERT INTO `menu` VALUES (65, 40, 'Data Ruangan', 'data_ruangan', '', 'Y', NULL, 'Y', 'fa fa-university', 'N', 'N');
INSERT INTO `menu` VALUES (66, 67, 'Data Kelas Mengajar', 'data_ajar', '', 'Y', NULL, 'Y', 'fa fa-book', 'N', 'N');
INSERT INTO `menu` VALUES (67, NULL, 'Mengajar', '', '', 'Y', NULL, 'Y', 'fa fa-university', 'N', 'N');
INSERT INTO `menu` VALUES (68, 67, 'Data Siswa Ajar', 'data_ajar_siswa', '', 'Y', NULL, 'Y', 'fa fa-users', 'N', 'N');
INSERT INTO `menu` VALUES (69, NULL, 'Absen', '', '', 'Y', NULL, 'Y', 'fa fa-hand-paper-o', 'Y', 'N');
INSERT INTO `menu` VALUES (70, 69, 'Absen Siswa', 'data_absen_siswa', '', 'Y', NULL, 'Y', 'fa fa-user-plus', 'Y', 'N');
INSERT INTO `menu` VALUES (71, 69, 'Laporan Absen Siswa', 'data_laporan_absen_siswa', '<p>        <br></p>', 'Y', NULL, 'Y', 'fa fa-sticky-note-o', 'N', 'N');
INSERT INTO `menu` VALUES (72, 18, 'Data Modem', 'data_modem', '', 'Y', 'assets/images/compro/slider-default.jpg', 'Y', 'fa fa-signal', 'N', 'N');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_read` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (1, 'asdasd', 'asd', 'asdad@gmail.com', 'asdasd', 'asdasd', 'N', '2020-03-04 22:53:40');
INSERT INTO `message` VALUES (2, 'asd', 'asd', 'didendiko@gmail.com', 'asdsad', 'asdasdasd', 'N', '2020-03-04 22:54:55');
INSERT INTO `message` VALUES (3, 'asdasdas', 'asdasd', 'asdad@gmail.com', 'asd', 'asdasd', 'N', '2020-03-04 22:56:42');
INSERT INTO `message` VALUES (4, 'asdsa', 'sads', 'alomnusind@gmail.com', 'asdasdsa', 'asdweqwdasd', 'N', '2020-03-04 22:57:11');

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `is_view` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of notification
-- ----------------------------

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `is_active` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of position
-- ----------------------------

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NULL DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `short_description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `menu_id` int NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 4, 'Bantuan & Support', 'Kami Siap Memberikan Bantuan dan Support Bagi Siapa Saja Yang Membutuhkan', 'berpengalaman di bidang pemasangan pendingin udara<br>', 'assets/images/compro/icon/worker.png', 1, 'Y', 2, 'flaticon-charity');
INSERT INTO `services` VALUES (2, 5, 'Donasi', 'Kami Tidak Membuka Donasi, Namun Anda Dapat Langsung Memberikan Bantuan Kepada Yang Membutuhkan', 'Kaiqian Smart Parking', 'assets/images/compro/icon/insurance.png', 2, 'Y', 5, 'flaticon-adoption');
INSERT INTO `services` VALUES (3, 6, 'Donatur', 'Keamanan dan Kerahasian Data Donatur', 'Pemeliharaan dan perbaikan pekerjaan di bidang mekanikal dan elektrikal', 'assets/images/compro/icon/setting.png', 3, 'Y', 6, 'flaticon-volunteer');

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ori_password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sub_group` int NOT NULL,
  `is_active` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES (1, 'admin', '05962b1a8d2e2153db9c2facf89504532b901aa6', 'asd', 1, 'Y');
INSERT INTO `user_detail` VALUES (6, 'didendiko@gmail.com', '03809f03303b06333ee933446e43c53d821ee932', 'asd', 3, 'Y');
INSERT INTO `user_detail` VALUES (7, 'ilfan@gmail.com', 'a13b1b61cac4e7227f6cbc4ce7ba042f5e5a33ae', 'asd', 3, 'Y');
INSERT INTO `user_detail` VALUES (8, 'insen@gmail.com', 'd47b2a6990f75ba8cdd8e81e49ce1dbca71ed1a2', 'asd', 3, 'Y');

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 'Administrators', 'Administrators', 1, 'Y');
INSERT INTO `user_group` VALUES (2, 'Kepala Sekolah', 'Kepala Sekolah', 2, 'Y');
INSERT INTO `user_group` VALUES (3, 'Guru', 'Guru', 3, 'Y');
INSERT INTO `user_group` VALUES (4, 'Operator', 'Operator', 1, 'Y');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int NOT NULL,
  `role` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'administrator');
INSERT INTO `user_role` VALUES (2, 'member');

-- ----------------------------
-- Table structure for user_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_group`;
CREATE TABLE `user_sub_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `group_id` int NOT NULL,
  `seq` int NOT NULL DEFAULT 1,
  `is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_sub_group
-- ----------------------------
INSERT INTO `user_sub_group` VALUES (1, 'Super Administrators', 'Super Administrators', 1, 1, 'Y');
INSERT INTO `user_sub_group` VALUES (2, 'Kepala Sekolah', 'Kepala Sekolah', 2, 1, 'Y');
INSERT INTO `user_sub_group` VALUES (3, 'Guru', 'Guru', 3, 1, 'Y');
INSERT INTO `user_sub_group` VALUES (4, 'Operator', 'Operator', 4, 1, 'Y');

SET FOREIGN_KEY_CHECKS = 1;
