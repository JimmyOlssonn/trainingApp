<?php
session_start();

$db = "mysql:host=localhost;dbname=app_jimmy;charset=UTF8";
try {
    $pdo = new PDO($db, 'root', '');
    if ($pdo) {
        //echo "Connected to the app_jimmy database successfully!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
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

    <script src="../src/function.js"></script>
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="priser.css">


</head>

<body>
    <section>
    <?php
            include_once("../shared/navbar.php"); // includes the navbar   
            include_once("../shared/modal.php"); // includes modal
        ?>
        <section class="auto-container container-dark">
            <h1 class="title-lg title-center">Medlemskap</h1>
            <div id="prices" class="flex-container">
                <div class="column-25 column-services">
                    <h2 class="title-sm">Medlemskap Free</h2>
                    <ul>
                        <li>Lägga till 10 träningar i veckan</li>
                        <li>Se diagram för en vecka bakåt</li>
                    </ul>
                </div>
                <div class="column-25 column-services">
                    <h2 class="title-sm">Medlemskap Pro</h2>
                    <ul>
                        <li>Lägga till 30 träningar i veckan</li>
                        <li>Se diagram för en månad bakåt</li>
                    </ul>
                </div>
                <div class="column-25 column-services">
                    <h2 class="title-sm">Medlemskap Elite</h2>
                    <ul>
                        <li>Lägga till 50 träningar i veckan</li>
                        <li>Se diagram för en månad bakåt</li>
                    </ul>
                </div>
                <div class="column-25 column-services">
                    <h2 class="title-sm">Medlemskap VIP <i class="fas fa-gem fa-sm text-green"></i></h2>
                    <ul>
                        <li>Lägga till oändligt med träningar i veckan</li>
                        <li>Se diagram för ett år tillbaka</li>
                    </ul>
                </div>
            </div>

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
    </section>
</body>

</html>