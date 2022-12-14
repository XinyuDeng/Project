insert into customer (first_name, last_name, phone, email, id_type, id_number, cus_pass) values
	('Katherine', 'Lewis', 3254561245, 'katherinesdsd@yahoo.com', 'SSN', 128563729, '123456'),
    ('Julian', 'Palmer', 4242345367, 'juliansdsd@yahoo.com', 'SSN', 424234567, '123456'),
    ('Monique', 'Doyle', 9173452365, 'monique253@yahoo.com', 'SSN', 915852456, '123456'),
    ('Justin', 'Baker', 9173352365, 'justin4634@yahoo.com', 'SSN', 128563729, '123456'),
    ('Freda', 'Edwards', 9012158194, 'freda362@yahoo.com', 'Driver License', 234234653, '123456'),
    ('Annie', 'Gutierrez', 9172398719, 'annie463@yahoo.com', 'Driver License', 265345765, '123456'),
    ('Terri', 'Roy', 8477633940, 'terri2948@gmail.com', 'Driver License', 873873645, '123456'),
    ('Susan', 'Boone', 9782839142, 'susan@gmail.com', 'Passport', 123852937, '123456'),
    ('Bradford', 'Russell', 2527576263, 'bsdsdradford@gmail.com', 'Passport', 859374821, '123456'),
    ('Benjamin', 'Burgess', 5013138621, 'b294enjamin@gmail.com', 'Passport', 295800983, '123456'),
    ('Timmy', 'Ramsey', 4242859645, 'timmy2453@gmail.com', 'Passport', 563856923, '123456');
select * from customer;

insert into ROOM (capacity) values(210), (340), (800), (50), (60), (54), (81), (93), (102), (62);
select * from room;

insert into cus_room (date, timeslot, room_id, customer_id) values 
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 1, 1),
	(STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 2, 2),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3, 3, 3),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 4, 4, 4),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 5, 5),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 6, 6),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3, 7, 7),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 4, 8, 8),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 9, 9),
	(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 10, 10);
select * from cus_room;
/*
#test for cus_room_customer_fk and cus_room_room_fk
DELETE FROM ROOM WHERE room_id = 1;
select * from room;
select * from cus_room;
DELETE FROM CUSTOMER WHERE customer_id = 10;
select * from customer;
select * from cus_room;
*/

DROP TABLE IF EXISTS aur_book;
CREATE TABLE aur_book (
    aur_id BIGINT NOT NULL,
    book_id  BIGINT NOT NULL,
    primary key (aur_id, book_id)
);
insert into author (first_name, last_name, street, city, state, country, email, aur_pass) values 
	('Vanessa', 'Rowe', '499 Pennington St.', 'Mentor', 'OH', 'USA', 'vanessa92@gmail.com', '123456'),
	('Dominick', 'Reese', '388 Studebaker Ave.', 'Mays Landing', 'NJ', 'USA', 'dominick123@yahoo.com', '123456'),
    ('Beverly', 'Herrera', '67 Van Dyke Rd.', 'Lititz', 'PA', 'USA', 'bdssdeverly@yahoo.com', '123456'),
    ('Malcolm', 'Harrison', '34 S. Hillcrest Road', 'Jeffersonville', 'IN', 'USA', 'sdqwalcolm@yahoo.com', '123456'),
    ('Reginald', 'Lamb', '45 Country Club St.', 'Chicopee', 'MA', 'USA', 'fksmneginald@yahoo.com', '123456'),
    ('Ernest', 'Dixon', '7661 East Bear Hill Rd.', 'Great Falls', 'MT', 'USA', 'ef98rnest@yahoo.com', '123456'),
    ('Everett', 'Lowe', '967 Foxrun Ave.', 'Glen Ellyn', 'IL', 'USA', 'everett4938@yahoo.com', '123456'),
    ('Darrel', 'Klein', '106 Division Road', 'Bartlett', 'IL', 'USA', 'darreldw2@gmail.com', '123456'),
    ('Tami', 'Morris', '222 Glenlake Street.', 'Meadville', 'PA', 'USA', 'tamaami@gmail.com', '123456'),
    ('Guadalupe', 'Robbins', '491 Coffee St.', 'Rolling Meadows', 'IL', 'USA', 'sduadalupe@gmail.com', '123456');
select * from author;

insert into book (book_name, topic) values 
	('Butcher Of Hope', 'history'),
    ('Descendants Without Faith', 'children'),
    ('Men Of Desire', 'science'),
    ('Gangsters And Piratese', 'arts'),
    ('Element Of The World', 'travel'),
    ('Nation Without Time', 'adventures'),
    ('Welcome To The Mines', 'drama'),
    ('Escaping The Emperor', 'history'),
    ('Heirs And Slaves', 'travel'),
    ('Border Of Destruction', 'arts');
