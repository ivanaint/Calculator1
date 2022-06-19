<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumus Bangun Datar</title>
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
	include ("../menu/menubangundatar.php");
	?>

<?php
    $alasErr = $tinggiErr = $sisiAErr = $sisiBErr = $sisiCErr = "";
    $alas = $tinggi = $sisiA = $sisiB = $sisiC = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["alas"])) {
        $alas = $_POST["alas"];
        $alasErr = "Alas is required";
    } else {
        $alas = test_input($_POST["alas"]);
        if (!preg_match("/^[0-9]*$/",$alas)) {
        $alasErr = "Alas hanya boleh angka";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["tinggi"])) {
            $tinggi = $_POST["tinggi"];
            $tinggiErr = "Tinggi is required";
        } else {
            $tinggi = test_input($_POST["tinggi"]);
            if (!preg_match("/^[0-9]*$/",$tinggi)) {
            $tinggiErr = "Tinggi hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sisiA"])) {
            $sisiA = $_POST["sisiA"];
            $sisiAErr = "Sisi A is required";
        } else {
            $sisiA = test_input($_POST["sisiA"]);
            if (!preg_match("/^[0-9]*$/",$sisiA)) {
            $sisiAErr = "Sisi A hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sisiB"])) {
            $sisiB = $_POST["sisiB"];
            $sisiBErr = "Sisi B is required";
        } else {
            $sisiB = test_input($_POST["sisiB"]);
            if (!preg_match("/^[0-9]*$/",$sisiB)) {
            $sisiBErr = "Sisi B hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sisiC"])) {
            $sisiC = $_POST["sisiC"];
            $sisiCErr = "Sisi C is required";
        } else {
            $sisiC = test_input($_POST["sisiC"]);
            if (!preg_match("/^[0-9]*$/",$sisiC)) {
            $sisiCErr = "Sisi C hanya boleh angka";
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
    <h1>Rumus Segitiga</h1><br>
    <img src="../img/segitiga.jpg" width="200px" height="200px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Alas = <input type="text" name="alas" value="<?php echo $alas;?>"> cm
    <span class="error">* <?php echo $alasErr;?></span>
    <br><br>
    Tinggi = <input type="text" name="tinggi" value="<?php echo $tinggi;?>"> cm
    <span class="error">* <?php echo $tinggiErr;?></span>
    <br><br>
    Sisi A = <input type="text" name="sisiA" value="<?php echo $sisiA;?>"> cm
    <span class="error">* <?php echo $sisiAErr;?></span>
    <br><br>
    Sisi B = <input type="text" name="sisiB" value="<?php echo $sisiB;?>"> cm
    <span class="error">* <?php echo $sisiBErr;?></span>
    <br><br>
    Sisi C = <input type="text" name="sisiC" value="<?php echo $sisiC;?>"> cm
    <span class="error">* <?php echo $sisiCErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas=0.5 * $alas * $tinggi;
        @$keliling=$sisiA + $sisiB + $sisiC;

        echo "<h3>Hasil :</h3>";
        echo "Luas Segitiga = ".$luas." cm<sup>2</sup><br><br>";
        echo "Keliling Segitiga = ".$keliling." cm<br><br>";
        ?>
    </form>
    </center><br><br>
    
    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>