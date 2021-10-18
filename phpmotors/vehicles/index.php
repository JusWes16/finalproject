<?php
// This is the vehicles controller

// Create or access a Session
session_start();

// Get the data base connection
require_once '../library/connections.php';
// Get the main model for use
require_once '../model/main-model.php';
// Get the vehicles model for use
require_once '../model/vehicles-model.php';
// Gets the function library
require_once '../library/functions.php';

//Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNav($classifications);

// Build a classifications drop down list
// $classificationList = "<select name='classificationId' id='classificationId' required>";
// $classificationList .= '<option selected="selected" disabled >Choose a classification</option>';
// foreach ($classifications as $classification) {
//     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
// }
// $classificationList .= '</select>'; 
// echo $classificationList;
// exit;

if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'classification-page':
        if(isset($_SESSION['clientData']) && ($_SESSION['clientData']['clientLevel']) > 1){
            include '../view/add-classification.php';
        }
        else{
            header('Location: /phpmotors');
        }
        break;
    
    case 'addClass':
        // Store and filter the car classification
        $carClassification = filter_input(INPUT_POST, 'carClassification', FILTER_SANITIZE_STRING);

        if(empty($carClassification)){
            $message = 'Please provide information for all empty form fields.';
            include '../view/add-classification.php';
            exit; 
        }

        // Call the addClassification() function to add that classification
        $classificationOutcome = addClassification($carClassification);
 
        // Check and report the result
        if($classificationOutcome === 1){
            header('Location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "Sorry, but we were unable to add a new car classification. Please try again.";
            include '../view/add-classification.php';
            exit;
        }

        break;

    case 'vehicle-page':
        if(isset($_SESSION['clientData']) && ($_SESSION['clientData']['clientLevel']) > 1){
            include '../view/add-vehicle.php';
        }
        else{
            header('Location: /phpmotors');
        }
        break;

    case 'addVehicle':
        // Store and filter data 
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT); 
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
            $message = 'Please provide information for all empty form fields.';
            include '../view/add-vehicle.php';
            exit;
        }

        // Call the addVehicle() function to add the vehicle to the inventory
        $vehicleOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

        // Check and report the result
        if($vehicleOutcome === 1){
            $message2 = "You have successfully added a new vehicle to PHP Motors inventory";
            unset(
            $invMake,
            $invModel,
            $invDescription,
            $invImage,
            $invThumbnail,
            $invPrice, 
            $invStock,
            $invColor,
            $classificationId);
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "Sorry, but we were unable to add a new vehicle. Please try again.";
            include '../view/add-vehicle.php';
            exit;
        }
        break;
    
    case 'getInventoryItems': 
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray);
        break;
    
    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

    case 'updateVehicle':
        // Store and filter data 
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT); 
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
            $message = 'Please provide information for all empty form fields.';
            include '../view/vehicle-update.php';
            exit;
        }

        // Call the addVehicle() function to add the vehicle to the inventory
        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);

        // Check and report the result
        if($updateResult === 1){
            $message2 = "<p class='congrats_message'>Congratulations, the $invMake $invModel was successfully updated.</p>";
            $_SESSION['message'] = $message2;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "Sorry, but we were unable to update this vehicle. Please try again.";
            include '../view/vehicle-update.php';
            exit;
        }
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

    case 'deleteVehicle':
        // Store and filter data 
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Call the addVehicle() function to add the vehicle to the inventory
        $deleteResult = deleteVehicle($invId);

        // Check and report the result
        if($deleteResult === 1){
            $message2 = "<p class='congrats_message'>Congratulations, the $invMake $invModel was successfully deleted.</p>";
            $_SESSION['message'] = $message2;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='error-message'>Error: $invMake $invModel was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;

    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
        $vehicles = getVehiclesByClassification($classificationName);
        if(!count($vehicles)){
            $message = "<p class='error'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        
        include '../view/classification.php';

        break; 

    case 'vehicle':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $vehicle = getVehicleById($invId);
        $thumbnails = getThumbnailsById($invId);
        // var_dump($thumbnails);
        // exit;
        
    
        if(!count($vehicle)){
            $message = "<p class='error'>Sorry, this vehicle could not be found.</p>";
        } else {
            $vehicleIdDisplay = buildVehicleDisplay($vehicle, $thumbnails);
        }
        include '../view/vehicle-details.php';

        break;
    default:
        $classificationList = buildClassificationList($classifications);


        if(isset($_SESSION['clientData']) && ($_SESSION['clientData']['clientLevel']) > 1){
            include '../view/vehicle-management.php';
        }
        else{
            header('Location: /phpmotors');
        }
   }