<?php

    $titre = "Page des menus";
    include 'pages/header.php';


    $saveurs = [
        'Fraise'=>4,
        'Chocolat'=>5,
        'Vanille'=>3
    ];
    $recipients = [
        'Pot'=>2,
        'Cornet'=>3
    ];
    $optionsSupp = [
        'Pépites de chocolat'=>1,
        'Chantilly'=>0.5
    ];

    $ingredients=[];
    $totalPrice=0;

    if (isset($_GET['saveur'])) {
        foreach($_GET['saveur'] as $saveur) {
            if (isset($saveurs[$saveur])) {
                $ingredients[] = $saveur;
                $totalPrice += $saveurs[$saveur];
            }
        }
    }
    if (isset($_GET['optionSupp'])) {
        foreach($_GET['optionSupp'] as $optionSupp) {
            if (isset($optionsSupp[$optionSupp])) {
                $ingredients[] = $optionSupp;
                $totalPrice += $optionsSupp[$optionSupp];
            }
        }
    }
    if (isset($_GET['recipient'])) {
        $recipient = $_GET['recipient'];
        if (isset($recipients[$recipient])) {
            $ingredients[] = $recipient;
            $totalPrice += $recipients[$recipient];
        }
    }

?>

    <main class="container">
        <h1>Bienvenue sur le forum</h1>

        <div class="row">

            <div class="col-md-6">
                    <h2>Votre glace</h2>
                    <ul>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <li><?= $ingredient ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p>Prix total : <?= $totalPrice ?> €</p>
            </div>

            <div class="col-md-6">
                <form action="/PHP2/forum.php" method="GET">
                    <h2>Saveurs</h2>
                    <?php foreach($saveurs as $saveur => $price): ?>
                        <div class="checkbox">
                            <label>
                                <?= saveur('saveur', $saveur, $_GET) ?>
                                <?= $saveur ?> - <?= $price ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <h2>Récipients</h2>
                    <?php foreach($recipients as $recipient => $price): ?>
                        <div class="checkbox">
                            <label>
                                <?= recipient('recipient', $recipient, $_GET) ?>
                                <?= $recipient ?> - <?= $price ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <h2>Options supplémentaires</h2>
                    <?php foreach($optionsSupp as $optionSupp => $price): ?>
                        <div class="checkbox">
                            <label>
                                <?= saveur('optionSupp', $optionSupp, $_GET) ?>
                                <?= $optionSupp ?> - <?= $price ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-primary">Composer la glace</button>
                </form>
            </div>

        </div>

    </main>

<?php
    include 'pages/footer.php';
?>