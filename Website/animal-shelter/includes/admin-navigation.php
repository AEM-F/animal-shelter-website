<header class="admin-main-header">
        <div class="a-top-left">
            <button class="a-toggle-button">
                <i class="fas fa-angle-double-right"></i>
            </button>
            <div class="a-main-header_brand">
                Admin Panel
            </div>
        </div>
        <nav class="a-top-nav">
            <ul class="top-nav_items">
                <?php
                if(isset($_SESSION["userId"])){
                    echo "<li class=\"main-nav_item main-nav_item--user main-nav_item--user-admin\">
                    <p>" . "Hello, " . $userManager->getUserById($_SESSION["userId"])->GetName() . "</p>
                    </li>";
                }
                ?>
                <li class="top-nav_item">
                    <a href="../index.php"><i class="fas fa-paw"></i>To Shelter</a>
                </li>
            </ul>
        </nav>
    </header>
    <nav class="slider-nav">
        <ul class="slider-nav_items">
            <button class="s-close-button">
                <i class="fas fa-times"></i>
            </button>
            <div class="slider-nav_item">
            <button id="animals-main-nav_btn" class="slider-btn-nav_item"><i class="fas fa-paw"></i>Animals</a></button>
            </div>
            <div class="slider-nav_item_sub_wrapper_animals">
                <div class="slider-nav_item_sub">
                    <a class="slider-link-nav_item" href="animal-overview.php"><i class="fas fa-paw"></i>Animals overview</a>
                </div>
                <div class="slider-nav_item_sub">
                    <a class="slider-link-nav_item" href="#"><i class="fas fa-plus"></i>Add animal</a>
                </div>
            </div>
            
            <div class="slider-nav_item">
                <button id="users-main-nav_btn" class="slider-btn-nav_item"><i class="fas fa-users"></i>Users</a></button>
            </div>
            <div class="slider-nav_item_sub_wrapper">
                <div class="slider-nav_item_sub">
                    <a class="slider-link-nav_item" href="#"><i class="fas fa-users"></i> Users overview</a>
                </div>
                <div class="slider-nav_item_sub">
                    <a class="slider-link-nav_item" href="#"><i class="fas fa-user-plus"></i>Add user</a>
                </div>
            </div>
        </ul>
    </nav>