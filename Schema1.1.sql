-- SQLINES LICENSE FOR EVALUATION USE ONLY

DROP TABLE IF EXISTS manager;
CREATE TABLE manager (
    user_name   VARCHAR(20) NOT NULL,
    man_pass varchar(30) NOT NULL
);

/*
DROP TABLE IF EXISTS manager_hash;
CREATE TABLE manager_hash (
	user_name VARCHAR(20) NOT NULL,
    man_pass varchar(30) NOT NULL,
    man_hash varchar(60) NOT NULL
);
*/

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS author;
CREATE TABLE author (
    aur_id      BIGINT NOT NULL auto_increment,
    first_name   VARCHAR(20) NOT NULL,
    last_name   VARCHAR(20) NOT NULL,
    street  VARCHAR(30) NOT NULL,
    city    VARCHAR(30) NOT NULL,
    state   VARCHAR(30) NOT NULL,
    country VARCHAR(20) NOT NULL,
    email   VARCHAR(50) NOT NULL,
    aur_pass varchar(30) NOT NULL,
    primary key (aur_id)
);
-- ALTER TABLE author ADD CONSTRAINT author_pk PRIMARY KEY ( aur_id );

DROP TABLE IF EXISTS author_hash;
CREATE TABLE author_hash (
	aur_id      BIGINT NOT NULL,
    aur_pass varchar(30) NOT NULL,
    aur_hash varchar(60) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS aur_book;
CREATE TABLE aur_book (
    aur_id BIGINT NOT NULL,
    book_id  BIGINT NOT NULL,
    primary key (aur_id, book_id)
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS book;
CREATE TABLE book (
    book_id   BIGINT NOT NULL auto_increment,
    book_name VARCHAR(30) NOT NULL,
    topic     VARCHAR(30) NOT NULL,
    primary key (book_id)
);
-- ALTER TABLE book ADD CONSTRAINT book_pk PRIMARY KEY ( book_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS copy;
CREATE TABLE copy (
    copy_id      BIGINT NOT NULL auto_increment,
    status       VARCHAR(10) NOT NULL,
    book_id BIGINT NOT NULL,
    primary key (copy_id)
);
-- ALTER TABLE copy ADD CONSTRAINT copy_pk PRIMARY KEY ( copy_id );


-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS customer;
CREATE TABLE customer (
    customer_id    BIGINT NOT NULL auto_increment,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    phone DECIMAL(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    id_type   VARCHAR(15) NOT NULL,
    id_number DECIMAL(20) NOT NULL,
    cus_pass VARCHAR(30) NOT NULL,
    primary key (customer_id)
);
-- ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( customer_id );

DROP TABLE IF EXISTS customer_hash;
CREATE TABLE customer_hash (
	customer_id BIGINT NOT NULL,
    cus_pass VARCHAR(30) NOT NULL,
    cus_hash VARCHAR(60) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS event;
CREATE TABLE event (
    event_id   BIGINT NOT NULL auto_increment,
    event_name VARCHAR(30) NOT NULL,
    event_type VARCHAR(1) NOT NULL,
    start_date DATETIME NOT NULL,
    stop_date  DATETIME NOT NULL,
    primary key (event_id)
);

ALTER TABLE event
    ADD CONSTRAINT ch_inh_event CHECK ( event_type IN ( 'E', 'S' ) );
-- ALTER TABLE event ADD CONSTRAINT event_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS exhi;
CREATE TABLE exhi (
    event_id BIGINT NOT NULL auto_increment,
    exp      DECIMAL(20) NOT NULL,
    primary key (event_id)
);
-- ALTER TABLE exhi ADD CONSTRAINT exhi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS semi;
CREATE TABLE semi (
    event_id BIGINT NOT NULL auto_increment,
    primary key (event_id)
);
-- ALTER TABLE semi ADD CONSTRAINT semi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS indi, org, sponsor;
CREATE TABLE sponsor (
    spon_id   BIGINT NOT NULL auto_increment,
    spon_type VARCHAR(1) NOT NULL,
    primary key (spon_id)
);

ALTER TABLE sponsor
    ADD CONSTRAINT ch_inh_sponsor CHECK ( spon_type IN ( 'I', 'O' ) );
-- ALTER TABLE sponsor ADD CONSTRAINT sponsor_pk PRIMARY KEY ( spon_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS indi;
CREATE TABLE indi (
    spon_id BIGINT NOT NULL,
    fname   VARCHAR(15) NOT NULL,
    lname   VARCHAR(15) NOT NULL,
    password VARCHAR(30) NOT NULL,
    primary key (spon_id)
);
-- ALTER TABLE indi ADD CONSTRAINT indi_pk PRIMARY KEY ( spon_id );

DROP TABLE IF EXISTS indi_hash;
CREATE TABLE indi_hash (
	spon_id BIGINT,
    indi_pass varchar(30) NOT NULL,
    indi_hash varchar(60) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS org;
CREATE TABLE org (
    spon_id BIGINT NOT NULL,
    name    VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    primary key (spon_id)
);
-- ALTER TABLE org ADD CONSTRAINT org_pk PRIMARY KEY ( spon_id );

DROP TABLE IF EXISTS org_hash;
CREATE TABLE org_hash (
	spon_id BIGINT,
    org_pass varchar(30) NOT NULL,
    org_hash varchar(60) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS cus_rental;
CREATE TABLE cus_rental (
	ren_id          BIGINT NOT NULL auto_increment,
    customer_id    	BIGINT NOT NULL,
    /*invoice_id 		BIGINT NOT NULL,*/
    copy_id       	BIGINT NOT NULL,
    ren_status      VARCHAR(10) NOT NULL,
    star_date       DATETIME NOT NULL,
    expe_date       DATETIME NOT NULL,
    ret_date        DATETIME,
    primary key (ren_id)
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
/*CREATE UNIQUE INDEX cus_rental__idx ON
    cus_rental (
        invoice_id
    ASC );*/
-- ALTER TABLE cus_rental ADD CONSTRAINT cus_rental_pk PRIMARY KEY ( ren_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS invoice;
CREATE TABLE invoice (
    invoice_id        BIGINT NOT NULL auto_increment,
    invoice_date      DATETIME NOT NULL,
    invoice_amount    DECIMAL (20, 2) NOT NULL,
    ren_id BIGINT NOT NULL,
    primary key (invoice_id)
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE UNIQUE INDEX invoice__idx ON
    invoice (
        ren_id
    ASC );
-- ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS payment;
CREATE TABLE payment (
    payment_id         BIGINT NOT NULL auto_increment,
    payment_date       DATETIME NOT NULL,
    payment_amount     DECIMAL(20, 2) NOT NULL,
    payment_method     VARCHAR(15) NOT NULL,
    acc_fname          VARCHAR(15) NOT NULL,
    acc_lname          VARCHAR(15) NOT NULL,
    invoice_id BIGINT NOT NULL,
    primary key (payment_id)
);
-- ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( payment_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS room;
CREATE TABLE room (
    room_id  BIGINT NOT NULL auto_increment,
    capacity BIGINT NOT NULL,
    primary key (room_id)
);
-- ALTER TABLE room ADD CONSTRAINT room_pk PRIMARY KEY ( room_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS cus_room;
CREATE TABLE cus_room (
	reserveation_id BIGINT NOT NULL AUTO_INCREMENT,
    date          DATETIME NOT NULL,
    timeslot        TINYINT NOT NULL,
    room_id    BIGINT NOT NULL,
    customer_id BIGINT NOT NULL,
    primary key (reserveation_id)
);
-- ALTER TABLE cus_room ADD CONSTRAINT cus_room_pk PRIMARY KEY (`DATE`, timeslot, room_id);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS cus_exhi;
CREATE TABLE cus_exhi (
	registration_id BIGINT NOT NULL auto_increment,
	customer_id BIGINT NOT NULL,
	event_id   BIGINT NOT NULL,
    primary key (registration_id)
);
-- ALTER TABLE cus_exhi ADD CONSTRAINT cus_exhi_pk PRIMARY KEY ( registration_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS semi_author;
CREATE TABLE semi_author (
	invitation_id BIGINT NOT NULL auto_increment,
    event_id BIGINT NOT NULL,
    aur_id BIGINT NOT NULL,
    primary key(invitation_id)
);
-- ALTER TABLE semi_author ADD CONSTRAINT semi_author_pk PRIMARY KEY ( invitation_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TABLE IF EXISTS semi_spon;
CREATE TABLE semi_spon (
    event_id   BIGINT NOT NULL,
    spon_id BIGINT NOT NULL,
    amount       DECIMAL(20) NOT NULL,
    primary key (event_id, spon_id)
);


ALTER TABLE copy
    ADD CONSTRAINT copy_book_fk FOREIGN KEY ( book_id )
        REFERENCES book ( book_id )
		ON DELETE CASCADE;
-- not working
ALTER TABLE aur_book
    ADD CONSTRAINT author_book_author_fk FOREIGN KEY ( aur_id )
        REFERENCES author ( aur_id )
		ON DELETE CASCADE;
-- not working
ALTER TABLE aur_book
    ADD CONSTRAINT author_book_book_fk FOREIGN KEY ( book_id )
        REFERENCES book ( book_id )
		ON DELETE CASCADE;
            
ALTER TABLE indi
    ADD CONSTRAINT indi_sponsor_fk FOREIGN KEY ( spon_id )
        REFERENCES sponsor ( spon_id )
        ON DELETE CASCADE;

ALTER TABLE org
    ADD CONSTRAINT org_sponsor_fk FOREIGN KEY ( spon_id )
        REFERENCES sponsor ( spon_id )
        ON DELETE CASCADE;

ALTER TABLE cus_room
    ADD CONSTRAINT cus_room_customer_fk FOREIGN KEY ( customer_id )
        REFERENCES customer ( customer_id )
		ON DELETE CASCADE;

ALTER TABLE cus_room
    ADD CONSTRAINT cus_room_room_fk FOREIGN KEY ( room_id )
        REFERENCES room ( room_id )
		ON DELETE CASCADE;

ALTER TABLE invoice
    ADD CONSTRAINT invoice_cus_rental_fk FOREIGN KEY ( ren_id )
		REFERENCES cus_rental ( ren_id )
		ON DELETE CASCADE;

ALTER TABLE payment
    ADD CONSTRAINT payment_invoice_fk FOREIGN KEY ( invoice_id )
        REFERENCES invoice ( invoice_id )
		ON DELETE CASCADE;

ALTER TABLE cus_rental
    ADD CONSTRAINT cus_rental_copy_fk FOREIGN KEY ( copy_id )
        REFERENCES copy ( copy_id )
		ON DELETE CASCADE;

ALTER TABLE cus_rental
    ADD CONSTRAINT cus_rental_customer_fk FOREIGN KEY ( customer_id )
        REFERENCES customer ( customer_id )
		ON DELETE CASCADE;

ALTER TABLE exhi
    ADD CONSTRAINT exhi_event_fk FOREIGN KEY ( event_id )
        REFERENCES event ( event_id )
        ON DELETE CASCADE;
        
ALTER TABLE semi
    ADD CONSTRAINT semi_event_fk FOREIGN KEY ( event_id )
        REFERENCES event ( event_id )
        ON DELETE CASCADE;

ALTER TABLE cus_exhi
    ADD CONSTRAINT cus_exhi_customer_fk FOREIGN KEY ( customer_id )
        REFERENCES customer ( customer_id )
		ON DELETE CASCADE;

ALTER TABLE cus_exhi
    ADD CONSTRAINT cus_exhi_exhi_fk FOREIGN KEY ( event_id )
        REFERENCES exhi ( event_id )
		ON DELETE CASCADE;

ALTER TABLE semi_spon
    ADD CONSTRAINT semi_spon_semi_fk FOREIGN KEY ( event_id )
        REFERENCES semi ( event_id )
		ON DELETE CASCADE;

ALTER TABLE semi_spon
    ADD CONSTRAINT semi_spon_sponsor_fk FOREIGN KEY ( spon_id )
        REFERENCES sponsor ( spon_id )
		ON DELETE CASCADE;

ALTER TABLE semi_author
    ADD CONSTRAINT semi_author_author_fk FOREIGN KEY ( aur_id )
        REFERENCES author ( aur_id )
		ON DELETE CASCADE;

ALTER TABLE semi_author
    ADD CONSTRAINT semi_author_semi_fk FOREIGN KEY ( event_id )
        REFERENCES semi ( event_id )
		ON DELETE CASCADE;

