CREATE DATABASE FARM_MANAGEMENT;
USE FARM_MANAGEMENT;

CREATE TABLE users(
   user_id INTEGER PRIMARY KEY,
   user_name VARCHAR(20),
   user_phone  LONG,
   user_email VARCHAR(20),
   user_add VARCHAR(30)
);

CREATE TABLE roles(
    role_id INTEGER PRIMARY KEY,
    per_id INTEGER PRIMARY KEY,
    role_name VARCHAR(20),
    role_desc TEXT,
    per_desc TEXT
);

CREATE TABLE login(
    login_id INTEGER,
    login_role_id INTEGER,
    login_username VARCHAR(20),
    user_password VARCHAR(12),
    login_date DATE,
    FOREIGN KEY (login_role_id) REFERENCES roles(role_id)
);

CREATE TABLE employee(
   emp_id INTEGER PRIMARY KEY,
   emp_name VARCHAR(20),
   emp_email VARCHAR(20),
   emp_phone LONG,
   emp_add VARCHAR(30),
   emp_username VARCHAR(20),
   emp_password VARCHAR(15)
);

CREATE TABLE plant(
    plant_id INTEGER PRIMARY KEY,
    plant_name VARCHAR(20),
    plant_type VARCHAR(20),
    plant_desc TEXT,
    soil_type VARCHAR(20)
);
CREATE TABLE medicines(
    plant_id INTEGER,
    med_id INTEGER PRIMARY KEY,
    med_name VARCHAR(20),
    med_type VARCHAR(20),
    med_cost INTEGER,
    med_desc TEXT,
    FOREIGN KEY (plant_id) REFERENCES plant(plant_id)
);
CREATE TABLE method(
    method_id INTEGER PRIMARY KEY,
    method_name VARCHAR(20),
    method_type VARCHAR(20),
    method_desc TEXT
);
CREATE TABLE has(
    user_id INTEGER,
    login_id INTEGER,
    role_id INTEGER,
    per_id INTEGER,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (role_id) REFERENCES roles(role_id),
    FOREIGN KEY (login_id) REFERENCES login(login_id),
    FOREIGN KEY (per_id) REFERENCES roles(per_id)
);
CREATE TABLE manages(
   user_id INTEGER,
   emp_id INTEGER,
   plant_id INTEGER,
   method_id INTEGER,
   FOREIGN KEY (user_id) REFERENCES users(user_id),
   FOREIGN KEY (emp_id) REFERENCES employee(emp_id),
   FOREIGN KEY (plant_id) REFERENCES login(plant_id),
   FOREIGN KEY (method_id) REFERENCES method(method_id)
);
