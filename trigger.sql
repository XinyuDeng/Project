DROP TRIGGER IF EXISTS return_rentals_trigger_i; 
DELIMITER $$
CREATE TRIGGER return_rentals_trigger_i 
	AFTER INSERT ON cus_rental FOR EACH ROW
BEGIN
    IF new.ret_date is not NULL THEN
        SET @amount := (0.2 * (to_days(new.expe_date) - to_days(new.star_date))) + (0.4 * (to_days(new.ret_date) - to_days(new.expe_date)));
        INSERT INTO invoice (invoice_date, invoice_amount, ren_id) VALUES (new.ret_date, @amount, new.ren_id);
        -- UPDATE cus_rental SET ren_status = 'RETURNED' where ren_id = new.ren_id;
    END IF;
END;
$$

DROP TRIGGER IF EXISTS return_rentals_trigger_u; 
DELIMITER $$
CREATE TRIGGER return_rentals_trigger_u AFTER
    UPDATE ON cus_rental
    FOR EACH ROW
BEGIN
    IF new.ret_date is not NULL THEN
        SET @amount := (0.2 * (to_days(old.expe_date) - to_days(old.star_date))) + (0.4 * (to_days(new.ret_date) - to_days(old.expe_date)));
        INSERT INTO invoice (invoice_date, invoice_amount, ren_id) VALUES (new.ret_date, @amount, new.ren_id);
        UPDATE copy set STATUS = 'AVAILABLE' where copy_id = new.copy_id;
    END IF;
END;
$$

/*
DROP TRIGGER IF EXISTS sponsor_indi_trigger_i; 
DELIMITER $$
CREATE TRIGGER sponsor_indi_trigger_i BEFORE 
    INSERT ON indi
    FOR EACH ROW
BEGIN
	insert into sponsor (spon_type) values ('I');
END;
$$


DROP TRIGGER IF EXISTS sponsor_org_tigger_i; 
DELIMITER $$
CREATE TRIGGER sponsor_org_tigger AFTER
    INSERT ON org
    FOR EACH ROW
BEGIN
	insert into sponsor(spon_type) values('O');
END;
$$*/