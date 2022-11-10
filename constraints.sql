ALTER TABLE author ADD CONSTRAINT author_pk PRIMARY KEY ( aur_id );
ALTER TABLE book ADD CONSTRAINT book_pk PRIMARY KEY ( book_id );
ALTER TABLE copy ADD CONSTRAINT copy_pk PRIMARY KEY ( copy_id );
ALTER TABLE cus_exhi ADD CONSTRAINT cus_exhi_pk PRIMARY KEY ( registration_id );
ALTER TABLE cus_rental ADD CONSTRAINT cus_rental_pk PRIMARY KEY ( ren_id );
ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( cus_id );
ALTER TABLE event ADD CONSTRAINT event_pk PRIMARY KEY ( event_id );
ALTER TABLE exhi ADD CONSTRAINT exhi_pk PRIMARY KEY ( event_id );
ALTER TABLE indi ADD CONSTRAINT indi_pk PRIMARY KEY ( spon_id );
ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );
ALTER TABLE org ADD CONSTRAINT org_pk PRIMARY KEY ( spon_id );
ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( payment_id );
ALTER TABLE room ADD CONSTRAINT room_pk PRIMARY KEY ( room_id );
ALTER TABLE semi ADD CONSTRAINT semi_pk PRIMARY KEY ( event_id );
ALTER TABLE semi_author ADD CONSTRAINT semi_author_pk PRIMARY KEY ( invitation_id );
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