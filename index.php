<?php
session_start();

$db = "mysql:host=localhost;dbname=app_jimmy;charset=UTF8";
try {
    $pdo = new PDO($db, 'root', '');
    if ($pdo) {
        //echo "Connected to the app_jimmy database successfully!";
    }
} catch (PDOException $e) {
    // echo $e->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and JS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <!-- Jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://kit.fontawesome.com/ac232d5325.js" crossorigin="anonymous"></script>

    <title>trainingApp</title>

    <link rel="stylesheet" href="src/main.css">
    <link rel="stylesheet" href="src/home.css">

    <script src="src/main.js"></script>

</head>

<body onload="startUp()">
    <?php
    include_once("navbar.php"); // includes the navbar
    ?>
    <section id="home" class="full-container">
        <div></div>
        <div>
            <h1 class="title1">trainingApp</h1>
            <h1 class="title4">Börja din träning med oss</h1>
        </div>
        <div class="bottom-navbar">
            <p><a href="https://jimmy.skatens.se" class="title4">@Jimmy Olsson</a></p>
            <p class="title4">Bild av <a href="https://pixabay.com/sv/users/pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pexels</a> från <a href="https://pixabay.com/sv/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pixabay</a></h1>
        </div>

    </section>

    <section id="about" class="auto-container">
        <h2 class="title3">Om trainingApp</h2>
        <div class="grid-container grid-2">
            <div class="column">
                <p>TrainingingApp är ett enkelt sätt att logga din träning med olika verktyg och tjänster som vi erbjuder. Logga din träning i form av minnesnoteringar, kilometer, tid och se dina resultat i ett diagram för att nå dina mål. Du kan även välja mellan medlemskapen för att se vilka features du vill ha, kanske vill du bara logga för att hålla koll den senaste veckan eller ett helt år? du väljer själv! </p>
                <p> Prova logga din träning Gratis i tre månader utan bindningstid.</p>
                <p> För mer information om våra erbjudanden och medlemskap för din träning, läs mer på fliken "Tjänster" i menyn.</p>
            </div>
            <div class="column-img">
                <div id="bild1"></div>
            </div>
        </div>
    </section>

    <div class="gap"></div>

    <section id="maps" class="auto-container">
        <div class="grid-container grid-2">
            <div class="column">
                <h2 class="title3">Logga dina träningar i en karta!</h2>
                <p>Använd kartan för att logga dina kilometer och din tid! Genom att sätta ut start och slutpunkt kan du logga antal kilometer på din egna tid. Logga när du vill och hur du vill, backa tillbakja och se dina tidigare resultat.</p>
            </div>
            <div class="column">
                <div id="display-map" class="map1"></div>
            </div>
        </div>

        <div id="diagram" class="flex-container">
            <div class="column-sm">
                <canvas id="display-diagram"></canvas>
            </div>
            <div class="column-lg">
                <h2 class="title3">Se dina resultat i ett diagram!</h2>
                <p>Se dina resultat i ett diagram, för bästa översikt över dina egna träningar och resultat.</p>
            </div>
        </div>
    </section>

    <!-- <section id="diagram" class="auto-container">
        
    </section> -->

    <div class="gap"></div>

    <section id="price" class="auto-container">

        <h1 class="title2">Medlemskap</h1>
        <div class="pricing">
            <table>
                <thead>
                    <tr>
                        <th>Medlemskap</th>
                        <th>Kostnad</th>
                        <th>Bindningstid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Free</td>
                        <td>250kr / månaden</td>
                        <td>Ingen bindingstid</td>
                    </tr>
                    <tr>
                        <td>Pro</td>
                        <td>400kr / månaden</td>
                        <td>3 månader</td>
                    </tr>
                    <tr>
                        <td>Elite</td>
                        <td>550kr / månaden</td>
                        <td>6 månader</td>
                    </tr>
                    <tr>
                        <td>VIP</td>
                        <td>800kr / månaden</td>
                        <td>12 månader</td>
                    </tr>
                </tbody>
            </table>
            <p class="title4">Prova logga dina resultat gratis i 3 månader genom att registrera dig!</p>
        </div>
    </section>

    <div id="login-modal" class="modal">
        <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="login">
            <h2>Logga in</h2>
            <label for="logName" class="col-form-label">Namn</label>
            <input type="text" id="logName" name="logName">
            <label for="logPassword" class="col-form-label">Password</label>
            <input type="password" id="logPassword" name="logPassword">

            <button type="button">Stäng</button>
            <button type="submit">Log in</button>
        </form>
    </div>

    <div id="register-modal" class="modal">

    </div>
</body>