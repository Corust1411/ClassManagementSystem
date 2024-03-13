BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "assignment" (
	"assignment_id"	INTEGER,
	"assignment_title"	TEXT NOT NULL,
	"description"	TEXT NOT NULL,
	"file_attachment"	TEXT NOT NULL,
	"start_date"	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	"due_date"	DATETIME NOT NULL,
	"total_score"	INTEGER NOT NULL,
	"user_id"	INTEGER NOT NULL,
	"course_id"	INTEGER NOT NULL,
	"material_id"	INTEGER,
	PRIMARY KEY("assignment_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "attempts" (
	"attempts_id"	INTEGER,
	"total_score"	INTEGER NOT NULL,
	"starttime"	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	"endtime"	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	"quiz_id"	INTEGER NOT NULL,
	"student_id"	INTEGER NOT NULL,
	PRIMARY KEY("attempts_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "course" (
	"course_id"	INTEGER,
	"course_name"	TEXT NOT NULL,
	"course_description"	TEXT NOT NULL,
	"sec_id"	INTEGER NOT NULL,
	"credits"	INTEGER NOT NULL,
	"semester"	INTEGER NOT NULL,
	"year"	INTEGER NOT NULL,
	"course_image"	TEXT,
	PRIMARY KEY("course_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "faculty" (
	"faculty_id"	TEXT,
	"faculty_name"	TEXT,
	PRIMARY KEY("faculty_id")
);
CREATE TABLE IF NOT EXISTS "material" (
	"material_id"	INTEGER,
	"material_name"	TEXT NOT NULL,
	"course_id"	INTEGER NOT NULL,
	PRIMARY KEY("material_id")
);
CREATE TABLE IF NOT EXISTS "question" (
	"question_id"	INTEGER,
	"question_title"	TEXT NOT NULL,
	"choice"	TEXT NOT NULL,
	"answer"	TEXT NOT NULL,
	"score"	INTEGER NOT NULL,
	"quiz_id"	INTEGER NOT NULL,
	PRIMARY KEY("question_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "role" (
	"role_id"	TEXT,
	"role_name"	TEXT,
	PRIMARY KEY("role_id")
);
CREATE TABLE IF NOT EXISTS "student" (
	"student_id"	INTEGER,
	"user_id"	INTEGER NOT NULL,
	"faculty"	TEXT NOT NULL,
	"year"	INTEGER NOT NULL,
	"gpa"	REAL NOT NULL,
	"total_credit"	INTEGER NOT NULL,
	"role"	TEXT,
	PRIMARY KEY("student_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "student_subject" (
	"attend_id"	INTEGER,
	"student_id"	INTEGER NOT NULL,
	"course_id"	INTEGER NOT NULL,
	"sec"	INTEGER NOT NULL,
	"semester"	INTEGER NOT NULL,
	"year"	INTEGER NOT NULL,
	"grade"	INTEGER NOT NULL,
	PRIMARY KEY("attend_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "submission" (
	"submission_id"	INTEGER,
	"assignment_id"	INTEGER NOT NULL,
	"student_id"	INTEGER NOT NULL,
	"submit_file"	TEXT NOT NULL,
	"send_date"	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	"score"	INTEGER NOT NULL,
	"status"	TEXT DEFAULT NULL,
	PRIMARY KEY("submission_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "teacher" (
	"teacher_id"	INTEGER,
	"user_id"	INTEGER NOT NULL,
	"faculty"	TEXT NOT NULL,
	"role"	TEXT,
	PRIMARY KEY("teacher_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "teacher_subject" (
	"teaches_id"	INTEGER,
	"teacher_id"	INTEGER NOT NULL,
	"course_id"	INTEGER NOT NULL,
	"sec"	INTEGER NOT NULL,
	"year"	INTEGER NOT NULL,
	PRIMARY KEY("teaches_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "topic" (
	"topic_id"	INTEGER,
	"topic_title"	TEXT NOT NULL,
	"topic_description"	TEXT NOT NULL,
	"material_id"	INTEGER NOT NULL,
	"date_upload"	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	"topic_file"	TEXT,
	"user_id"	INTEGER NOT NULL,
	PRIMARY KEY("topic_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "user" (
	"user_id"	INTEGER,
	"firstname"	TEXT NOT NULL,
	"lastname"	TEXT NOT NULL,
	"email"	TEXT NOT NULL,
	"password"	TEXT NOT NULL,
	"dob"	DATE NOT NULL,
	"gender"	TEXT NOT NULL,
	"phonenum"	TEXT NOT NULL,
	"profile_picture"	TEXT NOT NULL,
	"role"	TEXT NOT NULL,
	PRIMARY KEY("user_id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "quiz" (
	"quiz_id"	INTEGER,
	"title"	TEXT NOT NULL,
	"description"	TEXT NOT NULL,
	"file_attachment"	INTEGER NOT NULL,
	"start_date"	DATETIME NOT NULL,
	"due_date"	DATETIME NOT NULL,
	"total_score"	INTEGER NOT NULL,
	"teacher_id"	INTEGER NOT NULL,
	"course_id"	INTEGER NOT NULL,
	"material_id"	NUMERIC,
	"question_a"	TEXT,
	"question_b"	TEXT,
	"question_c"	TEXT,
	"question_d"	TEXT,
	PRIMARY KEY("quiz_id" AUTOINCREMENT)
);
INSERT INTO "assignment" VALUES (2,'TEST','asdasda','lesson_65eeb82c05adf.jpg','2024-03-19 17:00:00','2024-03-20 00:00:00',10,38,27,10);
INSERT INTO "assignment" VALUES (3,'Assignment','456546546554654665465','lesson_65eebcc0c1588.sql','2024-03-10 17:00:00','2024-03-11 00:00:00',10,38,27,10);
INSERT INTO "assignment" VALUES (4,'test2','asdada6546556465','assignment_65eebf1968c94.sql','2024-03-12 20:19:00','2024-03-13 00:00:00',10,38,27,10);
INSERT INTO "assignment" VALUES (5,'Assignment','124545545454','assignment_65eebf916baba.sql','2024-03-20 08:23:00','2024-03-20 00:00:00',10,38,27,10);
INSERT INTO "assignment" VALUES (6,'KUY','54564564654654','assignment_65eec027636aa.pdf','2024-03-11 08:26:15','2024-03-20 03:25:00',10,38,27,10);
INSERT INTO "assignment" VALUES (7,'DATE','asdas','assignment_65eec28f957f0.jpg','2024-03-11 08:36:31','2024-04-01 18:36:00',10,38,27,10);
INSERT INTO "assignment" VALUES (8,'555555555555555','77777777777777777','assignment_65ef3929be753.pdf','2024-03-11 17:02:33','2024-03-21 00:04:00',5,38,27,10);
INSERT INTO "course" VALUES (22,'Science','วิทยาศาสตร์ (Science) เป็นการศึกษาและทำค้นคว้าทางวิทยาศาสตร์ที่เน้นการเรียนรู้และเข้าใจเกี่ยวกับโลกและสิ่งต่าง ๆ ในทางทั่วไป โดยการใช้วิธีการทางวิทยาศาสตร์ เป็นกลุ่มวิชาที่แตกต่างกันออกไปอย่างมากและมีหลายสาขาที่ศึกษาเนื้อหาที่แตกต่างกันไป',1,1,1,1,'course_65e6be86e1dc8.jpg');
INSERT INTO "course" VALUES (24,'Math','คณิตศาสตร์ (Mathematics) เป็นวิชาที่ศึกษาเกี่ยวกับจำนวน, โครงสร้าง, และการเปลี่ยนแปลงของสิ่งต่าง ๆ ภายใต้หลาย ๆ แขนงที่ทำให้คณิตศาสตร์กว้างไปทั่ว ภายในคณิตศาสตร์, ความรู้นี้ถูกแบ่งออกเป็นหลายสาขา, ได้แก่:',2,3,1,2567,'course_65e6bf46c7df0.jpg');
INSERT INTO "course" VALUES (25,'Thai','ภาษาไทยซึ่งใช้เพื่ออธิบายเนื้อหาหรือรายละเอียดของวิชานั้น ๆ ซึ่งส่วนมากจะปรากฏในเอกสารหรือเว็บไซต์ที่มีการเสนอวิชานั้น ๆ เพื่อให้ผู้เรียนหรือบุคคลทั่วไปทราบถึงรายละเอียดเกี่ยวกับวัตถุประสงค์ของวิชานั้น ๆ และเนื้อหาที่จะถูกเรียนรู้ในระหว่างการเรียนวิชานั้น',2,3,1,2567,'course_65e6dc8b74f1d.jpg');
INSERT INTO "course" VALUES (26,'ENGLISH','ENGLISH',1,1,1,1,'course_65edcb7feb1bc.jpg');
INSERT INTO "course" VALUES (27,'Physics','ASDASDADADASDASDASSDAS',1,1,1,1,'course_65eeb537da54f.jpg');
INSERT INTO "faculty" VALUES ('china','ศิลป์-จีน\r\n');
INSERT INTO "faculty" VALUES ('com','การงานคอม');
INSERT INTO "faculty" VALUES ('gifted','กิฟเต็ด');
INSERT INTO "faculty" VALUES ('japan','ศิลป์-ญี่ปุ่น');
INSERT INTO "faculty" VALUES ('math','ศิลป์-คำนวน');
INSERT INTO "faculty" VALUES ('sma','วิทย์-คณิต');
INSERT INTO "material" VALUES (1,'Material',26);
INSERT INTO "material" VALUES (2,'Lesson',26);
INSERT INTO "material" VALUES (4,'1',26);
INSERT INTO "material" VALUES (5,'For TA',26);
INSERT INTO "material" VALUES (8,'Lesson',27);
INSERT INTO "material" VALUES (9,'Material',27);
INSERT INTO "material" VALUES (10,'Assignment',27);
INSERT INTO "material" VALUES (11,'Quiz',27);
INSERT INTO "material" VALUES (12,'Anouncement',27);
INSERT INTO "role" VALUES ('academic','academic');
INSERT INTO "role" VALUES ('student','student\r\n');
INSERT INTO "role" VALUES ('teacher','teacher');
INSERT INTO "role" VALUES ('user','user');
INSERT INTO "student" VALUES (18,33,'sma',0,0.0,0,'student');
INSERT INTO "student" VALUES (19,34,'sma',0,0.0,0,'student');
INSERT INTO "student" VALUES (20,35,'gifted',0,0.0,0,'student');
INSERT INTO "student" VALUES (21,36,'math',0,0.0,0,'student');
INSERT INTO "student" VALUES (22,39,'math',0,0.0,0,'student');
INSERT INTO "student_subject" VALUES (1,20,22,0,1,0,0);
INSERT INTO "student_subject" VALUES (2,18,22,0,1,0,0);
INSERT INTO "student_subject" VALUES (3,19,22,0,1,0,0);
INSERT INTO "student_subject" VALUES (4,21,22,0,1,0,0);
INSERT INTO "student_subject" VALUES (5,18,24,0,1,0,0);
INSERT INTO "student_subject" VALUES (6,19,24,0,1,0,0);
INSERT INTO "student_subject" VALUES (7,18,27,0,1,0,0);
INSERT INTO "student_subject" VALUES (8,19,27,0,1,0,0);
INSERT INTO "teacher" VALUES (2,11,'','teacher');
INSERT INTO "teacher" VALUES (3,12,'','teacher');
INSERT INTO "teacher" VALUES (4,19,'','teacher');
INSERT INTO "teacher" VALUES (5,21,'','teacher');
INSERT INTO "teacher" VALUES (6,22,'','teacher');
INSERT INTO "teacher" VALUES (7,24,'','teacher');
INSERT INTO "teacher" VALUES (8,38,'','teacher');
INSERT INTO "teacher_subject" VALUES (56,6,24,0,0);
INSERT INTO "teacher_subject" VALUES (57,5,24,1,1);
INSERT INTO "teacher_subject" VALUES (58,4,24,1,1);
INSERT INTO "teacher_subject" VALUES (59,4,24,1,1);
INSERT INTO "teacher_subject" VALUES (60,2,24,1,1);
INSERT INTO "teacher_subject" VALUES (61,3,24,1,1);
INSERT INTO "teacher_subject" VALUES (62,5,24,1,1);
INSERT INTO "teacher_subject" VALUES (63,6,22,1,1);
INSERT INTO "teacher_subject" VALUES (64,7,22,1,1);
INSERT INTO "teacher_subject" VALUES (65,6,22,1,1);
INSERT INTO "teacher_subject" VALUES (66,7,22,1,1);
INSERT INTO "topic" VALUES (2,'english 1','11111',2,'2024-03-10 17:21:50','',38);
INSERT INTO "topic" VALUES (3,'english 1','11111',2,'2024-03-10 17:24:12','',38);
INSERT INTO "topic" VALUES (4,'english 1','11111',2,'2024-03-10 17:25:29','',38);
INSERT INTO "topic" VALUES (5,'','',2,'2024-03-10 17:25:45','',38);
INSERT INTO "topic" VALUES (6,'english 2','1223',2,'2024-03-10 17:26:16','lesson_65eded38d813f.pdf',38);
INSERT INTO "topic" VALUES (7,'KUY','KUYKUYKUY',5,'2024-03-10 18:41:20','lesson_65edfed091778.pdf',38);
INSERT INTO "topic" VALUES (8,'Hi','Hello world',12,'2024-03-11 07:40:48','lesson_65eeb58064b3c.pdf',38);
INSERT INTO "topic" VALUES (9,'english 2','ADASDASASASDASDA',8,'2024-03-11 07:54:05','lesson_65eeb89d36162.pdf',38);
INSERT INTO "user" VALUES (9,'111','11','111','111','2024-03-11','111','111','111','student');
INSERT INTO "user" VALUES (10,'eee','eee','eee','eee','2024-02-01','eee','eee','eee','student');
INSERT INTO "user" VALUES (11,'teacher','teacher','teacher','teacher','2024-02-01','teacher','teacher','','teacher');
INSERT INTO "user" VALUES (12,'phu','phu','123','213','2024-03-06','male','084','','teacher');
INSERT INTO "user" VALUES (13,'wachi','wachi','acsa','bd6hLVYvau','2024-03-11','male','0830942407','profile_65e8a043185be.jpg','teacher');
INSERT INTO "user" VALUES (14,'rain','asd','asd','o83tSUcvN8','2024-03-12','male','0830942407','profile_65e8a0c0bf17c.jpg','teacher');
INSERT INTO "user" VALUES (15,'rain','asd','asd','7vZUuA9E4h','2024-03-12','male','0830942407','profile_65e8a0d5d31a0.jpg','teacher');
INSERT INTO "user" VALUES (16,'rain','asd','asd','OU58N5EGFB','2024-03-12','male','0830942407','profile_65e8a0f285cea.jpg','teacher');
INSERT INTO "user" VALUES (17,'rain','asd','asd','eGqL49SILz','2024-03-12','male','0830942407','profile_65e8a0fb9f593.jpg','teacher');
INSERT INTO "user" VALUES (18,'rain','asd','asd','HbCjgA4apn','2024-03-12','male','0830942407','profile_65e8a1108cdb6.jpg','teacher');
INSERT INTO "user" VALUES (19,'aaaaa','aaaaa','aaaaa','aaaaa','2024-03-05','male','aaa','','teacher');
INSERT INTO "user" VALUES (20,'rain','rain','rain','yedhZpZUYu','2024-03-15','male','0830942407','profile_65e8a3b24b647.jpg','student');
INSERT INTO "user" VALUES (21,'kuy','kuy','123','fntGlKBkXl','2024-03-08','male','0830942407','profile_65e8a409d1309.jpg','teacher');
INSERT INTO "user" VALUES (22,'Rain Gamer','TH','rainandrain3@gmail.com','3pL4lyVZQz','2024-03-04','female','0830942407','profile_65e8a4d153ffe.jpg','teacher');
INSERT INTO "user" VALUES (23,'rain','rain','rain','creRMOFs8Y','1222-12-12','male','0830942407','','student');
INSERT INTO "user" VALUES (24,'2','2','2','db17xZOfc9','0002-02-02','male','0830942407','','teacher');
INSERT INTO "user" VALUES (25,'rain','rqin','123','12SD9bNpNg','0001-01-01','male','0830942407','','student');
INSERT INTO "user" VALUES (26,'rain','rqin','123','7go4eZtcMo','0001-01-01','male','0830942407','','student');
INSERT INTO "user" VALUES (27,'111','111','111','K59rQUJig0','0011-01-01','female','0830942407','','student');
INSERT INTO "user" VALUES (28,'111','111','111','dFtAcAgQRr','0011-01-01','female','0830942407','','student');
INSERT INTO "user" VALUES (29,'111','111','111','pgjJBQutEg','0011-01-01','female','0830942407','','student');
INSERT INTO "user" VALUES (30,'rain','rain','rain','a8j14vjUbi','0001-01-11','male','0830942407','','student');
INSERT INTO "user" VALUES (31,'rain','rain','rain','wjN5k2Opbw','0001-01-11','male','0830942407','','student');
INSERT INTO "user" VALUES (32,'rain','rain','rain','TlTLJyD13M','0001-01-11','male','0830942407','','student');
INSERT INTO "user" VALUES (33,'rain','rain','rain','kJ1HmbQDU2','0001-01-11','male','0830942407','','student');
INSERT INTO "user" VALUES (34,'Rain Gamer','TH','rainandrain3@gmail.com','WygJIx55gx','0001-11-11','male','0830942407','','student');
INSERT INTO "user" VALUES (35,'wa','wea','was','G7q1p7zErz','2024-03-05','male','0830942407','','student');
INSERT INTO "user" VALUES (36,'ka','ka','ka','7wQcRizJPc','0004-04-04','male','0830942407','','student');
INSERT INTO "user" VALUES (38,'admin','admin','123456','aaa','0001-01-01','male','0830942407','profile_65eb236bd4f18.sPkGlUjpXsL_JcRPxYdm','academic');
INSERT INTO "user" VALUES (39,'rain','rain','rain','8wr2yEL7ML','0001-01-01','male','0830942407','profile_65ec74e16be3b.avif','student');
COMMIT;
