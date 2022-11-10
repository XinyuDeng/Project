DROP TRIGGER IF EXISTS return_rentals_trigger_u; 

DELIMITER //

CREATE TRIGGER return_rentals_trigger_u AFTER
    UPDATE ON cus_rental
    FOR EACH ROW
BEGIN
    IF new.ret_date is not NULL THEN
    	SELECT ifnull(max(invoice_id) + 1, 1) FROM invoice INTO @id;
        SET @amount := (0.2 * (to_days(old.expe_date) - to_days(old.star_date))) + (0.4 * (to_days(new.ret_date) - to_days(old.expe_date)));
        INSERT INTO invoice (invoice_id, invoice_date, invoice_amount)
        VALUES (@id, new.ret_date, @amount);
        UPDATE cus_rental set invoice_invoice_id = @id where ren_id = new.ren_id;
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
        SET @amount := (0.2 * (to_days(new.expe_date) - to_days(new.star_date))) + (0.4 * (to_days(new.ret_date) - to_days(new.expe_date)));
        INSERT INTO invoice (invoice_id, invoice_date, invoice_amount)
        VALUES (@id, new.ret_date, @amount);
        UPDATE cus_rental set invoice_invoice_id = @id where ren_id = new.ren_id;
    END IF;
END;
//