-- Task 3 -----------------------------------

-- START HERE!! --
-- show Databases;

-- create database temp_database;

-- drop database temp_database;

-- create database world_peace;

-- Task 4 -----------------------------------

use world_peace;

-- create table temp_table(
-- item_id CHAR(10),
-- description VARCHAR(50),
-- unit_price int
-- );

-- drop table temp_table;

-- create table merchandise_item(
-- 	merchandise_item_id CHAR(10),
--     description VARCHAR(50),
--     unit_price int
-- );

-- Task 5 -----------------------------------

-- create table customer(
-- 	customer_id CHAR(10) PRIMARY KEY,
--     customer_name VARCHAR(50)
--     );




-- INSERT INTO customer
-- SET customer_id = "C000000001",
-- customer_name = "Harrison Kong";

-- INSERT INTO customer
-- SET customer_id = "C000000002",
-- customer_name = "John Doe";


-- INSERT INTO merchandise_item
-- SET
-- merchandise_item_id = "BAMBOOBOOK",
-- description = "Bamboo Notebook",
-- unit_price = 200;

-- INSERT INTO merchandise_item
-- SET
-- merchandise_item_id = "BAMBOOBOOK",
-- description = "Dragon Painting",
-- unit_price = 300;

-- update merchandise_item
-- set merchandise_item_id = "DRAGONTPNG"
-- where unit_price = 300;

-- alter table merchandise_item 
-- add constraint 
-- merchandise_item_pk
-- PRIMARY KEY(merchandise_item_id);

-- Task 6 -----------------------------------

-- CREATE INDEX description ON merchandise_item(description);

-- DROP INDEX description ON  merchandise_item;

-- create unique index description_idx 
-- on merchandise_item(description);

Insert into merchandise_item
set
merchandise_item_id = "THIRSYATE",
description = "Thor statue",
unit_price = 2500;



-- Task 7 -----------------------------------

-- create table customer_order (
-- customer_order_id CHAR(10) PRIMARY KEY,
-- customer_id CHAR(10),
-- FOREIGN KEY (customer_id)
-- REFERENCES customer(customer_id)
-- );

-- insert into 
-- customer_order
-- set customer_order_id = "2132432",
-- customer_id = "32432442";

create table customer_order_line_item (
customer_order_id CHAR(10),
customer_id CHAR(10),
merchandise_item_id CHAR(10),
quantity int,
primary key (customer_order_id,merchandise_item_id),
foreign key (customer_order_id)
references 
customer_order(customer_order_id)
);

alter table customer_order_line_item 
add constraint item_id_fk
foreign key (item_id)
references merchandise_item
(merchandise_item_id);



-- alter table customer_order_line_item 
-- add constraint item_id_fk
-- foreign key (merchandise_item_id)
-- references merchandise_item
-- (merchandise_item_id);
