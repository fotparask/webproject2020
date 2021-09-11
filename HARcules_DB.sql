DROP DATABASE IF EXISTS harcules_database;
CREATE DATABASE IF NOT EXISTS harcules_database; 
USE harcules_database;

CREATE TABLE IF NOT EXISTS users (
    userid INT(255) NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    is_admin TINYINT(1) NOT NULL,
    PRIMARY KEY (userid) 
);

CREATE TABLE IF NOT EXISTS har_files ( 
	harID INT(255) NOT NULL AUTO_INCREMENT,
    harUserID INT(255) NOT NULL,
	harUploadDate DATE NOT NULL,
	numEntries INT(255) NOT NULL,
	PRIMARY KEY(harID),
    FOREIGN KEY (harUserID) REFERENCES users(userid) 
);

CREATE TABLE IF NOT EXISTS entries (
	entryID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL, 
    serverIPAddress VARCHAR(255) NOT NULL, 
    timings_wait DATETIME NOT NULL, 
    startedDateTime DATE NOT NULL,
    PRIMARY KEY(entryID),
    FOREIGN KEY (harID) REFERENCES har_files(harID)
);

CREATE TABLE IF NOT EXISTS request (
	requestID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL,
    method VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    headers VARCHAR(255) NOT NULL,
    PRIMARY KEY(requestID),
    FOREIGN KEY (harID) REFERENCES har_files(harID)
);

CREATE TABLE IF NOT EXISTS response (
	responseID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL,
    res_status VARCHAR(255) NOT NULL,
    statusText VARCHAR(255) NOT NULL,
    headers VARCHAR(255) NOT NULL,
    PRIMARY KEY(responseID),
    FOREIGN KEY (harID) REFERENCES har_files(harID)
);

CREATE TABLE IF NOT EXISTS headers (
	headerID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL,
    content_type VARCHAR(255) NOT NULL,
	cache_control VARCHAR(255) NOT NULL, 
	pragma VARCHAR(255) NOT NULL, 
	expires DATE NOT NULL,
	age DATE NOT NULL,
	last_modified DATE NOT NULL,
	head_host VARCHAR(255) NOT NULL,
    PRIMARY KEY(headerID),
    FOREIGN KEY (harID) REFERENCES har_files(hardID)
);