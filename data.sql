insert into ROOM values(1,210);
insert into ROOM values(2,340);
insert into ROOM values(3,800);
insert into ROOM values(4,50);
insert into ROOM values(5,60);
insert into ROOM values(6,54);
insert into ROOM values(7,81);
insert into ROOM values(8,93);
insert into ROOM values(9,102);
insert into ROOM values(10,62);
select * from room;

insert into SPONSOR values(1,'O');
insert into SPONSOR values(2,'I');
insert into SPONSOR values(3,'I');
insert into SPONSOR values(4,'O');
insert into SPONSOR values(5,'O');
insert into SPONSOR values(6,'I');
insert into SPONSOR values(7,'O');
insert into SPONSOR values(8,'I');
insert into SPONSOR values(9,'O');
insert into SPONSOR values(10,'I');


INSERT INTO INDI VALUES(2, 'Li', 'Jet');
INSERT INTO INDI VALUES(3, 'John', 'Wicky');
INSERT INTO INDI VALUES(6, 'Bob', 'Mayers');
INSERT INTO INDI VALUES(8, 'Steve', 'Kerr');
INSERT INTO INDI VALUES(10, 'James', 'Harden');

INSERT INTO ORG VALUES(1, 'Tencent');
INSERT INTO ORG VALUES(4, 'Baidu');
INSERT INTO ORG VALUES(5, 'Twitter');
INSERT INTO ORG VALUES(7, 'Google');
INSERT INTO ORG VALUES(9, 'Meta');



insert into author values(1, 'Vanessa', 'Rowe', '499 Pennington St.', 'Mentor', 'OH', 'USA', 'vanessa92@gmail.com');
insert into author values(2, 'Dominick', 'Reese', '388 Studebaker Ave.', 'Mays Landing', 'NJ', 'USA', 'dominick123@yahoo.com');
insert into author values(3, 'Beverly', 'Herrera', '67 Van Dyke Rd.', 'Lititz', 'PA', 'USA', 'bdssdeverly@yahoo.com');
insert into author values(4, 'Malcolm', 'Harrison', '34 S. Hillcrest Road', 'Jeffersonville', 'IN', 'USA', 'sdqwalcolm@yahoo.com');
insert into author values(5, 'Reginald', 'Lamb', '45 Country Club St.', 'Chicopee', 'MA', 'USA', 'fksmneginald@yahoo.com');
insert into author values(6, 'Ernest', 'Dixon', '7661 East Bear Hill Rd.', 'Great Falls', 'MT', 'USA', 'ef98rnest@yahoo.com');
insert into author values(7, 'Everett', 'Lowe', '967 Foxrun Ave.', 'Glen Ellyn', 'IL', 'USA', 'everett4938@yahoo.com');
insert into author values(8, 'Darrel', 'Klein', '106 Division Road', 'Bartlett', 'IL', 'USA', 'darreldw2@gmail.com');
insert into author values(9, 'Tami', 'Morris', '222 Glenlake Street.', 'Meadville', 'PA', 'USA', 'tamaami@gmail.com');
insert into author values(10, 'Guadalupe', 'Robbins', '491 Coffee St.', 'Rolling Meadows', 'IL', 'USA', 'sduadalupe@gmail.com');


insert into book values (1, 'Butcher Of Hope', 'history');
insert into book values (2, 'Descendants Without Faith', 'children');
insert into book values (3, 'Men Of Desire', 'science');
insert into book values (4, 'Gangsters And Piratese', 'arts');
insert into book values (5, 'Element Of The World', 'travel');
insert into book values (6, 'Nation Without Time', 'adventures');
insert into book values (7, 'Welcome To The Mines', 'drama');
insert into book values (8, 'Escaping The Emperor', 'history');
insert into book values (9, 'Heirs And Slaves', 'travel');
insert into book values (10, 'Border Of Destruction', 'arts');


