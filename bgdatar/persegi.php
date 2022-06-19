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
    $sErr = "";
    $s = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["s"])) {
        $s = $_POST["s"];
        $sErr = "Sisi is required";
    } else {
        $s = test_input($_POST["s"]);
        if (!preg_match("/^[0-9]*$/",$s)) {
        $sErr = "Sisi hanya boleh angka";
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
    <h1>Rumus Persegi</h1><br>
    <img src="../img/persegi1.png" width="200px" height="200px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Sisi = <input type="text" name="s" value="<?php echo $s;?>"> cm
    <span class="error">* <?php echo $sErr;?></span>
    <br><br>
   
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas = $s * $s;
        @$keliling = 4 * $s;

        echo "<h3>Hasil :</h3>";
        echo "Luas Persegi = ".$luas." cm<sup>2</sup><br><br>";
        echo "Keliling Persegi = ".$keliling." cm<br><br>";
        ?>
    </form>
    </center><br><br>
    
    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>