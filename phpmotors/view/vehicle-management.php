<?php 
    if (isset($_SESSION['message'])) {
        $message2 = $_SESSION['message'];
       }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Vehicle Management | PHP Motors</title>
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
        <main id="veh-manage">
            <?php
                if(isset($message2)){
                    echo $message2;
                }            
            ?>

            <h2>Vehicle Management</h2>
            <ul>
                <li><a href="?action=classification-page">Add a car classification</a></li>
                <li><a href="?action=vehicle-page">Add a vehicle</a></li>
            </ul>

            <?php
                if (isset($message)) { 
                echo $message; 
                } 
                if (isset($classificationList)) { 
                echo '<h2>Vehicles By Classification</h2>'; 
                echo '<p>Choose a classification to see those vehicles</p>'; 
                echo $classificationList; 
                }
            ?>

            <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>

            <table id="inventoryDisplay"></table>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
    <script src="../js/inventory.js"></script>
</body>
</html><?php unset($_SESSION['message']); ?>