CREATE DATABASE FARM_MANAGE;
USE FARM_MANAGE;
CREATE TABLE login(
    login_id INTEGER PRIMARY KEY,
    login_role_id INTEGER,
    login_username VARCHAR(20),
    login_password VARCHAR(12)
);
CREATE TABLE users_(
    user_id INTEGER PRIMARY KEY,
    user_role_id INTEGER,
    user_name VARCHAR(20),
    user_email VARCHAR(15),
    user_phone VARCHAR(10),
    user_add TEXT
);
CREATE TABLE roles(
    role_id INTEGER PRIMARY KEY,
    role_name VARCHAR(20),
    role_desc TEXT
);
CREATE TABLE permission(
    per_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    per_role_id INTEGER,
    per_name VARCHAR(20),
    per_module TEXT,
    per_desc TEXT,
    FOREIGN KEY per_role_id REFERENCES roles(role_id)
);
CREATE TABLE employee(
    emp_id INTEGER PRIMARY KEY,
    emp_name VARCHAR(20),
    emp_username VARCHAR(20),
    emp_password VARCHAR(12),
    emp_email VARCHAR(15),
    emp_phone VARCHAR(10),
    emp_add TEXT
);    
CREATE TABLE medicines(
    med_id INTEGER PRIMARY KEY,
    med_name VARCHAR(20),
    med_type VARCHAR(20),
    med_cost INTEGER,
    med_desc TEXT,
    FOREIGN KEY  REFERENCES farm(farm_id)
);
CREATE TABLE farm(
    farm_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    farm_type VARCHAR(20),
    farm_desc TEXT
);
CREATE TABLE treatment(
    treat_id INTEGER,
    treat_name VARCHAR(20),
    treat_type VARCHAR(20),
    treat_method TEXT,
    treat_desc TEXT,
    FOREIGN KEY treat_id REFERENCES farm(farm_id)
);
CREATE TABLE plant(
    plant_id INTEGER,
    plant_name VARCHAR(20),
    plant_type VARCHAR(20),
    FOREIGN KEY plant_id REFERENCES farm(farm_id)
);
