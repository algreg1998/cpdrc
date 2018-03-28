
<html>
<head>
	<title>printCT</title>
</head>
<link rel="stylesheet" href="..\..\assets\css\bootstrap\css\bootstrap.min.css">
<style type="text/css">
	h6, h5, h5, h3, h2, h1 {
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
		/*font-size:12px;*/
		margin:0px;
		font-weight: lighter;
	}

	p {
		margin:0px;
		/*font-size:12px;*/
	}

	.prisonImg {
		height:200px;
		width:200px;
	}
	.content
	{
		font-size: 2em;
	}
	p span 
	{
		text-decoration: underline;
	}
	label, p
	{
		font-size: 1em;
	}
	hr {
	    display: block;
	    height: 1px;
	    border: 0;
	    border-top: 1px solid #ccc;
	    margin: 1em 0;
	    padding: 0;
	    background-color:black;
	}

</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<img src="<?php echo base_url('uploads/provinceOfCebu.jpg'); ?>">
			</div>
			<div class="col-md-8">
				<center>
					<h5>Republic of the Philippines</h5>
					<h5>Province of Cebu</h5>
					<h5><strong>OFFICE OF THE PROVINCIAL WARDEN</strong></h5>
					<h5 style='font-family: Times New Roman'>CEBU PROVINCIAL DETENTION AND REHABILATION CENTER</h5>
					<h5>Kalunasan, Cebu City</h5>
					<h5>Tel. No. (032) 254-0641 / Fax (032) 255-3673</h5>
					<br>
					<h5>INMATE'S PROFILE</h5>
				</center>
			</div>
			<div class="col-md-2">
				<img src="<?php echo base_url('uploads/cpdrc.jpg'); ?>">
			</div>
		</div>
		<br>
		<div class="row"> <!--form part-->
			<div class="col-md-7">
				<h5>CPDRC Form No. <?php //echo $inmate->formid; ?>1</h5>
				<br>
				<div class="col-md-6">
					<label>Name</label><br>
					<label>Nickname</label><br>
					<label>Date of Confinement</label><br>
					<label>Crime</label><br>
					<br>
					<label>Court</label><br>
					<br>
					<label>Sentence</label><br>
					<label>Prison No.</label><br>
					<label>Class</label><br>
					<label>Nationality</label><br>
					<label>Religion</label><br>
					<label>Date of Birth</label><br>
					<label>Place of Birth</label><br>
					<label>Present Address</label><br>
					<label>Civil Status</label><br>
					<label>Occupation</label><br>
					<label>Father's Name</label><br>
					<label>Mother's Maiden Name</label><br><br>

					<label><em>(In case of emergency)</em></label><br>
					<label>Contact Person</label><br>
					<label>Address</label><br>
				</div>
				<div class="col-md-6">
					<p>: <span> #name </span> </p>
					<p>: <span>#nickname</span></p>
					<p>: <span>#datofconfinement</span></p>
					<p>: <span>#crime1</span></p>
					<p>: <span>#crime2</span></p>
					<p>: <span>#court1</span></p>
					<p>: <span>#court2</span></p>
					<p>: <span>#sentence</span></p>
					<p>: <span>#prisonNo.</span></p>
					<p>: <span>#class</span></p>
					<p>: <span>#nationality</span></p>
					<p>: <span>#religion</span></p>
					<p>: <span>#dateOfBirth</span></p>
					<p>: <span>#placeOfBirth</span></p>
					<p>: <span>#presentAddress</span></p>
					<p>: <span>#civilStatus</span></p>
					<p>: <span>#occupation</span></p>
					<p>: <span>#fatherName</span></p>
					<p>: <span>#motherMaidenName</span></p>
					<br><br>
					<p>: <span>#contactPerson</span></p>
					<p>: <span>#address</span></p>
					<br>

					<hr/>
					<p style='text-align:center'>(Detainee's Signature)</p>
				</div>
			</div>
			<div class="col-md-5"> <!--picture-->
				<img src="<?php echo base_url('uploads/192x192.jpg'); ?>" class="prisonImg">
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
						<p>: <span>#height</span></p>
						<p>: <span>#weight</span></p>
						<p>: <span>#complexion</span></p>
						<p>: <span>#hair</span></p>
						<p>: <span>#build</span></p>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row" style="display:inline">
			<div class="col-md-12">
			<div class="col-md-5 text-right">
			<p>Date of Release</p>
			<p>Authority for Release/Transfer</p>
			</div>	
			<div class="col-md-7">
			<p>: <span>#dateOfRelease</span></p>
			<p>: <span>#authorityForReleaseOrTransfer</span></p>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 text-center">
				<br>
					<p>Prepared and Verified By:</p><br>
					<p><span>#preparedAndVerifiedBy</span></p>
				</div>

				<div style="margin-left: -100px" class="col-md-6 text-center">
				<br>
				<p>Approved By:</p><br>
				<p><span>#approvedBy</span></p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			<br><br>
				<strong>Date: <span><?php echo date("F j, Y, g:i a");?> </span> </strong>
			</div>
		</div>
	</div>
</body>
</html>