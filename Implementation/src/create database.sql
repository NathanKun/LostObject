DROP DATABASE IF EXISTS LostObjects;
CREATE DATABASE IF NOT EXISTS LostObjects;
USE LostObjects;

#USE bddgr1003;

DROP TABLE IF EXISTS
  objectDeclared_ojd;
DROP TABLE IF EXISTS
  objectfound_ojf;
DROP TABLE IF EXISTS
  object_obj;
DROP TABLE IF EXISTS
  user_usr;
  
CREATE TABLE IF NOT EXISTS user_usr(
  usr_id VARCHAR(50),
  usr_pw VARCHAR(255) NOT NULL,
  usr_name VARCHAR(50) NOT NULL,
  usr_level INT(1) NOT NULL,
  PRIMARY KEY(usr_id)
);

CREATE TABLE IF NOT EXISTS object_obj(
  obj_id INT NOT NULL AUTO_INCREMENT,
  obj_name VARCHAR(50) NOT NULL,
  obj_description VARCHAR(500),
  obj_photofilename VARCHAR(50),
  /*1 for normal
	2 for a found object returned or a lost object found
	3 for abandonned */
  obj_stat INT NOT NULL,
  PRIMARY KEY(obj_id)
);

CREATE TABLE IF NOT EXISTS objectDeclared_ojd(
  ojd_id INT NOT NULL AUTO_INCREMENT,
  ojd_obj_id INT,
  ojd_declarationdate DATETIME,
  ojd_declarer VARCHAR(50),
  PRIMARY KEY (ojd_id),
  FOREIGN KEY(ojd_obj_id) REFERENCES object_obj(obj_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(ojd_declarer) REFERENCES user_usr(usr_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS objectFound_ojf(
  ojf_id INT NOT NULL AUTO_INCREMENT,
  ojf_obj_id INT,
  ojf_adddate DATETIME,
  ojf_adder VARCHAR(50),
  PRIMARY KEY(ojf_id),
  FOREIGN KEY(ojf_obj_id) REFERENCES object_obj(obj_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(ojf_adder) REFERENCES user_usr(usr_id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO `user_usr` (`usr_id`, `usr_pw`, `usr_name`, `usr_level`) VALUES
('dev', '$2y$10$jwEw6wuhr2okIkQSMgB0G.x5HLV0vvF9vqOLu5XY1tmK5.ihCTK6G', 'a', 3),
('admin', '$2y$10$KXGMt7tHyAVwwMBZKbIlquN.9lhpQ1COB4EVGjNqqrVoKfIlAq46y', 'bb', 2),
('student', '$2y$10$YVoZAa0AWbnk.sj6Jem.I.kIqSVk0OKOLWG11r/B1jqoa.SzYz0aC', 'ccc', 1),
('level', 'a', 'incorrect', 4),
('db', 'db', 'db', 99);

INSERT INTO `object_obj` (`obj_name`, `obj_description`, `obj_photofilename`, `obj_stat`) VALUES
('obj1', 'this is the first object of the world', '1.jpeg', 1),
('obj2', 'this is the second object of the world', '2.jpeg', 1),
('obj3', 'this is the third object of the world', '3.jpeg', 1),
('obj4', 'this is the fouth object of the world', '4.jpeg', 1),
('obj5', 'this is the fifth object of the world', '5.jpeg', 1),
('obj6', 'this is the sixth object of the world', '6.jpeg', 1),
('obj7', 'this is the seventh object of the world', '7.jpeg', 1),
('obj8', 'this is the eighth object of the world', '8.jpeg', 1),
('obj9', 'this is the ninth object of the world', '9.jpeg', 1),
('obj10', 'object 10', '10.jpeg', 1),
('obj11', 'object 11', '11.jpeg', 1),
('obj12', 'object 12', '12.jpeg', 1);

INSERT INTO `objectfound_ojf` (`ojf_obj_id`, `ojf_adddate`, `ojf_adder`) VALUES
(1, now(), 'dev'),
(3, '20120304', 'student'),
(5, '2014-12-01 12:34:56', 'admin'),
(7, now(), 'dev'),
(11, '20120304', 'student'),
(12, '1234-12-12 12:12:12', 'admin');

INSERT INTO `objectdeclared_ojd` (`ojd_obj_id`, `ojd_declarationdate`, `ojd_declarer`) VALUES
(2, now(), 'student'),
(4, STR_TO_DATE('10/24/11 10:00 PM','%m/%d/%Y %h:%i %p'), 'dev'),
(6, '2016-07-08 12:34:56', 'admin'),
(8, now(), 'student'),
(9, STR_TO_DATE('07/10/94 05:06:07 PM','%m/%d/%Y %h:%i:%s %p'), 'dev'),
(10, '4321-12-21 11:11:11', 'admin');