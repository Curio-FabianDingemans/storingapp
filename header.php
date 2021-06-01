<?php require_once 'backend/config.php'; ?>

<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/img/logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/meldingen/index.php">Meldingen</a>
        </nav>
        <div>
            <?php
                if(!isset($_SESSION['Id'])){
                    echo '<a href="'. $base_url.'/login.php">Inloggen</a>';
                }else{
                    echo '
                    <a>'.$_SESSION['username'].'</a>
                    <a href="'.$base_url.'/backend/sessionController.php?logout=">Uitloggen</a>
                    ';
                }
            ?>
        </div>
    </div>
</header>
