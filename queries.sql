-- Creating Databse
CREATE DATABASE registration;

-- Creating Tables
CREATE TABLE adminregist (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    mobileno bigint NOT NULL,
    passwrd varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE answer (
    id int NOT NULL AUTO_INCREMENT,
    qid int(255) NOT NULL,
    userans varchar(400) NOT NULL,
    testid bigint NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE category (
    catid int NOT NULL AUTO_INCREMENT,
    catename varchar(255) NOT NULL,
    PRIMARY KEY (catid)
);
CREATE TABLE facultyregist (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    mobileno bigint NOT NULL,
    passwrd varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE preresults (
    reportid int NOT NULL AUTO_INCREMENT,
    userid bigint(255) NOT NULL,
    sessnid bigint(255) NOT NULL,
    score bigint NOT NULL,
    PRIMARY KEY (reportid)
);
CREATE TABLE questiontab (
    id int NOT NULL AUTO_INCREMENT,
    question varchar(2000) NOT NULL,
    opt1 varchar(400) NOT NULL,
    opt2 varchar(400) NOT NULL,
    opt3 varchar(400) NOT NULL,
    opt4 varchar(400) NOT NULL,
    answer varchar(400) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE regist (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    branch varchar(255) NOT NULL,
    semester varchar(255) NOT NULL,
    mobileno bigint NOT NULL,
    passwrd varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE sessntab (
    idd int NOT NULL AUTO_INCREMENT,
    userid bigint(255) NOT NULL,
    token varchar(255) NOT NULL,
    PRIMARY KEY (idd)
);
CREATE TABLE shedtab (
    id int NOT NULL AUTO_INCREMENT,
    date varchar(255) NOT NULL,
    branch varchar(255) NOT NULL,
    semester varchar(255) NOT NULL,
    subject varchar(255) NOT NULL,
    PRIMARY KEY (id)
);