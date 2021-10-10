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

    <script src="profil.js"></script>
    <script src="../src/function.js"></script>
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="profil.css">


</head>

<body onload="startUp()">
    <section>
        <?php
            include_once("../navbar.php"); // includes the navbar   
            include_once("../modal.php"); // includes modal
        ?>
        <section class="auto-container">
            <h1 class="title3">Add new run</h1>
            <div class="grid-container grid-2">
                <div>
                    <div id="map"></div>
                    <button id="startPoint" type="button" onclick="changeMarkerType('start')">Start-point</button>
                    <button id="endPoint" type="button" onclick="changeMarkerType('stop')">End-point</button>
                    <label id="markerTypeText">You are now placing a start marker</label>
                </div>
                <div>
                    <form action="<?php echo htmlspecialchars("../controller.php"); ?>" method="post" name="addRun">
                        <div class="row">
                            <div>
                                <div>
                                    <label>Typ av träning</label>
                                    <select name="newType" required>
                                        <option value="Promenad">Promenad</option>
                                        <option value="Löpning">Löpning</option>
                                        <option value="Cykling">Cykling</option>
                                        <option value="Skidor">Skidor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="newLength">Sträcka</label>
                                    <input type="text" id="newLength" name="newLength" placeholder="skrivet i kilometer">
                                </div>
                                <div class="mb-3">
                                    <label for="newDate">Datum</label>
                                    <input type="date" id="newDate" name="newDate">
                                </div>

                                <div class="mb-3">
                                    <label for="newCom">Kommentar</label>
                                    <textarea id="exampleFormControlTextarea1" name="newCom"></textarea>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" id="exampleCheck1">
                                    <label for="exampleCheck1">Använd kartan</label>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" id="startX" name="startX">
                                <input type="hidden" id="startY" name="startY">
                                <input type="hidden" id="stopX" name="stopX">
                                <input type="hidden" id="stopY" name="stopY">
                            </div>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <h1 class="title3">Your runs</h1>
            <div class="grid-container grid-2">
                <div>
                    <div id="map2"></div>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Träning</th>
                                <th>Distans</th>
                                <th>Datum</th>
                            </tr>
                        </thead>
                        <tbody id="runsList">

                        </tbody>
                    </table>
                    <button type="submit" onclick="showAllRuns()">Mina runs!</button>
                </div>
            </div>
        </section>
    </section>
</body>

</html>