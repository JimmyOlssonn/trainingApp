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

    <!-- Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <!-- Jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://kit.fontawesome.com/ac232d5325.js" crossorigin="anonymous"></script>

    <title>trainingApp</title>

    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="tjanster.css">


</head>

<body>
    <section>
        <?php
        include_once("../navbar.php"); // includes the navbar
        ?>
        <section class="auto-container">
        <h2 class="title1">Tjänster</h2>
            <div id="service" class="grid-container grid-3">
                <div class="column">
                    <h2 class="title1"><i class="far fa-clock"></i></h2>
                    <p>Lägg in dina resultat när du vill! Vilken tid på dygnet som helst. Träna när det passar dig som bäst och ditt egna schema. Sätt upp ditt egna träningschema vecka för vecka för att nå dina mål.</p>
                </div>
                <div class="column">
                    <h2 class="title1"><i class="fas fa-dumbbell"></i></h2>
                    <p>Logga dina träningspass och resultat oavsett vilken träning det gäller. Du kan logga dina gympass, springpass, friidrott träningar eller något så simpelt som en promenad.</p>
                </div>
                <div class="column">
                    <h2 class="title1"><i class="fas fa-dollar-sign"></i></h2>
                    <p>Välj det medlemskap som passar dig och din ekonomi bäst! Vill du bara pröve på att logga din träning? välj då gratisversionen utan bindningstid. Du kan se alla erbjudanden och priser uten fliken "Priser" i menyn.</p>
                </div>
                <div class="column">
                    <h2 class="title1"><i class="far fa-calendar-check"></i></h2>
                    <p>Använd kartan för att logga dina kilometer och din tid! Genom att sätta ut start och slutpunkt kan du logga antal kilometer på din egna tid. Logga när du vill och hur du vill, backa tillbakja och se dina tidigare resultat.</p>
                </div>
                <div class="column">
                    <h2 class="title1"><i class="fas fa-chart-line"></i></h2>
                    <p>Se dina resultat i ett diagram, för bästa översikt över dina egna träningar och resultat.</p>
                </div>
                <div class="column">
                    <h2 class="title1"><i class="far fa-handshake"></i></h2>
                    <p>Välj medlemskap som passar dig och din träning, Beroende på hur aktiv du är. Du väljer helt själv vilket medlemskap som passar dig bäst beroende på över hur lång tid du behöver se loggade resultat. Kanske räcker en vecka? eller behöver du se resultat över det senaste året? se under fliken "Priser" för att läsa om medlemskapen.</p>
                </div>
               
               
            </div>
        </section>
    </section>
</body>

</html>