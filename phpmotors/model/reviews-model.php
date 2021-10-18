<?php
// This is the reviews model 

// Retrieves vehicles by classificationName
function getAllVehicleReviews(){
    $db = phpmotorsConnect();
    $sql = 'SELECT imgPath, inventory.invId, invMake, invModel  FROM images JOIN inventory ON images.invId = inventory.invId WHERE imgPath LIKE "%-tn%" AND imgPrimary = 1';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

function addNewReview($invId, $clientFirstname, $clientLastname, $clientReview, $clientRating){
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (invId, clientFirstname, clientLastname, clientReview, clientRating)
        VALUES (:invId, :clientFirstname, :clientLastname, :clientReview, :clientRating)';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientReview', $clientReview, PDO::PARAM_STR);
    $stmt->bindValue(':clientRating', $clientRating, PDO::PARAM_INT);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Retrieves vehicles by classificationName
function getVehicleReviews($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientFirstname, clientLastname, clientReview, clientRating FROM reviews WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

// Retrieves a vehicle by invId
function getVehicleInfoById($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT invMake, invModel, imgPath, inventory.invId FROM inventory JOIN images ON images.invId = inventory.invId WHERE inventory.invId = :invId AND imgPath NOT LIKE "%-tn%" AND imgPrimary = 1';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicle;
}