<?php
    function find_all_customer() {
        global $db;

        $sql = "SELECT * FROM customer ";
        $sql .= "ORDER BY customer_id ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_author(){
        global $db;

        $sql = "SELECT * FROM author ";
        $sql .= "ORDER BY aur_id ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_individual(){
        global $db;

        $sql = "SELECT * FROM indi ";
        $sql .= "ORDER BY spon_id ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_organization(){
        global $db;

        $sql = "SELECT * FROM org ";
        $sql .= "ORDER BY spon_id ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_room(){
        global $db;

        $sql = "SELECT * FROM room ";
        $sql .= "ORDER BY room_id ASC";
        //echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function insert_customer($customer) {
        global $db;

        $errors = validate_customer($customer);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO customer ";
        $sql .= "(first_name, last_name,password, phone, email, id_type, id_num) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $customer['first_name']) . "',";
        $sql .= "'" . db_escape($db, $customer['last_name']) . "',";
        $sql .= "'" . db_escape($db, $customer['password']) . "',";
        $sql .= "'" . db_escape($db, $customer['phone']) . "',";
        $sql .= "'" . db_escape($db, $customer['email']) . "',";
        $sql .= "'" . db_escape($db, $customer['id_type']) . "',";
        $sql .= "'" . db_escape($db, $customer['id_num']) . "'";
        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_author($author){
        global $db;

        $errors = validate_author($author);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO author ";
        $sql .= "(first_name, last_name,password, street, city, state, country, email) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $author['first_name']) . "',";
        $sql .= "'" . db_escape($db, $author['last_name']) . "',";
        $sql .= "'" . db_escape($db, $author['password']) . "',";
        $sql .= "'" . db_escape($db, $author['street']) . "',";
        $sql .= "'" . db_escape($db, $author['city']) . "',";
        $sql .= "'" . db_escape($db, $author['state']) . "',";
        $sql .= "'" . db_escape($db, $author['country']) . "',";
        $sql .= "'" . db_escape($db, $author['email']) . "'";
        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_individual($indi){
        global $db;

        $errors = validate_individual($indi);
        if(!empty($errors)) {
            return $errors;
        }
        $sql1 = "INSERT INTO sponsor ";
        $sql1 .= "(spon_type)";
        $sql1 .= "VALUES (";
        $sql1 .= "'" . db_escape($db, 'I') . "'";
        $sql1 .= "));";
        $result1 = mysqli_query($db, $sql1);

        $new_id = mysqli_insert_id($db);


        $sql = "INSERT INTO indi ";
        $sql .= "(spon_id, fname, lname, password) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $new_id) . "',";
        $sql .= "'" . db_escape($db, $indi['fname']) . "',";
        $sql .= "'" . db_escape($db, $indi['lname']) . "',";
        $sql .= "'" . db_escape($db, $indi['password']) . "'";
        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result && $result1) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_organization($org){
        global $db;

        $errors = validate_organization($org);
        if(!empty($errors)) {
            return $errors;
        }
        $sql1 = "INSERT INTO sponsor ";
        $sql1 .= "(spon_type)";
        $sql1 .= "VALUES (";
        $sql1 .= "'" . db_escape($db, 'O') . "'";
        $sql1 .= "));";
        $result1 = mysqli_query($db, $sql1);

        $new_id = mysqli_insert_id($db);


        $sql = "INSERT INTO org ";
        $sql .= "(spon_id, name, password) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $new_id) . "',";
        $sql .= "'" . db_escape($db, $org['name']) . "',";
        $sql .= "'" . db_escape($db, $org['password']) . "'";
        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result && $result1) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_cus_room($cus_room){
        global $db;

        $errors = validate_cus_room($cus_room);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO cus_room ";
        $sql .= "(customer_id, room_id,date, timeslot) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $cus_room['customer_id']) . "',";
        $sql .= "'" . db_escape($db, $cus_room['room_id']) . "',";
        $sql .= "'" . db_escape($db, $cus_room['date']) . "',";
        $sql .= "'" . db_escape($db, $cus_room['timeslot']) . "',";

        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_semi_aur($semi_aur){
        global $db;

        $errors = validate_semi_aur($semi_aur);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO semi_aur ";
        $sql .= "(invitation_id, event_id,aur_id) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $semi_aur['invitation_id']) . "',";
        $sql .= "'" . db_escape($db, $semi_aur['event_id']) . "',";
        $sql .= "'" . db_escape($db, $semi_aur['aur_id']) . "',";

        $sql .= "));";
        //最后一个没有逗号


        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            return true;
        } else {
            // INSERT failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function validate_customer($customer) {
        $errors = [];

        if(is_blank($customer['first_name'])) {
            $errors[] = "First name cannot be blank.";
        }

        // menu_name
        if(is_blank($customer['last_name'])) {
            $errors[] = "Last name cannot be blank.";
        }
    //
        if(is_blank($customer['phone'])) {
            $errors[] = "Phone cannot be blank.";
        }

        if(is_blank($customer['email'])) {
            $errors[] = "Email be blank.";
        }

        if(is_blank($customer['id_type'])) {
            $errors[] = "ID_type cannot be blank.";
        }

        if(is_blank($customer['id_num'])) {
            $errors[] = "ID_num cannot be blank.";
        }

        If(!has_valid_email_format($customer['email'])) {
            $errors[] = "Invalid Email address.";
        }


        return $errors;
    }

    function validate_author($author){
        $errors = [];

        if(is_blank($author['first_name'])) {
            $errors[] = "First name cannot be blank.";
        }

        // menu_name
        if(is_blank($author['last_name'])) {
            $errors[] = "Last name cannot be blank.";
        }
        //
        if(is_blank($author['street'])) {
            $errors[] = "Street cannot be blank.";
        }

        if(is_blank($author['city'])) {
            $errors[] = "City cannot be blank.";
        }

        if(is_blank($author['state'])) {
            $errors[] = "State cannot be blank.";
        }

        if(is_blank($author['country'])) {
            $errors[] = "Country cannot be blank.";
        }

        if(is_blank($author['email'])) {
            $errors[] = "Email cannot be blank.";
        }

        If(!has_valid_email_format($author['email'])) {
            $errors[] = "Invalid Email address.";
        }


        return $errors;
    }

    function validate_individual($indi){
        $errors = [];

        if(is_blank($indi['fname'])) {
            $errors[] = "First name cannot be blank.";
        }

        // menu_name
        if(is_blank($indi['lname'])) {
            $errors[] = "Last name cannot be blank.";
        }
        //


        return $errors;
    }

    function validate_organization($org){
        $errors = [];

        if(is_blank($org['name'])) {
            $errors[] = "Name cannot be blank.";
        }

        return $errors;
    }

    function validate_cus_room($cus_room){
        $errors = [];

        if(is_blank($cus_room['room_id'])) {
            $errors[] = "Room_id cannot be blank.";
        }

        // menu_name
        if(is_blank($cus_room['date'])) {
            $errors[] = "Date cannot be blank.";
        }

        if(is_blank($cus_room['timeslot'])) {
            $errors[] = "Timeslot cannot be blank.";
        }
        //


        return $errors;
    }

    function validate_semi_aur($semi_aur){
        $errors = [];

        if(is_blank($semi_aur['invitation_id'])) {
            $errors[] = "Invitation_id cannot be blank.";
        }

        // menu_name
        if(is_blank($semi_aur['event_id'])) {
            $errors[] = "Event_id cannot be blank.";
        }

        if(is_blank($semi_aur['aur_id'])) {
            $errors[] = "Aur_id cannot be blank.";
        }
        //


        return $errors;
    }

    function insert_cus_hash($id, $password, $hash) {
        global $db;

        $sql = "INSERT INTO cus_hash ";
        $sql .= "(customer_id, password, hash) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $id) . "', ";
        $sql .= "'" . db_escape($db, $password) . "', ";
        $sql .= "'" . db_escape($db, $hash) . "'";
        $sql .= ");";

        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_aur_hash($id, $password, $hash){
        global $db;

        $sql = "INSERT INTO aur_hash ";
        $sql .= "(aur_id, password, hash) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $id) . "', ";
        $sql .= "'" . db_escape($db, $password) . "', ";
        $sql .= "'" . db_escape($db, $hash) . "'";
        $sql .= ");";

        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_indi_hash($id, $password, $hash){
        global $db;

        $sql = "INSERT INTO indi_hash ";
        $sql .= "(spon_id, password, hash) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $id) . "', ";
        $sql .= "'" . db_escape($db, $password) . "', ";
        $sql .= "'" . db_escape($db, $hash) . "'";
        $sql .= ");";

        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function insert_organization_hash($id, $password, $hash){
        global $db;

        $sql = "INSERT INTO org_hash ";
        $sql .= "(spon_id, password, hash) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $id) . "', ";
        $sql .= "'" . db_escape($db, $password) . "', ";
        $sql .= "'" . db_escape($db, $hash) . "'";
        $sql .= ");";

        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

function find_customer_by_firstname($first_name) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE first_name='" . db_escape($db, $first_name) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

function get_cus_hash($customer) {
    global $db;

    $sql = "SELECT * FROM cus_hash ";
    $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $cst_passhash = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $cst_passhash['hash']; // returns hash
}

    function get_aur_hash($author){
        global $db;

        $sql = "SELECT * FROM aur_hash ";
        $sql .= "WHERE aur_id='" . db_escape($db, $author['customer_id']) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $aur_passhash = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $aur_passhash['hash']; // returns hash
    }

    function get_indi_hash($indi){
        global $db;

        $sql = "SELECT * FROM indi_hash ";
        $sql .= "WHERE spon_id='" . db_escape($db, $indi['spon_id']) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $indi_passhash = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $indi_passhash['hash']; // returns hash
    }

    function get_org_hash($org){
        global $db;

        $sql = "SELECT * FROM org_hash ";
        $sql .= "WHERE spon_id='" . db_escape($db, $org['spon_id']) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $org_passhash = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $org_passhash['hash']; // returns hash
    }

function find_customer_by_password($password) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

function find_author_by_password($password){
    global $db;

    $sql = "SELECT * FROM author ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $author = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $author; // returns an assoc. array
}

function find_individual_by_password($password){
    global $db;

    $sql = "SELECT * FROM indi ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $indi = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $indi; // returns an assoc. array
}

function find_organization_by_password($password){
    global $db;

    $sql = "SELECT * FROM org ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $org = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $org; // returns an assoc. array
}

function find_manager_by_password($password){
    global $db;

    $sql = "SELECT * FROM manager ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $manager = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $manager; // returns an assoc. array
}

function find_customer_by_id($customer_id) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE customer_id='" . db_escape($db, $customer_id) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

function find_author_by_id($aur_id){
    global $db;

    $sql = "SELECT * FROM author ";
    $sql .= "WHERE aur_id='" . db_escape($db, $aur_id) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $author = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $author; // returns an assoc. array
}

function find_individual_by_id($spon_id){
    global $db;

    $sql = "SELECT * FROM indi ";
    $sql .= "WHERE spon_id='" . db_escape($db, $spon_id) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $indi = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $indi; // returns an assoc. array
}

function find_organization_by_id($spon_id){
    global $db;

    $sql = "SELECT * FROM org ";
    $sql .= "WHERE spon_id='" . db_escape($db, $spon_id) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $org = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $org; // returns an assoc. array
}



    function find_record_by_id($customer_id) {
        global $db;

        $sql = "SELECT * FROM cus_room ";
        $sql .= "WHERE customer_id='" . db_escape($db, $customer_id) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $record = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $record;
    }

    function find_record_by_customer($customer) {
        global $db;

        $sql = "SELECT * FROM cus_room ";
        $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_invoice_by_customer_id($customer) {
        global $db;

        $sql = "SELECT * FROM invoice ";
        $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_semi_spon_by_id($spon_id){
        global $db;
        $sql = "SELECT * FROM semi_spon ";
        $sql .= "WHERE spon_id='". db_escape($db, $spon_id) ."';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

function get_balance($customer) {
    global $db;

    $sql = "Select sum(invoice_amount) as 'total' from invoice ";
    $sql .= "WHERE ren_id IN (SELECT ren_id from cus_rental WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "');";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $total = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $sql2 = "Select sum(payment_amount) as 'paid' from payment ";
    $sql2 .= "WHERE invoice_id IN (SELECT invoice_id from invoice where ren_id IN (SELECT ren_id from cus_rental WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "'));";

    $result2 = mysqli_query($db, $sql2);
    confirm_result_set($result2);
    $paid = mysqli_fetch_assoc($result2);
    mysqli_free_result($result2);

    $total_amount = floatval($total['total']);
    $paid_amount = floatval($paid['paid']);
    // echo gettype($total_amount);
    // echo gettype($paid_amount);
    return ($total_amount - $paid_amount);
}

function update_customer($customer) {
    global $db;

    $errors = validate_customer($customer);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE customer SET ";
    $sql .= "first_name='" . db_escape($db, $customer['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $customer['last_name']) . "', ";
    $sql .= "password='" . db_escape($db, $customer['password']) . "',";
    $sql .= "phone='" . db_escape($db, $customer['phone']) . "',";
    $sql .= "email='" . db_escape($db, $customer['email']) . "',";
    $sql .= "id_type='" . db_escape($db, $customer['id_type']) . "',";
    $sql .= "id_num='" . db_escape($db, $customer['id_num']) . "'";
    $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_author($author){
    global $db;

    $errors = validate_author($author);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE author SET ";
    $sql .= "first_name='" . db_escape($db, $author['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $author['last_name']) . "', ";
    $sql .= "password='" . db_escape($db, $author['password']) . "',";
    $sql .= "street='" . db_escape($db, $author['street']) . "',";
    $sql .= "city='" . db_escape($db, $author['city']) . "',";
    $sql .= "state='" . db_escape($db, $author['state']) . "',";
    $sql .= "country='" . db_escape($db, $author['country']) . "'";
    $sql .= "email='" . db_escape($db, $author['email']) . "'";
    $sql .= "WHERE aur_id='" . db_escape($db, $author['aur_id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_indi($indi){
    global $db;

    $errors = validate_individual($indi);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE indi SET ";
    $sql .= "first_name='" . db_escape($db, $indi['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $indi['last_name']) . "', ";
    $sql .= "password='" . db_escape($db, $indi['password']) . "',";
    $sql .= "WHERE spon_id='" . db_escape($db, $indi['spon_id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_org($org){
    global $db;

    $errors = validate_organization($org);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE author SET ";
    $sql .= "name='" . db_escape($db, $org['name']) . "', ";
    $sql .= "password='" . db_escape($db, $org['password']) . "',";
    $sql .= "WHERE spon_id='" . db_escape($db, $org['spon_id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function update_cus_room($cus_room){
    global $db;

    $errors = validate_cus_room($cus_room);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE cus_room SET ";
    $sql .= "room_id='" . db_escape($db, $cus_room['room_id']) . "', ";
    $sql .= "timeslot='" . db_escape($db, $cus_room['timeslot']) . "',";
    $sql .= "WHERE customer_id='" . db_escape($db, $cus_room['customer_id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function delete_customer($customer_id) {
    global $db;

    $sql = "DELETE FROM customer ";
    $sql .= "WHERE customer_id='" . db_escape($db, $customer_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_author($aur_id){
    global $db;

    $sql = "DELETE FROM author ";
    $sql .= "WHERE aur_id='" . db_escape($db, $aur_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_individual($spon_id){
    global $db;


    $sql = "DELETE FROM sponsor ";
    $sql .= "WHERE spon_id='" . db_escape($db, $spon_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);


    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_organization($spon_id){
    global $db;


    $sql = "DELETE FROM sponsor ";
    $sql .= "WHERE spon_id='" . db_escape($db, $spon_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);


    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_cus_room($customer_id){
    global $db;


    $sql = "DELETE FROM cus_room ";
    $sql .= "WHERE $customer_id='" . db_escape($db, $customer_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);


    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

    function find_author_by_firstname($first_name){
        global $db;

        $sql = "SELECT * FROM author ";
        $sql .= "WHERE first_name='" . db_escape($db, $first_name) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $author = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $author; // returns an assoc. array
    }

    function find_individual_by_firstname($first_name){
        global $db;

        $sql = "SELECT * FROM indi ";
        $sql .= "WHERE fname='" . db_escape($db, $first_name) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $indi = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $indi; // returns an assoc. array
    }

    function find_organization_by_name($name){
        global $db;

        $sql = "SELECT * FROM org ";
        $sql .= "WHERE name='" . db_escape($db, $name) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $org = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $org; // returns an assoc. array
    }

    function find_manager_by_username($username){
        global $db;

        $sql = "SELECT * FROM manager ";
        $sql .= "WHERE username='" . db_escape($db, $username) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $manager = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $manager; // returns an assoc. array
    }

    function find_semi_aur_by_id($aur_id){
        global $db;

        $sql = "SELECT * FROM semi_aur ";
        $sql .= "WHERE $aur_id='" . db_escape($db, $aur_id) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_semi_aur_by_invitation_id($invitation_id){
        global $db;

        $sql = "SELECT * FROM semi_aur ";
        $sql .= "WHERE $invitation_id='" . db_escape($db, $invitation_id) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $semi_aur = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $semi_aur; // returns an assoc. array
    }

    function find_aur_book_by_id($aur_id){
        global $db;

        $sql = "SELECT * FROM aur_book ";
        $sql .= "WHERE $aur_id='" . db_escape($db, $aur_id) . "';";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
    ?>



