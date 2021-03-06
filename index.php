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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" crossorigin="anonymous"></script>

    <title>trainingApp</title>

    <link rel="stylesheet" href="src/main.css">
    <link rel="stylesheet" href="src/home.css">

    <script src="src/function.js"></script>
    <script src="src/main.js"></script>

</head>

<body onload="startUp()">
    <?php
    include_once("shared/navbar.php"); // includes the navbar
    include_once("shared/modal.php"); // includes modal
    ?>
    <section id="home" class="full-container">
        <div></div>
        <div>
            <h1 class="title-xl title-center">trainingApp</h1>
            <h1 class="title-xs title-center">Börja din träning med oss</h1>
        </div>
        <div class="bottom-navbar">
            <p><a href="https://jimmy.skatens.se" class="title-xs">@Jimmy Olsson</a></p>
            <p class="title-xs">Bild av <a href="https://pixabay.com/sv/users/pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pexels</a> från <a href="https://pixabay.com/sv/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pixabay</a></h1>
        </div>

    </section>

    <section id="about" class="auto-container container-dark">

        <div class="flex-container">
            <div class="column-50">
                <h2 class="title-md">Börja din tränining idag!</h2>
                <p>TrainingingApp är ett enkelt sätt att logga din träning med olika verktyg och tjänster som vi erbjuder. Logga din träning i form av minnesnoteringar, kilometer, tid och se dina resultat i ett diagram för att nå dina mål. Du kan även välja mellan medlemskapen för att se vilka features du vill ha, kanske vill du bara logga för att hålla koll den senaste veckan eller ett helt år? du väljer själv! </p>
                <p> Prova logga din träning Gratis i tre månader utan bindningstid.</p>
                <p> För mer information om våra erbjudanden och medlemskap för din träning, läs mer om våra <a href="/trainingApp/tjanster/">Tjänster</a></p>
                <button>Börja idag!</button>
            </div>
            <div class="column-50">
                <div id="bild1"></div>
            </div>
        </div>
    </section>

    <div class="gap"></div>

    <section class="auto-container container-dark">
        <h2 class="title-md title-center">Allt du behöver i en app</h2>
        <div class="flex-container">
            <div id="services1" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Kartor</h2>
                <p>Använd kartan för att logga dina kilometer och din tid! Genom att sätta ut start och slutpunkt kan du logga antal kilometer på din egna tid.</p>
            </div>
            <div id="services2" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Plattformar</h2>
                <p>Ladda ner vår app på din mobil och surfplatta eller logga in direkt i webbläsaren.</p>
            </div>
            <div id="services3" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Diagram</h2>
                <p>Se dina resultat i ett diagram, för bästa översikt över dina egna träningar och resultat.</p>
            </div>
            
        </div>
        <p class="title-xs title-center">Se mer om våra <a href="/trainingApp/tjanster/">Tjänster</a></p>
    </section>

    <!-- <section id="diagram" class="auto-container">
        
    </section> -->

    <div class="gap"></div>

    <section id="price" class="auto-container container-dark">

        <h1 class="title-md title-center">Medlemskap</h1>
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
            <p class="title-xs title-center">Prova logga dina resultat gratis i 3 månader genom att registrera dig!</p>
        </div>
    </section>

</body>