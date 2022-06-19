<!DOCTYPE HTML>  
<html lang="en">
<head>
    <title>Program Penghitung IPK</title>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
	include ("header.php");
	?>

    <div class="wrap">
        <div class="container">

    <?php
        $m1 = $m2 = $m3 = $m4 = $m5 ="";
        $m1Err = $m2Err = $m3Err = $m4Err = $m5Err = "";
        $ipk = $pdkt = $satuan = $M1 = $M2 = $M3 = $M4 = $M5 = "";
        $nama = $nim = $jk = $jur = ""; 
        $namaErr = $nimErr = $jkErr = $jurErr = ""; 

        function M1($m1){
            
            return $m1;
        }

        function M2($m2){
            
            return $m2;
        }
        function M3($m3){
            
            return $m3;
        }

        function M4($m4){
            
            return $m4;
        }
        function M5($m5){
            
            return $m5;
        }

        function pdkt($m1, $m2, $m3, $m4, $m5){
            $gabungan = [$m1, $m2, $m3, $m4, $m5];

            $SKS = [
                0 => 3,
                1 => 3,
                2 => 3,
                3 => 3,
                4 => 3
            ];

            $bobot=array();

            foreach ($gabungan as $a) { 
                if($a=="A"){
                    $bobot[]=4;
                }else if ($a=="B"){
                    $bobot[]=3;          
                } else if ($a=="C"){
                    $bobot[]=2;        
                } else if ($a=="D"){
                    $bobot[]=1;        
                } 
                else{
                    $bobot[]=0;
                }
            }  

            $ip=array();
            $pi=array();
            foreach ($SKS as $key => $value) {  
                $ip[$key]=$value*$bobot[$key]; 
                $pi[]=$ip[$key];
            }

            $ipk = array_sum($pi)/ array_sum($SKS);

            if($ipk > 3.75){
                $pdkt = "Pujian Tertinggi (<i>Summa Cumlaude</i>)";
            } elseif($ipk > 3.50){
                $pdkt = "Pujian (<i>Cumlaude</i>)";
            } elseif($ipk > 3.00){
                $pdkt = "Sangat Memuaskan";
            } elseif($ipk > 2.75){
                $pdkt = "Memuaskan";
            } elseif($ipk > 2.00){
                $pdkt = "Cukup";
            } else{
                $pdkt = "Tetap SEMANGATTTTTTTTT";
            }

            return $pdkt;
        }

        function ipk($m1, $m2, $m3, $m4, $m5){
            $gabungan = [$m1, $m2, $m3, $m4, $m5];

            $SKS = [
                0 => 3,
                1 => 3,
                2 => 3,
                3 => 3,
                4 => 3
            ];

            $bobot=array();

            foreach ($gabungan as $a) {
                if($a=="A"){
                    $bobot[]=4;
                }else if ($a=="B"){
                    $bobot[]=3;          
                } else if ($a=="C"){
                    $bobot[]=2;        
                } else if ($a=="D"){
                    $bobot[]=1;        
                } 
                else{
                    $bobot[]=0;
                }
            }  

            $ip=array();
            $pi=array();
            foreach ($SKS as $key => $value) {  
                $ip[$key]=$value*$bobot[$key]; 
                $pi[]=$ip[$key];
            }

            $ipk = array_sum($pi)/ array_sum($SKS);

            return $ipk;
        }
        ?>

    <?php 
        if(isset($_POST['hitung'])){

            
            if (empty($_POST["nama"])){
                $namaErr = "Nama jangan kosongan guys";
            } else{
                $nama = $_POST["nama"];
                if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
                    $namaErr = "Cukup huruf dan spasi aja ya";
                }
            }

            if (empty($_POST["nim"])){
                $nimErr = "NIM jan dikosongii";
            } else{
                $nim = $_POST["nim"];
                if (!is_numeric($nim)) {
                    $nimErr = "cuma boleh angka kawand";
                } elseif (strlen($nim) != 8){
                    $nimErr = "cuma boleh angka dan 8 digit ya guys";
                }
            }

            if (empty($_POST["jk"])) {
                $jkErr = "gender harus diisi salah satu";
            } else {
                $jk = $_POST["jk"];
            }

            if (empty($_POST["jur"])){
                $jurErr = "Jurusan jan dikosongi guys";
            } else{
                $jur = $_POST["jur"];
            }

            if (empty($_POST["mk1"])){
                $m1Err = "Matkul 1 tidak boleh kosong";
            } else{
                $m1 = $_POST["mk1"];
                if (is_numeric($m1)) {
                    $m1Err = "Hanya boleh huruf aja";
                } elseif (strlen($m1) != 1){
                    $m1Err = "Huruf yang dimasukkan cuma satu";
                }
            }

            if (empty($_POST["mk2"])){
                $m2Err = "Matkul 2 tidak boleh kosong";
            } else{
                $m2 = $_POST["mk2"];
                if (is_numeric($m2)) {
                    $m2Err = "Hanya boleh huruf saja";
                } elseif (strlen($m2) != 1){
                    $m2Err = "Huruf yang dimasukkan cuma satu";
                }
            }

            if (empty($_POST["mk3"])){
                $m3Err = "Matkul 3 tidak boleh kosong";
            } else{
                $m3 = $_POST["mk3"];
                if (is_numeric($m3)) {
                    $m3Err = "Hanya boleh huruf saja";
                } elseif (strlen($m3) != 1){
                    $m3Err = "Huruf yang dimasukkan cuma satu";
                }
            }

            if (empty($_POST["mk4"])){
                $m4Err = "Matkul 4 tidak boleh kosong";
            } else{
                $m4 = $_POST["mk4"];
                if (is_numeric($m4)) {
                    $m4Err = "Hanya boleh huruf saja";
                } elseif (strlen($m4) != 1){
                    $m4Err = "Huruf yang dimasukkan cuma satu";
                }
            }

            if (empty($_POST["mk5"])){
                $m5Err = "Matkul 5 tidak boleh kosong";
            } else{
                $m5 = $_POST["mk5"];
                if (is_numeric($m5)) {
                    $m5Err = "Hanya boleh huruf saja";
                } elseif (strlen($m5) != 1){
                    $m5Err = "Huruf yang dimasukkan cuma satu";
                }
            }

            if ($m1 == "" || $m2 == "" || $m3 == "" || $m4 == "" || $m5 == "") {
                $kosong = "";
            }else {
                $ipk = ipk($_POST["mk1"], $_POST["mk2"], $_POST["mk3"], $_POST["mk4"], $_POST["mk5"]);
                $pdkt = pdkt($_POST["mk1"], $_POST["mk2"], $_POST["mk3"], $_POST["mk4"], $_POST["mk5"]);
                $M1 = M1($_POST["mk1"]);
                $M2 = M2($_POST["mk2"]);
                $M3 = M3($_POST["mk3"]);
                $M4 = M4($_POST["mk4"]);
                $M5 = M5($_POST["mk5"]);
            }

        }

        if(isset($_POST["kembali"])){
            echo "<script>window.location = '/'</script>";
        }
    ?>

    <div class="">
        <div class="">
            <h1>Program Penghitung IPK</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <table>
                    
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?php echo $nama;?>" ></td>
                        <td><span class="error">* <?php echo $namaErr;?></span><br></td>
                    </tr>  
                    <tr>
                        <td>NIM </td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" name="nim" value="<?php echo $nim;?>" ></td>
                        <td><span class="error">* <?php echo $nimErr;?></span><br></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin </td>
                        <td></td>
                        <td>:</td>
                        <td><input type="radio" name="jk" <?php if (isset($jk) && $jk=="Perempuan") echo "checked";?> value="Perempuan">Perempuan</td>
                        <td><input type="radio" name="jk" <?php if (isset($jk) && $jk=="Laki-Laki") echo "checked";?> value="Laki-Laki">Laki-Laki</td>
                        <td><span class="error">* <?php echo $jkErr;?></span><br></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td></td>
                        <td>:</td>
                        <td>
                            <select class="pilihan" name="jur">
                                <option value="">Pilih Jurusan</option>
                                <option value="D3 Teknik Sipil">D3 Teknik Sipil</option>
                                <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                                <option value="D3 Akuntansi">D3 Akuntansi</option>
                                <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                            </select>
                        </td>
                        <td><span class="error">* <?php echo $jurErr;?></span><br></td>
                    </tr>
                    <tr>
                        <td>Mata Kuliah 1</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" onkeypress="return event.charCode >= 65 && event.charCode <=69" name="mk1" value="<?php echo $m1;?>" > huruf</td>
                        <td><span class="error">* <?php echo $m1Err;?></span><br></td>
                    </tr>  
                    <tr>
                        <td>Mata Kuliah 2</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" onkeypress="return event.charCode >= 65 && event.charCode <=69" name="mk2" value="<?php echo $m2;?>" > huruf</td>
                        <td><span class="error">* <?php echo $m2Err;?></span><br></td>
                    </tr>  
                    <tr>
                        <td>Mata Kuliah 3</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" onkeypress="return event.charCode >= 65 && event.charCode <=69" name="mk3" value="<?php echo $m3;?>" > huruf</td>
                        <td><span class="error">* <?php echo $m3Err;?></span><br></td>
                    </tr>  
                    <tr>
                        <td>Mata Kuliah 4</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" onkeypress="return event.charCode >= 65 && event.charCode <=69" name="mk4" value="<?php echo $m4;?>" > huruf</td>
                        <td><span class="error">* <?php echo $m4Err;?></span><br></td>
                    </tr>  
                    <tr>
                        <td>Mata Kuliah 5</td>
                        <td></td>
                        <td>:</td>
                        <td><input type="text" onkeypress="return event.charCode >= 65 && event.charCode <=69" name="mk5" value="<?php echo $m5;?>" > huruf</td>
                        <td><span class="error">* <?php echo $m5Err;?></span><br></td>
                    </tr>  

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input class="button" type="submit" name="hitung" value="Hitung">
                        </td>
                    </tr>
                </table><br><br>
                <h3 class="hasil">Hasil Inputan Kamu :</h3>
                <div class="container1">
                    <div class="container2">
                        <h3>Nama Mahasiswa</h3>
                        <p><?php echo $nama ;?></p>
                    </div>
                    <div class="container2">
                        <h3>NIM</h3>
                        <p><?php echo $nim ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Jenis Kelamin</h3>
                        <p><?php echo $jk ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Jurusan</h3>
                        <p><?php echo $jur ;?></p>
                    </div>
                    <div class="container2">
                        <h3>IPK</h3>
                        <p><?php echo $ipk ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Predikat</h3>
                        <p><?php echo $pdkt ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Mata Kuliah 1</h3>
                        <p><?php echo $M1 ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Mata Kuliah 2</h3>
                        <p><?php echo $M2 ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Mata Kuliah 3</h3>
                        <p><?php echo $M3 ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Mata Kuliah 4</h3>
                        <p><?php echo $M4 ;?></p>
                    </div>
                    <div class="container2">
                        <h3>Mata Kuliah 5</h3>
                        <p><?php echo $M5 ;?></p>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>

    <?php
	include ("footer.php");
	?>

</body>
</html>