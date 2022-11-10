

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE author (
    aur_id      BIGINT NOT NULL,
    aur_fname   VARCHAR(20) NOT NULL,
    aur_lname   VARCHAR(20) NOT NULL,
    aur_street  VARCHAR(20) NOT NULL,
    aur_city    VARCHAR(30) NOT NULL,
    aur_state   VARCHAR(30) NOT NULL,
    aur_country VARCHAR(20) NOT NULL,
    aur_email   VARCHAR(50) NOT NULL
);

ALTER TABLE author ADD CONSTRAINT author_pk PRIMARY KEY ( aur_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE author_book (
    author_aur_id BIGINT NOT NULL,
    book_book_id  DECIMAL(20) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE book (
    book_id   DECIMAL(20) NOT NULL,
    book_name VARCHAR(30) NOT NULL,
    topic     VARCHAR(30) NOT NULL
);

ALTER TABLE book ADD CONSTRAINT book_pk PRIMARY KEY ( book_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE copy (
    copy_id      BIGINT NOT NULL,
    status       VARCHAR(10) NOT NULL,
    book_book_id DECIMAL(20) NOT NULL
);

ALTER TABLE copy ADD CONSTRAINT copy_pk PRIMARY KEY ( copy_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE cus_exhi (
    customer_cus_id BIGINT,
    exhi_event_id   BIGINT NOT NULL,
    registration_id DECIMAL(20) NOT NULL
);

ALTER TABLE cus_exhi ADD CONSTRAINT cus_exhi_pk PRIMARY KEY ( registration_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE cus_rental (
    customer_cus_id    BIGINT,
    invoice_invoice_id BIGINT ,
    copy_copy_id       BIGINT NOT NULL,
    ren_id             BIGINT NOT NULL,
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
    room_room_id    BIGINT,
    customer_cus_id BIGINT
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE customer (
    cus_id    BIGINT NOT NULL,
    cus_fname VARCHAR(20) NOT NULL,
    cur_lname VARCHAR(20) NOT NULL,
    cus_phone DECIMAL(20) NOT NULL,
    cus_email VARCHAR(50) NOT NULL,
    id_type   VARCHAR(15) NOT NULL,
    id_number DECIMAL(20) NOT NULL
);

ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( cus_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE event (
    event_id   BIGINT NOT NULL,
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
    event_id BIGINT NOT NULL,
    exp      DECIMAL(20) NOT NULL
);

ALTER TABLE exhi ADD CONSTRAINT exhi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE indi (
    spon_id BIGINT NOT NULL,
    fname   VARCHAR(15) NOT NULL,
    lname   VARCHAR(15) NOT NULL
);

ALTER TABLE indi ADD CONSTRAINT indi_pk PRIMARY KEY ( spon_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE invoice (
    invoice_id     BIGINT NOT NULL,
    invoice_date   DATETIME NOT NULL,
    invoice_amount DECIMAL(20, 2) NOT NULL
);

ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE org (
    spon_id BIGINT NOT NULL,
    name    VARCHAR(30) NOT NULL
);

ALTER TABLE org ADD CONSTRAINT org_pk PRIMARY KEY ( spon_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE payment (
    payment_id         BIGINT NOT NULL,
    payment_date       DATETIME NOT NULL,
    payment_amount     DECIMAL(20, 2) NOT NULL,
    payment_method     VARCHAR(15) NOT NULL,
    acc_fname          VARCHAR(15) NOT NULL,
    acc_lname          VARCHAR(15) NOT NULL,
    invoice_invoice_id BIGINT NOT NULL
);

ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( payment_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE room (
    room_id  BIGINT NOT NULL,
    capacity BIGINT NOT NULL
);

ALTER TABLE room ADD CONSTRAINT room_pk PRIMARY KEY ( room_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi (
    event_id BIGINT NOT NULL
);

ALTER TABLE semi ADD CONSTRAINT semi_pk PRIMARY KEY ( event_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi_author (
    semi_event_id BIGINT NOT NULL,
    invitation_id DECIMAL(20) NOT NULL,
    author_aur_id BIGINT
);

ALTER TABLE semi_author ADD CONSTRAINT semi_author_pk PRIMARY KEY ( invitation_id );

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE semi_spon (
    semi_event_id   BIGINT NOT NULL,
    sponsor_spon_id BIGINT NOT NULL,
    spon_amou       DECIMAL(20) NOT NULL
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE sponsor (
    spon_id   BIGINT NOT NULL,
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

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TRIGGER IF EXISTS arc_fkarc_1_exhi_i;
DELIMITER //

CREATE TRIGGER arc_fkarc_1_exhi_i BEFORE
    INSERT ON exhi
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = new.event_id;

    IF ( d IS NULL OR d <> 'E' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK EXHI_EVENT_FK in Table EXHI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''E''';
    END IF;

    
END;
//

DROP TRIGGER IF EXISTS arc_fkarc_1_exhi_u;
DELIMITER //


CREATE TRIGGER arc_fkarc_1_exhi_u BEFORE
    UPDATE ON exhi
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = new.event_id;

    IF ( d IS NULL OR d <> 'E' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK EXHI_EVENT_FK in Table EXHI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''E''';
    END IF;

    
END;
//


-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TRIGGER IF EXISTS arc_fkarc_1_semi_i;
DELIMITER //

CREATE TRIGGER arc_fkarc_1_semi_i BEFORE
    INSERT ON semi
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = new.event_id;

    IF ( d IS NULL OR d <> 'S' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK SEMI_EVENT_FK in Table SEMI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''S''';
    END IF;

    
END;
//
DROP TRIGGER IF EXISTS arc_fkarc_1_semi_u;
DELIMITER //

CREATE TRIGGER arc_fkarc_1_semi_u BEFORE
    UPDATE ON semi
    FOR EACH ROW

BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.event_type
    INTO d
    FROM
        event a
    WHERE
        a.event_id = new.event_id;

    IF ( d IS NULL OR d <> 'S' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK SEMI_EVENT_FK in Table SEMI violates Arc constraint on Table EVENT - discriminator column EVENT_TYPE doesn''t have value ''S''';
    END IF;

    
END;
//

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TRIGGER IF EXISTS arc_fkarc_2_indi_i;
DELIMITER //

CREATE TRIGGER arc_fkarc_2_indi_i BEFORE
    INSERT ON indi
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = new.spon_id;

    IF ( d IS NULL OR d <> 'I' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK INDI_SPONSOR_FK in Table INDI violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''I''';
    END IF;

    
END;
//

DROP TRIGGER IF EXISTS arc_fkarc_2_indi_u;
DELIMITER //



CREATE TRIGGER arc_fkarc_2_indi_u BEFORE
    UPDATE ON indi
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = new.spon_id;

    IF ( d IS NULL OR d <> 'I' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK INDI_SPONSOR_FK in Table INDI violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''I''';
    END IF;

    
END;
//

-- SQLINES LICENSE FOR EVALUATION USE ONLY
DROP TRIGGER IF EXISTS arc_fkarc_2_org_i;
DELIMITER //



CREATE TRIGGER arc_fkarc_2_org_i BEFORE
    INSERT  ON org
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = new.spon_id;

    IF ( d IS NULL OR d <> 'O' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK ORG_SPONSOR_FK in Table ORG violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''O''';
    END IF;

    
END;
//
DROP TRIGGER IF EXISTS arc_fkarc_2_org_u;
DELIMITER //



CREATE TRIGGER arc_fkarc_2_org_u BEFORE
    UPDATE ON org
    FOR EACH ROW
    
BEGIN
	DECLARE d VARCHAR(1);
    -- SQLINES LICENSE FOR EVALUATION USE ONLY
    SELECT
        a.spon_type
    INTO d
    FROM
        sponsor a
    WHERE
        a.spon_id = new.spon_id;

    IF ( d IS NULL OR d <> 'O' ) THEN
        SIGNAL SQLSTATE '20223' SET message_text = 'FK ORG_SPONSOR_FK in Table ORG violates Arc constraint on Table SPONSOR - discriminator column SPON_TYPE doesn''t have value ''O''';
    END IF;

    
END;
//

DROP TRIGGER IF EXISTS return_rentals_trigger_u; 

DELIMITER //

CREATE TRIGGER return_rentals_trigger_u AFTER
    UPDATE ON cus_rental
    FOR EACH ROW
BEGIN
    IF new.ret_date is not NULL THEN
    	SELECT ifnull(max(invoice_id) + 1, 1) FROM invoice INTO @id;
        SET @amount := (0.2 * (to_days(old.expe_date) - to_days(old.star_date))) + (0.4 * (to_days(now()) - to_days(old.expe_date)));
        INSERT INTO invoice (invoice_id, invoice_date, invoice_amount, ren_id)
        VALUES (@id, now(), @amount, old.ren_id);
    END IF;
END;
//

DROP TRIGGER IF EXISTS return_rentals_trigger_i; 

DELIMITER //

CREATE TRIGGER return_rentals_trigger_i AFTER
    INSERT ON cus_rental
    FOR EACH ROW
BEGIN
    IF new.ret_date is not NULL THEN
    	SELECT ifnull(max(invoice_id) + 1, 1) FROM invoice INTO @id;
        SET @amount := (0.2 * (to_days(new.expe_date) - to_days(new.star_date))) + (0.4 * (to_days(now()) - to_days(new.expe_date)));
        INSERT INTO invoice (invoice_id, invoice_date, invoice_amount, ren_id)
        VALUES (@id, now(), @amount, new.ren_id);
    END IF;
END;
//

