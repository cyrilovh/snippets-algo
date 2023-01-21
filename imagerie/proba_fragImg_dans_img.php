<?php

// Voici un exemple de code PHP qui permet de calculer la probabilité en pourcentage que le fragment d'image "fragment.jpg" soit présent dans l'image "image.jpg" :

// Chemin des images
$image = 'image.jpg';
$fragment = 'fragment.jpg';

// Chargement des images en mémoire
$img = imagecreatefromjpeg($image);
$imgFragment = imagecreatefromjpeg($fragment);

// Récupération des dimensions des images
$imgWidth = imagesx($img);
$imgHeight = imagesy($img);
$imgFragmentWidth = imagesx($imgFragment);
$imgFragmentHeight = imagesy($imgFragment);

// Initialisation des variables pour le calcul
$totalPixels = $imgWidth * $imgHeight;
$matchingPixels = 0;

// Recherche du fragment dans l'image
for($x = 0; $x < $imgWidth - $imgFragmentWidth; $x++) {
    for($y = 0; $y < $imgHeight - $imgFragmentHeight; $y++) {
        $isMatching = true;
        for($fx = 0; $fx < $imgFragmentWidth; $fx++) {
            for($fy = 0; $fy < $imgFragmentHeight; $fy++) {
                $rgb1 = imagecolorat($img, $x + $fx, $y + $fy);
                $rgb2 = imagecolorat($imgFragment, $fx, $fy);
                if($rgb1 != $rgb2) {
                    $isMatching = false;
                    break 2;
                }
            }
        }
        if($isMatching) {
            $matchingPixels += $imgFragmentWidth * $imgFragmentHeight;
        }
    }
}

// Calcul de la probabilité en pourcentage
$probability = ($matchingPixels / $totalPixels) * 100;

// Affichage de la probabilité
echo "La probabilité que le fragment soit présent dans l'image est de : " . $probability . "%";

?>
