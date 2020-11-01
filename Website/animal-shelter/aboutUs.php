<?php   
include 'includes/class-autoloader.inc.php';
session_start();
$userManager = new UserManager();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Account-Edit-page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIKMiEng7L4L7NtK5lqI0Z1aFp-FwcZNU&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    </head>
    <body>
    <div class="backdrop"></div>
    <?php include 'includes/main-navigation.php'; ?>
    <div class="user-info-format">
            <div class="user-info-section">
                <div class="user-info-background"></div>
                 <!-- <div class="text_center_img">   
                <h2>About us</h2>
                </div> -->
            </div>

            <div class="user-info-about-top" id="aboutUs_Top">
                <p>
                    The shelter is non profit organisation that allows, our new and existing animal lovers to become a part of our goal to help as many animals as we can.
                </p>
                <h2 > What we provide</h2>
                <p>
                    
                </p>
                </div>
                    
                <div class = "user-info-goals">
                    <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-bone"></i>Safety</h1>
                        <p> To provide a welcoming place for all the troubled fourlegged guests in our pet shelter. We provide food,medicine and most of all safety in our animal shelter. </p>
                    </div>
                    <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-home"></i>Love</h1>
                        <p>Every animal in our four legged hotel is getting all the attention and love from our staff to encourage our little guests to shine with their enthusiasm and to be able to learn. </p>
                    </div>
                    <div class="user-box-decisions">
                        <h1 class="adv-title"><i class="fas fa-heart"></i>Interaction</h1>
                        <p> Most of our employees are experienced animal rescuers who had plenty of experience with nurturing and training animals. We also have many volunteers who are eager to learn and care for our little animal friends.  </p>
                    </div>

                </div>

                <div class="user-info-about-bot" id="aboutUs_Bottom">
                <h2 > What we did </h2>
                <div class="user-box-animalHome">
                <p>
                    * We already gave over 2.000 animals new loving homes.<br>
                    * This is a lie There is no cake.<br>

                    * Video of shelter animals having fun. <br>
                    
                </p>
                </div>
                </div>
                
            <div class="user-info-bot-animal-format">
                <div class="user-info-bot-animal-pic1">  </div>
                <div class="user-info-bot-animal-pic2"> </div>
                <div class="user-info-bot-animal-pic3"> </div>
            </div>

            <div>

            </div>
    <div class="find-us-container-wrapper">
        <h1>Do you want to get in contact with us?</h1>
        <div class="find-us-container">
            <div id="google-map"></div>
            <div class="find-us-container-info">
                <p>
                    Animal Shelter:<br>
                    11am - 7pm Mon - Fri & Sun<br>
                    9am - 7pm Saturday<br>
                    Address: Vaasahof 75, 3067 DX Rotterdam, Netherlands<br>
                    Phone: +31 10 251 1400
                </p>
            </div>
        </div>
    </div>
                
            
        
</div>
    <?php include 'includes/main-footer.php'; ?>
    <script src="js/shared.js"></script>
    <script src="js/google-map.js"></script>
</body>
</html>