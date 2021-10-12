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
        include_once("../shared/navbar.php"); // includes the navbar   
        include_once("../shared/modal.php"); // includes modal
        ?>
        <section class="flex-wrapper">
            <section class="sidebar-container">
                <div class="sidebar">
                    <a>Profil</a>
                    <a>Lägg till träning</a>
                    <a>Se diagram</a>
                    <a>Inställningar</a>
                </div>
            </section>
            <section class="auto-container container-dark">
                <div class="flex-container">
                    <div class="column-50 column-services">
                        <h1 class="title-md"><?php echo $_SESSION['Forname'] . " " . $_SESSION['Lastname'] ?></h1>
                    </div>
                    <div class="column-50 column-services">
                        <h2>Dina senaste träningar</h2>
                        <canvas id="profileDiagram"></canvas>
                    </div>
                </div>
                <h1 class="title-md">Lägg till en träning</h1>
                <div class="flex-container">
                    <div class="column-50">
                        <div id="map"></div>
                        <button id="startPoint" type="button" onclick="changeMarkerType('start')">Start-point</button>
                        <button id="endPoint" type="button" onclick="changeMarkerType('stop')">End-point</button>
                        <label id="markerTypeText">You are now placing a start marker</label>
                    </div>
                    <div class="column-50">
                        <form action="<?php echo htmlspecialchars("../shared/controller.php"); ?>" method="post" name="addRun">
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
                <h1 class="title-md">Dina träningar</h1>
                <div class="flex-container">
                    <div class="column-50">
                        <div id="map2"></div>
                    </div>
                    <div class="column-50">
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
                    </div>
                </div>
                <div class="flex-container">
                    <div class="column-50 column-services">
                        <canvas id="profileDiagram2"></canvas>
                    </div>
                    <div class="column-50 column-services">
                        <label>Typ av träning</label>
                        <select id="changeType" name="changeType" onchange="changeDiagram()">
                            <option value="Promenad">Promenad</option>
                            <option value="Löpning">Löpning</option>
                            <option value="Cykling">Cykling</option>
                            <option value="Skidor">Skidor</option>
                        </select>
                    </div>
                </div>

            </section>
        </section>

    </section>
</body>

</html>