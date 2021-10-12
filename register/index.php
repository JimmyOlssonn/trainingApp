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
    <link rel="stylesheet" href="register.css">


</head>

<body>
    <?php
        include_once("../navbar.php"); // includes the navbar   
        include_once("../modal.php"); // includes modal
    ?>
    <section class="full-container container-dark">
        <div class="register-container column-services">
            <h2 class="title-md">Registrera dig</h2>
            <p>Obligatoriska fält *</p>
            <form action="<?php echo htmlspecialchars("controller.php"); ?>" method="post" name="register">
                <div class="row">
                    <div class="column-half">
                        <label for="firstName">Förnamn*</label>
                        <input type="text" name="regForname" class="half" required>
                    </div>
                    <div class="column-half">
                        <label for="lastName">Efternamn*</label>
                        <input type="text" name="regLastname" class="half" placeholder="" value="" required>
                    </div>
                </div>
                <label for="username">Användarnamn*</label>
                <input type="text" name="regUsername" required>
                <label for="regEmail">E-post*</label>
                <input type="email" name="regEmail" placeholder="example@example.com" required>
                <label for="regPassword">Lösenord*</label>
                <input type="password" name="regPassword" required>

                <label for="Gender">Kön*</label><br>
                <div>
                    <input type="radio" name="regGender" id="regGender1" value="Male">
                    <label for="regGender1">Man</label>
                </div>
                <div>
                    <input type="radio" name="regGender" id="regGender2" value="Female">
                    <label for="regGender2">Kvinna</label>
                </div>
                <div>
                    <input type="radio" name="regGender" id="regGender3" value="Other">
                    <label for="regGender3">Annat</label>
                </div>
                <div class="row">
                    <div class="column-half">
                        <label for="regCity">Stad*</label>
                        <input type="text" name="regCity" placeholder="" value="">
                    </div>
                    <div class="column-half">
                        <label for="regCountry">Land*</label>
                        <input type="text" name="regCountry" placeholder="" value="">
                    </div>
                </div>
                <label for="regMembership">Välj Medlemskap</label>
                <select name="regMembership" required>
                    <option value="Free">Free</option>
                    <option value="Pro">Pro</option>
                    <option value="Elite">Elite</option>
                    <option value="VIP">VIP</option>
                </select>
                <button type="submit">Registrera!</button>
            </form>
        </div>
    </section>
</body>

</html>