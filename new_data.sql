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

insert into cus_room values
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

insert into aur_book values(1,1), (2,2), (3,3), (4,4), (5,5), (6,6), (7,7), (8,8), (9,9), (10,10);
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
    (1, 12, 'RENTING', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);
/*
#test for update cus_rental trigger
UPDATE cus_rental SET ret_date = STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s') WHERE ren_id = 1;
SELECT * FROM copy;
*/

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
	(STR_TO_DATE('10-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 12.6, 'Debit','Julian','Palmer', 8);
select * from payment;





