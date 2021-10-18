<?php
//This is the reviews controller

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
// Gets the reviews model
require_once '../model/reviews-model.php';

//Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'writeReview':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        include "../view/write-review.php";
        break;

    case 'postReview':
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientReview = filter_input(INPUT_POST, 'clientReview', FILTER_SANITIZE_STRING);
        $clientRating = filter_input(INPUT_POST, 'clientRating', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientReview) || empty($clientRating)){
            $message = '<p class="error">Please provide information for all empty form fields.</p>';
            include '../view/write-review.php';
            exit; 
        }

        $postReviewResults = addNewReview($invId, $clientFirstname, $clientLastname, $clientReview, $clientRating);

        if($postReviewResults === 1){
            $message = "<p class='congrats_message'>Congratulations, you successfully posted a review.</p>";
            $_SESSION['message'] = $message;
            header("Location: /phpmotors/reviews");
            exit;
        } else {
            $message = "<p class='error-message'>Error: Unable to post review. Please try again.</p>";
            $_SESSION['message'] = $message;
            include '../view/write-review.php';
            exit;
        }
        break;

    case 'review':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $vehicleInfo = getVehicleInfoById($invId);
        $reviewInfo = getVehicleReviews($invId);
        if(!count($reviewInfo)){
            $message = "<p class='error'>Sorry, there are no reviews for this vehicle</p>";
        } else {
            $reviewDisplay = buildReviewDisplay($vehicleInfo, $reviewInfo);
        }

        include "../view/review.php";
        break;

    default;
        $vehicles = getAllVehicleReviews();
        if(!count($vehicles)){
            $message = "<p class='error'>Sorry, no vehicles could be found.</p>";
        } else {
            $reviewsDisplay = buildReviewsDisplay($vehicles);
        }
        include '../view/reviews.php';
        break;
}