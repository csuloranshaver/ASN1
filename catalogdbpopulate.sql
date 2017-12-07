USE CSU_Info_DB;

INSERT INTO instructor VALUES
(1, 'Fleenor', 'Hillary', 'G'),
(2, 'Rogers', 'Neal', 'L'),
(3, 'Summers', 'Wayne', 'C')
;

INSERT INTO term VALUES
(1, 'Summer 2017', '2017-06-12', '2017-07-27'),
(2, 'Fall 2017', '2017-08-14', '2017-12-04'),
(3, 'Spring 2018', '2018-01-22', '2018-05-04')
;

INSERT INTO subject VALUES
(1, 'Computer Science', 'CPSC'),
(2, 'Accounting', 'ACCT'),
(3, 'Chemistry', 'CHEM')
;

INSERT INTO course VALUES
(1, 'Computer Science I', 'Introductory Computer Science course', 1, '1301', 'Lecture', 3),
(2, 'Structure Programming-Cobol I', 'Introduction to programming in COBOL', 1, '3111', 'Lecture', 3),
(3, 'Mainframe Basics and JCL', 'Introduction to mainframes and JCL programming', 1, '3116', 'Lecture', 3)
;

INSERT INTO section VALUE
(1, 82785, 01, 'CCT 405', 'MWF', '14:00:00', '15:00:00', '2017-08-14', '2017-12-11', 1, 2, 1),
(2, 80698, 03, 'CCT 405', 'TR', '13:30:00', '14:45:00', '2017-08-14', '2017-12-11', 3, 2, 1),
(3, 80323, 02, 'CCT 406', 'TR', '13:30:00', '14:45:00', '2017-08-14', '2017-12-11', 2, 2, 2),
(4, 80375, 01, 'CCT 406', 'MW', '12:30:00', '17:45:00', '2017-08-14', '2017-12-11', 2, 2, 3)
;