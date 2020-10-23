<header class="main-header">
        <div>
            <button class="toggle-button">
                <span class="toggle-button_bar"></span>
                <span class="toggle-button_bar"></span>
                <span class="toggle-button_bar"></span>
            </button>
            <a href="index.php" class="main-header_brand">
                <img src="images/logoShelter3.png" alt="Animal Shelter Logo">
            </a>
        </div>
        <nav class="main-nav">
            <ul class="main-nav_items">
                <?php
                if(isset($_SESSION["userName"])){
                    echo "<li class=\"main-nav_item main-nav_item--user\">
                    <p>" . "Hello, " . $userManager->getUserByName($_SESSION["userName"])->GetName() . "</p>
                    </li>";

                    echo "<li class=\"main-nav_item main-nav_item--cta\">
                    <a href=\"account-overview.php\"><i class=\"fas fa-user-circle\"></i>Account</a>
                    </li>";
                }
                ?>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="gallery.php"><i class="fas fa-camera-retro"></i> Gallery</a>
                </li>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="#"><i class="fas fa-info-circle"></i> About us</a>
                </li>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="#l"><i class="fas fa-donate"></i> Donate</a>
                </li>
                <?php
                if(isset($_SESSION["userName"])){
                    echo "<li class=\"main-nav_item main-nav_item--cta\">
                    <a href=\"handlers/user-logout-handler.php\"><i class=\"fas fa-sign-in-alt\"></i>Log Out</a>
                </li>";
                }
                else{
                    echo "<li class=\"main-nav_item main-nav_item--cta\">
                    <a href=\"login.php\"><i class=\"fas fa-sign-in-alt\"></i>Log In</a>
                </li>";
                }
                ?>
                
            </ul>
        </nav>
    </header>
    <nav class="mobile-nav">
        <ul class="mobile-nav_items">
            <?php 
            if(isset($_SESSION["userName"])){
                echo "<li class=\"mobile-nav_item mobile-nav_item--cta\">
                <a href=\"account-overview.php\"><i class=\"fas fa-user-circle\"></i>Account</a>
            </li>";
            }
            ?>
            <li class="mobile-nav_item mobile-nav_item--cta">
            <a href="gallery.php"><i class="fas fa-camera-retro"></i> Gallery</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="#"><i class="fas fa-info-circle"></i> About us</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="#l"><i class="fas fa-donate"></i> Donate</a>
            </li>
            <?php
                if(isset($_SESSION["userName"])){
                    echo "<li class=\"mobile-nav_item mobile-nav_item--cta\">
                    <a href=\"handlers/user-logout-handler.php\">Log Out</a>
                </li>";
                }
                else{
                    echo "<li class=\"mobile-nav_item mobile-nav_item--cta\">
                    <a href=\"login.php\">Log In</a>
                </li>";
                }
                ?>
        </ul>
    </nav>