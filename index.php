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
            <h1 class="title-xs title-center">B??rja din tr??ning med oss</h1>
        </div>
        <div class="bottom-navbar">
            <p><a href="https://jimmy.skatens.se" class="title-xs">@Jimmy Olsson</a></p>
            <p class="title-xs">Bild av <a href="https://pixabay.com/sv/users/pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pexels</a> fr??n <a href="https://pixabay.com/sv/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1840437">Pixabay</a></h1>
        </div>

    </section>

    <section id="about" class="auto-container container-dark">

        <div class="flex-container">
            <div class="column-50">
                <h2 class="title-md">B??rja din tr??nining idag!</h2>
                <p>TrainingingApp ??r ett enkelt s??tt att logga din tr??ning med olika verktyg och tj??nster som vi erbjuder. Logga din tr??ning i form av minnesnoteringar, kilometer, tid och se dina resultat i ett diagram f??r att n?? dina m??l. Du kan ??ven v??lja mellan medlemskapen f??r att se vilka features du vill ha, kanske vill du bara logga f??r att h??lla koll den senaste veckan eller ett helt ??r? du v??ljer sj??lv! </p>
                <p> Prova logga din tr??ning Gratis i tre m??nader utan bindningstid.</p>
                <p> F??r mer information om v??ra erbjudanden och medlemskap f??r din tr??ning, l??s mer om v??ra <a href="/trainingApp/tjanster/">Tj??nster</a></p>
                <button>B??rja idag!</button>
            </div>
            <div class="column-50">
                <div id="bild1"></div>
            </div>
        </div>
    </section>

    <div class="gap"></div>

    <section class="auto-container container-dark">
        <h2 class="title-md title-center">Allt du beh??ver i en app</h2>
        <div class="flex-container">
            <div id="services1" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Kartor</h2>
                <p>Anv??nd kartan f??r att logga dina kilometer och din tid! Genom att s??tta ut start och slutpunkt kan du logga antal kilometer p?? din egna tid.</p>
            </div>
            <div id="services2" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Plattformar</h2>
                <p>Ladda ner v??r app p?? din mobil och surfplatta eller logga in direkt i webbl??saren.</p>
            </div>
            <div id="services3" class="column-33 column-services column-flex" onmouseover="columnMouseover(this)" onmouseleave="columnMouseout(this)">
                <h2 class="title-md">Diagram</h2>
                <p>Se dina resultat i ett diagram, f??r b??sta ??versikt ??ver dina egna tr??ningar och resultat.</p>
            </div>
            
        </div>
        <p class="title-xs title-center">Se mer om v??ra <a href="/trainingApp/tjanster/">Tj??nster</a></p>
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
                        <td>250kr / m??naden</td>
                        <td>Ingen bindingstid</td>
                    </tr>
                    <tr>
                        <td>Pro</td>
                        <td>400kr / m??naden</td>
                        <td>3 m??nader</td>
                    </tr>
                    <tr>
                        <td>Elite</td>
                        <td>550kr / m??naden</td>
                        <td>6 m??nader</td>
                    </tr>
                    <tr>
                        <td>VIP</td>
                        <td>800kr / m??naden</td>
                        <td>12 m??nader</td>
                    </tr>
                </tbody>
            </table>
            <p class="title-xs title-center">Prova logga dina resultat gratis i 3 m??nader genom att registrera dig!</p>
        </div>
    </section>

</body>