insert into customer values(1, 'Katherine', 'Lewis', 3254561245, 'katherinesdsd@yahoo.com', 'SSN', 128563729);
insert into customer values(2, 'Julian', 'Palmer', 4242345367, 'juliansdsd@yahoo.com', 'SSN', 424234567);
insert into customer values(3, 'Monique', 'Doyle', 9173452365, 'monique253@yahoo.com', 'SSN',915);
insert into customer values(4, 'Justin', 'Baker', 9173352365, 'justin4634@yahoo.com', 'SSN', 128563729);
insert into customer values(5, 'Freda', 'Edwards', 9012158194, 'freda362@yahoo.com', 'Driver License', 234234653);
insert into customer values(6, 'Annie', 'Gutierrez', 9172398719, 'annie463@yahoo.com', 'Driver License', 265345765);
insert into customer values(7, 'Terri', 'Roy', 8477633940, 'terri2948@gmail.com', 'Driver License', 873873645);
insert into customer values(8, 'Susan', 'Boone', 9782839142, 'susan@gmail.com', 'Passport', 123852937);
insert into customer values(9, 'Bradford', 'Russell', 2527576263, 'bsdsdradford@gmail.com', 'Passport', 859374821);
insert into customer values(10, 'Benjamin', 'Burgess', 5013138621, 'b294enjamin@gmail.com', 'Passport', 295800983);
insert into customer values(11, 'Timmy', 'Ramsey', 4242859645, 'timmy2453@gmail.com', 'Passport', 563856923);


