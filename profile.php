<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <!-- Jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JavaScript -->
    <script src="javascript/profile.js"></script>

    <title>trainingApp</title>

    <style>
        #map {
            height: 400px;
            min-width: 100px;
        }
    </style>
</head>

<body onload="startUp()">
    <?php
    $db = "mysql:host=localhost;dbname=app_jimmy;charset=UTF8"; // connect to the database
    try {
        $pdo = new PDO($db, 'root', '');
        if ($pdo) {
            //echo "Connected to the app_jimmy database successfully!";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    include_once("navbar.php"); // includes the navbar
    ?>
    <div class="container-fluid mt-5">
        <div class="row py-3">
            <div class="col"></div>
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12">
                <h1>Add new run</h1>
                <div id="map"></div>
                <button id="startPoint" type="button" class="btn btn-primary active" onclick="changeMarkerType('start')">Start-point</button>
                <button id="endPoint" type="button" class="btn btn-outline-primary" onclick="changeMarkerType('stop')">End-point</button>
            </div>
            <div class="col"></div>
        </div>
        <div class="row py-3">
            <div class="col"></div>
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12">
                <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="addRun">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Typ av träning</label>
                                <select class="form-select" name="newType" required>
                                    <option value="Promenad">Promenad</option>
                                    <option value="Löpning">Löpning</option>
                                    <option value="Cykling">Cykling</option>
                                    <option value="Skidor">Skidor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="newLength" class="form-label">Sträcka</label>
                                <input type="text" class="form-control" id="newLength" name="newLength" placeholder="skrivet i kilometer">
                            </div>
                            <div class="mb-3">
                                <label for="newDate" class="form-label">Datum</label>
                                <input type="date" class="form-control" id="newDate" name="newDate">
                            </div>

                            <div class="mb-3">
                                <label for="newCom" class="form-label">Kommentar</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="newCom"></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Använd kartan</label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 ">
                            <!-- Button will be visible on smaller devices and toggle the coordinates -->
                            <a class="btn btn-light d-lg-none mb-3" data-bs-toggle="collapse" href="#collapseKoordinater" role="button" aria-expanded="false" aria-controls="collapseKoordinater">
                                <span class="navbar-light">Show Coordinates</span>
                            </a>
                            <!-- Will be visible on bigger devices and can be toggles on smaller devices -->
                            <div class="collapse d-lg-block" id="collapseKoordinater">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="startX" class="form-label">Start X-koordinater</label>
                                        <input type="text" class="form-control" id="startX" name="startX">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="startY" class="form-label">Start Y-koordinater</label>
                                        <input type="text" class="form-control" id="startY" name="startY">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="stopX" class="form-label">Slut X-koordinater</label>
                                        <input type="text" class="form-control" id="stopX" name="stopX">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="stopY" class="form-label">Slut Y-koordinater</label>
                                        <input type="text" class="form-control" id="stopY" name="stopY">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row py-3">
            <div class="col"></div>
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12">
                <h1>Your runs</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Träning</th>
                            <th scope="col">Distans</th>
                            <th scope="col">Datum</th>
                        </tr>
                    </thead>
                    <tbody id="runsList">

                    </tbody>
                </table>
                <button type="submit" id="click" class="btn btn-primary">Mina runs!</button>
            </div>
            <div class="col"></div>
        </div>

        <div class="row py-3">
            <div class="col"></div>
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12">
                <h1>Change Membership</h1>
                <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="register" class="col-5">
                    <div class="mb-3">
                        <label for="membership" class="form-label">Membership</label>
                        <select id="changeMembership" class="form-select" name="changeMembership" required>
                            <option value="Free">Free</option>
                            <option value="Pro">Pro</option>
                            <option value="Elite">Elite</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

        <div class="row py-3">
            <div class="col"></div>
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12">
                <h1>Change Username and/or Password</h1>
                <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="register" class="col-5">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="text" class="form-control"  name="changeEmail">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" class="form-control" name="changePassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
    <?php
    include_once("modal.php"); // include the modals for register and login
    ?>
</body>