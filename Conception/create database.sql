DROP TABLE objectDeclared_ojd;
DROP TABLE objectfound_ojf;
DROP TABLE objet_obj;
DROP TABLE user_usr;

CREATE TABLE user_usr (
    usr_id VARCHAR2(50) CONSTRAINT PK_usr PRIMARY KEY,
    usr_pw VARCHAR2(50) NOT NULL,
    usr_name VARCHAR(50) NOT NULL,
	usr_level NUMBER(1) NOT NULL
);

CREATE TABLE objet_obj (
	obj_id NUMBER CONSTRAINT PK_obj PRIMARY KEY,
	obj_name VARCHAR(50) NOT NULL,
	obj_description VARCHAR2(500),
	obj_photofilename VARCHAR2(50)
);

CREATE TABLE objectDeclared_ojd (
  ojd_id NUMBER CONSTRAINT PK_ojd PRIMARY KEY,
	ojd_obj_id NUMBER,
  ojd_declarationdate DATE DEFAULT SYSDATE,
	ojd_declarer VARCHAR2(50),
	CONSTRAINT FK_ojd_objid FOREIGN KEY (ojd_obj_id) REFERENCES objet_obj (obj_id),
	CONSTRAINT FK_ojd_declarer FOREIGN KEY (ojd_declarer) REFERENCES user_usr (usr_id)
);

CREATE TABLE objectFound_ojf (
  ojf_id NUMBER CONSTRAINT pk_ojf PRIMARY KEY,
	ojf_obj_id NUMBER,
  ojf_adddate DATE DEFAULT SYSDATE,
	ojf_adder VARCHAR2(50),
	CONSTRAINT FK_ojf_objid FOREIGN KEY (ojf_obj_id) REFERENCES objet_obj (obj_id),
	CONSTRAINT FK_ojf_adder FOREIGN KEY (ojf_adder) REFERENCES user_usr (usr_id)
);