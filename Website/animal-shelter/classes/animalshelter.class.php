<?php
class AnimalShelter{
    private static $instance = null;
    private $animalDh;
    private $userDh;

    private function __construct(){
        $this->animalDh = new animalDh();
        $this->userDh = new userDh();
    }
    public function GetAnimalHelper() { return $this->animalDh; }
    public function GetUserHelper() { return $this->userDh; }

    public static function sanitizeString($string){

        $string = strip_tags($string);

        $string = str_replace(" ","",$string);

    return $string;
    }

    public static function sanitizePassword($string)
    {
        $string = md5($string);
    
        return $string;
    }

    //Animal

    public static function getAnimalsByType($animals, $type){ 
        $animalsByType = [];
        foreach ($animals as $animal)
        {
            if($type == $animal->GetFamily()){
                $animalsByType[] = $animal;
            }
            
        }
        return $animalsByType;
    }

    

    //Generate HTML section Animal

    public static function showAnimal($animal){
        echo "<article class=\"pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"pet-text\">
          <h3>" . $animal->GetName() . "</h3>
          <p>" . $animal->GetAnimalShortDescription() .  "</p>
          <a href=\"animal-showcase.php?aId=". $animal->GetId() ."\">More Info</a>
        </div>
      </article>";
    }

    public static function showLastAddedAnimal($animal){
        echo "<article class=\"new-pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"new-pet-text\">
        <h3>" . $animal->GetName() . "</h3>
        <p>" . substr($animal->GetDescription(),0,200). "..." . "</p>
        </div>
    </article>";
    }

    public static function showAnimalForGallery($animal){
      echo "<article class=\"pet-card-gallery\">
      <a href=\"animal-showcase.php?aId=". $animal->GetId() ."\">
  <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal Photo\">
  <div class=\"pcg-text\">
     <div class=\"pet-name\">" . $animal->GetName() . "</div>
      <p>" . $animal->GetAnimalShortDescription() . "</p>
  </div>
</a>
 </article>";
    }

    public static function showAnimalForAnimalOverview($animal){
        echo "<button id=\"animal-" . $animal->GetId() . "\" class=\"animal-container-btn\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal Photo\">
        <div class=\"animal-short-info\">
            <p>" . $animal->GetAnimalShortDescription() . "</p>
        </div>
            <p class=\"animal-container-name\">
                " . $animal->GetName() . "
            </p>
    </button>";
    }

    //Generate HTML section User

    public static function showUser($user){
        echo 
        "
            <b>Id:</b> " . $user->GetId() . "<br>
            <b>Name:</b> " . $user->GetName() . "<br>
            <b>Last Name:</b> " . $user->GetLastName() . "<br>
            <b>Email:</b> " . $user->GetEmail();
            
    }

    public static function GetInstance()
    {
      if (self::$instance == null)
      {
        self::$instance = new AnimalShelter();
      }
      return self::$instance;
    }
    
}
?>