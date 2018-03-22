<html>
<head>
	<title>printCT</title>
</head>
<link rel="stylesheet" href="..\..\assets\css\bootstrap\css\bootstrap.min.css">
<style type="text/css">
	h6, h5, h4, h3, h2, h1 {
		margin:2px;
	}

	.container {
		width : 800px;
		height : 1000px;
		border: 1px solid black;
		padding:25px;
	}

	.labelStyle {
		width: 200px;
	}

	label {
		font-size:12px;
		margin:0px;
	}

	p {
		margin:0px;
		font-size:12px;
	}

	.prisonImg {
		height:200px;
		width:200px;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				p
				<img src="">
			</div>
			<div class="col-md-8">
				<center>
					<h5>Republic of the Philippines</h5>
					<h5>Province of Cebu</h5>
					<h4>OFFICE OF THE PROVINCIAL WARDEN</h4>
					<h4>CEBU PROVINCIAL DETENTION AND REHABILATION CENTER</h4>
					<H5>Kalunasan, Cebu City</H5>
					<H5>Tel. No. (032) 254-0641 / Fax (032) 255-3673</H5>
					<br>
					<h4>INMATE'S PROFILE</h4>
				</center>
			</div>
			<div class="col-md-2">
				test
			</div>
		</div>
		<br>
		<div class="row"> <!--form part-->
			<div class="col-md-7">
				<h6>CPDRC Form No. 1</h6>
				<br>
				<div class="col-md-5">
					<label>Name</label><br>
					<label>Nickname</label><br>
					<label>Date of Confinement</label><br>
					<label>Crime</label><br>
					<br>
					<label>Court</label><br>
					<br>
					<br>
					<label>Sentence</label><br>
					<label>Prison No.</label><br>
					<label>Class</label><br>
					<label>Nationality</label><br>
					<label>Date of Birth</label><br>
					<label>Place of Birth</label><br>
					<label>Present Address</label><br>
					<label>Civil Status</label><br>
					<label>Occupation</label><br>
					<label>Father's Name</label><br>
					<label>Mother's Maiden Name</label><br>
				</div>
				<div class="col-md-7">
					<p>: #name</p>
					<p>: #nickname</p>
					<p>: #datofconfinement</p>
					<p>: #crime</p>
					<p>: #crime1</p>
					<p>: #crime2</p>
					<p>: #court</p>
					<p>: #court1</p>
					<p>: #court2</p>
				</div>
			</div>
			<div class="col-md-5"> <!--picture-->
				<img src="..\..\uploads\192x192.jpg" class="prisonImg">
				<div class="row">
					<div class="col-md-3">
						<br>
						<label>Height</label><br>
						<label>Weight</label><br>
						<label>Complexion</label><br>
						<label>Hair</label><br>
						<label>Build</label><br>
					</div>
					<div class="col-md-9">
						<br>
						<p>: #height</p>
						<p>: #weight</p>
						<p>: #complexion</p>
						<p>: #hair</p>
						<p>: #build</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>