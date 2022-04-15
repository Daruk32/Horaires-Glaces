<?php
    $titre = "Index";
    include 'pages/header.php';
    $aDeviner = 50;
?>

<h3>$_GET</h3>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h3>$_POST</h3>
<pre>
    <?php var_dump($_POST) ?>
</pre>

<main class="container">

    <?php if(isset($_GET['chiffre'])) : ?>
        <?php if($_GET['chiffre'] < $aDeviner) : ?>
            Le chiffre est trop petit.
        <?php elseif($_GET['chiffre'] > $aDeviner) : ?>
            Le chiffre est trop grand.
        <?php else : ?>
            Bravo, vous avez trouvé !
        <?php endif; ?>
    <?php endif; ?>


    <h1>Bienvenue sur mon site</h1>


    <div class="row">
        <div class="col-md-6">
            <form action="index.php" method="GET">
                <input type="number" name="chiffre" placeholder="Entre 0 et 100" value= "<?= htmlentities($_GET["chiffre"] ?? 0) ?>">
                <input type="submit" value="Deviner">
            </form>
            </div>

        <div class="col-md-6">
            <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</main>


<?php
    include 'pages/footer.php';
?>