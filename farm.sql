CREATE DATABASE FARM_MANAGEMENT;
USE FARM_MANAGEMENT;

CREATE TABLE users(
   user_id INTEGER PRIMARY KEY,
   user_name VARCHAR(20) NOT NULL,
   user_phone  LONG NOT NULL,
   user_email VARCHAR(20),
   user_add VARCHAR(30)
);
ALTER TABLE users ADD COLUMN dob DATE;
ALTER TABLE users
ADD age INT;

UPDATE users
SET age = DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0;

SELECT * FROM users;

CREATE TABLE roles(
    role_id VARCHAR(10) PRIMARY KEY,
    role_name VARCHAR(20) NOT NULL,
    role_desc TEXT
);

CREATE TABLE login(
    login_id INTEGER NOT NULL,
    login_role_id VARCHAR(10) NOT NULL,
    login_username VARCHAR(20) NOT NULL,
    user_password VARCHAR(12),
    login_date DATE,
    FOREIGN KEY (login_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (login_role_id) REFERENCES roles(role_id) ON DELETE CASCADE
);

CREATE TABLE employee(
   emp_id VARCHAR(10) PRIMARY KEY,
   emp_name VARCHAR(20) NOT NULL,
   emp_email VARCHAR(20),
   emp_phone LONG,
   emp_add VARCHAR(30),
   emp_username VARCHAR(20),
   emp_password VARCHAR(15)
);

CREATE TABLE plant(
    plant_id VARCHAR(10) PRIMARY KEY,
    plant_name VARCHAR(20) NOT NULL,
    plant_type VARCHAR(20),
    plant_desc TEXT,
    soil_type VARCHAR(20)
);

CREATE TABLE medicines(
    plant_id VARCHAR(10) NOT NULL,
    med_id VARCHAR(10) PRIMARY KEY,
    med_name VARCHAR(20) NOT NULL,
    med_type VARCHAR(20),
    med_cost VARCHAR(20),
    med_desc TEXT,
    FOREIGN KEY (plant_id) REFERENCES plant(plant_id) ON DELETE CASCADE
);

CREATE TABLE method(
    method_id VARCHAR(10) PRIMARY KEY,
    method_name VARCHAR(20) NOT NULL,
    method_type TEXT,
    method_desc TEXT
);

CREATE TABLE has(
    user_id INTEGER,
    role_id VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE CASCADE
);

CREATE TABLE manages(
   user_id INTEGER,
   emp_id VARCHAR(10),
   plant_id VARCHAR(10),
   method_id VARCHAR(10),
   access_date DATE,
   FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
   FOREIGN KEY (emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE,
   FOREIGN KEY (plant_id) REFERENCES plant(plant_id) ON DELETE CASCADE,
   FOREIGN KEY (method_id) REFERENCES method(method_id) ON DELETE CASCADE
);
select *  from users;
INSERT INTO users VALUES
(101,"Rohith",9900000001,"rohith45@gmail.com","Hootagalli",'1976-12-18'),
(102,"Virat",9900000002,"virat18@gmail.com","Nagawala",'1975-3-7'),
(103,"Rahul",9900000003,"rahul01@gmail.com","Ilavala",'1978-5-9'),
(104,"Dhawan",9900000004,"dhawan42@gmail.com","Belawadi",'1986-1-1'),
(105,"Hardhik",9900000005,"hadhik33@gmail.com","Koppal",'1996-2-8');

INSERT INTO roles VALUES
("R001","Admin","Have access to modify entire database"),
("R002","Employee","Have access to modify plants, medicine and methods data"),
("R003","User","Have no access to modify database");

INSERT INTO login VALUES
(101,"R001","rohit45","Rohith$45",'2020-12-25'),
(102,"R002","virat18","Virat$18",'2020-12-27'),
(103,"R002","rahul01","Rahul$01",'2021-1-5'),
(104,"R003","dahwan28","Dhawan$42",'2021-1-25'),
(105,"R003","hardhik33","Hardhik$42",'2021-2-25');
ALTER TABLE employee ADD COLUMN salary INTEGER;

INSERT INTO employee VALUES
("E001","Virat","virat@18gmail.com",9900000002,"Nagawala","virat18","Virat$18",20000),
("E002","Rahul","rahul@01gmail.com",9900000003,"Ilavala","rahul01","Rahul$01",10000);

INSERT INTO plant VALUES
("P001","Tomato","Food crop","Requires 10 months to grow","Red loam soil"),
("P002","Sugarcane","Food crop","Requires 1 year to grow","Black soil"),
("P003","Paddy","Feed and Food crop","Requires 4 months to grow","Alluvium soil"),
("P004","Sunflower","Oil crop","Requires 3 months to grow","Sandy loam soil"),
("P005","Cotton","Fiber crop","Requires 5 months to grow","Black soil");

INSERT INTO medicines VALUES
("P001","M001","Tafaban","Insecticide","450rs/l","Chloropyriphos 20% EC"),
("P001","M002","Fame","Insecticide","600rs/30ml","Fluendiamide 39.35% SC"),
("P001","M003","Sectin","Fungicide","450rs/100g","Fenamidone 10% + mancozeb 50% WG"),
("P002","M004","Atrataf","Herbicide","500rs/kg","Atrazine 50% Wp"),
("P002","M005","Tata Metri","Herbicide","1000rs/kg","Metribuzin 70% Wp");

INSERT INTO method VALUES
("Md001","Traditional Method","Check basin method","Used in level fields"),
("Md002","Traditional Method","Furrow Irrigation method","Cheap labour"),
("Md003","Traditional Method","Strip Irrigation method","Used in raise platform"),
("Md004","Modern Method","Sprinkler system","Used in uneven lands"),
("Md005","Modern Method","Drip irrigation method","Used when there is scarcity of water");

INSERT INTO has VALUES
(101,"R001"),
(102,"R002"),
(103,"R002"),
(104,"R003"),
(105,"R003");

INSERT INTO manages VALUES
(102,"E001","P001","Md001",'2020-12-27'),
(102,"E001","P002","Md002",'2020-12-27'),
(102,"E001","P003","Md003",'2020-12-27'),
(103,"E002","P004","Md004",'2021-1-5'),
(103,"E002","P005","Md005",'2021-1-5')
;

SELECT * FROM login
WHERE login_role_id = "R002";

SELECT plant_name , plant_type
FROM plant;

SELECT * FROM plant
WHERE plant_type = "Food crop" OR plant_type = "Fiber crop";

SELECT * FROM plant
WHERE plant_type = "Food crop" AND soil_type = "Black soil";

SELECT COUNT(method_id), method_name FROM method GROUP BY(method_name);

SELECT COUNT(method_id), method_name
FROM method
GROUP BY method_name
HAVING COUNT(method_id) > 1;

SELECT COUNT(plant_id), plant_type
FROM plant
GROUP BY plant_type
HAVING COUNT(plant_id) > 1;

SELECT user_name, SUM(user_id) FROM users
GROUP BY user_name;

SELECT * FROM users
WHERE user_id BETWEEN 101 AND 103;

SELECT * FROM users
WHERE user_name LIKE '%a%';

SELECT login.login_id, users.user_name, login.login_role_id
FROM login
INNER JOIN users ON login.login_id = users.user_id;

SELECT login.login_username, roles.role_name 
FROM login
LEFT JOIN roles 
ON roles.role_id = login.login_role_id;

SELECT login.login_username, roles.role_name 
FROM login
RIGHT JOIN roles 
ON roles.role_id = login.login_role_id;

SELECT login.login_username, roles.role_name 
FROM login
FULL JOIN roles 
ON roles.role_id = login.login_role_id;


SELECT * FROM users WHERE user_id IN (SELECT user_id FROM users WHERE user_id >102);
SELECT * FROM employee WHERE salary IN (SELECT salary FROM employee WHERE salary > 1000);
SELECT * FROM users WHERE age IN (SELECT age FROM users WHERE age > 40);
SELECT * FROM plant WHERE plant_type IN (SELECT plant_type FROM plant WHERE plant_type = "Food crop");
SELECT * FROM method WHERE method_name IN (SELECT method_name FROM method WHERE method_name = "Modern method");

ALTER TABLE login MODIFY login_date DATE NOT NULL;
ALTER TABLE employee MODIFY emp_username VARCHAR(20) NOT NULL;
ALTER TABLE employee MODIFY emp_password VARCHAR(15) NOT NULL;

UPDATE login SET login_role_id = "R002" WHERE login_id = 104;
UPDATE manages SET method_id = "Md003" WHERE plant_id = "P005";

INSERT INTO employee VALUES
("E003","Dhawan","dhawan@42gmail.com",9900000004,"Belawadi","dhawan42","Dhawan$42");

DELETE FROM users WHERE user_id = 104;
DELETE FROM employee WHERE emp_id = "E003";

SELECT * FROM users;
SELECT * FROM roles;
SELECT * FROM login;
SELECT * FROM employee;
SELECT * FROM plant;
SELECT * FROM medicines;
SELECT * FROM method;
SELECT * FROM has;
SELECT * FROM manages;
