<?php 
// Build a classifications drop down list
$classificationList = "<select name='classificationId' id='classificationId'>";
$classificationList .= '<option selected="selected" disabled >Choose a classification</option>';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>'; 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Add Vehicle | PHP Motors </title>
</head>
<body>
    <div id="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
        </header>
        <nav> 
            <!-- <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>  -->
            <?php echo $navList; ?>
        </nav>
        <main id="add-veh">
            <h2>Add a new vehicle</h2>

            <?php
                if(isset($message)){
                    echo "<p class='error_message'>$message</p>";
                    unset($message);
                }            
            ?>
            <?php
                if(isset($message2)){
                    echo "<p class='congrats_message'>$message2</p>";
                    unset($message2);
                }            
            ?>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <label for="invMake">Vehicle Make<sup>*</sup></label>
                <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required>

                <label for="invModel">Vehicle Model<sup>*</sup></label>
                <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required>

                <label for="classificationId">Vehicle Classification<sup>*</sup></label>
                <?php echo $classificationList; ?>

                <label for="invDescription">Vehicle Description<sup>*</sup></label>
                <textarea name="invDescription" id="invDescription" cols="30" rows="5"><?php if(isset($invDescription)){echo "$invDescription";}  ?></textarea>

                <label for="invImage">Image Path<sup>*</sup></label>
                <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required>

                <label for="invThumbnail">Thumbnail Path<sup>*</sup></label>
                <input type="text" name="invThumbnail" id="invThumbnail" value="/phpmotors/images/no-image.png" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required>

                <label for="invPrice">Vehicle Price<sup>*</sup></label>
                <input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required>

                <label for="invStock">Vehicle Stock #<sup>*</sup></label>
                <input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required>

                <label for="invColor">Vehicle Color<sup>*</sup></label>
                <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required>
                
                <input type="submit" name="submit" id="new-vehicle" value="Add Vehicle">
                <input type="hidden" name="action" value="addVehicle">
            </form>
            <small><sup>*</sup> fields are required</small>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>