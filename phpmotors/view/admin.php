<?php 
    if(!isset($_SESSION['clientData'])){
        header('Location: /phpmotors/');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Admin Page | PHP Motors</title>
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
        <main id="admin_page">
            <h1><?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname'] ?></h1>
            <?php if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }?>
            <p id="logged_message">You are logged in.</p>
            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
            <h2>Account Management</h2>
            <p>Use this link to update account information.</p>
            <a href="../accounts/index.php?action=Update" id="update-link">Update Account Information</a>
            
            <?php 
                if($_SESSION['clientData']['clientLevel'] > 1){
                    echo "<h2>Inventory Management</h2>";
                    echo "<p>Use this link to manage the inventory.</p>";
                    echo "<p id='veh-manage-link'><a href='../vehicles/'>Vehicle Management</a></p>";
                }
            ?>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>