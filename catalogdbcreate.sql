DROP DATABASE IF EXISTS CSU_Info_DB;
CREATE DATABASE CSU_Info_DB;
USE CSU_Info_DB;

CREATE TABLE instructor (
  instructorID	   INT(11)       NOT NULL	AUTO_INCREMENT,
  lastName         VARCHAR(20)   NOT NULL,
  firstName        VARCHAR(20)   NOT NULL,
  middleName       VARCHAR(20),
  PRIMARY KEY (instructorID)
);

CREATE TABLE term (
  termID		   INT(11)       NOT NULL	AUTO_INCREMENT,
  label            VARCHAR(20)   NOT NULL,
  startDate        DATE		     NOT NULL,
  endDate          DATE			 NOT NULL,
  PRIMARY KEY (termID)
);

CREATE TABLE subject (
  subjectID	   	   INT(11)       NOT NULL	AUTO_INCREMENT,
  subjectName      VARCHAR(40)   NOT NULL,
  subjectAbbr      VARCHAR(4)  	 NOT NULL,
  PRIMARY KEY (subjectID)
);

CREATE TABLE course (
  courseID		   INT(11)       NOT NULL	AUTO_INCREMENT,
  title            VARCHAR(50)   NOT NULL,
  description      VARCHAR(255)  NOT NULL,
  subjectID	       INT(11)	     NOT NULL,
  subjectCode	   VARCHAR(10)   NOT NULL, /* Number for course as part of subject */
  courseType  	   VARCHAR(10)	 NOT NULL,
  creditHours      INT(1)		 NOT NULL,
  PRIMARY KEY (courseID),
  FOREIGN KEY (subjectID) REFERENCES subject(subjectID)
);

CREATE TABLE section (
  sectionID		   INT(11)       NOT NULL	AUTO_INCREMENT,
  crn		       INT(5)	     NOT NULL,
  sectionNum       INT(2)	     NOT NULL,
  location         VARCHAR(30)   NOT NULL,
  days	           VARCHAR(7)    NOT NULL,
  startTime        TIME, /* Should only be null for online courses. */
  endTime		   TIME, /* Should only be null for online courses. */
  startDate		   DATE, /* May differ from term date. Null is meant to be a sign to overwrite with term date. */
  endDate		   DATE, /* May differ from term date. Null is meant to be a sign to overwrite with term date. */
  instructorID	   INT(11)       NOT NULL,
  termID		   INT(11)       NOT NULL,
  courseID		   INT(11)       NOT NULL,
  PRIMARY KEY (sectionID),
  FOREIGN KEY (instructorID) REFERENCES instructor(instructorID),
  FOREIGN KEY (termID) REFERENCES term(termID),
  FOREIGN KEY (courseID) REFERENCES course(courseID)
);