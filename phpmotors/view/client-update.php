<?php 
    if(!isset($_SESSION['clientData'])){
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
    <title>Update Account | PHP Motors</title>
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
        <main id="client-update-page">
            <h1>Update Account Information</h1>
            <h2>Update Account Info</h2>
            <?php
                if(isset($message)){
                    echo "<p class='error_message'>$message</p>";
                    unset($message);
                }           
            ?>
            <form action="/phpmotors/accounts/index.php" method="post" id="update-info-form">
                <label for="clientFirstname">First Name</label>
                <input type="text" name="clientFirstname" id="clientFirstname" value="<?php if(isset($clientFirstname)){echo $clientFirstname;} elseif(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientFirstname'];} ?>" required>
                
                <label for="clientLastname">Last Name</label>
                <input type="text" name="clientLastname" id="clientLastname" value="<?php if(isset($clientLastname)){echo $clientLastname;} elseif(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientLastname'];} ?>" required>
                
                <label for="clientEmail">Email</label>
                <input type="email" name="clientEmail" id="clientEmail" value="<?php if(isset($clientEmail)){echo $clientEmail;} elseif(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientEmail'];} ?>" required>
                
                <input type="submit" name="submit" id="update_submit" value="Update Info">
                <input type="hidden" name='action' value='updateAccount'>
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){echo $_SESSION['clientData']['clientId'];} ?>">
            </form>
            <h2>Update Password</h2>
            <p id="password-requirements">
                Your password must be at least 8 characters and contain at 
                least 1 uppercase character, 1 number and 1 special character
            </p>
            <p><sup>*</sup>note your original password will be changed.</p>
            <?php
                if(isset($message2)){
                    echo "<p class='error_message'>$message2</p>";
                    unset($message2);
                }            
            ?>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="clientPassword">Password</label>
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <input type="button" id="pswdBtn" value="Show Password">
                
                <input type="submit" name="submit" id="updatePassword_submit" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){echo $_SESSION['clientData']['clientId'];} ?>">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
    <script src="/phpmotors/js/library.js"></script>
</body>
</html>