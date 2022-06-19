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
    $d1Err = $d2Err = $s1Err = $s2Err  = "";
    $d1 = $d2 = $s1 = $s2 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["d1"])) {
        $d1 = $_POST["d1"];
        $d1Err = "Diagonal 1 is required";
    } else {
        $d1 = test_input($_POST["d1"]);
        if (!preg_match("/^[0-9]*$/",$d1)) {
        $d1Err = "Diagonal 1 hanya boleh angka";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["d2"])) {
            $d2 = $_POST["d2"];
            $d2Err = "Diagonal 2 is required";
        } else {
            $d2 = test_input($_POST["d2"]);
            if (!preg_match("/^[0-9]*$/",$d2)) {
            $d2Err = "Diagonal 2 hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["s1"])) {
            $s1 = $_POST["s1"];
            $s1Err = "Sisi A is required";
        } else {
            $s1 = test_input($_POST["s1"]);
            if (!preg_match("/^[0-9]*$/",$s1)) {
            $s1Err = "Sisi 1 hanya boleh angka";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["s2"])) {
            $s2 = $_POST["s2"];
            $s2Err = "Sisi 2 is required";
        } else {
            $s2 = test_input($_POST["s2"]);
            if (!preg_match("/^[0-9]*$/",$s2)) {
            $s2Err = "Sisi 2 hanya boleh angka";
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
    <h1>Rumus Layang-Layang</h1><br>
    <img src="../img/layang-layang.png" width="220px" height="300px">
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Diagonal 1 = <input type="text" name="d1" value="<?php echo $d1;?>"> cm
    <span class="error">* <?php echo $d1Err;?></span>
    <br><br>
    Diagonal 2 = <input type="text" name="d2" value="<?php echo $d2;?>"> cm
    <span class="error">* <?php echo $d2Err;?></span>
    <br><br>
    Sisi 1 = <input type="text" name="s1" value="<?php echo $s1;?>"> cm
    <span class="error">* <?php echo $s1Err;?></span>
    <br><br>
    Sisi 2 = <input type="text" name="s2" value="<?php echo $s2;?>"> cm
    <span class="error">* <?php echo $s2Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Hitung"><br><br>
    <?php
        @$luas=0.5*$d1*$d2;
        @$keliling=2*($s1+$s2);
        echo "<h3>Hasil :</h3>";
        echo "Luas Layang-Layang = ".$luas." cm<sup>2</sup><br><br>";
        echo "Keliling Layang-Layang = ".$keliling." cm<br><br>";
        ?>
    </form>
    </center><br><br>
    
    <?php
	include ("../menu/footer.php");
	?>
    
</body>
</html>