CREATE DATABASE fms;
USE fms;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');


CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
('Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
('Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
('Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
('Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
('Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
('Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
('Jane', 'jane@gmail.com', '7869869757', 'I love your service!');


CREATE TABLE `emptb` (
  `eid` integer primary key AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `emptb` (`username`, `password`, `email`, `phone`, `salary`) VALUES
('ashok', 'ashok123', 'ashok@gmail.com', '9900000001', 500),
('arun', 'arun123', 'arun@gmail.com', '9900000002', 600),
('Dinesh', 'dinesh123', 'dinesh@gmail.com', '9900000003', 700),
('Ganesh', 'ganesh123', 'ganesh@gmail.com', '9900000004', 550),
('Kumar', 'kumar123', 'kumar@gmail.com', '9900000005', 800),
('Amit', 'amit123', 'amit@gmail.com', '9900000006', 1000),
('Abbis', 'abbis123', 'abbis@gmail.com', '9900000007', 1500),
('Tiwary', 'tiwary123', 'tiwary@gmail.com', '9900000008', 450);


CREATE TABLE `userreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `userreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(1, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ram123', 'ram123'),
(2, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123'),
(3, 'Shahrukh', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123'),
(4, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'kishan123', 'kishan123'),
(5, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123'),
(6, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123'),
(7, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123'),
(8, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123'),
(9, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123'),
(10, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123'),
(11, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123');


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

ALTER TABLE `userreg`
  ADD PRIMARY KEY (`pid`);

ALTER TABLE `userreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

create table manages(
    eid integer not null,
    ename varchar(20) not null,
    plant_id varchar(20) not null,
    plant_name varchar(20) not null,
    med_id varchar(20) not null,
    med_name varchar(20) not null,
    salary integer not null
);

INSERT INTO manages VALUES
(1,"ashok","P001","Tomato","M001","Tafaban",500),
(2,"arun","P002","Sugarcane","M002","Fame",600),
(3,"Dinesh","P003","Paddy","M003","Sectin",700),
(4,"Ganesh","P004","Sunflower","M004","Atrataf",550),
(5,"Kumar","P005","Cotton","M005","Tata Metri",800),
(6,"Amit","P001","Tomato","M002","Fame",1000),
(7,"Abbis","P002","Sugarcane","M003","Sectin",1500),
(8,"Tiwary","P003","Paddy","M004","Atrataf",450)
;