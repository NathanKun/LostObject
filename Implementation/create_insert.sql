USE bddgr1003;

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
  obj_adddate DATETIME,
  /*1 for normal
	2 for a found object returned or a lost object found
	3 for abandonned */
  obj_stat INT DEFAULT 1,
  PRIMARY KEY(obj_id)
);

CREATE TABLE IF NOT EXISTS objectDeclared_ojd(
  ojd_id INT NOT NULL AUTO_INCREMENT,
  ojd_obj_id INT,
  ojd_declarer VARCHAR(50),
  PRIMARY KEY (ojd_id),
  FOREIGN KEY(ojd_obj_id) REFERENCES object_obj(obj_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(ojd_declarer) REFERENCES user_usr(usr_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS objectFound_ojf(
  ojf_id INT NOT NULL AUTO_INCREMENT,
  ojf_obj_id INT,
  ojf_adder VARCHAR(50),
  PRIMARY KEY(ojf_id),
  FOREIGN KEY(ojf_obj_id) REFERENCES object_obj(obj_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(ojf_adder) REFERENCES user_usr(usr_id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO `user_usr` (`usr_id`, `usr_pw`, `usr_name`, `usr_level`) VALUES
('dev', '$2y$10$Oy0uHvxD1nyIEmQTkbjeqeClZ5ZCMTXqpdKoKOV4uZB33QXvy/g/W', 'dev', 3),
('admin1', '$2y$10$ev3.0MQZpL16.Af1M/YH/Ou9otz1cpnN6Ih.ccuxsUK2Na6fjGJri', 'admin1', 2),
('admin2', '$2y$10$9NRUntJe53ooyOVrnjYzC.xujFqJW./C67u5k3eWHPbVPsGr9.rKy', 'admin2', 2),
('student1', '$2y$10$iHZaFtI/HrNBDj5jPE59reNZ0j9qCItY4lTkfw5WHSw1urlCi.oaW', 'student1', 1),
('student2', '$2y$10$31OwHoWRHTEFtVaoNbsDiO43yXbM5dOHFx7gHCzAnQ5RbIF3eGWzy', 'student2', 1),
('level', '$2y$10$fPnTT6ui9z3ydn4FUMRPwum4c8HYktRhS..a36jVViKSZEeQdEqNS', 'incorrect', 4),
('db', '$2y$10$MIGMsKFJ2ztYmJVVtpLIl.mGSn.Pd6CJsWCDr5A0mlzy/4DUCPGYq', 'db', 99);

INSERT INTO `object_obj` (`obj_name`, `obj_description`, `obj_photofilename`, `obj_adddate`, `obj_stat`) VALUES
('obj1', 'this is the first object of the world', '1.jpeg', now(), 1),
('obj2', 'this is the second object of the world', '2.jpeg', '20120304', 1),
('obj3', 'this is the third object of the world', '3.jpeg', '2014-12-01 12:34:56', 1),
('obj4', 'this is the fouth object of the world', '4.jpeg', now(), 1),
('obj5', 'this is the fifth object of the world', '5.jpeg', '20120304', 1),
('obj6', 'this is the sixth object of the world', '6.jpeg', '1234-12-12 12:12:12', 1),
('obj7', 'this is the seventh object of the world', '7.jpeg', now(), 1),
('obj8', 'this is the eighth object of the world', '8.jpeg', STR_TO_DATE('10/24/11 10:00 PM','%m/%d/%Y %h:%i %p'), 1),
('obj9', 'this is the ninth object of the world', '9.jpeg', '2016-07-08 12:34:56', 1),
('obj10', 'object 10', '10.jpeg', now(), 1),
('obj11', 'object 11', '11.jpeg', STR_TO_DATE('07/10/94 05:06:07 PM','%m/%d/%Y %h:%i:%s %p'), 1),
('obj12', 'object 12', '12.jpeg', '4321-12-21 11:11:11', 1);

INSERT INTO `objectfound_ojf` (`ojf_obj_id`, `ojf_adder`) VALUES
(1, 'admin2'),
(3, 'admin2'),
(5, 'admin1'),
(7, 'admin1'),
(11, 'admin1'),
(12, 'admin2');

INSERT INTO `objectdeclared_ojd` (`ojd_obj_id`, `ojd_declarer`) VALUES
(2, 'student1'),
(4, 'student2'),
(6, 'student1'),
(8, 'student1'),
(9, 'student2'),
(10, 'student2');