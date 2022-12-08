<?php

  // Subjects

  function find_all_subjects() {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function validate_subject($subject) {
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

  function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $subject['position']) . "',";
    $sql .= "'" . db_escape($db, $subject['visible']) . "'";
    $sql .= ")";
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

  function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
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

  function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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

  // Pages

  function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
  }

  function validate_page($page) {
    $errors = [];

    // subject_id
    if(is_blank($page['subject_id'])) {
      $errors[] = "Subject cannot be blank.";
    }

    // menu_name
    if(is_blank($page['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    $current_id = $page['id'] ?? '0';
    if(!has_unique_page_menu_name($page['menu_name'], $current_id)) {
      $errors[] = "Menu name must be unique.";
    }


    // position
    // Make sure we are working with an integer
    $postion_int = (int) $page['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $page['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    // content
    if(is_blank($page['content'])) {
      $errors[] = "Content cannot be blank.";
    }

    return $errors;
  }

  function insert_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $page['subject_id']) . "',";
    $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $page['position']) . "',";
    $sql .= "'" . db_escape($db, $page['visible']) . "',";
    $sql .= "'" . db_escape($db, $page['content']) . "'";
    $sql .= ")";
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

  function update_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
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

  function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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
  
  function find_all_customer() {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "ORDER BY customer_id ASC";
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
    $sql .= "(first_name, last_name,password,nationality,gender,addr_stree,addr_city,addr_state,zipcode,email,contact_num,
    eme_first_name, eme_last_name, eme_contact_num, passenger_id) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $customer['first_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['last_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['password']) . "',";
    $sql .= "'" . db_escape($db, $customer['nationality']) . "',";
    $sql .= "'" . db_escape($db, $customer['gender']) . "',";
    $sql .= "'" . db_escape($db, $customer['addr_stree']) . "',";
    $sql .= "'" . db_escape($db, $customer['addr_city']) . "',";
    $sql .= "'" . db_escape($db, $customer['addr_state']) . "',";
    $sql .= "'" . db_escape($db, $customer['zipcode']) . "',";
    $sql .= "'" . db_escape($db, $customer['email']) . "',";
    $sql .= "'" . db_escape($db, $customer['contact_num']) . "',";
    $sql .= "'" . db_escape($db, $customer['eme_first_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['eme_last_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['eme_contact_num']) . "',";
    $sql .= "(SELECT passenger_id FROM passenger WHERE first_name=";
    $sql .= "'" . db_escape($db, $customer['first_name']) . "'";
    $sql .= "AND last_name=" ;
    $sql .= "'" . db_escape($db, $customer['last_name']) . "'";
    $sql .= "));";
	//最后一个没有逗号

//   nationality, gender, addr_stree, addr_city, addr_state, zipcode, email, contact_num) ";

    
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
		// first_name, last_name, nationality, gender, addr_stree, addr_city, addr_state, zipcode, email, contact_num

    if(is_blank($customer['first_name'])) {
      $errors[] = "First name cannot be blank.";
    }

    // menu_name
    if(is_blank($customer['last_name'])) {
      $errors[] = "Last name cannot be blank.";
		}	
//
    if(is_blank($customer['nationality'])) {
      $errors[] = "Nationality cannot be blank.";
    }

    if(is_blank($customer['gender'])) {
      $errors[] = "Gender cannot be blank.";
    }

    if(is_blank($customer['addr_stree'])) {
      $errors[] = "Address street cannot be blank.";
    }

    if(is_blank($customer['addr_city'])) {
      $errors[] = "Address city cannot be blank.";
    }

    if(is_blank($customer['addr_state'])) {
      $errors[] = "Address state cannot be blank.";
    }

    if(is_blank($customer['zipcode'])) {
      $errors[] = " Zipcode cannot be blank.";
    }

    $zipcode_int = (int) $customer['zipcode'];
    if($zipcode_int < 10000 or $zipcode_int > 999999) {
      $errors[] = "Invalid zipcode.";
    }

    if(is_blank($customer['email'])) {
      $errors[] = "Email cannot be blank.";
    }

    If(!has_valid_email_format($customer['email'])) {
      $errors[] = "Invalid Email address.";
    }

    if(is_blank($customer['contact_num'])) {
      $errors[] = "Contact number cannot be blank.";
    }

    if(is_blank($customer['eme_first_name'])) {
      $errors[] = "Emergency first name cannot be blank.";
    }

    if(is_blank($customer['eme_last_name'])) {
      $errors[] = "Emergency last name cannot be blank.";
    }

    if(is_blank($customer['eme_contact_num'])) {
      $errors[] = "Emergency contact number cannot be blank.";
    }
    return $errors;
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
		$sql .= "nationality='" . db_escape($db, $customer['nationality']) . "',";
		$sql .= "gender='" . db_escape($db, $customer['gender']) . "',";
		$sql .= "addr_stree='" . db_escape($db, $customer['addr_stree']) . "',";
		$sql .= "addr_city='" . db_escape($db, $customer['addr_city']) . "',";
		$sql .= "addr_state='" . db_escape($db, $customer['addr_state']) . "',";
		$sql .= "zipcode='" . db_escape($db, $customer['zipcode']) . "',";
		$sql .= "email='" . db_escape($db, $customer['email']) . "',";
        $sql .= "contact_num='" . db_escape($db, $customer['contact_num']) . "',";
        $sql .= "eme_first_name='" . db_escape($db, $customer['eme_first_name']) . "',";
        $sql .= "eme_last_name='" . db_escape($db, $customer['eme_last_name']) . "',";
        $sql .= "eme_contact_num='" . db_escape($db, $customer['eme_contact_num']) . "'";
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
  
  
  
  function find_manager_by_username($username) {
    global $db;

    $sql = "SELECT * FROM manager ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $manager = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $manager; // returns an assoc. array
  }
  
  function find_manager_by_password($password) {
    global $db;

    $sql = "SELECT * FROM manager ";
    $sql .= "WHERE password='" . db_escape($db, $password) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $manager = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $manager; // returns an assoc. array
  }
  
  function find_all_plan() {
    global $db;

    $sql = "SELECT * FROM plan ";
    $sql .= "ORDER BY id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
  function find_all_shoprecord() {
    global $db;

    $sql = "SELECT * FROM insurance ";
    $sql .= "ORDER BY id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
  
  
  function insert_record($record) {
    global $db;

    $sql = "INSERT INTO insurance ";
    $sql .= "(insur_name, pfname,plname,flight,cfname, passenger_id, insurance_id) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $record['insur_name']) . "',";
    $sql .= "'" . db_escape($db, $record['pfname']) . "',";
    $sql .= "'" . db_escape($db, $record['plname']) . "',";
    $sql .= "'" . db_escape($db, $record['flight']) . "',";
    $sql .= "'" . db_escape($db, $record['cfname']) . "',";
    $sql .= "(SELECT passenger_id from passenger where first_name =";
    $sql .= "'" . db_escape($db, $record['pfname']) . "'";
    $sql .= "AND last_name=";
    $sql .= "'" . db_escape($db, $record['plname']) . "'),";
    $sql .= "(SELECT id from plan where name =";
    $sql .= "'" . db_escape($db, $record['insur_name']) . "')";
    $sql .= ")";

    
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
  
  function find_record_by_id($id) {
    global $db;

    $sql = "SELECT * FROM insurance ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $record = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $record; // returns an assoc. array
  }
  
  function update_record($record) {
    global $db;

//  $errors = validate_customer($record);
//  if(!empty($errors)) {
//    return $errors;
//  }
    $sql = "UPDATE insurance SET ";
    $sql .= "insur_name='" . db_escape($db, $record['insur_name']) . "', ";
    $sql .= "pfname='" . db_escape($db, $record['pfname']) . "', ";
    $sql .= "plname='" . db_escape($db, $record['plname']) . "', ";
    $sql .= "flight='" . db_escape($db, $record['flight']) . "',";
    $sql .= "cfname='" . db_escape($db, $record['cfname']) . "'";
    $sql .= "WHERE id='" . db_escape($db, $record['id']) . "' ";
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
  
  function delete_record($id) {
    global $db;

    $sql = "DELETE FROM insurance ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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
  
  
  function find_record_by_customer($customer) {
    global $db;

    $sql = "SELECT * FROM insurance ";
    $sql .= "WHERE cfname='" . db_escape($db, $customer['first_name']) . "'";
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



  function insert_invoice($insurance, $customer_fname) {
    global $db;

    $sql = "INSERT INTO invoice ";
    $sql .= "(invoice_date, invoice_amount, customer_id, record_id) ";
    $sql .= "VALUES (";
    $sql .= "curdate(),";
    $sql .= "(SELECT cost from plan where name =";
    $sql .= "'" . db_escape($db, $insurance) . "'),";
    $sql .= "(SELECT customer_id from customer where first_name =";
    $sql .= "'" . db_escape($db, $customer_fname) . "'),";
    $sql .= "(SELECT id from insurance where insur_name =";
    $sql .= "'" . db_escape($db, $insurance) . "' ";
    $sql .= "AND cfname='" . db_escape($db, $customer_fname) . "')";
    $sql .= ");";

    // echo ($sql);
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

function find_all_invoice() {
  global $db;

  $sql = "SELECT * FROM invoice ";
  $sql .= "ORDER BY invoice_num ASC";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

  function find_invoice_by_id($invoice_num) {
    global $db;

    $sql = "SELECT * FROM invoice ";
    $sql .= "WHERE invoice_num='" . db_escape($db, $invoice_num) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $invoice = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $invoice; // returns an assoc. array
  }

  function find_customer_by_invoice($invoice) {
    global $db;

    $sql = "SELECT * FROM customer ";
    $sql .= "WHERE customer_id='" . db_escape($db, $invoice['customer_id']) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
  }

  function find_insurance_by_invoice($invoice) {
    global $db;

    $sql = "SELECT * FROM insurance ";
    $sql .= "WHERE id='" . db_escape($db, $invoice['record_id']) . "';";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $insurance = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $insurance; // returns an assoc. array
  }


  function find_all_payment() {
    global $db;

    $sql = "SELECT * FROM payment ";
    $sql .= "ORDER BY payment_id ASC;";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

function insert_payment($payment)
{
  global $db;

  $sql = "INSERT INTO payment ";
  $sql .= "(pay_date, amount, method, card_num, name_on_card_first, name_on_card_last, expiry_date, customer_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $payment['pay_date']) . "', ";
  $sql .= "'" . db_escape($db, $payment['amount']) . "', ";
  $sql .= "'" . db_escape($db, $payment['method']) . "', ";
  $sql .= "'" . db_escape($db, $payment['card_num']) . "', ";
  $sql .= "'" . db_escape($db, $payment['name_on_card_first']) . "', ";
  $sql .= "'" . db_escape($db, $payment['name_on_card_last']) . "', ";
  $sql .= "'" . db_escape($db, $payment['expiry_date']) . "',";
  $sql .= "(SELECT customer_id from customer ";
  $sql .= "WHERE first_name='" . db_escape($db, $payment['name_on_card_first']) . "'";
  $sql .= "AND last_name='" . db_escape($db, $payment['name_on_card_last']) . "'";
  $sql .= "));";

  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_payment_by_id($payment_id) {
  global $db;

  $sql = "SELECT * FROM payment ";
  $sql .= "WHERE payment_id='" . db_escape($db, $payment_id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $payment = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $payment; // returns an assoc. array
}


function find_all_passenger() {
  global $db;

  $sql = "SELECT * FROM passenger ";
  $sql .= "ORDER BY passenger_id ASC;";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function insert_passenger($pass_info){
  global $db;

  $sql = "INSERT INTO passenger ";
  $sql .= "(first_name, last_name, DOB, nationality, gender, passport_num, passport_expiry_date) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $pass_info['first_name']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['last_name']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['DOB']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['nationality']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['gender']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['passport_num']) . "', ";
  $sql .= "'" . db_escape($db, $pass_info['passport_expiry_date']) . "'";
  $sql .= ");";

  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


function get_balance($customer) {
  global $db;

  $sql = "Select sum(invoice_amount) as 'total' from invoice ";
  $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "';";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $total = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  $sql2 = "Select sum(amount) as 'paid' from payment ";
  $sql2 .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "';";

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


function insert_member($member) {
  global $db;
  // print_r($member);

  $sql = "INSERT INTO member ";
  $sql .= "(mem_name, associated_airline, mem_start_date, mem_end_date, customer_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $member['mem_name']) . "', ";
  $sql .= "'" . db_escape($db, $member['associated_airline']) . "', ";
  $sql .= "'" . db_escape($db, $member['mem_start_date']) . "', ";
  $sql .= "'" . db_escape($db, $member['mem_end_date']) . "', ";
  $sql .= "'" . db_escape($db, $member['customer_id']) . "'";
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


function insert_agent($agent) {
  global $db;

  $sql = "INSERT INTO agent ";
  $sql .= "(agent_name, web, phone, customer_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $agent['agent_name']) . "', ";
  $sql .= "'" . db_escape($db, $agent['web']) . "', ";
  $sql .= "'" . db_escape($db, $agent['phone']) . "', ";
  $sql .= "'" . db_escape($db, $agent['customer_id']) . "'";
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


function find_passenger_by_id($passenger_id) {
  global $db;

  $sql = "SELECT * FROM passenger ";
  $sql .= "WHERE passenger_id='" . db_escape($db, $passenger_id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $passenger = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $passenger; // returns an assoc. array
}


function insert_hash($id, $password, $hash) {
  global $db;

  $sql = "INSERT INTO password_hash ";
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


function get_hash($customer) {
  global $db;

  $sql = "SELECT * FROM password_hash ";
  $sql .= "WHERE customer_id='" . db_escape($db, $customer['customer_id']) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $cst_passhash = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $cst_passhash['hash']; // returns hash
}
?>
