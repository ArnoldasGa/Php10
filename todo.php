<?php 
// 1. Sukurkite formą skirtą skirta susivesti TODO sąrašą.
//     forma turi turėti vieną įvedimo laukelį tekstui ir submit mygtuką.

// 2. Išveskite paduotus formos rezultatus TODO sąraše (Naudokite tik $_POST duomenis).

// 3. Pabandykite saugoti susivestą TODO informaciją. 
//  3.1. Parašykite funkcionalumą, kuomet TODO įrašas saugomas sesijoje 
//  3.2. Parašykite funkcionalumą, kuomet TODO įrašas saugomas cookies 
//  3.3. Parašykite funkcionalumą, kuomet TODO įrašas saugomas file

session_start();

$myfile = fopen("cookies.txt", "a") or die("Unable to open file!");

$todo = '';
$data = '';
if (!empty($_COOKIE['cookieTodo'])){
    $data = json_decode($_COOKIE['cookieTodo'], true);
}

if (isset($_POST['todo']) && trim($_POST['todo']) != ''){
    $todo = $_POST['todo'];
    fwrite($myfile, $todo ."\n");
    $_SESSION['list'][] = $todo;
    $data = $data. '/*'. $todo;
    setcookie('cookieTodo', json_encode($data), time()+3600);
    
}
$file = file('./cookies.txt');

fclose($myfile);


?>

<html>
    <body>
        <form method = "post">
            <label for="todo">TODO:</label><br>
            <input type="text" name="todo"><br>
            <input type="submit">
        </form>
        <div>
            Ivests todo : <?= $todo ?>
        </div>
        <div>
            Sesijos todo : <br>
            <?php 
            if (isset($_SESSION['list']) && !empty($_SESSION['list'])){
                arrayPrint($_SESSION['list']);
            }?>
        </div>
        <div>
            Cookie todo :
            <?php 
            if ($data != '') {
                $cookie = explode("/*", $data);
                arrayPrint($cookie);
            }
            ?>
        </div>
        <div>
            File todo :
            <?php
            if ($file != ''){
                arrayPrint($file);
            }
            ?>
        </div>
    </body>
</html>


<?php
function arrayPrint($array) {
    foreach ($array as &$todo) {
        echo $todo . "<br>";
}}
?>