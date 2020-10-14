<?php
class AnimalView{

    public function showAnimal($animal){
        echo "<article class=\"pet-card\">
        <img src=\"" . $animal->imgLink . "\" alt=\"Animal photo\">
        <div class=\"pet-text\">
          <h3>" . $animal->name . "</h3>
          <p>Sex: " . $animal->sex . " | Breed: ". $animal->breed . " | Size: " . $animal->size . " | Age: " . $animal->age . "</p>
          <a href=\"\">More Info</a>
        </div>
      </article>";
    }

    public function showLastAddedAnimal($animal){
        echo "<article class=\"new-pet-card\">
        <img src=\"" . $animal->imgLink . "\" alt=\"Animal photo\">
        <div class=\"new-pet-text\">
        <h3>" . $animal->name . "</h3>
        <p>" . $animal->description . "</p>
        </div>
    </article>";
    }

    public function showAnimalForGallery($animal){
      echo "<article class=\"pet-card-gallery\">
      <a href=\"\">
  <img src=\"" . $animal->imgLink . "\" alt=\"Animal Photo\">
  <div class=\"pcg-text\">
     <div class=\"pet-name\">" . $animal->name . "</div>
      <p>Sex: " . $animal->sex . " | Breed: ". $animal->breed . " | Size: " . $animal->size . " | Age: " . $animal->age . "</p>
  </div>
</a>
 </article>";
    }
}
?>