select * from book;

insert into aur_book (aur_id, book_id) values (1,1), (2,2), (3,3), (4,4), (5,5), (6,6), (7,7), (8,8), (9,9), (10,10);
select * from aur_book;

/*
select * from author
INNER JOIN aur_book ON author.aur_id = aur_book.aur_id
INNER JOIN book ON aur_book.book_id = book.book_id
*/

insert into copy (status, book_id) values
	('RENTED', 2),
    ('AVAILABLE', 1),
    ('AVAILABLE', 3),
    ('RENTED', 5),
    ('RENTED', 6),
    ('AVAILABLE', 7),
    ('RENTED', 9),
    ('RENTED', 10),
    ('AVAILABLE', 8),
    ('RENTED', 4),
    ('AVAILABLE', 8),
    ('RENTED', 10);
select * from copy;

insert into cus_rental (customer_id, copy_id, ren_status, star_date, expe_date, ret_date) values
	(1, 1, 'RENTING', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null), 
    (2, 2, 'RETURNED', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (1, 3, 'RETURNED', STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('09-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (2, 4, 'RENTING', STR_TO_DATE('08-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null),
    (3, 5, 'RETURNED', STR_TO_DATE('06-21-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (4, 6, 'RENTING', STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-25-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null),
    (5, 7, 'RENTING', STR_TO_DATE('06-05-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-30-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null),
    (6, 8, 'RETURNED', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-30-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-01-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (7, 9, 'RETURNED', STR_TO_DATE('04-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (8, 10, 'RETURNED', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s')),
    (1, 12, 'RENTING', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
SELECT * FROM cus_rental;
/*
#test for update cus_rental trigger
UPDATE cus_rental SET ret_date = STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s') WHERE ren_id = 1;
SELECT * FROM copy;
#test for cus_rental_copy_fk
SELECT * FROM cus_rental;
DELETE FROM copy WHERE copy_id = 2;
#test for copy_book_fk and author_book_book_fk
SELECT * FROM book;
DELETE FROM book WHERE book_id = 9;
SELECT * FROM aur_book;
SELECT * FROM author;
DELETE FROM author WHERE aur_id = 2;
*/
select * from invoice;

insert into payment (payment_date, payment_amount, payment_method, acc_fname, acc_lname, invoice_id) values
	(STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4, 'Paypal','Katherine', 'Lewis' ,1),
	(STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3,'Debit', 'Julian','Palmer', 2),
	(STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2,'Paypal','Julian','Palmer', 2),
	(STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1,'Debit', 'Julian','Palmer', 2),
	(STR_TO_DATE('09-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 19,'Paypal', 'Katherine', 'Lewis', 3),
	(STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4,'Debit', 'Bradford', 'Russell', 4),
	(STR_TO_DATE('08-01-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 8.2, 'Cash', 'Susan', 'Boone', 5),
	(STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 20, 'Cash','Annie', 'Gutierrez', 6),
	(STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 23.2,'Debit','Annie', 'Gutierrez', 6),
	(STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4, 'Cash', 'Justin', 'Baker', 7),
	(STR_TO_DATE('10-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 12.6, 'Debit','Julian','Palmer', 7);
select * from payment;
/*
#test for invoice_cus_rental_fk and payment_invoice_fk
select * from invoice;
select * from payment;
select * from cus_rental;
DELETE FROM invoice WHERE invoice_id = 7;
DELETE FROM cus_rental WHERE ren_id = 3;
#test for cus_rental_customer_fk
select * from customer;
DELETE FROM customer where customer_id = 3;
*/

#insert sponsor data
INSERT INTO SPONSOR (spon_type) values('O');
INSERT INTO ORG VALUES(1, 'Tencent', '123456');
INSERT INTO SPONSOR (spon_type) values('I');
INSERT INTO INDI VALUES(2, 'Li', 'Jet', '123456');
INSERT INTO SPONSOR (spon_type) values('I');
INSERT INTO INDI VALUES(3, 'John', 'Wicky', '123456');
INSERT INTO SPONSOR (spon_type) values('O');
INSERT INTO ORG VALUES(4, 'Baidu', '123456');
INSERT INTO SPONSOR (spon_type) values('O');
INSERT INTO ORG VALUES(5, 'Twitter', '123456');
INSERT INTO SPONSOR (spon_type) values('I');
INSERT INTO INDI VALUES(6, 'Bob', 'Mayers', '123456');
INSERT INTO SPONSOR (spon_type) values('O');
INSERT INTO ORG VALUES(7, 'Google', '123456');
INSERT INTO SPONSOR (spon_type) values('I');
INSERT INTO INDI VALUES(8, 'Steve', 'Kerr', '123456');
INSERT INTO SPONSOR (spon_type) values('O');
INSERT INTO ORG VALUES(9, 'Meta', '123456');
INSERT INTO SPONSOR (spon_type) values('I');
INSERT INTO INDI VALUES(10, 'James', 'Harden', '123456');
select * from SPONSOR;
select * from INDI;
select * from ORG;
/*
#test for indi_sponsor_fk and org_sponsor_fk
DELETE FROM SPONSOR WHERE spon_id = 1;
DELETE FROM SPONSOR WHERE spon_id = 2;
*/

INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('book Con', 'E', STR_TO_DATE('04-05-2018 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('04-05-2018 18,30,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO exhi VALUES(1, 200);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('book Charity', 'E', STR_TO_DATE('12-16-2017 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-16-2017 14,30,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO exhi VALUES(2, 400);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('book Party', 'S', STR_TO_DATE('12-03-2020 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-06-2020 14,30,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO semi VALUES(3);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('book Gala', 'S', STR_TO_DATE('05-06-2022 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('05-20-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO semi VALUES(4);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('book Super Happy Fun Time!!', 'E', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('06-27-2021 18,30,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO exhi VALUES(5, 1000);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('Celebration of book', 'E', STR_TO_DATE('07-27-2022 18,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-13-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO exhi VALUES(6, 280);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('A Night to Celebrate earth', 'S', STR_TO_DATE('08-18-2022 18,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-20-2022 18,30,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO semi VALUES(7);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('The earth Honors', 'S', STR_TO_DATE('09-20-2021 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('09-26-2021 20,00,00', '%m-%d-%Y %H,%i,%s'));
insert into semi VALUES(8);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('The earth Festivities', 'E', STR_TO_DATE('10-09-2022 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-19-2022 20,00,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO exhi VALUES(9, 460);
INSERT INTO `event` (event_name, event_type, start_date, stop_date) VALUES 
	('DataBase', 'S', STR_TO_DATE('11-03-2022 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-03-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));
INSERT INTO semi VALUES(10);
select * from `event`;
select * from exhi;
select * from semi;
/*
#test for exhi_event_fk and semi_event_fk
DELETE FROM `event` WHERE event_id = 1;
DELETE FROM `event` WHERE event_id = 3;
*/

INSERT INTO cus_exhi (customer_id, event_id) VALUES 
	(1, 1),
	(2, 1),
	(3, 2),
	(4, 2),
	(5, 5),
	(6, 5),
	(7, 6),
	(8, 6),
	(9, 9),
	(10, 9),
	(11, 9);
select * from cus_exhi;
/*
#test for cus_exhi_customer_fk and cus_exhi_exhi_fk
select * from cus_exhi;
SELECT * FROM customer;
DELETE FROM customer WHERE customer_id = 1;
DELETE FROM event WHERE event_id = 2;
SELECT * FROM event;
SELECT * FROM exhi;
*/

INSERT INTO semi_spon (event_id, spon_id, amount) VALUES
	(3, 1, 1000),
	(4, 2, 2000),
	(7, 3, 3000),
	(8, 4, 2000),
	(10, 5, 5000),
	(3, 6, 5000),
	(4, 7, 10000),
	(7, 8, 6000),
	(8, 9, 7000),
	(10, 10, 8000);
select * from semi_spon;
/*
#test for semi_spon_semi_fk and semi_spon_sponsor_fk
select * from semi_spon;
SELECT * FROM sponsor;
DELETE FROM sponsor WHERE spon_id = 1;
DELETE FROM event WHERE event_id = 3;
SELECT * FROM event;
SELECT * FROM semi;
*/

INSERT INTO semi_author (event_id, aur_id) VALUES
	(4, 1),
	(4, 2),
	(7, 3),
	(8, 4),
	(10, 5),
	(10, 6),
	(4, 7),
	(7, 8),
	(8, 9),
	(10, 10);
select * from semi_author;
/*
#test for semi_author_author_fk and semi_author_semi_fk
select * from semi_author;
SELECT * FROM author;
DELETE FROM author WHERE aur_id = 1;
DELETE FROM event WHERE event_id = 10;
SELECT * FROM event;
SELECT * FROM semi;
*/

INSERT INTO manager VALUES ('admin', 'password');

