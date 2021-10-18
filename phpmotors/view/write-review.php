<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Write a Review | PHP Motors</title>
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
        <main id="write-review">
            <h1>Write a Review!</h1>
            <?php
            if(isset($message)){
                    echo $message;
                    unset($message);
                }
            ?>
            <form action='/phpmotors/reviews/index.php' method='post'>   
                <label for="clientFirstname">First Name</label>
                <input type="text" name="clientFirstname" id="clientFirstname" value="<?php if(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientFirstname'];} ?>" required>

                <label for="clientLastname">Last Name</label>
                <input type="text" name="clientLastname" id="clientLastname" value="<?php if(isset($_SESSION['clientData'])){echo $_SESSION['clientData']['clientLastname'];} ?>" required>

                <label for="clientReview">Your Review</label>
                <textarea name="clientReview" id="clientReview" cols="30" rows="5"></textarea>

                <label for="clientRating">Your Rating (0-5)</label>
                <input type="number" name="clientRating" id="clientRating" min="0" max="5" required>

                <input type="submit" name="submit" id="review_submit" value="Post Review">
                <input type="hidden" name="action" value="postReview">
                <input type='hidden' name='invId' value='<?php echo $invId ?>'>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>