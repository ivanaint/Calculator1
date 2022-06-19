<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project UTS Group 6</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
	include ("header.php");
	?>

    <div class="welcome">
            <section id="home">
                <img src="../img/welcome.png" width="700px" height="700px"/>
                <div class="kolom" >
                    <p class="deskripsi" style="color:#000033;">Welcome To Our Website</p>
                    <h2>Hello, Everyone!</h2><br><br>

            <?php
                $namaErr = $emailErr = $genderErr = "";
                $nama = $email = $gender = $comment = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["nama"])) {
                        $namaErr = "Nama is required";
                    } else {
                        $nama = test_input($_POST["nama"]);
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
                        $namaErr = "Nama hanya hanya huruf dan spasi yang diizinkan";
                        }
                    }

                    if (empty($_POST["email"])) {
                        $emailErr = "Email is required";
                    } else {
                        $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Format email salah";
                        }
                    }

                    if (empty($_POST["gender"])) {
                        $genderErr = "Jenis Kelamin is required";
                    } else {
                        $gender = test_input($_POST["gender"]);
                    }

                    if (empty($_POST["comment"])) {
                        $comment = "";
                      } else {
                        $comment = test_input($_POST["comment"]);
                      }
                    
                }

                function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }
                ?>

                <h3>Buku Tamu</h3>
                <p><span class="error">* required field</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                Nama : <input type="text" name="nama" value="<?php echo $nama;?>">
                <span class="error">* <?php echo $namaErr;?></span>
                <br><br>
                E-mail : <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
                Gender :
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other
                <span class="error">* <?php echo $genderErr;?></span>
                <br><br>
                Comment: <textarea name="comment" rows="8" cols="40"><?php echo $comment;?></textarea>
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br><br>

                <?php
                        echo "<h2>Your Input :</h2>";
                        echo "Nama : ".$nama." <br><br>";
                        echo "E-mail : ".$email." <br><br>";
                        echo "Gender : ".$gender." <br><br>";
                        echo "Comment : ".$comment." <br><br>";
                    ?>
                </form>
                </div>
            </section>

    <?php
	include ("footer.php");
	?>
    
</body>
</html>