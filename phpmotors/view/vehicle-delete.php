<?php 
    if($_SESSION['clientData']['clientLevel'] < 2){
        header('location: /phpmotors/');
        exit;
       }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>
        <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
        ?>
    </title>
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
        <main id="del-veh">
            <h1>   
                <?php 
                    if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                        echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
                ?>
            </h1>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>
            <?php
                if(isset($message)){
                    echo "<p class='error_message'>$message</p>";
                    unset($message);
                }            
            ?>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <label for="invMake">Vehicle Make</label>
                <input type="text" name="invMake" id="invMake" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> readonly>

                <label for="invModel">Vehicle Model</label>
                <input type="text" name="invModel" id="invModel" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> readonly>

                <label for="invDescription">Vehicle Description</label>
                <textarea name="invDescription" id="invDescription" cols="30" rows="5" readonly><?php if(isset($invInfo['invDescription'])) {echo "$invInfo[invDescription]"; } ?></textarea>
                
                <input type="submit" name="submit" id="deleted-vehicle" value="Delete Vehicle">

                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){echo $invInfo['invId'];} ?>">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>