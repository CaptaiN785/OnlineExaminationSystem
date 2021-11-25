# OnlineExaminationSystem
This is a web development project based on html, Php, Css, Javascript, MySql(Concept of all languages used are basic).

If you want to check how this project works, follow this link...
https://drive.google.com/file/d/1G2d0MEFLU3IBGWEb5R2zUmI6yFQuHGAK/view?usp=sharing

****  For getting connected to database you need to change the database name, username, password in EVERY PAGE WHERE IS DATABASE CONNECTIVITY ****

For sucessfully executing this project there is a mysql schema :
Database name : Project
Tables in Project database : 
| adminlogin        |
| question          |
| timing            |
| users             |

Descriptions of each tables: 
Table adminlogin:(This table is not so important, it is just for admin side login page)
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| username | varchar(30) | YES  |     | NULL    |       |
| password | varchar(30) | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+

Table users:(This is table which store the attendee username this table provides a numeric password to access the test in alloted time):
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| user     | varchar(20) | YES  | UNI | NULL    |                |
| password | int(11)     | NO   | PRI | NULL    | auto_increment |
| ex_id    | varchar(20) | NO   |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+

Table Question : (This table store all the question which are being set by the admin side)
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| qns      | varchar(150) | YES  |     | NULL    |                |
| opA      | varchar(150) | YES  |     | NULL    |                |
| opB      | varchar(150) | YES  |     | NULL    |                |
| opC      | varchar(150) | YES  |     | NULL    |                |
| opD      | varchar(150) | YES  |     | NULL    |                |
| corr_ans | char(1)      | YES  |     | NULL    |                |
| ex_id    | varchar(10)  | YES  |     | NULL    |                |
| qno      | int(11)      | NO   | PRI | NULL    | auto_increment |
+----------+--------------+------+-----+---------+----------------+
qns : Question description
opA, opB, opC, opD : Options A, B, C, D
corr_ans : Correct Asnwer
qno : Question no (Auto increment)

Table timing : (It stores the timing of all the test)
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| ex_id      | varchar(10) | YES  |     | NULL    |       |
| doe        | varchar(10) | YES  |     | NULL    |       |
| timing     | varchar(5)  | YES  |     | NULL    |       |
| end_timing | varchar(5)  | YES  |     | NULL    |       |
| duration   | int(11)     | YES  |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

Thank You