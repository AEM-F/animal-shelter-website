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
                if(isset($_SESSION["userId"])){
                    echo "<li class=\"main-nav_item main-nav_item--user\">
                    <p>" . "Hello, " . $userManager->getUserById($_SESSION["userId"])->GetName() . "</p>
                    </li>";

                    echo "<li class=\"main-nav_item main-nav_item--cta\">
                    <a href=\"account-overview.php\"><i class=\"fas fa-user-circle\"></i>Account</a>
                    </li>";

                    if($userManager->getUserById($_SESSION["userId"])->GetRole() == "Admin"){
                        echo "<li class=\"main-nav_item main-nav_item--cta main-nav-item--admin\">
                    <a href=\"admin/animal-overview.php\" title=\"Travel to admin panel\"><i class=\"fas fa-user-shield\"></i></a>
                    </li>";
                    }
                }
                ?>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="gallery.php"><i class="fas fa-camera-retro"></i> Gallery</a>
                </li>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="aboutUs.php"><i class="fas fa-info-circle"></i> About us</a>
                </li>
                <li class="main-nav_item main-nav_item--cta">
                    <a href="#l"><i class="fas fa-donate"></i> Donate</a>
                </li>
                <?php
                if(isset($_SESSION["userId"])){
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
            if(isset($_SESSION["userId"])){
                if($userManager->getUserById($_SESSION["userId"])->GetRole() == "Admin"){
                    echo "<li class=\"mobile-nav_item mobile-nav_item--cta\">
                <a href=\"admin/animal-overview.php\" title=\"Travel to admin panel\"><i class=\"fas fa-user-shield\"></i>Admin</a>
                </li>";
                }
                echo "<li class=\"mobile-nav_item mobile-nav_item--cta\">
                <a href=\"account-overview.php\"><i class=\"fas fa-user-circle\"></i>Account</a>
            </li>";
            }
            ?>
            <li class="mobile-nav_item mobile-nav_item--cta">
            <a href="gallery.php"><i class="fas fa-camera-retro"></i> Gallery</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="aboutUs.php"><i class="fas fa-info-circle"></i> About us</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="#l"><i class="fas fa-donate"></i> Donate</a>
            </li>
            <?php
                if(isset($_SESSION["userId"])){
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