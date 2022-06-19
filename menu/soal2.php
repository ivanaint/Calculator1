<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
	include ("header.php");
	?>
    <br><br>
    <h1>Menghitung rata-rata siswa, mata pelajaran, dan menentukan jurusan</h1><br>

<!--- Hitunglah nilai rata-rata setiap siswa --->
    <h3><center>Data Siswa</center></h3>
    <img class="img-responsive1" src="../img/anak1.png"/>
    
    <table border="1">
    <th>Nama</th><th>Matematika</th><th>Bahasa Indonesia</th><th>Bahasa Inggris</th><th>IPA</th><th>IPS</th>
        <?php
        $siswa = array(
            array("Nama", "Matematika", "Bahasa Indonesia", "Bahasa Inggris", "IPA", "IPS"),
            array("Adi", "7", "8", "6", "6", "7"),
            array("Bunga", "8", "9", "9", "8", "7"),
            array("Candra", "8", "8", "9", "9", "8"),
            array("Dita", "6", "8", "8", "6", "8"),
            array("Edgar", "5", "6", "5", "6", "6")
            ); 
        for ($row = 1; $row < 6; $row++) {
            echo "<tr>";
            for ($col = 0; $col < 6; $col++) {
                echo "<td>".$siswa[$row][$col]."</td>"; 
            }
            echo "</tr>";
        }
        ?>
    </table><br><br>

    <h3><center>Rata-Rata Siswa</center></h3>
    <table border="1">
        <th>Nama</th><th>Rata-Rata</th>
        <?php
        //Hitung rata-rata siswa
        $rataSiswa = array();
        for ($i=0; $i<count($siswa); $i++) {
            $rataSiswa[$i] = array_sum(array_slice($siswa[$i], 1))/5;
        }
        for ($i=1; $i<count($rataSiswa); $i++) {
            echo "<tr>";
            echo "<td>".$siswa[$i][0]."<td>";
            echo "$rataSiswa[$i]";
            echo "</tr>";
        }
        ?>
    </table><br><br>

<!--- Hitunglah nilai rata-rata setiap mata pelajaran --->
    <img class="img-responsive2" src="../img/anak2.png"/>
    <h3><center>Rata-Rata Mata Pelajaran</center></h3>
    <table border="1">
        <th>Mata Pelajaran</th><th>Rata-Rata</th>
        <?php
        //Hitung rata-rata mata pelajaran 
        $rataPelajaran = array();
        for ($i=1; $i<count($siswa[0]); $i++) {
            $total = 0; 
            for ($j=1; $j<count($siswa); $j++) {
                $total += $siswa[$j][$i];
            }
        $rataPelajaran[$i] = $total/count($siswa);
        }
        $mapel = array("Mata Pelajaran", "Matematika", "Bahasa Indonesia", "Bahasa Inggris", "IPA", "IPS");
        for ($i=1; $i<count($mapel); $i++) {
            echo "<tr>";
            echo "<td>".$mapel[$i]."<td>";
            echo "$rataPelajaran[$i]";
            echo "</tr>";
        }
        ?>
    </table><br><br>

<!--- Tentukan jurusan setiap siswa, apabila Nilai IPA lebih besar dari IPS, maka masuk ke jurusan IPA, begitu pun sebaliknya. --->
<!--- Namun apabila rata-rata nilai kurang dari 6, maka tidak naik kelas. --->
    <h3><center>Jurusan Siswa</center></h3>
    <table border="1">
        <th>Nama</th><th>Jurusan</th>
        
        <?php
        //Menentukan jurusan siswa 
        $jurusan = array();
            for ($i=1; $i < count($siswa); $i++) {
                if ($siswa[$i][4] > $siswa[$i][5]) {
                    $jurusan[$i] = "IPA";
                } else {
                    $jurusan[$i] = "IPS";
                } 
                if ($rataSiswa[$i] < 6) {
                    $jurusan[$i] = "Tidak Naik Kelas"; 
                }
            }
            for ($i=1; $i<=count($jurusan); $i++) {
                echo "<tr>";
                echo "<td>".$siswa[$i][0]."</td>";
                echo "<td>".$jurusan[$i]."</td>";
                echo "</tr>";
            }
        ?>
    </table><br><br><br>

    <?php
	include ("footer.php");
	?>
</body>
</html>