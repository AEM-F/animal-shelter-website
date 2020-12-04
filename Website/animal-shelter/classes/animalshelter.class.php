<?php
class AnimalShelter{
    private static $instance = null;
    private $animalDh;
    private $userDh;
    private $userView;
    private $animalView;

    private function __construct(){
        $this->animalDh = new AnimalDh();
        $this->userDh = new UserDh();
        $this->userView = new UserView();
        $this->animalView = new AnimalView();
    }
    //DataHelpers read-only properties
    public function GetAnimalHelper() { return $this->animalDh; }
    public function GetUserHelper() { return $this->userDh; }

    //Views read-only properties
    public function GetUserView() { return $this->userView; }
    public function GetAnimalView() { return $this->animalView; }

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