<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumus Bangun Ruang</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error {color:#FF0000;}
    </style>
</head>
<body>
    <?php
	include ("../menu/header.php");
	?>

    <?php
	include ("../menu/menubangunruang.php");
	?>

<?php
    $pErr = $lErr = $tErr = "";
    $p = $l = $t = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["p"])) {
        $p = $_POST["p"];
        $pErr = "Panjang is required";
    } else {
        $p = test_input($_POST["p"]);
        if (!preg_match("/^[0-9]*$/",$p)) {
        $pErr = "Panjang hanya boleh angka";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["l"])) {
            $l = $_POST["l"];
            $lErr = "Lebar b is required";
        } else {
            $l = test_input($_POST["l"]);
            if (!preg_match("/^[0-9]*$/",$l)) {
            $lErr = "Lebar hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["t"])) {
            $t = $_POST["t"];
            $tErr = "Tinggi is required";
        } else {
            $t = test_input($_POST["t"]);
            if (!preg_match("/^[0-9]*$/",$t)) {
            $tErr = "Tinggi hanya boleh angka";
            }
        }
    }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <center><br>
    <h1>Rumus Balok</h1>
    <img src="../img/balok.png" width="300px" height="200px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Panjang = <input type="text" name="p" value="<?php echo $p;?>"> cm
    <span class="error">* <?php echo $pErr;?></span>
    <br><br>
    Lebar = <input type="text" name="l" value="<?php echo $l;?>"> cm
    <span class="error">* <?php echo $lErr;?></span>
    <br><br>
    Tinggi = <input type="text" name="t" value="<?php echo $t;?>"> cm
    <span class="error">* <?php echo $tErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas_permukaan = 2 * (($p*$l)+($l*$t)+($p*$t));
        @$keliling = 4 *($p + $l + $t);
        @$volume = $p * $l * $t;

       echo "<h3>Hasil :</h3>";
       echo "Luas Permukaan Balok = ".$luas_permukaan." cm<sup>2</sup><br><br>";
       echo "Keliling Balok = ".$keliling." cm<br><br>";
       echo "Volume Balok = ".$volume." cm<sup>3</sup><br><br>";
        ?>
    </form>
    </center><br><br>

    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>