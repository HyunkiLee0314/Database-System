CREATE TABLE `mall`.`admin` (
  `admin_id` VARCHAR(10) NOT NULL,
  `admin_password` VARCHAR(45) NULL,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`admin`
(`admin_id`,
`admin_password`)
VALUES
("admin","admin");

CREATE TABLE `mall`.`supplier` (
  `supplier_id` VARCHAR(10) NOT NULL,
  `company` VARCHAR(45) NULL,
  `contact_manager` VARCHAR(255) NULL,
  `contact_number` VARCHAR(255) NULL,
  PRIMARY KEY (`supplier_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`supplier`
(`supplier_id`,
`company`,
`contact_manager`,
`contact_number`)
VALUES
("s1","Dust","Peter","404-321-8763"),
("s2","appa","William","404-123-4567"),
("s3","Mcdo","Jenny","770-345-5678"),
("s4","Fam","Janet","321-735-1870"),
("s5","Leg","James","521-321-1237"),
("s6","Wind","Alex","432-759-4679"),
("s7","Big","George","404-902-7315"),
("s8","Small","June","905-346-9853"),
("s9","Rain","Tran","665-096-1593"),
("s10","Real","Lucas","654-987-3210");


CREATE TABLE `mall`.`product` (
  `product_id` VARCHAR(10) NOT NULL,
  `product_name` VARCHAR(255) NULL,
  `product_category` VARCHAR(255) NULL,
  `product_price` FLOAT NULL,
  `product_quantity` INT NULL,
  `supplier_id` VARCHAR(10) NULL,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `mall`.`product` 
ADD CONSTRAINT `product_FK1`
  FOREIGN KEY (`supplier_id`)
  REFERENCES `mall`.`supplier` (`supplier_id`);

INSERT INTO `mall`.`product`
(`product_id`,
`product_name`,
`product_category`,
`product_price`,
`product_quantity`,
`supplier_id`)
VALUES
('p1','envelopment','life','40',20,'s1'),
('p10','hoodie','cloth','40',5,'s10'),
('p2','chocolatebox','food','50',10,'s2'),
('p3','caramelcandy','food','50',20,'s3'),
('p4','tshirt','cloth','40',10,'s4'),
('p5','dryer','beauty','50',20,'s5'),
('p6','shoe','cloth','40',10,'s6'),
('p7','kitchenware','life','50',20,'s7'),
('p8','snackbar','food','40',10,'s8'),
('p9','cream','beauty','50',10,'s9');

CREATE TABLE `mall`.`order_detail` (
  `order_id` VARCHAR(10) NOT NULL,
  `product_id` VARCHAR(10) NULL,
  `order_quantity` INT NULL,
  PRIMARY KEY (`order_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`order_detail`
(`order_id`,
`product_id`,
`order_quantity`)
VALUES
("o1","p1",3),
("o2","p2",5),
("o3","p3",10),
("o4","p4",6),
("o5","p5",1),
("o6","p6",3),
("o7","p7",3),
("o8","p8",3),
("o9","p9",3),
("o10","p10",1);

ALTER TABLE `mall`.`order_detail` 
ADD CONSTRAINT `order_detail_FK1`
  FOREIGN KEY (`product_id`)
  REFERENCES `mall`.`product` (`product_id`);


CREATE TABLE `mall`.`buyer` (
  `buyer_id` VARCHAR(10) NOT NULL,
  `buyer_phone` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `buyer_name` VARCHAR(255) NULL,
  `buyer_password` VARCHAR(255) NULL,
  `buyer_address` VARCHAR(255) NULL,
  `buyer_city` VARCHAR(255) NULL,
  `buyer_state` VARCHAR(255) NULL,
  `buyer_country` VARCHAR(255) NULL,
  `buyer_zip` VARCHAR(10) NULL,
  PRIMARY KEY (`buyer_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`buyer`
(`buyer_id`,`buyer_phone`,`email`,`buyer_name`,`buyer_password`,`buyer_address`,`buyer_city`,`buyer_state`,`buyer_country`,`buyer_zip`)
VALUES
("1","770-567-890","john@gmail.com","John","abcde","3020 street","Atlanta","GA","US","30333"),

("2","660-123-890","jane@gmail.com","Jane","abcdeasdf","1231 street","Los Angeles","CA","US","12579"),

("3","102-293-5153","kim@gmail.com","Kim","as123asd","1342 In St.","Irvine","CA","US","29786"),

("4","769-844-1019","matthew@gmail.com","Matthew","da34asdbv","1231 Saint Clair","Atlanta","GA","US","33897"),

("5","517-704-7914","dominic@gmail.com","Dominic","abc12asda","12312 street Dr","Augusta","GA","US","46579"),

("6","457-678-952","Lynn@gmail.com","Lynn","nfg1231a","512 main","Columbus","GA","US","30792"),

("7","975-684-930","Dustin@gmail.com","Dustin","zpej12","road 1231","Macon","GA","US","79630"),

("8","975-652-642","kelly@gmail.com","Kelly","asbqwe1zxc","Wall street","Athens","GA","US","36987"),

("9","125-789-654","Davie@gmail.com","Davie","vzxqwee52","80 Dr.","Atlanta","GA","US","36925"),

("10","123-456-789","lee@gmail.com","Lee","asdfg","123 street","Atlanta","GA","US","12345");


CREATE TABLE `mall`.`shipment` (
  `ship_id` VARCHAR(10) NOT NULL,
  `ship_phone` VARCHAR(255) NULL,
  `ship_company` VARCHAR(255) NULL,
  PRIMARY KEY (`ship_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`shipment`
(`ship_id`,
`ship_phone`,
`ship_company`)
VALUES
("sh1","951-654-357","Fedex"),
("sh2","951-654-357","Fedex"),
("sh3","682-493-0019","UPS"),
("sh4","682-493-0019","UPS"),
("sh5","300-600-500","USPS"),
("sh6","300-600-500","USPS"),
("sh7","682-493-0019","UPS"),
("sh8","682-493-0019","UPS"),
("sh9","951-654-357","Fedex"),
("sh10","951-654-357","Fedex");

CREATE TABLE `mall`.`payment` (
  `payment_id` VARCHAR(10) NOT NULL,
  `card_holder` VARCHAR(255) NULL,
  `card_type` VARCHAR(255) NULL,
  `card_number` FLOAT NULL,
  `card_exp_month` INT NULL,
  `card_exp_year` INT NULL,
  `billing_address` VARCHAR(255) NULL,
  `billing_city` VARCHAR(255) NULL,
  `billing_state` VARCHAR(255) NULL,
  `billing_country` VARCHAR(255) NULL,
  `billing_zip` VARCHAR(255) NULL,
  `order_id` VARCHAR(255) NULL,
  PRIMARY KEY (`payment_id`));
 ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`payment`
(`payment_id`,
`card_holder`,
`card_type`,
`card_number`,
`card_exp_month`,
`card_exp_year`,
`billing_address`,
`billing_city`,
`billing_state`,
`billing_country`,
`billing_zip`,
`order_id`)
VALUES
("pa1","John","VISA","3578489563","03","25","3020 street","Atlanta","GA","US","30333","o1"),
("pa2","Jane","VISA","3574896532","04","29","1231 street","Los Angeles","CA","US","12579","o2"),
("pa3","Kim","VISA","4987561230","06","22","1342 In St.","Irvine","GA","US","29786","o3"),
("pa4","Matthew","VISA","9751489630","11","23","1231 Saint Clair","Atlanta","GA","US","33897","o4"),
("pa5","Dominic","VISA","3574963015","12","25","12312 street Dr","Augusta","GA","US","46579","o5"),
("pa6","Lynn","VISA","8500126400","1","22","512 main","Columbus","GA","US","30792","o6"),
("pa7","Dustin","VISA","6699880045","02","24","road 1231","Macon","GA","US","79630","o7"),
("pa8","Kelly","VISA","6655980231","06","24","Wall street","Athens","GA","US","36987","o8"),
("pa9","Davie","VISA","1000549875","07","23","80 Dr.","Atlanta","GA","US","36925","o9"),
("pa10","Lee","VISA","1234567891","03","22","123 street","Atlanta","GA","US","12345","o10");

  
  CREATE TABLE `mall`.`orders` (
  `order_id` VARCHAR(10) NOT NULL,
  `buyer_id` VARCHAR(10) NOT NULL,
  `total_price` FLOAT NULL,
  `total_quantity` INT NULL,
  `payment_id` VARCHAR(10) NULL,
  `payment_date` DATE NULL,
  `order_date` DATE NULL,
  `cancel` INT NULL,
  `paid` INT NULL,
  `fulfill` INT NULL,
  `ship_date` DATE NULL,
  `ship_id` VARCHAR(10) NULL,
  PRIMARY KEY (`order_id`));
 ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `mall`.`orders`
(`order_id`,
`buyer_id`,
`total_price`,
`total_quantity`,
`payment_id`,
`payment_date`,
`order_date`,
`cancel`,
`paid`,
`fulfill`,
`ship_date`,
`ship_id`)
VALUES
("o1","1",120,3,"pa1","2021-03-11","2021-03-11",0,1,1,"2021-03-14","sh1"),
("o2","2",250,5,"pa2","2021-02-11","2021-02-11",0,1,1,"2021-02-14","sh2"),
("o3","3",500,10,"pa3","2021-01-11","2021-01-11",0,1,1,"2021-01-14","sh3"),
("o4","4",240,6,"pa4","2021-02-20","2021-02-20",0,1,1,"2021-02-24","sh4"),
("o5","5",40,1,"pa5","2021-01-19","2021-01-19",0,1,1,"2021-01-24","sh5"),
("o6","6",120,3,"pa6","2021-03-20","2021-03-20",0,1,1,"2021-03-30","sh6"),
("o7","7",150,3,"pa7","2021-01-14","2021-01-14",0,1,1,"2021-01-20","sh7"),
("o8","8",120,3,"pa8","2021-02-22","2021-02-22",0,1,1,"2021-02-24","sh8"),
("o9","9",150,3,"pa9","2021-03-06","2021-03-06",0,1,1,"2021-03-14","sh9"),
("o10","10",40,1,"pa10","2021-04-19","2021-04-19",0,1,1,"2021-04-21","sh10");
  
ALTER TABLE `mall`.`orders` 
ADD CONSTRAINT `order_FK1`
  FOREIGN KEY (`buyer_id`)
  REFERENCES `mall`.`buyer` (`buyer_id`),

ADD CONSTRAINT `order_FK2`
  FOREIGN KEY (`payment_id`)
  REFERENCES `mall`.`payment` (`payment_id`),

ADD CONSTRAINT `order_FK3`
  FOREIGN KEY (`ship_id`)
  REFERENCES `mall`.`shipment` (`ship_id`),

ADD CONSTRAINT `order_FK4`
  FOREIGN KEY (`order_id`)
  REFERENCES `mall`.`order_detail` (`order_id`);
  
  CREATE TABLE `mall`.`qna` (
  `qna_id` VARCHAR(10) NOT NULL,
  `qna_title` VARCHAR(255) NULL,
  `buyer_id` VARCHAR(10) NULL,
  `qna_date` DATE NULL,
  `qna_context` VARCHAR(2048) NULL,
  PRIMARY KEY (`qna_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `mall`.`qna` 
ADD CONSTRAINT `qna_FK1`
  FOREIGN KEY (`buyer_id`)
  REFERENCES `mall`.`buyer` (`buyer_id`);
 
 
 INSERT INTO `mall`.`qna`
(`qna_id`,
`qna_title`,
`buyer_id`,
`qna_date`,
`qna_comment`)
VALUES
("q1","Question for the product that I bought","1","2021-03-14","When I can get my items?"),
("q2","Question for the product that I bought","2","2021-02-14","Can you explain more about the items?"),
("q3","Question for the product that I bought","3","2021-01-14","Can I get the item as soon as possible?"),
("q4","Question for the product that I bought","4","2021-02-24","It is too expensive."),
("q5","Question for the product that I bought","5","2021-01-24","When I can get my items?"),
("q6","Question for the product that I bought","6","2021-03-30","Can I refund?"),
("q7","Question for the product that I bought","7","2021-01-20","Can I cancel my order?"),
("q8","Question for the product that I bought","8","2021-02-23","When I can get my items?"),
("q9","Question for the product that I bought","9","2021-03-10","When I can get my items?"),
("q10","Question for the product that I bought","10","2021-04-20","Is the last itme?");