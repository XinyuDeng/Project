<?php
    function find_all_customer() {
        global $db;

        $sql = "SELECT * FROM customer ";
        $sql .= "ORDER BY cus_id ASC";
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
            $errors[] = "Email cannot be blank.";
        }

        if(is_blank($customer['id_type'])) {
            $errors[] = "ID_type street cannot be blank.";
        }

        if(is_blank($customer['id_num'])) {
            $errors[] = "ID_num city cannot be blank.";
        }

        If(!has_valid_email_format($customer['email'])) {
            $errors[] = "Invalid Email address.";
        }


        return $errors;
    }

    function insert_cus_hash($id, $password, $hash) {
        global $db;

        $sql = "INSERT INTO cus_hash ";
        $sql .= "(cus_id, password, hash) ";
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
    $sql .= "WHERE first_name='" . db_escape($db, $first_name) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

function get_hash($customer) {
    global $db;

    $sql = "SELECT * FROM password_hash ";
    $sql .= "WHERE cus_id='" . db_escape($db, $customer['customer_id']) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $cst_passhash = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $cst_passhash['hash']; // returns hash
}

function find_customer_by_password($password) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

function find_customer_by_id($customer_id) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE customer_id='" . db_escape($db, $customer_id) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
}

    function find_record_by_id($customer_id) {
        global $db;

        $sql = "SELECT * FROM cus_room ";
        $sql .= "WHERE cus_id='" . db_escape($db, $customer_id) . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_invoice_by_id($customer_id){
        global $db;
        $sql = "SELECT * FROM invoice ";
        $sql .= "WHERE ren_id IN (SELECT ren_id FROM cus_rental where cus_id ='". db_escape($db, $customer_id) ."')";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
    ?>



