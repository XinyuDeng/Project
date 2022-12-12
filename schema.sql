-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE author (
    aur_id      BIGINT NOT NULL auto_increment,
    aur_fname   VARCHAR(20) NOT NULL,
    aur_lname   VARCHAR(20) NOT NULL,
    aur_street  VARCHAR(20) NOT NULL,
    aur_city    VARCHAR(30) NOT NULL,
    aur_state   VARCHAR(30) NOT NULL,
    aur_country VARCHAR(20) NOT NULL,
    aur_email   VARCHAR(50) NOT NULL,
    aur_password varchar(30) not null
);

ALTER TABLE author ADD CONSTRAINT author_pk PRIMARY KEY ( aur_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE author_book (
    author_aur_id BIGINT NOT NULL auto_increment,
    book_book_id  BIGINT NOT NULL auto_increment
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE book (
    book_id   BIGINT NOT NULL auto_increment,
    book_name VARCHAR(30) NOT NULL,
    topic     VARCHAR(30) NOT NULL
);

ALTER TABLE book ADD CONSTRAINT book_pk PRIMARY KEY ( book_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE copy (
    copy_id      BIGINT NOT NULL auto_increment,
    status       VARCHAR(10) NOT NULL,
    book_book_id BIGINT NOT NULL
);

ALTER TABLE copy ADD CONSTRAINT copy_pk PRIMARY KEY ( copy_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE cus_exhi (
    customer_cus_id BIGINT NOT NULL auto_increment,
    exhi_event_id   BIGINT NOT NULL,
    registration_id DECIMAL(20) NOT NULL
);

ALTER TABLE cus_exhi ADD CONSTRAINT cus_exhi_pk PRIMARY KEY ( registration_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE cus_rental (
    customer_cus_id    BIGINT NOT NULL auto_increment,
    invoice_invoice_id BIGINT NOT NULL auto_increment,
    copy_copy_id       BIGINT NOT NULL auto_increment,
    ren_id             BIGINT NOT NULL auto_increment,
    ren_status         NCHAR(1) NOT NULL,
    star_date          DATETIME NOT NULL,
    expe_date          DATETIME NOT NULL,
    ret_date           DATETIME
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE UNIQUE INDEX cus_rental__idx ON
    cus_rental (
        invoice_invoice_id
    ASC );

ALTER TABLE cus_rental ADD CONSTRAINT cus_rental_pk PRIMARY KEY ( ren_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE cus_room (
    `DATE`          DATETIME NOT NULL,
    timeslot        TINYINT NOT NULL,
    room_room_id    BIGINT NOT NULL,
    customer_cus_id BIGINT NOT NULL
);

ALTER TABLE cus_room ADD CONSTRAINT cus_room_pk PRIMARY KEY (`DATE`, timeslot, room_room_id);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE customer (
    cus_id    BIGINT NOT NULL auto_increment,
    cus_fname VARCHAR(20) NOT NULL,
    cur_lname VARCHAR(20) NOT NULL,
    cus_phone DECIMAL(20) NOT NULL,
    cus_email VARCHAR(50) NOT NULL,
    id_type   VARCHAR(15) NOT NULL,
    id_number DECIMAL(20) NOT NULL,
    cus_password VARCHAR(30) NOT NULL
);

ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( cus_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE event (
    event_id   BIGINT NOT NULL auto_increment,
    event_name VARCHAR(30) NOT NULL,
    event_type VARCHAR(1) NOT NULL,
    start_date DATETIME NOT NULL,
    stop_date  DATETIME NOT NULL
);

ALTER TABLE event
    ADD CONSTRAINT ch_inh_event CHECK ( event_type IN ( 'E', 'S' ) );

ALTER TABLE event ADD CONSTRAINT event_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE exhi (
    event_id BIGINT NOT NULL auto_increment,
    exp      DECIMAL(20) NOT NULL
);

ALTER TABLE exhi ADD CONSTRAINT exhi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE indi (
    spon_id BIGINT auto_increment,
    fname   VARCHAR(15) NOT NULL,
    lname   VARCHAR(15) NOT NULL,
    indi_password VARCHAR(30) NOT NULL
);

ALTER TABLE indi ADD CONSTRAINT indi_pk PRIMARY KEY ( spon_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE invoice (
    invoice_id        BIGINT NOT NULL auto_increment,
    invoice_date      DATETIME NOT NULL,
    invoice_amount    DECIMAL(20, 2) NOT NULL,
    cus_rental_ren_id BIGINT NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE UNIQUE INDEX invoice__idx ON
    invoice (
        cus_rental_ren_id
    ASC );

ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE org (
    spon_id BIGINT auto_increment,
    name    VARCHAR(30) NOT NULL,
    org_password VARCHAR(30) NOT NULL
);

ALTER TABLE org ADD CONSTRAINT org_pk PRIMARY KEY ( spon_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE payment (
    payment_id         BIGINT NOT NULL auto_increment,
    payment_date       DATETIME NOT NULL,
    payment_amount     DECIMAL(20, 2) NOT NULL,
    payment_method     VARCHAR(15) NOT NULL,
    acc_fname          VARCHAR(15) NOT NULL,
    acc_lname          VARCHAR(15) NOT NULL,
    invoice_invoice_id BIGINT NOT NULL auto_increment
);

ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( payment_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE room (
    room_id  BIGINT NOT NULL auto_increment,
    capacity BIGINT NOT NULL
);

ALTER TABLE room ADD CONSTRAINT room_pk PRIMARY KEY ( room_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi (
    event_id BIGINT NOT NULL auto_increment
);

ALTER TABLE semi ADD CONSTRAINT semi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi_author (
    semi_event_id BIGINT NOT NULL auto_increment,
    invitation_id DECIMAL(20) NOT NULL auto_increment,
    author_aur_id BIGINT NOT NULL auto_increment
);

ALTER TABLE semi_author ADD CONSTRAINT semi_author_pk PRIMARY KEY ( invitation_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi_spon (
    semi_event_id   BIGINT NOT NULL auto_increment,
    sponsor_spon_id BIGINT NOT NULL auto_increment,
    spon_amou       DECIMAL(20) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE sponsor (
    spon_id   BIGINT NOT NULL auto_increment,
    spon_type VARCHAR(1) NOT NULL
);

ALTER TABLE sponsor
    ADD CONSTRAINT ch_inh_sponsor CHECK ( spon_type IN ( 'I', 'O' ) );

ALTER TABLE sponsor ADD CONSTRAINT sponsor_pk PRIMARY KEY ( spon_id );

ALTER TABLE author_book
    ADD CONSTRAINT author_book_author_fk FOREIGN KEY ( author_aur_id )
        REFERENCES author ( aur_id )
            ON DELETE CASCADE;

ALTER TABLE author_book
    ADD CONSTRAINT author_book_book_fk FOREIGN KEY ( book_book_id )
        REFERENCES book ( book_id )
            ON DELETE CASCADE;

ALTER TABLE copy
    ADD CONSTRAINT copy_book_fk FOREIGN KEY ( book_book_id )
        REFERENCES book ( book_id )
            ON DELETE CASCADE;

ALTER TABLE cus_exhi
    ADD CONSTRAINT cus_exhi_customer_fk FOREIGN KEY ( customer_cus_id )
        REFERENCES customer ( cus_id )
            ON DELETE CASCADE;

ALTER TABLE cus_exhi
    ADD CONSTRAINT cus_exhi_exhi_fk FOREIGN KEY ( exhi_event_id )
        REFERENCES exhi ( event_id )
            ON DELETE CASCADE;

ALTER TABLE cus_rental
    ADD CONSTRAINT cus_rental_copy_fk FOREIGN KEY ( copy_copy_id )
        REFERENCES copy ( copy_id );

ALTER TABLE cus_rental
    ADD CONSTRAINT cus_rental_customer_fk FOREIGN KEY ( customer_cus_id )
        REFERENCES customer ( cus_id )
            ON DELETE CASCADE;

ALTER TABLE cus_rental
    ADD CONSTRAINT cus_rental_invoice_fk FOREIGN KEY ( invoice_invoice_id )
        REFERENCES invoice ( invoice_id );

ALTER TABLE cus_room
    ADD CONSTRAINT cus_room_customer_fk FOREIGN KEY ( customer_cus_id )
        REFERENCES customer ( cus_id )
            ON DELETE CASCADE;

ALTER TABLE cus_room
    ADD CONSTRAINT cus_room_room_fk FOREIGN KEY ( room_room_id )
        REFERENCES room ( room_id )
            ON DELETE CASCADE;

ALTER TABLE exhi
    ADD CONSTRAINT exhi_event_fk FOREIGN KEY ( event_id )
        REFERENCES event ( event_id );

ALTER TABLE indi
    ADD CONSTRAINT indi_sponsor_fk FOREIGN KEY ( spon_id )
        REFERENCES sponsor ( spon_id );

ALTER TABLE invoice
    ADD CONSTRAINT invoice_cus_rental_fk FOREIGN KEY ( cus_rental_ren_id )
        REFERENCES cus_rental ( ren_id );

ALTER TABLE org
    ADD CONSTRAINT org_sponsor_fk FOREIGN KEY ( spon_id )
        REFERENCES sponsor ( spon_id );

ALTER TABLE payment
    ADD CONSTRAINT payment_invoice_fk FOREIGN KEY ( invoice_invoice_id )
        REFERENCES invoice ( invoice_id )
            ON DELETE CASCADE;

ALTER TABLE semi_author
    ADD CONSTRAINT semi_author_author_fk FOREIGN KEY ( author_aur_id )
        REFERENCES author ( aur_id )
            ON DELETE CASCADE;

ALTER TABLE semi_author
    ADD CONSTRAINT semi_author_semi_fk FOREIGN KEY ( semi_event_id )
        REFERENCES semi ( event_id )
            ON DELETE CASCADE;

ALTER TABLE semi
    ADD CONSTRAINT semi_event_fk FOREIGN KEY ( event_id )
        REFERENCES event ( event_id );

ALTER TABLE semi_spon
    ADD CONSTRAINT semi_spon_semi_fk FOREIGN KEY ( semi_event_id )
        REFERENCES semi ( event_id )
            ON DELETE CASCADE;

ALTER TABLE semi_spon
    ADD CONSTRAINT semi_spon_sponsor_fk FOREIGN KEY ( sponsor_spon_id )
        REFERENCES sponsor ( spon_id )
            ON DELETE CASCADE;

