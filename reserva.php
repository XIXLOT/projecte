<?php
// Obtenir les dades del formulari mitjançant POST
$nom = isset($_POST["nom"]) ? $_POST["nom"] : '';   // Nom i cognoms del client
$visa = isset($_POST["visa"]) ? $_POST["visa"] : ''; // Número de VISA
$tipus = isset($_POST["tipus"]) ? $_POST["tipus"] : ''; // Tipus d'automòbil
$seients = isset($_POST["seients"]) ? $_POST["seients"] : 4; // Quantitat de seients
$dies = isset($_POST["dies"]) ? $_POST["dies"] : 0;  // Quantitat de dies de lloguer
$quilometres = isset($_POST["quilometres"]) ? $_POST["quilometres"] : ''; // Quantitat de quilòmetres
$descompte = isset($_POST["descompte"]) ? $_POST["descompte"] : ''; // Capturar el codi de descompte

// Preus de lloguer diari per tipus de cotxe
$preu_diari_benzina = 20; // Preu cotxe benzina
$preu_diari_electric = 30; // Preu cotxe elèctric

// Suplement per seients de 5
$suplement_seients = ($seients == 5) ? 10 : 0;

// Suplement per quilòmetres
$suplement_quilometres = ($quilometres == 'mes_300') ? 20 : 0;

// Calcul del preu sense IVA
$preu_diari = ($tipus == 'benzina') ? $preu_diari_benzina : $preu_diari_electric;
$preu_sense_iva = ($preu_diari * $dies) + $suplement_seients + $suplement_quilometres;

// Càlcul de l'IVA
$iva = $preu_sense_iva * 0.21;
$preu_amb_iva = $preu_sense_iva + $iva;

// Aplicar descompte si el codi és vàlid
$descompte_percentatge = 0;
if ($descompte == 'DESCOMPTE15') {  // Codi de descompte vàlid
    $descompte_percentatge = 0.15;  // 15% de descompte
}

// Aplicar descompte
$preu_sense_iva = $preu_sense_iva * (1 - $descompte_percentatge);

// Mostrar el codi de descompte
if ($descompte_percentatge > 0) {
    echo "Codi de descompte aplicat: 15%<br>";
} else {
    echo "Cap codi de descompte aplicat.<br>";
}

// Mostrar els resultats
echo "<h1>Detalls de la Reserva</h1>";
echo "Nom: $nom <br>";
echo "Número VISA: $visa <br>";
echo "Preu sense IVA: €" . number_format($preu_sense_iva, 2) . "<br>";
echo "IVA (21%): €" . number_format($iva, 2) . "<br>";
echo "Preu final amb IVA: €" . number_format($preu_amb_iva, 2) . "<br>";
echo "<br><a href='index.html'>Tornar al formulari</a>";

?>

