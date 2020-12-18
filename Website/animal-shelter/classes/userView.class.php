<?php
class UserView{
    public static function showUser($user){
        echo 
        "
            <b>Id:</b> " . $user->GetId() . "<br>
            <b>Name:</b> " . $user->GetName() . "<br>
            <b>Last Name:</b> " . $user->GetLastName() . "<br>
            <b>Email:</b> " . $user->GetEmail();
            
    }

    public static function showUserForUserOverview($user){
        $userIcon = "user-alt";
        switch ($user->GetRole()) {
            case 'Admin':
                $userIcon = "user-shield";
                break;
        }
        echo "<button id=\"user-" . $user->GetId() . "\" class=\"user-container-btn\">
        <i class=\"fas fa-" . $userIcon . "\"></i>
            <p class=\"user-container-name push\">
                ". "Name: " .  $user->GetName() . " " . $user->GetLastName() . "
            </p>
    </button>";
    }
}
?>