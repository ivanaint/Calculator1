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
    $rErr = $tErr = $sErr = "";
    $r = $t = $s = "";

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

    if (empty($_POST["s"])) {
        $s = $_POST["s"];
        $sErr = "Garis Pelukis (s) is required";
    } else {
        $s = test_input($_POST["s"]);
        if (!preg_match("/^[0-9]*$/",$s)) {
        $sErr = "Garis Pelukis (s) hanya boleh angka";
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
    <h1>Rumus Kerucut</h1><br>
    <img src="../img/kerucut1.png" width="180px" height="280px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Jari-Jari (r) = <input type="text" name="r" value="<?php echo $r;?>"> cm
    <span class="error">* <?php echo $rErr;?></span>
    <br><br>
    Tinggi = <input type="text" name="t" value="<?php echo $t;?>"> cm
    <span class="error">* <?php echo $tErr;?></span>
    <br><br>
    Garis Pelukis (s) = <input type="text" name="s" value="<?php echo $s;?>"> cm
    <span class="error">* <?php echo $sErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas_permukaan = 3.14 * $r * ($r + $s);
        @$luas_selimut = 3.14 * $r * $s ; 
        @$volume = 1/3 * 3.14 * $r * $r * $t;

        echo "<h3>Hasil :</h3>";
        echo "Luas Permukaan Kerucut = ".$luas_permukaan." cm<sup>2</sup><br><br>";
        echo "Luas Selimut Kerucut = ".$luas_selimut." cm<br><br>";
        echo "Volume Kerucut = ".$volume." cm<sup>3</sup><br><br>";
        ?>
    </form>
    </center><br><br>

    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>