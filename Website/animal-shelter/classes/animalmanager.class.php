<?php
class AnimalManager{
    private $animalDh;

    public function __construct(){
        $this->animalDh = new AnimalDh();
    }

    public function getAllAnimals(){
        return $this->animalDh->getAllAnimals();
    }

    public function getAnimalById($id){
        if($id <= 0){
            return false;
        }
        else{
            return $this->animalDh->getAnimalById($id);
        }
    }

    public function getTotalAnimals(){
        return $this->animalDh->getAllAnimalsCount();
    }

    public function getTotalAnimalsByName($name){
        return $this->animalDh->getAllAnimalsByNameCount($name);
    }

    public function getAllAnimalsByLimit($startNr,$nrPerPage){
            return $this->animalDh->getAllAnimalsByLimit($startNr,$nrPerPage);
    }

    public function getTypeAnimalsByLimit($startNr,$nrPerPage,$type){
            return $this->animalDh->getTypeAnimalsByLimit($startNr,$nrPerPage,$type);
    }

    public function getAnimalsByNameAndLimit($startNr, $nrPerPage, $name){
            return $this->animalDh->getAnimalsByNameAndLimit($startNr, $nrPerPage, $name);
    }

    public function getAnimalsByType($animals, $type){ 
        $animalsByType = [];
        foreach ($animals as $animal)
        {
            if($type == $animal->GetType()){
                $animalsByType[] = $animal;
            }
        }
        return $animalsByType;
    }

    public function sanitizeString($string){

        $string = strip_tags($string);

        $string = str_replace(" ","",$string);

    return $string;
    }

    //Generate HTML section

    public function showAnimal($animal){
        echo "<article class=\"pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"pet-text\">
          <h3>" . $animal->GetName() . "</h3>
          <p>Sex: " . $animal->GetSex() . " | Breed: ". $animal->GetBreed() . " | Size: " . $animal->GetSize() . " | Age: " . $animal->GetAge() . "</p>
          <a href=\"animal-showcase.php?aId=". $animal->GetId() ."\">More Info</a>
        </div>
      </article>";
    }

    public function showLastAddedAnimal($animal){
        echo "<article class=\"new-pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"new-pet-text\">
        <h3>" . $animal->GetName() . "</h3>
        <p>" . substr($animal->GetDescription(),0,200). "..." . "</p>
        </div>
    </article>";
    }

    public function showAnimalForGallery($animal){
      echo "<article class=\"pet-card-gallery\">
      <a href=\"animal-showcase.php?aId=". $animal->GetId() ."\">
  <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal Photo\">
  <div class=\"pcg-text\">
     <div class=\"pet-name\">" . $animal->GetName() . "</div>
      <p>Sex: " . $animal->GetSex() . " | Breed: ". $animal->GetBreed() . " | Size: " . $animal->GetSize() . " | Age: " . $animal->GetAge() . "</p>
  </div>
</a>
 </article>";
    }

    public function showAnimalForAnimalOverview($animal){
        echo "<button id=\"animal-" . $animal->GetId() . "\" class=\"animal-container-btn\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal Photo\">
        <div class=\"animal-short-info\">
            <p>Sex: " . $animal->GetSex() . " | Breed: ". $animal->GetBreed() . " | Size: " . $animal->GetSize() . " | Age: " . $animal->GetAge() . "</p>
        </div>
            <p class=\"animal-container-name\">
                " . $animal->GetName() . "
            </p>
    </button>";
    }
}
?>