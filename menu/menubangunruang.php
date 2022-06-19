<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumus Bangun Datar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="menu-bangun">
		<ul>
			<li class="dropdown"><a href="#">Pilih Bangun Ruang</a>
				<ul class="isi-dropdown">
					<li><a href="../bgruang/balok.php">Balok</a></li>
					<li><a href="../bgruang/tabung.php">Tabung</a></li>
					<li><a href="../bgruang/bola.php">Bola</a></li>
					<li><a href="../bgruang/kerucut.php">Kerucut</a></li>
				</ul>
			</li>
		</ul>

	</div>

    <style type="text/css">
	html,body{
		padding: 0;
		margin:0;
		font-family: sans-serif;
	}

	.menu-bangun{
		background-color: #3141ff;
	}

	.menu-bangun {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}

	.menu-bangun > ul > li {
		float: left;
	}

	
	.menu-bangun li a {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	.menu-bangun li a:hover{
		background-color: #ff823c;
	}

	li.dropdown {
		display: inline-block;
	}

	.dropdown:hover .isi-dropdown {
		display: block;
	}

	.isi-dropdown a:hover {
		color: #fff !important;
	}

	.isi-dropdown {
		position: absolute;
		display: none;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		background-color: #f9f9f9;
	}

	.isi-dropdown a {
		color: #3c3c3c !important;
	}

	.isi-dropdown a:hover {
		color: #232323 !important;
		background: #f3f3f3 !important;
	}
    </style>
</body>
</html>