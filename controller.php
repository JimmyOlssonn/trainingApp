<?php
/*
Controller for all PHP functions (except logout)
All forms go here and PDO is used to connect to a localhost database
*/
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

if (isset($_POST["regForname"])) { // Register new User

    $name = $_POST["regUsername"];
    $email = $_POST["regEmail"];
    $password = $_POST["regPassword"];
    $forname = $_POST["regForname"];
    $lastname = $_POST["regLastname"];
    $city = $_POST["regCity"];
    $country = $_POST["regCountry"];
    $gender = $_POST["regGender"];
    $membership = $_POST["regMembership"];
    $sql = 'INSERT INTO users(Username, Email, Password, Forname, Lastname, City, Country, Gender, Membership) VALUES(:username, :email, :password, :forname, :lastname, :city, :country, :gender, :membership)';

    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':username' => $name,
        ':email' => $email,
        ':password' => $password,
        ':forname' => $forname,
        ':lastname' => $lastname,
        ':city' => $city,
        ':country' => $country,
        ':gender' => $gender,
        ':membership' => $membership
    ]);
    header("Location:index.php");
    exit();
}
if (isset($_POST["logName"])) { // User login
    $name = $_POST["logName"];
    $password = $_POST["logPassword"];
    $sql = 'SELECT Username, Forname, Membership, Lastname, Email, City, Country FROM users Where Username = :username and Password = :password';

    try {
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':username' => $name,
            ':password' => $password
        ]);
        $user = $statement->fetch();

        if ($user) {
            //Stores sessions
            $_SESSION["Username"] = $user['Username'];
            $_SESSION["Forname"] = $user['Forname'];
            $_SESSION["Lastname"] = $user['Lastname'];
            $_SESSION["Email"] = $user['Email'];
            $_SESSION["City"] = $user['City'];
            $_SESSION["Country"] = $user['Country'];
            $_SESSION["Membership"] = $user['Membership'];
            header("Location:profile.php");
            exit();
        } else {
            echo "Wrong username or password.";
        }
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
}
if (isset($_POST["newDate"])) { // Add new Run
    $name = $_SESSION["Username"];
    $user = $_SESSION["Username"];
    $date = $_POST["newDate"];
    $type = $_POST["newType"];
    $length = $_POST["newLength"];
    $comment = $_POST["newCom"];
    $startLatitude = $_POST["startX"];
    $startLongitude = $_POST["startY"];
    $stopLatitude = $_POST["stopX"];
    $stopLongitude = $_POST["stopY"];
    $sql = 'INSERT INTO runs(User, Date, Type, Length, Comment, Start_Latitude, Start_Longitude, Stop_Latitude, Stop_Longitude) VALUES(:user , :date, :type, :length, :comment, :startLatitude, :startLongitude, :stopLatitude, :stopLongitude)';

    $statement = $pdo->prepare($sql);
    if ($statement) {
        $statement->execute([
            ':user' => $user,
            ':date' => $date,
            ':type' => $type,
            ':length' => $length,
            ':comment' => $comment,
            ':startLatitude' => $startLatitude,
            ':startLongitude' => $startLongitude,
            ':stopLatitude' => $stopLatitude,
            ':stopLongitude' => $stopLongitude
        ]);
    }
    print_r($statement->errorInfo());
    header("Location:profile.php");
    exit();
}
if (isset($_GET["getRuns"])) { // Get existing latitude, type, date and length from a users runs to add to map and table
    $name = $_SESSION["Username"];
    $sql = 'SELECT * FROM runs Where User = :username';
    $a = array();
    $i = 0;
    try {
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':username' => $name
        ]);
        while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
            $a[] = array("startLatitude" => $user["Start_Latitude"], "startLongitude" => $user["Start_Longitude"], "stopLatitude" => $user["Stop_Latitude"], "stopLongitude" => $user["Stop_Longitude"], "type" => $user["Type"], "date" => $user["Date"], "length" => $user["Length"]);
        }
        print json_encode($a);
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
}

if (isset($_GET["getRunsDiagram"])) { // Get existing date, type and length from a users runs to add to diagram
    $name = $_SESSION["Username"];
    $sql = 'SELECT * FROM runs Where User = :username';
    $a = array();
    $i = 0;
    try {
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':username' => $name
        ]);
        while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
            $a[] = array("date" => $user["Date"], "type" => $user["Type"], "length" => $user["Length"]);
        }
        print json_encode($a);
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
}
// if (isset($_GET["getAllRuns"])) { // Old code for getting all runs need to be updated 
//     $sql = 'SELECT * FROM runs';
//     $a = array();
//     $i = 0;
//     try {
//         $statement = $pdo->prepare($sql);
//         $statement->execute([]);
//         while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
//             $a[] = array("latitude" => $user["Latitude"], "longitude" => $user["Longitude"], "type" => $user["Type"], "date" => $user["Date"], "length" => $user["Length"]);
//         }
//         print json_encode($a); 
//     } catch (\PDOException $e) {
//         die($e->getMessage());
//     }
// }
if (isset($_GET["getSession"])) { // Returns the membership
    print json_encode($_SESSION["Membership"]);
}
if (isset($_POST["changeMembership"])) { // Change membership
    $user = $_SESSION["Username"];
    $membership = $_POST["changeMembership"];
    $sql = 'UPDATE users SET Membership = :membership WHERE Username = :username';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':username' => $user,
        ':membership' => $membership
    ]);
    $_SESSION["Membership"] = $membership;
    header("Location:profile.php");
    exit();
}
if (isset($_POST["changeEmail"])) { // Change Email and Password
    $user = $_SESSION["Username"];
    $email = $_POST["changeEmail"];
    $password = $_POST["changePassword"];
    $sql = 'UPDATE users SET Email = :email, Password = :password WHERE Username = :username';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':username' => $user,
        ':email' => $email,
        ':password' => $password
    ]);
    $_SESSION["Email"] = $email;
    header("Location:profile.php");
    exit();
}
