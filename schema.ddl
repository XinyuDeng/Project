-- 生成者Oracle SQL Developer Data Modeler 22.2.0.165.1149
--   时间:        2022-11-06 15:32:53 EST
--   站点:      Oracle Database 11g
--   类型:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE author (
    aur_id      NUMBER(10) NOT NULL,
    aur_fname   VARCHAR2(20) NOT NULL,
    aur_lname   VARCHAR2(20) NOT NULL,
    aur_street  VARCHAR2(20) NOT NULL,
    aur_city    VARCHAR2(30) NOT NULL,
    aur_state   VARCHAR2(30) NOT NULL,
    aur_country VARCHAR2(20) NOT NULL,
    aur_email   VARCHAR2(50) NOT NULL
);

ALTER TABLE author ADD CONSTRAINT author_pk PRIMARY KEY ( aur_id );

CREATE TABLE author_book (
    author_aur_id NUMBER(10) NOT NULL,
    book_book_id  NUMBER(20) NOT NULL
);

CREATE TABLE book (
    book_id   NUMBER(20) NOT NULL,
    book_name VARCHAR2(30) NOT NULL,
    topic     VARCHAR2(30) NOT NULL
);

ALTER TABLE book ADD CONSTRAINT book_pk PRIMARY KEY ( book_id );

CREATE TABLE copy (
    copy_id      NUMBER(10) NOT NULL,
    status       VARCHAR2(10) NOT NULL,
    book_book_id NUMBER(20) NOT NULL
);

ALTER TABLE copy ADD CONSTRAINT copy_pk PRIMARY KEY ( copy_id );

CREATE TABLE cus_exhi (
    customer_cus_id NUMBER(10),
    exhi_event_id   NUMBER(10) NOT NULL,
    registration_id NUMBER(20) NOT NULL
);

ALTER TABLE cus_exhi ADD CONSTRAINT cus_exhi_pk PRIMARY KEY ( registration_id );

CREATE TABLE cus_rental (
    customer_cus_id    NUMBER(10),
    invoice_invoice_id NUMBER(10) NOT NULL,
    copy_copy_id       NUMBER(10) NOT NULL,
    ren_id             NUMBER(15) NOT NULL,
    ren_status         NCHAR(1) NOT NULL,
    star_date          DATE NOT NULL,
    expe_date          DATE NOT NULL,
    ret_date           DATE
);

CREATE UNIQUE INDEX cus_rental__idx ON
    cus_rental (
        invoice_invoice_id
    ASC );

ALTER TABLE cus_rental ADD CONSTRAINT cus_rental_pk PRIMARY KEY ( ren_id );

CREATE TABLE cus_room (
    "DATE"          DATE NOT NULL,
    timeslot        NUMBER(1) NOT NULL,
    room_room_id    NUMBER(10),
    customer_cus_id NUMBER(10)
);

CREATE TABLE customer (
    cus_id    NUMBER(10) NOT NULL,
    cus_fname VARCHAR2(20) NOT NULL,
    cur_lname VARCHAR2(20) NOT NULL,
    cus_phone NUMBER(20) NOT NULL,
    cus_email VARCHAR2(50) NOT NULL,
    id_type   VARCHAR2(15) NOT NULL,
    id_number NUMBER(20) NOT NULL
);

ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( cus_id );

CREATE TABLE event (
    event_id   NUMBER(10) NOT NULL,
    event_name VARCHAR2(30) NOT NULL,
    event_type VARCHAR2(1) NOT NULL,
    start_date DATE NOT NULL,
    stop_date  DATE NOT NULL
);

ALTER TABLE event
    ADD CONSTRAINT ch_inh_event CHECK ( event_type IN ( 'E', 'S' ) );

ALTER TABLE event ADD CONSTRAINT event_pk PRIMARY KEY ( event_id );

CREATE TABLE exhi (
    event_id NUMBER(10) NOT NULL,
    exp      NUMBER(20) NOT NULL
);

ALTER TABLE exhi ADD CONSTRAINT exhi_pk PRIMARY KEY ( event_id );

CREATE TABLE indi (
    spon_id NUMBER(10) NOT NULL,
    fname   VARCHAR2(15) NOT NULL,
    lname   VARCHAR2(15) NOT NULL
);

ALTER TABLE indi ADD CONSTRAINT indi_pk PRIMARY KEY ( spon_id );

