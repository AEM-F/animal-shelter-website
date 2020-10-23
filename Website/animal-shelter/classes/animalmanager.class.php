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

    public function getAllAnimalsByLimit($startNr,$nrPerPage){
            return $this->animalDh->getAllAnimalsByLimit($startNr,$nrPerPage);
    }

    public function getAnimalsByType($animals, $type){ 
        $animalsByType = [];
        foreach ($animals as $animal)
        {
            if($type == $animal->type){
                $animalsByType[] = $animal;
            }
        }
        return $animalsByType;
    }

    //Generate HTML section

    public function showAnimal($animal){
        echo "<article class=\"pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"pet-text\">
          <h3>" . $animal->GetName() . "</h3>
          <p>Sex: " . $animal->GetSex() . " | Breed: ". $animal->GetBreed() . " | Size: " . $animal->GetSize() . " | Age: " . $animal->GetAge() . "</p>
          <a href=\"\">More Info</a>
        </div>
      </article>";
    }

    public function showLastAddedAnimal($animal){
        echo "<article class=\"new-pet-card\">
        <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal photo\">
        <div class=\"new-pet-text\">
        <h3>" . $animal->GetName() . "</h3>
        <p>" . $animal->GetDescription() . "</p>
        </div>
    </article>";
    }

    public function showAnimalForGallery($animal){
      echo "<article class=\"pet-card-gallery\">
      <a href=\"\">
  <img src=\"" . $animal->GetImgLink() . "\" alt=\"Animal Photo\">
  <div class=\"pcg-text\">
     <div class=\"pet-name\">" . $animal->GetName() . "</div>
      <p>Sex: " . $animal->GetSex() . " | Breed: ". $animal->GetBreed() . " | Size: " . $animal->GetSize() . " | Age: " . $animal->GetAge() . "</p>
  </div>
</a>
 </article>";
    }
}
?>