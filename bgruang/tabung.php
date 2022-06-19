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
    $rErr = $tErr = "";
    $r = $t = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["r"])) {
        $r = $_POST["r"];
        $rErr = "Jari-Jari (r) is required";
    } else {
        $r = test_input($_POST["r"]);
        if (!preg_match("/^[0-9]*$/",$r)) {
        $rErr = "Jari-Jari (r) hanya boleh angka";
        }
    }
  
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
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <center><br>
    <h1>Rumus Tabung</h1><br>
    <img src="../img/tabung1.png" width="200px" height="300px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Jari-Jari (r) = <input type="text" name="r" value="<?php echo $r;?>"> cm
    <span class="error">* <?php echo $rErr;?></span>
    <br><br>
    Tinggi = <input type="text" name="t" value="<?php echo $t;?>"> cm
    <span class="error">* <?php echo $tErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas_permukaan = 2 * 3.14 * $r * ($r + $t);
        @$keliling = 2*3.14*$r; 
        @$volume = 3.14 * $r * $r * $t;

        echo "<h3>Hasil :</h3>";
        echo "Luas Permukaan Tabung = ".$luas_permukaan." cm<sup>2</sup><br><br>";
        echo "Keliling Alas Tabung = ".$keliling." cm<br><br>";
        echo "Volume Tabung = ".$volume." cm<sup>3</sup><br><br>";
        ?>
    </form>
    </center><br><br>

    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>