DROP DATABASE IF EXISTS db_project;
CREATE DATABASE db_project; 
USE db_project;


CREATE TABLE IF NOT EXISTS newspaper (
	paper_name VARCHAR(255) NOT NULL,
    paper_frequency ENUM('daily','weekly','monthly'),
    paper_owner VARCHAR(255) NOT NULL,
    PRIMARY KEY (paper_name)
);

CREATE TABLE IF NOT EXISTS paper_issue (
	issue_name VARCHAR(255) NOT NULL,
    issue_num INT NOT NULL AUTO_INCREMENT,
    issue_pages INT DEFAULT 30 NOT NULL,
    issue_date DATE NOT NULL,
    issue_space ENUM('Yes', 'No'),
    PRIMARY KEY (issue_num),
    CONSTRAINT ISINNEWSPAPER
    FOREIGN KEY(issue_name) REFERENCES newspaper(paper_name)
	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS category (
	cat_id INT NOT NULL AUTO_INCREMENT,
    cat_name VARCHAR(255) NOT NULL,
    cat_desc TINYTEXT,
    cat_isparental ENUM('yes', 'no'),
    PRIMARY KEY(cat_id)
);

CREATE TABLE IF NOT EXISTS article (
	ar_path VARCHAR(255) NOT NULL,
    ar_title VARCHAR(255) NOT NULL,
	ar_preview TEXT NOT NULL,
    ar_issue_num INT NOT NULL,
    ar_cat_id INT,
    ar_check ENUM ('yes', 'no'),
    ar_pages INT NOT NULL,
    PRIMARY KEY (ar_path),
    CONSTRAINT INCATEGORY
    FOREIGN KEY(ar_cat_id) REFERENCES category(cat_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT ISINPAPER
    FOREIGN KEY(ar_issue_num) REFERENCES paper_issue(issue_num)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS ar_key_word (
	key_path VARCHAR(255) DEFAULT 'unkown' NOT NULL,
    key_word VARCHAR(255) DEFAULT 'unknown' NOT NULL,
    FOREIGN KEY (key_path) REFERENCES article(ar_path)
    ON DELETE CASCADE ON UPDATE CASCADE    
);


CREATE TABLE IF NOT EXISTS worker (
    wr_first_name VARCHAR(255) NOT NULL,
    wr_last_name VARCHAR(255) NOT NULL,
    wr_email VARCHAR(255) NOT NULL,
    wr_hire_date DATE NOT NULL,
    wr_papername VARCHAR(255) NOT NULL,
    wr_salary INT NULL,
    PRIMARY KEY(wr_email),
    CONSTRAINT WORKSINEWSPAPER
    FOREIGN KEY(wr_papername) REFERENCES newspaper(paper_name)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS administrator ( 
	ad_mail VARCHAR(255) NOT NULL,
    ad_resp ENUM('Secretary', 'Logistics'),
    ad_adress_city VARCHAR(255) NOT NULL,
    ad_adress_street VARCHAR(255) NOT NULL,
    ad_adress_number SMALLINT NOT NULL,
    PRIMARY KEY(ad_mail),
    CONSTRAINT 
    FOREIGN KEY(ad_mail) REFERENCES worker(wr_email)
    ON DELETE CASCADE ON UPDATE CASCADE    
);

CREATE TABLE IF NOT EXISTS phones (
	ph_mail VARCHAR(255) NOT NULL,
    ph_number BIGINT,
    PRIMARY KEY(ph_number, ph_mail),
    CONSTRAINT ADMINPHONE
    FOREIGN KEY (ph_mail) REFERENCES administrator(ad_mail)
    ON DELETE CASCADE ON UPDATE CASCADE    
);

CREATE TABLE IF NOT EXISTS reporter (
	rep_mail VARCHAR(255) NOT NULL,
    rep_experience INT NOT NULL,
    rep_bio TEXT NOT NULL,
    PRIMARY KEY(rep_mail),
    FOREIGN KEY(rep_mail) REFERENCES worker(wr_email)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS submit (
	sub_rep_mail VARCHAR(255) NOT NULL,
    sub_ar_path VARCHAR(255) NOT NULL,
    sub_date DATE NOT NULL,
    PRIMARY KEY(sub_ar_path),
    CONSTRAINT SUBMITARTICLE
    FOREIGN KEY(sub_ar_path) REFERENCES article(ar_path)
    ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT MAILOFSUBER
    FOREIGN KEY(sub_rep_mail) REFERENCES reporter(rep_mail)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS publisher(
	pub_mail VARCHAR(255) NOT NULL,
    pub_papername VARCHAR(255) NOT NULL,
    PRIMARY KEY (pub_mail),
    FOREIGN KEY (pub_mail) REFERENCES worker(wr_email)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(pub_papername) REFERENCES newspaper(paper_name)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS chiefeditor(
	chief_mail VARCHAR(255) NOT NULL,
    chief_ar_path VARCHAR(255) NOT NULL,
    PRIMARY KEY(chief_mail),
    FOREIGN KEY(chief_mail) REFERENCES worker(wr_email)
    ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT CHECKSARTICLE
    FOREIGN KEY(chief_ar_path) REFERENCES article(ar_path)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS chiefeditordecision(
	decision_type ENUM('approved', 'declined') NOT NULL,
    dec_ar_position TINYTEXT NULL,
    dec_ar_path VARCHAR(255) NOT NULL,
    dec_chief_mail VARCHAR(255) NOT NULL,
    FOREIGN KEY (dec_chief_mail) REFERENCES chiefeditor(chief_mail)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (dec_ar_path) REFERENCES article(ar_path)
    ON DELETE CASCADE ON UPDATE CASCADE
);

