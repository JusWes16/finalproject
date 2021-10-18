<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Account Login | PHP Motors</title>
</head>
<body>
    <div id="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
        </header>
        <nav>
            <?php echo $navList; ?> 
        </nav>
        <main id="login_page">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                if(isset($message2)){
                    echo "<p class='error_message'>$message2</p>";
                    unset($message2);
                }            
            ?>
            <h1>Sign in</h1>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="clientEmail">Email</label>
                <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <label for="clientPassword">Password</label>
                <span>
                    Your password must be at least 8 characters and contain at 
                    least 1 uppercase character, 1 number and 1 special character
                </span>
                <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                <input type="submit" name="submit" id="login_submit" value="Sign-in">
                <input type="hidden" name="action" value="Login">
            </form>
            <a href="/phpmotors/accounts/index.php?action=registration">Not a member yet?</a>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>