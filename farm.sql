CREATE DATABASE FARM_MANAGEMENT;
USE FARM_MANAGEMENT;

CREATE TABLE users(
   user_id INTEGER PRIMARY KEY,
   user_name VARCHAR(20),
   user_phone  LONG,
   user_email VARCHAR(20),
   user_add VARCHAR(30)
);

INSERT INTO users VALUES
(101,"Rohith",9900000001,"rohith45@gmail.com","Hootagalli"),
(102,"Virat",9900000002,"virat18@gmail.com","Nagawala"),
(103,"Rahul",9900000003,"rahul01@gmail.com","Ilavala"),
(104,"Dhawan",9900000004,"dhawan42@gmail.com","Belawadi"),
(105,"Hardhik",9900000005,"hadhik33@gmail.com","Koppal");

CREATE TABLE roles(
    role_id VARCHAR(10) PRIMARY KEY,
    role_name VARCHAR(20),
    role_desc TEXT
);

INSERT INTO roles VALUES
("R001","Admin","Have access to modify entire database"),
("R002","Employee","Have access to modify plants, medicine and methods data"),
("R003","User","Have no access to modify database");

CREATE TABLE login(
    login_id INTEGER,
    login_role_id VARCHAR(10),
    login_username VARCHAR(20),
    user_password VARCHAR(12),
    login_date DATE,
    FOREIGN KEY (login_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (login_role_id) REFERENCES roles(role_id) ON DELETE CASCADE
);

INSERT INTO login VALUES
(101,"R001","rohit45","Rohith$45",'2020-12-25'),
(102,"R002","virat18","Virat$18",'2020-12-27'),
(103,"R002","rahul01","Rahul$01",'2021-1-5'),
(104,"R003","dahwan28","Dhawan$42",'2021-1-25'),
(105,"R003","hardhik33","Hardhik$42",'2021-2-25');

CREATE TABLE employee(
   emp_id VARCHAR(10) PRIMARY KEY,
   emp_name VARCHAR(20),
   emp_email VARCHAR(20),
   emp_phone LONG,
   emp_add VARCHAR(30),
   emp_username VARCHAR(20),
   emp_password VARCHAR(15)
);

INSERT INTO employee VALUES
("E001","Virat","virat@18gmail.com",9900000002,"Nagawala","virat18","Virat$18"),
("E002","Rahul","rahul@01gmail.com",9900000003,"Ilavala","rahul01","Rahul$01");

CREATE TABLE plant(
    plant_id VARCHAR(10) PRIMARY KEY,
    plant_name VARCHAR(20),
    plant_type VARCHAR(20),
    plant_desc TEXT,
    soil_type VARCHAR(20)
);

INSERT INTO plant VALUES
("P001","Tomato","Food crop","Requires 10 months to grow","Red loam soil"),
("P002","Sugarcane","Food crop","Requires 1 year to grow","Black soil"),
("P003","Paddy","Feed and Food crop","Requires 4 months to grow","Alluvium soil"),
("P004","Sunflower","Oil crop","Requires 3 months to grow","Sandy loam soil"),
("P005","Cotton","Fiber crop","Requires 5 months to grow","Black soil");

CREATE TABLE medicines(
    plant_id VARCHAR(10),
    med_id VARCHAR(10) PRIMARY KEY,
    med_name VARCHAR(20),
    med_type VARCHAR(20),
    med_cost VARCHAR(20),
    med_desc TEXT,
    FOREIGN KEY (plant_id) REFERENCES plant(plant_id) ON DELETE CASCADE
);

INSERT INTO medicines VALUES
("P001","M001","Tafaban","Insecticide","450rs/l","Chloropyriphos 20% EC"),
("P001","M002","Fame","Insecticide","600rs/30ml","Fluendiamide 39.35% SC"),
("P001","M003","Sectin","Fungicide","450rs/100g","Fenamidone 10% + mancozeb 50% WG"),
("P002","M004","Atrataf","Herbicide","500rs/kg","Atrazine 50% Wp"),
("P002","M005","Tata Metri","Herbicide","1000rs/kg","Metribuzin 70% Wp");

CREATE TABLE method(
    method_id VARCHAR(10) PRIMARY KEY,
    method_name VARCHAR(20),
    method_type VARCHAR(20),
    method_desc TEXT
);

INSERT INTO method VALUES
("Md001","Traditional Method","Check basin method","Used in level fields"),
("Md002","Traditional Method","Furrow Irrigation method","Cheap labour"),
("Md003","Traditional Method","Strip Irrigation method","Used in raise platform"),
("Md004","Modern Method","Sprinkler system","Used in uneven lands"),
("Md005","Modern Method","Drip irrigation method","Used when there is scarcity of water");

CREATE TABLE has(
    user_id INTEGER,
    login_id INTEGER,
    role_id VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (login_id) REFERENCES login(login_id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE CASCADE
);

CREATE TABLE manages(
   user_id INTEGER,
   emp_id VARCHAR(10),
   plant_id VARCHAR(10),
   method_id VARCHAR(10),
   FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
   FOREIGN KEY (emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE,
   FOREIGN KEY (plant_id) REFERENCES plant(plant_id) ON DELETE CASCADE,
   FOREIGN KEY (method_id) REFERENCES method(method_id) ON DELETE CASCADE
);
