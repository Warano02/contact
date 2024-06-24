<?php
$timezone = new DateTimeZone('Africa/Douala');
$datetime = new DateTime('now', $timezone);
$date= $datetime->format('m-d H:i');
$jour = $datetime->format('l');

$jours = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];

switch ($jour) {
    case $jours[0]:
        $statut = "Lun";
        break;
    case $jours[1]:
        $statut = "Mar";
        break;
    case $jours[2]:
        $statut = "Mer";
        break;
    case $jurs[3]:
        $statut = "Jeu";
        break;
    case $jours[4]:
        $statut = "Ven";
        break;
    case $jours[5]:
        $statut = "Sam";
        break;    
    default:
    $statut = "Dim";
}
$statut = "En ligne ".$statut." ".$date;