insert into event values(1, 'book Con', 'E', STR_TO_DATE('04-05-2018 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('04-05-2018 18,30,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(2, 'book Charity', 'E', STR_TO_DATE('12-16-2017 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-16-2017 14,30,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(3, 'book Party', 'S', STR_TO_DATE('12-03-2020 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-06-2020 14,30,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(4, 'book Gala', 'S', STR_TO_DATE('05-06-2022 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('05-20-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(5, 'book Super Happy Fun Time!!', 'E', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('06-27-2021 18,30,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(6, 'Celebration of book', 'E', STR_TO_DATE('07-27-2022 18,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-13-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(7, 'A Night to Celebrate earth', 'S', STR_TO_DATE('08-18-2022 18,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-20-2022 18,30,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(8, 'The earth Honors', 'S', STR_TO_DATE('09-20-2021 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('09-26-2021 20,00,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(9, 'The earth Festivities', 'E', STR_TO_DATE('10-09-2022 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-19-2022 20,00,00', '%m-%d-%Y %H,%i,%s'));
insert into event values(10, 'DataBase', 'S', STR_TO_DATE('11-03-2022 16,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-03-2022 18,00,00', '%m-%d-%Y %H,%i,%s'));

insert into author_book values(1,1);
insert into author_book values(2,2);
insert into author_book values(3,3);
insert into author_book values(4,4);
insert into author_book values(5,5);
insert into author_book values(6,6);
insert into author_book values(7,7);
insert into author_book values(8,8);
insert into author_book values(9,9);
insert into author_book values(10,10);

insert into exhi values(1, 200);
insert into exhi values(2, 400);
insert into exhi values(5, 1000);
insert into exhi values(6, 280);
insert into exhi values(9, 460);

insert into semi values(3);
insert into semi values(4);
insert into semi values(7);
insert into semi values(8);

insert into semi values(10);

insert into copy values(1, 'rent', 2);
insert into copy values(2, 'rent', 2);
insert into copy values(3, 'avaliable', 1);
insert into copy values(4, 'avaliable', 3);
insert into copy values(5, 'rent', 5);
insert into copy values(6, 'rent', 6);
insert into copy values(7, 'avaliable', 7);
insert into copy values(8, 'rent', 9);
insert into copy values(9, 'rent', 10);
insert into copy values(10, 'avaliable', 8);
insert into copy values(11, 'rent', 4);
insert into copy values(12, 'avaliable', 8);
insert into copy values(13, 'rent', 10);

insert into cus_rental values(1, null, 1, 1, 'r', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);


insert into cus_rental values(2, null, 2, 2, 'r', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));

insert into cus_rental values(1, null, 1, 3, 'r', STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('09-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(3, null, 2, 4, 'u', STR_TO_DATE('08-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);
insert into cus_rental values(9, null, 3, 5, 'r', STR_TO_DATE('06-21-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(6, null, 4, 6, 'u', STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('12-25-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);
insert into cus_rental values(7, null, 5, 7, 'u', STR_TO_DATE('06-05-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-30-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);
insert into cus_rental values(8, null, 6, 8, 'r', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-30-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('08-01-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(6, null, 7, 9, 'r', STR_TO_DATE('04-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(4, null, 8, 10, 'r', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(2, null, 9, 11, 'r', STR_TO_DATE('08-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('10-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'));
insert into cus_rental values(7, null, 1, 12, 'u', STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), null);


insert into cus_exhi values(1, 1, 1);
insert into cus_exhi values(2, 2, 2);
insert into cus_exhi values(3, 5, 3);
insert into cus_exhi values(4, 6, 4);
insert into cus_exhi values(5, 9, 5);
insert into cus_exhi values(6, 1, 6);
insert into cus_exhi values(7, 2, 7);
insert into cus_exhi values(8, 5, 8);
insert into cus_exhi values(9, 6, 9);
insert into cus_exhi values(10, 9, 10);
insert into cus_exhi values(11, 1, 11);

insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 1, 1);
insert into cus_room values(STR_TO_DATE('10-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 2, 2);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3, 3, 3);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 4, 4, 4);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 5, 5);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 6, 6);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3, 7, 7);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 4, 8, 8);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1, 9, 9);
insert into cus_room values(STR_TO_DATE('06-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2, 10, 10);

insert into semi_spon values(3, 1, 10000);
insert into semi_spon values(4, 2, 20000);
insert into semi_spon values(7, 3, 30000);
insert into semi_spon values(8, 4, 2000);
insert into semi_spon values(10, 5, 50000);
insert into semi_spon values(3, 6, 5000);
insert into semi_spon values(4, 7, 100000);
insert into semi_spon values(7, 8, 60000);
insert into semi_spon values(8, 9, 70000);
insert into semi_spon values(10, 10, 80000);

insert into semi_author values(3, 1, 1);
insert into semi_author values(4, 2, 2);
insert into semi_author values(7, 3, 3);
insert into semi_author values(8, 4, 4);
insert into semi_author values(10, 5, 5);
insert into semi_author values(3, 6, 6);
insert into semi_author values(4, 7, 7);
insert into semi_author values(7, 8, 8);
insert into semi_author values(8, 9, 9);
insert into semi_author values(10, 10, 10);



insert into payment values(1, STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4, 'Paypal','Katherine', 'Lewis' ,1);
insert into payment values(2, STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 3,'Debit', 'Julian','Palmer',2);
insert into payment values(3, STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 2,'Paypal','Julian','Palmer' ,2);
insert into payment values(4, STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 1,'Debit', 'Julian','Palmer' ,2);
insert into payment values(5, STR_TO_DATE('09-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 19,'Paypal', 'Katherine', 'Lewis' ,3);
insert into payment values(6, STR_TO_DATE('07-23-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4,'Debit', 'Bradford', 'Russell' ,4);
insert into payment values(7, STR_TO_DATE('08-01-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 8.2, 'Cash', 'Susan', 'Boone' ,5);
insert into payment values(8, STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 20, 'Cash','Annie', 'Gutierrez',6);
insert into payment values(9, STR_TO_DATE('11-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 23.2,'Debit','Annie', 'Gutierrez' ,6);
insert into payment values(10, STR_TO_DATE('07-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 6.4, 'Cash', 'Justin', 'Baker' ,7);
insert into payment values(11, STR_TO_DATE('10-24-2021 14,00,00', '%m-%d-%Y %H,%i,%s'), 12.6, 'Debit','Julian','Palmer' ,8);


