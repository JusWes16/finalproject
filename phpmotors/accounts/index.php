<?php
//This is the accounts controller

// Create or access a Session
session_start();

// Gets the database connection file
require_once '../library/connections.php';
// Gets the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Gets the accounts model
require_once '../model/accounts-model.php';
// Gets the function library
require_once '../library/functions.php';

//Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
$navList = buildNav($classifications);

if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
  case 'login':
    include '../view/login.php';
    break;

  case 'registration':
    include '../view/registration.php';
    break;
    
  case 'register':

    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
    $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check for existing email address
    $existingEmail = checkExistingEmail($clientEmail);

    if($existingEmail){
      $message2 = "I'm sorry this email address already exists. Try logging in with your email and password";
      include ('../view/login.php');
      exit;
    }

    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      $message = 'Please provide information for all empty form fields.';
      include '../view/registration.php';
      exit; 
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
    
    // Check and report the result
    if($regOutcome === 1){
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<p class='congrats_message'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "Sorry $clientFirstname, but the registration failed. Please try again.";
      include '../view/registration.php';
      exit;
    }
    break;
  
  case 'Login':

    // Filter and store the data
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if(empty($clientEmail) || empty($checkPassword)){
      $message2 = 'Please provide a valid email address and password.';
      include '../view/login.php';
      exit; 
    }

    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);
    // Compare the password just submitted against
    // the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    // If the hashes don't match create an error
    // and return to the login view
    if(!$hashCheck) {
      $message2 = 'Please check your password and try again.';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    // Remove the password from the array
    // the array_pop function removes the last
    // element from an array
    array_pop($clientData);
    // Store the array into the session
    $_SESSION['clientData'] = $clientData;
    // Send them to the admin view
    include '../view/admin.php';
    exit;

    break;

  case 'Logout':
      session_destroy();
      header('Location: /phpmotors/');

    break;

    case 'Update':
      include '../view/client-update.php';
    break;

  case 'updateAccount':
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
      $clientEmail = checkEmail($clientEmail);

      if($clientEmail != $_SESSION['clientData']['clientEmail']){
        // Check for existing email address
        $existingEmail = checkExistingEmail($clientEmail);

        if($existingEmail){
          $message = "I'm sorry this email address already exists. Try logging in with your email and password";
          include ('../view/client-update.php');
          exit;
        }
      }

      // Check for missing data
      if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
        $message = 'Please provide information for all empty form fields.';
        include '../view/client-update.php';
        exit; 
      }

      // Send the data to the model
      $updateOutcome = updateInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);
      
      // Check and report the result
      if($updateOutcome === 1){
        $_SESSION['message'] = "<p class='congrats_message'>You have successfully updated your account information.</p>";
      } else {
        $_SESSION['message'] = "<p class='error_message'>Sorry $clientFirstname, your update failed. Please try again.</p>";
      }

      $clientData = getClientById($clientId);

      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;

      // Send them to the admin view
      include '../view/admin.php';
      exit;
    
    break;

  case 'updatePassword':
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if(empty($checkPassword)){
      $message2 = 'Your password does not meet the necessary requirements. Please reread the requirements and try again.';
      include '../view/client-update.php';
      exit; 
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $updatePasswordOutcome = updatePassword($hashedPassword, $clientId);
    
    // Check and report the result
    if($updatePasswordOutcome === 1){
      $_SESSION['message'] = "<p class='congrats_message'>You have successfully changed your password.</p>";
      include '../view/admin.php';
      exit;
    } else {
      $_SESSION['message'] = "<p class='error_message'>Sorry, your password update failed. Please try again.</p>";
      $message = "Sorry $clientFirstname, your update failed. Please try again.";
      include '../view/admin.php';
      exit;
    }
  break;
  
  default:
    include '../view/admin.php';
    break;
}
