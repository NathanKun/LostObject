DROP DATABASE IF EXISTS LostObjects;
CREATE DATABASE IF NOT EXISTS LostObjects;
USE LostObjects;

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
  usr_pw VARCHAR(50) NOT NULL,
  usr_name VARCHAR(50) NOT NULL,
  usr_level INT(1) NOT NULL,
  PRIMARY KEY(usr_id)
);

CREATE TABLE IF NOT EXISTS object_obj(
  obj_id INT NOT NULL AUTO_INCREMENT,
  obj_name VARCHAR(50) NOT NULL,
  obj_description VARCHAR(500),
  obj_photofilename VARCHAR(50),
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
('dev', 'a', 'a', 3),
('admin', 'bb', 'bb', 2),
('student', 'ccc', 'ccc', 1),
('level', 'a', 'incorrect', 4),
('db', 'db', 'db', 99);

INSERT INTO `object_obj` (`obj_name`, `obj_description`, `obj_photofilename`) VALUES
('obj1', 'this is the first object of the world', '1.jpeg'),
('obj2', 'this is the second object of the world', '2.jpeg'),
('obj3', 'this is the third object of the world', '3.jpeg'),
('obj4', 'this is the fouth object of the world', '4.jpeg'),
('obj5', 'this is the fifth object of the world', '5.jpeg'),
('obj6', 'this is the sixth object of the world', '6.jpeg'),
('obj7', 'this is the seventh object of the world', '7.jpeg'),
('obj8', 'this is the eighth object of the world', '8.jpeg'),
('obj9', 'this is the ninth object of the world', '9.jpeg'),
('obj10', 'object 10', '10.jpeg'),
('obj11', 'object 11', '11.jpeg'),
('obj12', 'object 12', '12.jpeg');

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