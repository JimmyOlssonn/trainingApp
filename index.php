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

    <script src="https://kit.fontawesome.com/ac232d5325.js" crossorigin="anonymous"></script>

    <title>trainingApp</title>

    <link rel="stylesheet" href="src/main.css">

</head>

<body>
    <section id="home" class="full-container">
        <div class="navbar">
            <a href="#home">Hem</a>
            <a href="#about">Om oss</a>
            <a href="#price">Priser</a>
            <a href="#price">Registrera</a>
            <a id="test"href="#price">Logga in</a>
        </div>
        <h1 class="title1">trainingApp</h1>
        
    </section>

    <section id="about" class="half-container">
        <h1 class="title2">Om trainingApp</h1>
        <div class="box-container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet interdum diam, vel convallis ipsum. Maecenas varius ex odio, eget tempor risus vestibulum at. Vivamus interdum hendrerit nibh ut tempus. Maecenas eu egestas erat. Quisque efficitur varius velit sed volutpat. Phasellus ornare egestas aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc lacinia massa sed lorem sodales venenatis. Quisque est neque, sodales viverra diam at, molestie semper ligula. Praesent vestibulum commodo iaculis. Nullam pellentesque at urna a aliquet. Fusce id sem turpis. Donec vitae tellus eget sem placerat luctus. Etiam sed velit magna.</p>
        </div>
    </section>

    <div class="gap"></div>

    <section id="maps" class="half-container">
        <div class="flex-container">
            <div class="column-lg">
                <h1 class="title3">Logga dina träningar i en karta!</h1>
            </div>
            <div class="column-sm">
                <div class="map1"></div>
            </div>
        </div>
    </section>

    <section id="diagram" class="half-container">
        <div class="flex-container">
            <div class="column-sm">
                <div class="map1"></div>
            </div>
            <div class="column-lg">
                <h1 class="title3">Se dina resultat i ett diagram!</h1>
            </div>
        </div>
    </section>

    <div class="gap"></div>

    <section id="price" class="auto-container">

        <h1 class="title2">Medlemskap</h1>
        <div class="pricing">
            <table>
                <tbody>
                    <tr>
                        <td>Medlemskap 1 år</td>
                        <td>250kr / månaden</td>
                    </tr>
                    <tr>
                        <td>Medlemskap 3 år</td>
                        <td>400kr / månaden</td>
                    </tr>
                    <tr>
                        <td>Medlemskap 5 år</td>
                        <td>550kr / månaden</td>
                    </tr>
                    <tr>
                        <td>Medlemskap VIP</td>
                        <td>800kr / månaden</td>
                    </tr>
                </tbody>
            </table>
            <p>Prova logga dina resultat gratis i 3 månader genom att registrera dig!</p>
        </div>
    </section>

</body>