CREATE TABLE invoice (
    invoice_id     NUMBER(10) NOT NULL,
    invoice_date   DATE NOT NULL,
    invoice_amount NUMBER(20, 2) NOT NULL
);

ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );

CREATE TABLE org (
    spon_id NUMBER(10) NOT NULL,
    name    VARCHAR2(30) NOT NULL
);

ALTER TABLE org ADD CONSTRAINT org_pk PRIMARY KEY ( spon_id );

CREATE TABLE payment (
    payment_id         NUMBER(10) NOT NULL,
    payment_date       DATE NOT NULL,
    payment_amount     NUMBER(20, 2) NOT NULL,
    payment_method     VARCHAR2(15) NOT NULL,
    acc_fname          VARCHAR2(15) NOT NULL,
    acc_lname          VARCHAR2(15) NOT NULL,
    invoice_invoice_id NUMBER(10) NOT NULL
);

ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( payment_id );

CREATE TABLE room (
    room_id  NUMBER(10) NOT NULL,
    capacity NUMBER(10) NOT NULL
);

ALTER TABLE room ADD CONSTRAINT room_pk PRIMARY KEY ( room_id );

CREATE TABLE semi (
    event_id NUMBER(10) NOT NULL
);

ALTER TABLE semi ADD CONSTRAINT semi_pk PRIMARY KEY ( event_id );

CREATE TABLE semi_author (
    semi_event_id NUMBER(10) NOT NULL,
    invitation_id NUMBER(20) NOT NULL,
    author_aur_id NUMBER(10)
);

ALTER TABLE semi_author ADD CONSTRAINT semi_author_pk PRIMARY KEY ( invitation_id );

CREATE TABLE semi_spon (
    semi_event_id   NUMBER(10) NOT NULL,
    sponsor_spon_id NUMBER(10) NOT NULL,
    spon_amou       NUMBER(20) NOT NULL
);

CREATE TABLE sponsor (
    spon_id   NUMBER(10) NOT NULL,
    spon_type VARCHAR2(1) NOT NULL
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

CREATE OR REPLACE TRIGGER arc_fkarc_1_exhi BEFORE
    INSERT OR UPDATE OF event_id ON exhi
    FOR EACH ROW
DECLARE
    d VARCHAR2(1);
BEGIN
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = :new.event_id;

    IF ( d IS NULL OR d <> 'E' ) THEN
        raise_application_error(-20223, 'FK EXHI_EVENT_FK in Table EXHI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''E'''
        );
    END IF;

EXCEPTION
    WHEN no_data_found THEN
        NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/

CREATE OR REPLACE TRIGGER arc_fkarc_1_semi BEFORE
    INSERT OR UPDATE OF event_id ON semi
    FOR EACH ROW
DECLARE
    d VARCHAR2(1);
BEGIN
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = :new.event_id;

    IF ( d IS NULL OR d <> 'S' ) THEN
        raise_application_error(-20223, 'FK SEMI_EVENT_FK in Table SEMI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''S'''
        );
    END IF;

EXCEPTION
    WHEN no_data_found THEN
        NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/

CREATE OR REPLACE TRIGGER arc_fkarc_2_indi BEFORE
    INSERT OR UPDATE OF spon_id ON indi
    FOR EACH ROW
DECLARE
    d VARCHAR2(1);
BEGIN
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = :new.spon_id;

    IF ( d IS NULL OR d <> 'I' ) THEN
        raise_application_error(-20223, 'FK INDI_SPONSOR_FK in Table INDI violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''I'''
        );
    END IF;

EXCEPTION
    WHEN no_data_found THEN
        NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/

CREATE OR REPLACE TRIGGER arc_fkarc_2_org BEFORE
    INSERT OR UPDATE OF spon_id ON org
    FOR EACH ROW
DECLARE
    d VARCHAR2(1);
BEGIN
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = :new.spon_id;

    IF ( d IS NULL OR d <> 'O' ) THEN
        raise_application_error(-20223, 'FK ORG_SPONSOR_FK in Table ORG violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''O'''
        );
    END IF;

EXCEPTION
    WHEN no_data_found THEN
        NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/



-- Oracle SQL Developer Data Modeler 概要报告: 
-- 
-- CREATE TABLE                            19
-- CREATE INDEX                             1
-- ALTER TABLE                             37
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           4
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
