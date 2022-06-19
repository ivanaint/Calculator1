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
    $rErr = "";
    $r = "";

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
    
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <center><br>
    <h1>Rumus Bola</h1><br>
    <img src="../img/bola.png" width="200px" height="200px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Jari-Jari (r) = <input type="text" name="r" value="<?php echo $r;?>"> cm
    <span class="error">* <?php echo $rErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas_permukaan = 4 * 3.14 * $r * $r;
        @$keliling = 2*3.14*$r; 
        @$volume = 4/3 * 3.14 * $r * $r * $r;

        echo "<h3>Hasil :</h3>";
        echo "Luas Permukaan Bola = ".$luas_permukaan." cm<sup>2</sup><br><br>";
        echo "Keliling Bola = ".$keliling." cm<br><br>";
        echo "Volume Bola = ".$volume." cm<sup>3</sup><br><br>";
        ?>
    </form>
    </center><br><br>

    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>