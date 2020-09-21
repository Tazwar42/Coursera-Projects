USE world_peace;

-- Let's create an order for Harrison

drop table customer;
drop table customer_order;
drop table merchandise_item;
drop table customer_order_line_item;

INSERT INTO customer_order
SET
customer_id = "C000000001",
customer_order_id = "D000000001";

-- Let's add some line items!!

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000001",
merchandise_item_id = "BAMBOOBOOK",
quantity = 4;

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000001",
merchandise_item_id = "DRAGONPTNG",
quantity = 2;

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000001",
merchandise_item_id = "THORSTATUE",
quantity = 1;

-- Let's add another order for Harrison!

INSERT INTO customer_order
SET
customer_id = "C000000001",
customer_order_id = "D000000002";

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000002",
merchandise_item_id = "BAMBOOBOOK",
quantity = 20;

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000002",
merchandise_item_id = "DRAGONPTNG",
quantity = 50;

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000002",
merchandise_item_id = "THORSTATUE",
quantity = 15;

-- Let's add an order for John Doe

INSERT INTO customer_order
SET
customer_id = "C000000002",
customer_order_id = "D000000003";

-- Let's add some line items!!

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000003",
merchandise_item_id = "DRAGONPTNG",
quantity = 1000;

INSERT INTO customer_order_line_item
SET
customer_order_id = "D000000003",
merchandise_item_id = "THORSTATUE",
quantity = 500;

-- This will link everything together!!

-- SELECT
-- customer.customer_name,
-- customer_order_line_item.customer_order_id,
-- merchandise_item.description,
-- customer_order_line_item.quantity,
-- merchandise_item.unit_price / 100 AS "unit_price_decimal",
-- customer_order_line_item.quantity * merchandise_item.unit_price / 100 AS "line_total"
-- FROM customer_order_line_item, customer_order, customer, merchandise_item
-- WHERE
-- customer_order_line_item.merchandise_item_id = merchandise_item.merchandise_item_id AND
-- customer_order.customer_id = customer.customer_id AND
-- customer_order_line_item.customer_order_id = customer_order.customer_order_id
-- ORDER BY
-- customer_name,
-- customer_order_line_item.customer_order_id,
-- merchandise_item.description