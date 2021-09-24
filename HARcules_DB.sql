DROP DATABASE IF EXISTS harcules_database;
CREATE DATABASE IF NOT EXISTS harcules_database; 
USE harcules_database;

CREATE TABLE IF NOT EXISTS users (
    userid INT(255) NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (userid) 
);

CREATE TABLE IF NOT EXISTS har_files ( 
	harID INT(255) NOT NULL AUTO_INCREMENT,
    harUserID INT(255) NOT NULL, 
	harUploadDate DATETIME NOT NULL DEFAULT current_timestamp(),
	numEntries INT(255) NOT NULL,
	PRIMARY KEY(harID),
    FOREIGN KEY (harUserID) REFERENCES users(userid) 
);

CREATE TABLE IF NOT EXISTS entries (
	entryID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL, 
    serverIPAddress VARCHAR(255) NOT NULL, 
    timings_wait DOUBLE NOT NULL, 
    startedDateTime VARCHAR(255) NOT NULL,
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
    statusText TEXT NULL DEFAULT NULL,
    PRIMARY KEY(responseID),
    FOREIGN KEY (harID) REFERENCES har_files(harID)
);

CREATE TABLE IF NOT EXISTS headers (
	headerID INT(255) NOT NULL AUTO_INCREMENT,
    harID INT(255) NOT NULL,
    requestID INT(255) NULL DEFAULT NULL,
    responseID INT(255) NULL DEFAULT NULL,
    content_type VARCHAR(255) NULL DEFAULT NULL,
	cache_control VARCHAR(255) NULL DEFAULT NULL, 
	pragma VARCHAR(255) NULL DEFAULT NULL, 
	expires VARCHAR(255) NULL DEFAULT NULL,
	age VARCHAR(255) NULL DEFAULT NULL,
	last_modified VARCHAR(255) NULL DEFAULT NULL,
	head_host VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY(headerID),
    FOREIGN KEY (harID) REFERENCES har_files(harID),
    FOREIGN KEY (requestID) REFERENCES request(requestID),
    FOREIGN KEY (responseID) REFERENCES response(responseID)
);