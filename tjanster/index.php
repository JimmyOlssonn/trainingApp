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

    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="tjanster.css">


</head>

<body>
    <section>
        <?php
        include_once("../navbar.php"); // includes the navbar
        ?>
        <section class="auto-container">
            <div class="grid-container">
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
                <div class="column">
                    <h2 class="title3">Tjänster</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat.</p>
                </div>
            </div>
        </section>
    </section>
</body>

</html>