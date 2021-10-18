<img id="logo" src="/phpmotors/images/site/logo.png" alt="Site logo">

<p id="my_account">
    <?php if(isset($_SESSION['clientData'])){
        echo "<a href='/phpmotors/accounts/' id='admin'>Welcome, ".$_SESSION['clientData']['clientFirstname']."</a>";
        } 
    ?>
    <?php 
        if(!isset($_SESSION['clientData'])){
            echo "<a href='/phpmotors/accounts/index.php?action=login'> My Account</a>";
        }
        else{
            echo "<a href='/phpmotors/accounts/index.php?action=Logout'> Log out</a>";
        }
    ?>
    
</p>