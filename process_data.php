<?php
  // ----RESPONSE DEFINITIONS----
  // 001 - Submission successful
  // 002 -- Failed connection to database
  // 003 -- Max limit of 3 submissions for same fname, lname, email, and phone values reached
  // 004 -- Failed to insert data into database

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require "db_connect_details.php";

    // FORM DATA
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $location = $_POST["location"];
    $service = $_POST["service"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    
    try {   // attempt database connection
 
      // DATABASE SETTINGS
      $servername = DB_SERVER;
      $db_username = DB_USERNAME;
      $db_password = DB_PASS;
      $database = DB_DATABASE;

      // Create connection
      $conn = @new mysqli($servername, $db_username, $db_password, $database);

      // Check connection
      if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
      }
    } catch (Exception $e) {
        echo "002";             // Failed connection to database
        die();
      }

    // Check if submit limit reached for == fname, lname, phone, and email
    $checkMaxLimit = $conn->prepare("SELECT * FROM contact_form WHERE first_name = ? AND last_name = ? AND email = ? AND phone = ?");
    $checkMaxLimit->bind_param("ssss", $fname, $lname, $email, $phone);
    $checkMaxLimit->execute();
    $checkMaxLimit->store_result();

    // Max limit reached
    if ($checkMaxLimit->num_rows >= 3) {
      echo "003";               // User reached max limit of 3 submissions

      // Max limit not reached
    } else {
      try {   // Attempt to insert data into database

        // Insert data into contact_form table
        $stmt = @$conn->prepare("INSERT INTO contact_form (first_name, last_name, email, phone, company, location, service, requested_date, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $fname, $lname, $email, $phone, $company, $location, $service, $date, $message);

        // Submit to database
        if ($stmt->execute()) {
          echo "001";               // Database insert successful
          $stmt->close();           // Exit insert transaction
        } else {
          throw new Exception("Insert failed");
        }
      } catch (Exception $e) {
          echo "004";   // Database failed to insert data
        }
    }

    // Exit max limit transaction
    $checkMaxLimit->close();
    // Close connection
    $conn->close();
  }
?>
