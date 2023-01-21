<?php
// Voici un exemple de code PHP qui permet de comparer la similitude en pourcentage de 2 fichiers images de tailles différentes :


// Chemin des images à comparer
$image1 = 'image1.jpg';
$image2 = 'image2.jpg';

// Chargement des images en mémoire
$img1 = imagecreatefromjpeg($image1);
$img2 = imagecreatefromjpeg($image2);

// Récupération des dimensions des images
$img1Width = imagesx($img1);
$img1Height = imagesy($img1);
$img2Width = imagesx($img2);
$img2Height = imagesy($img2);

// Calcul du pourcentage de similitude
$similarity = 0;
$totalPixels = $img1Width * $img1Height;
for($x = 0; $x < $img1Width; $x++) {
    for($y = 0; $y < $img1Height; $y++) {
        $rgb1 = imagecolorat($img1, $x, $y);
        $rgb2 = imagecolorat($img2, $x, $y);
        if($rgb1 == $rgb2) {
            $similarity++;
        }
    }
}
$similarity = ($similarity / $totalPixels) * 100;

// Affichage du pourcentage de similitude
echo "Le pourcentage de similitude entre les images est de : " . $similarity . "%";

?>
