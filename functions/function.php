<?php

define('JOURS', [
    "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"
]);

define('HORAIRES', [
    [
        [8,12],
        [14,17]
    ],
    [
        [8,12],
        [14,17]
    ],
    [
        [10,12],
        [14,17]
    ],
    [
        [8,12],
        [14,17]
    ],
    [
        [8,12],
        [14,17]
    ],
    [
        [8,14]
    ],
    []
]);


function navItem(string $lien, string $titre, string $className = ''): string 
{
    if ($_SERVER['REQUEST_URI'] == $lien) {
        $className = $className . ' active';
    }

    return <<<HTML
        <li class='nav-item'>
            <a href="$lien" class="$className">$titre</a>
        </li>
    HTML;
}


function navMenu(string $className = ''): string
{
    return navItem('/PHP2/index.php', 'Home', $className) .
    navItem('/PHP2/menu.php', 'Menu', $className) .
    navItem('/PHP2/contact.php', 'Contact', $className) .
    navItem('/PHP2/forum.php', 'Forum', $className);
}


function creneau_phrase(array $horaires): string
{
    if(empty($horaires)){
        return "Fermé";
    }

    $html = [];
    foreach ($horaires as $heure) {
        $html[] = "de {$heure[0]}h à {$heure[1]}h";
    }

    return implode (' et ',$html);
}


function afficherHoraire(string $className = ""): string
{
    $today = getdate()['wday'];
    $hours = getdate()['hours'];
    $ouvrable = [1,2,3,4,5];

    $phrase = "<div ";
    if ($today === 7)
    {
        $phrase .= "class=\"alert alert-danger\"> Le magasin est fermé </div>";
    }
    elseif (($today === 6) && ($hours >= HORAIRES[$today-1][0][0] && $hours <= HORAIRES[$today-1][0][1]))
    {
        $phrase .= "class=\"alert alert-success\"> Le magasin est ouvert </div>";
    }
    elseif ((in_array($today, $ouvrable)) && (($hours >= HORAIRES[$today-1][0][0] && $hours <= HORAIRES[$today-1][0][1]) || ($hours >= HORAIRES[$today-1][1][0] && $hours <= HORAIRES[$today-1][1][1])))
    {
        $phrase .= "class=\"alert alert-success\"> Le magasin est ouvert </div>";
    } else {
        $phrase .= "class=\"alert alert-danger\"> Le magasin est fermé </div>";
    }


    $phrase .= "<ul class= $className>";
    foreach(JOURS as $key => $value){
        if($key === (int)date("N") - 1 ) {
            $phrase .= "<li style=\"color:green\"><strong> $value : </strong> " . creneau_phrase(HORAIRES[$key]) . "</li>";
        } else {
            $phrase .= "<li><strong> $value : </strong> " . creneau_phrase(HORAIRES[$key]) . "</li>";
        }
    }
    $phrase .= "</ul>";

    return $phrase;
}


function saveur(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= ' checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="<?= $value ? $attributes>">
    HTML;
}

function recipient(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= ' checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" value="<?= $value ? $attributes>">
    HTML;
}

