<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?=base_url()?>assets/gambar/tvlogo.png" type="image/x-icon">
<head>
	<title>E-Information | Universitas Islam Negeri Malang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
  html,body{
    height:100%;
}
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			text-align: left;
			padding: 10px;
		}

		tr:nth-child(even) {
			background-color:	#F5FFFA
		}

		th {
			background-color: #00b300;
			color: white;
		}

		* {
			box-sizing: border-box;
		}

		img {
			vertical-align: middle;
			width: 600px;
			height: 600px;

		}

		body {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			margin: 0;
			overflow-y: hidden;
			overflow-x: hidden;

		}
		header {
			background: linear-gradient(to bottom, #009900 0%, #33cc33 100%);
			padding: 5px;
			padding-left: 50px;
			font-size: 25px;
			color: white;
			display: grid;
			grid-template-columns: 66% auto;
			height: 115px;
		}
		nav {
			float: left;
			width: 30%;
			height: 610px;
			background: #b3ffb3;
			padding: 10px;
			padding-bottom: 0;
		}
		nav ul {
			list-style-type: none;
			padding: 0;
		}

		img {
			width: 191.2%;
			padding: 0;
			height: 610px;
		}

		article {
			float: left;
			padding: 0;
			width: 70%;
			background-color: #F5FFFA;
			height: 530px;
		}
		section:after {
			content: "";
			display: table;
			clear: both;
		}
		footer {
			width: 100%;
		    height: 50px;
		    padding-left: 10px;
			background: linear-gradient(to bottom, #009900 30%, #00cc00 100%);
			padding: 2px;
			color: white;
			position: absolute;
    	    bottom: 0px;
    	    font-size: 20px;
			display: grid;
			grid-template-columns: 10% auto;
		}
		@media (max-width: 500px) {
			nav,
			article {
				width: 100%;
				height: auto;
			}
		}
		.textjalan {
			padding: 10px;
		}
		.waktu{
			padding-bottom: 10px;
			background-color: white;
			text-align: center;
			font-weight: bold;
			font-size: 20px;
		}
		.logo img{
			position: absolute;
			margin-top: 5px;
			height: 100px;
			width: 450px;
		}
	</style>
	

</head>

<body>
		<header>
		<div class="head">
		<div class="logo"><a href=""><img src="<?=base_url()?>assets/images/head.png" alt="Logo"></a></div>
		</div>
		<div><h2 class="right"> 
				<p id="date"></p>
	

		</div>
		</header>

	<section>
		<nav>
			<div style="border:0px solid rgb(153,153,153);  width:350px;height:440px;">

				<body>
					<marquee direction="up" style="height:580px" scrollDelay="250">
						<table border="0">
							<tr>
								<th>Berita Terbaru</th>
							</tr>
							<?php foreach ($berita as $b ) : ?>
							<tr>
								<td>
                 					 ● <?= $b['data'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>

					</marquee>
				</body>

		</nav>
		</div>
		<article>
			<div class="img" style="max-width:500px">
			<?php foreach ($gambar as $g): ?>
				<!-- <? php var_dumb($g['gambar']) ?> -->
				<img class="mySlides" src="<?=base_url('assets/gambar/') . $g['gambar'] ?>">
			<?php endforeach; ?>	
			</div>
		</article>
	</section>

	<footer>
		<div class="waktu" style="color: black;">
		<p id="time"></p>
		</div>
		<div class="textjalan">
		<marquee>
				<?php foreach ($text as $t ) : ?>
							<th >
                 					  <?= $t['data'] ?> &nbsp&nbsp  **  &nbsp&nbsp
								</th>
							<?php endforeach; ?>
		</marquee>
		</div>
	</footer>

</body>

</html>
<script>
	var myIndex = 0;
	carousel();

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		myIndex++;
		if (myIndex > x.length) {
			myIndex = 1
		}
		x[myIndex - 1].style.display = "block";
		setTimeout(carousel, 5000);
	}

</script>

<script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
	  var d = new Date();
	  
	  var date = d.getDate();
	  
	  var month = d.getMonth();
	  var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	  month=montharr[month];
	  
	  var year = d.getFullYear();
	  
	  var day = d.getDay();
	  var dayarr =["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
	  day=dayarr[day];
	  
	  var hour =d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	
	  document.getElementById("date").innerHTML=day+", "+date+" "+month+" "+year;
	  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }
  </script>
