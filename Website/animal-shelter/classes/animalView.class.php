<?php
    class AnimalView{
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
    }
?>