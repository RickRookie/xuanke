

-- --------------------------------------------------------
-- 
-- 表的结构 `admin`
-- 
CREATE TABLE `admin` ( 
`aid` INT(6) NOT NULL ,
 `apwd` INT(12) NOT NULL ,
 PRIMARY KEY (`aid`))ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`aid`, `apwd`) VALUES 
('1111111', '7758'),
('1111', '1111');
CREATE TABLE `class` (
  `ClassNo` char(3) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `TeaNo` char(8) NOT NULL,
  PRIMARY KEY  (`ClassNo`),
  KEY `DepartNo` (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `class`
-- 

INSERT INTO `class` (`ClassNo`, `DepartNo`, `TeaNo`) VALUES 
('A01', '01', '00000001'),
('A02', '01', '00000002'),
('B01', '02', '00000003'),
('B02', '02', '00000007');

-- --------------------------------------------------------

-- 
-- 表的结构 `course`
-- 

CREATE TABLE `course` (
  `CouNo` char(3) NOT NULL,
  `CouName` char(30) NOT NULL,
  `Kind` char(8) NOT NULL,
  `Credit` decimal(5,0) NOT NULL,
  `Teacher` char(20) NOT NULL,
  `TeaNo` char(8) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `SchoolTime` char(10) NOT NULL,
  `LimitNum` decimal(5,0) NOT NULL,
  PRIMARY KEY  (`CouNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `course`
-- 

INSERT INTO `course` (`CouNo`, `CouName`, `Kind`, `Credit`, `Teacher`, `TeaNo`, DepartNo`, `SchoolTime`, `LimitNum`) VALUES
('002', 'JAVA技术的开发应用', '信息技术', 3, '王彰', '00000001', '01','周二5-6节', 10),
('004', 'Linux操作系统', '信息技术', 2, '陈冰', '00000008', '01','周二5-6节', 10),
('006', '现代管理学概论', '信息技术', 2, '陈维', '00000003', '03','周二3-4节', 10),
('023', '数据结构', '信息技术', 4, '孔兰菊', '00000010', '01','周五3-4节', 20),
('021', '软件工程', '信息技术', 3, '高晓成', '00000009', '01','周三4-5节', 10),
('018', '中餐菜肴制作', '人文', 2, '王振坤', '00000002', '02','周二6-7节', 5),
('019', '计算机网络', '信息技术', 4, '陈锋', '00000007', '02','周一1-2节', 30),
('003', '网络信息检索原理与技术', '信息技术', 2, '陈锋', '00000007', '02','周二晚', 10);



-- 
-- 表的结构 `department`
-- 

CREATE TABLE `department` (
  `DepartNo` char(2) NOT NULL,
  `DepartName` char(20) NOT NULL,
  PRIMARY KEY  (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `department`
-- 

INSERT INTO `department` (`DepartNo`, `DepartName`) VALUES 
('01', '计算机'),
('02', '土木工程'),
('03', '工商管理'),
('00', '文学院');

-- --------------------------------------------------------

-- 
-- 表的结构 `stucou`
-- 

CREATE TABLE `stucou` (
  `StuNo` char(8) NOT NULL,
  `CouNo` char(3) NOT NULL,
  `TeaNo` char(8) NOT NULL,
  `Grade` char(3) default NULL,
  PRIMARY KEY  (`StuNo`,`CouNo`),
  KEY `CouNo` (`CouNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `stucou`
-- 

INSERT INTO `stucou` (`StuNo`, `CouNo`, `TeaNo`, `Grade`) VALUES 
('17010002', '003', '00000007', NULL),
('17010001', '002', '00000001', NULL),
('17010001', '003', '00000007', NULL),
('17010001', '019', '00000007', NULL),
('17020001', '021', '00000009', NULL),
('17020001', '018', '00000002', NULL),
('17020002', '006', '00000003', NULL),
('17020001', '002', '00000003', NULL),
('17020002', '002', '00000001', NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `student`
-- 

CREATE TABLE `student` (
  `StuNo` char(8) NOT NULL,
  `ClassNo` char(3) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `StuName` char(10) NOT NULL,
  `Pwd` char(8) NOT NULL,
  PRIMARY KEY  (`StuNo`),
  KEY `ClassNo` (`ClassNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `student`
-- 

INSERT INTO `student` (`StuNo`, `ClassNo`, `DepartNo`,`StuName`, `Pwd`) VALUES 
('17020002', 'A02', '01', '慕容紫英', '7758'),
('17010002', 'A01', '01', '韩菱纱', '7758'),
('17020001', 'A02', '01', '云天河', '7758'),
('17010001', 'A01', '01', '柳梦璃', '7758');

-- --------------------------------------------------------

-- 
-- 表的结构 `teacher`
-- 

CREATE TABLE `teacher` (
  `TeaNo` char(8) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `TeaName` char(10) NOT NULL,
  `Pwd` char(8) NOT NULL,
  PRIMARY KEY  (`TeaNo`),
  KEY `DepartNo` (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `teacher`
-- 

INSERT INTO `teacher` (`TeaNo`, `DepartNo`, `TeaName`, `Pwd`) VALUES 
('00000001', '01', '王彰', '7758'),
('00000002', '02', '王振坤', 'wzk'),
('00000003', '03', '陈维', 'cw'),
('00000008', '02', '陈冰', '7758')
('00000007', '02', '陈锋', '7758');
