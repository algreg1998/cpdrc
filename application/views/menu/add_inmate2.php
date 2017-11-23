<!DOCTYPE html>
<html>
    <div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class='panel-body'>
	<section id="info">
			
				<div class="row" style="margin-top:20px;">
					<div class="col-md-8 col-lg-10">
						<h1 class="text-warning">Step 2: Inmate Personal Information</h1>
						<h5 class="text-muted">This would ask the inmate's personal infomation including family information.</h5>
						<div class="progress" style="height:30px;">
						  <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>20% Complete</span>
						  </div>
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>You're now here!</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>60% Remaining</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-5" style="margin-top:20px;">
						
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-user"></i> Inmate Information
								</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-5">
										<img src="<?=base_url()?>uploads/inmate/<?=$filename;?>" width="130" height="130"/>
									</div>
									<div class="col-md-7">
										<p><b>Reference Form ID</b>: <?php echo $formid;?> <br>
										<b>Inmate number</b>: <?php echo $id;?><br>
										<b>Inmate name</b>: <?php echo $name;?></p>	
									</div>
								</div>	
							</div>
						</div>
					<!--end col 5-->
					</div>
				</div>
			
				

				<div class="row">
					<div class="col-md-5">
					<?php
						if(isset($data)){
							echo "<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>$data</div>";
						}
					?>
					</div>
				</div>
					<?php 
						$attr = array('class' => 'form_horizontal');
						if(isset($info)){
							echo form_open('cpdrc/editinmate/edit2', $attr);
						}else{
							echo form_open('cpdrc/addinmate/add2', $attr);
						}
					?>
				<div class="row" align="left" style='margin-left: 0px'>
					<div class="col-md-5 col-sm-12 well"><!--LEFTSIDE-->
						<!--FOR THE INFO ABOVE -->
						<input type="hidden" name="formid" value="<?=$formid;?>">
						<input type="hidden" name="id" value="<?=$id;?>">
						<input type="hidden" name="name" value="<?=$name;?>">
						<input type="hidden" name="filename" value="<?=$filename;?>">

						<label><i class="fa fa-flag"></i> <b>Citizenship</b></label>
						<!-- <input type="text" name="nationality" class="form-control" required autofocus> -->
						<select name="nationality" class="form-control" required autofocus>
						  <option value="afghan" <?php if(isset($info) && $info->nationality=="afghan"){echo "selected";}?>>Afghan</option>
						  <option value="albanian" <?php if(isset($info) && $info->nationality=="albanian"){echo "selected";}?>>Albanian</option>
						  <option value="algerian" <?php if(isset($info) && $info->nationality=="algerian"){echo "selected";}?>>Algerian</option>
						  <option value="american" <?php if(isset($info) && $info->nationality=="american"){echo "selected";}?>>American</option>
						  <option value="andorran" <?php if(isset($info) && $info->nationality=="andorran"){echo "selected";}?>>Andorran</option>
						  <option value="angolan" <?php if(isset($info) && $info->nationality=="angolan"){echo "selected";}?>>Angolan</option>
						  <option value="antiguans" <?php if(isset($info) && $info->nationality=="antiguans"){echo "selected";}?>>Antiguans</option>
						  <option value="argentinean" <?php if(isset($info) && $info->nationality=="argentinean"){echo "selected";}?>>Argentinean</option>
						  <option value="armenian" <?php if(isset($info) && $info->nationality=="armenian"){echo "selected";}?>>Armenian</option>
						  <option value="australian" <?php if(isset($info) && $info->nationality=="australian"){echo "selected";}?>>Australian</option>
						  <option value="austrian" <?php if(isset($info) && $info->nationality=="austrian"){echo "selected";}?>>Austrian</option>
						  <option value="azerbaijani" <?php if(isset($info) && $info->nationality=="azerbaijani"){echo "selected";}?>>Azerbaijani</option>
						  <option value="bahamian" <?php if(isset($info) && $info->nationality=="bahamian"){echo "selected";}?>>Bahamian</option>
						  <option value="bahraini" <?php if(isset($info) && $info->nationality=="bahraini"){echo "selected";}?>>Bahraini</option>
						  <option value="bangladeshi" <?php if(isset($info) && $info->nationality=="bangladeshi"){echo "selected";}?>>Bangladeshi</option>
						  <option value="barbadian" <?php if(isset($info) && $info->nationality=="barbadian"){echo "selected";}?>>Barbadian</option>
						  <option value="barbudans" <?php if(isset($info) && $info->nationality=="barbudans"){echo "selected";}?>>Barbudans</option>
						  <option value="batswana" <?php if(isset($info) && $info->nationality=="batswana"){echo "selected";}?>>Batswana</option>
						  <option value="belarusian" <?php if(isset($info) && $info->nationality=="belarusian"){echo "selected";}?>>Belarusian</option>
						  <option value="belgian" <?php if(isset($info) && $info->nationality=="belgian"){echo "selected";}?>>Belgian</option>
						  <option value="belizean" <?php if(isset($info) && $info->nationality=="belizean"){echo "selected";}?>>Belizean</option>
						  <option value="beninese" <?php if(isset($info) && $info->nationality=="beninese"){echo "selected";}?>>Beninese</option>
						  <option value="bhutanese" <?php if(isset($info) && $info->nationality=="bhutanese"){echo "selected";}?>>Bhutanese</option>
						  <option value="bolivian" <?php if(isset($info) && $info->nationality=="bolivian"){echo "selected";}?>>Bolivian</option>
						  <option value="bosnian" <?php if(isset($info) && $info->nationality=="bosnian"){echo "selected";}?>>Bosnian</option>
						  <option value="brazilian" <?php if(isset($info) && $info->nationality=="brazilian"){echo "selected";}?>>Brazilian</option>
						  <option value="british" <?php if(isset($info) && $info->nationality=="british"){echo "selected";}?>>British</option>
						  <option value="bruneian" <?php if(isset($info) && $info->nationality=="bruneian"){echo "selected";}?>>Bruneian</option>
						  <option value="bulgarian" <?php if(isset($info) && $info->nationality=="bulgarian"){echo "selected";}?>>Bulgarian</option>
						  <option value="burkinabe" <?php if(isset($info) && $info->nationality=="burkinabe"){echo "selected";}?>>Burkinabe</option>
						  <option value="burmese" <?php if(isset($info) && $info->nationality=="burmese"){echo "selected";}?>>Burmese</option>
						  <option value="burundian" <?php if(isset($info) && $info->nationality=="burundian"){echo "selected";}?>>Burundian</option>
						  <option value="cambodian" <?php if(isset($info) && $info->nationality=="cambodian"){echo "selected";}?>>Cambodian</option>
						  <option value="cameroonian" <?php if(isset($info) && $info->nationality=="cameroonian"){echo "selected";}?>>Cameroonian</option>
						  <option value="canadian" <?php if(isset($info) && $info->nationality=="canadian"){echo "selected";}?>>Canadian</option>
						  <option value="cape verdean" <?php if(isset($info) && $info->nationality=="cape verdean"){echo "selected";}?>>Cape Verdean</option>
						  <option value="central african" <?php if(isset($info) && $info->nationality=="central african"){echo "selected";}?>>Central African</option>
						  <option value="chadian" <?php if(isset($info) && $info->nationality=="chadian"){echo "selected";}?>>Chadian</option>
						  <option value="chilean" <?php if(isset($info) && $info->nationality=="chilean"){echo "selected";}?>>Chilean</option>
						  <option value="chinese" <?php if(isset($info) && $info->nationality=="chinese"){echo "selected";}?>>Chinese</option>
						  <option value="colombian" <?php if(isset($info) && $info->nationality=="colombian"){echo "selected";}?>>Colombian</option>
						  <option value="comoran" <?php if(isset($info) && $info->nationality=="comoran"){echo "selected";}?>>Comoran</option>
						  <option value="congolese" <?php if(isset($info) && $info->nationality=="congolese"){echo "selected";}?>>Congolese</option>
						  <option value="costa rican" <?php if(isset($info) && $info->nationality=="costa rican"){echo "selected";}?>>Costa Rican</option>
						  <option value="croatian" <?php if(isset($info) && $info->nationality=="croatian"){echo "selected";}?>>Croatian</option>
						  <option value="cuban" <?php if(isset($info) && $info->nationality=="cuban"){echo "selected";}?>>Cuban</option>
						  <option value="cypriot" <?php if(isset($info) && $info->nationality=="cypriot"){echo "selected";}?>>Cypriot</option>
						  <option value="czech" <?php if(isset($info) && $info->nationality=="czech"){echo "selected";}?>>Czech</option>
						  <option value="danish" <?php if(isset($info) && $info->nationality=="danish"){echo "selected";}?>>Danish</option>
						  <option value="djibouti" <?php if(isset($info) && $info->nationality=="djibouti"){echo "selected";}?>>Djibouti</option>
						  <option value="dominican" <?php if(isset($info) && $info->nationality=="dominican"){echo "selected";}?>>Dominican</option>
						  <option value="dutch" <?php if(isset($info) && $info->nationality=="dutch"){echo "selected";}?>>Dutch</option>
						  <option value="east timorese" <?php if(isset($info) && $info->nationality=="east timorese"){echo "selected";}?>>East Timorese</option>
						  <option value="ecuadorean" <?php if(isset($info) && $info->nationality=="ecuadorean"){echo "selected";}?>>Ecuadorean</option>
						  <option value="egyptian" <?php if(isset($info) && $info->nationality=="egyptian"){echo "selected";}?>>Egyptian</option>
						  <option value="emirian" <?php if(isset($info) && $info->nationality=="emirian"){echo "selected";}?>>Emirian</option>
						  <option value="equatorial guinean" <?php if(isset($info) && $info->nationality=="equatorial guinean"){echo "selected";}?>>Equatorial Guinean</option>
						  <option value="eritrean" <?php if(isset($info) && $info->nationality=="eritrean"){echo "selected";}?>>Eritrean</option>
						  <option value="estonian" <?php if(isset($info) && $info->nationality=="estonian"){echo "selected";}?>>Estonian</option>
						  <option value="ethiopian" <?php if(isset($info) && $info->nationality=="ethiopian"){echo "selected";}?>>Ethiopian</option>
						  <option value="fijian" <?php if(isset($info) && $info->nationality=="fijian"){echo "selected";}?>>Fijian</option>
						  <option value="filipino" <?php if(isset($info) && $info->nationality=="filipino"){echo "selected";}?>>Filipino</option>
						  <option value="finnish" <?php if(isset($info) && $info->nationality=="finnish"){echo "selected";}?>>Finnish</option>
						  <option value="french" <?php if(isset($info) && $info->nationality=="french"){echo "selected";}?>>French</option>
						  <option value="gabonese" <?php if(isset($info) && $info->nationality=="gabonese"){echo "selected";}?>>Gabonese</option>
						  <option value="gambian" <?php if(isset($info) && $info->nationality=="gambian"){echo "selected";}?>>Gambian</option>
						  <option value="georgian" <?php if(isset($info) && $info->nationality=="georgian"){echo "selected";}?>>Georgian</option>
						  <option value="german" <?php if(isset($info) && $info->nationality=="german"){echo "selected";}?>>German</option>
						  <option value="ghanaian" <?php if(isset($info) && $info->nationality=="ghanaian"){echo "selected";}?>>Ghanaian</option>
						  <option value="greek" <?php if(isset($info) && $info->nationality=="greek"){echo "selected";}?>>Greek</option>
						  <option value="grenadian" <?php if(isset($info) && $info->nationality=="grenadian"){echo "selected";}?>>Grenadian</option>
						  <option value="guatemalan" <?php if(isset($info) && $info->nationality=="guatemalan"){echo "selected";}?>>Guatemalan</option>
						  <option value="guinea-bissauan" <?php if(isset($info) && $info->nationality=="guinea-bissauan"){echo "selected";}?>>Guinea-Bissauan</option>
						  <option value="guinean" <?php if(isset($info) && $info->nationality=="guinean"){echo "selected";}?>>Guinean</option>
						  <option value="guyanese" <?php if(isset($info) && $info->nationality=="guyanese"){echo "selected";}?>>Guyanese</option>
						  <option value="haitian" <?php if(isset($info) && $info->nationality=="haitian"){echo "selected";}?>>Haitian</option>
						  <option value="herzegovinian" <?php if(isset($info) && $info->nationality=="herzegovinian"){echo "selected";}?>>Herzegovinian</option>
						  <option value="honduran" <?php if(isset($info) && $info->nationality=="honduran"){echo "selected";}?>>Honduran</option>
						  <option value="hungarian" <?php if(isset($info) && $info->nationality=="hungarian"){echo "selected";}?>>Hungarian</option>
						  <option value="icelander" <?php if(isset($info) && $info->nationality=="icelander"){echo "selected";}?>>Icelander</option>
						  <option value="indian" <?php if(isset($info) && $info->nationality=="indian"){echo "selected";}?>>Indian</option>
						  <option value="indonesian" <?php if(isset($info) && $info->nationality=="indonesian"){echo "selected";}?>>Indonesian</option>
						  <option value="iranian" <?php if(isset($info) && $info->nationality=="iranian"){echo "selected";}?>>Iranian</option>
						  <option value="iraqi" <?php if(isset($info) && $info->nationality=="iraqi"){echo "selected";}?>>Iraqi</option>
						  <option value="irish" <?php if(isset($info) && $info->nationality=="irish"){echo "selected";}?>>Irish</option>
						  <option value="israeli" <?php if(isset($info) && $info->nationality=="israeli"){echo "selected";}?>>Israeli</option>
						  <option value="italian" <?php if(isset($info) && $info->nationality=="italian"){echo "selected";}?>>Italian</option>
						  <option value="ivorian" <?php if(isset($info) && $info->nationality=="ivorian"){echo "selected";}?>>Ivorian</option>
						  <option value="jamaican" <?php if(isset($info) && $info->nationality=="jamaican"){echo "selected";}?>>Jamaican</option>
						  <option value="japanese" <?php if(isset($info) && $info->nationality=="japanese"){echo "selected";}?>>Japanese</option>
						  <option value="jordanian" <?php if(isset($info) && $info->nationality=="jordanian"){echo "selected";}?>>Jordanian</option>
						  <option value="kazakhstani" <?php if(isset($info) && $info->nationality=="kazakhstani"){echo "selected";}?>>Kazakhstani</option>
						  <option value="kenyan" <?php if(isset($info) && $info->nationality=="kenyan"){echo "selected";}?>>Kenyan</option>
						  <option value="kittian and nevisian" <?php if(isset($info) && $info->nationality=="kittian and nevisian"){echo "selected";}?>>Kittian and Nevisian</option>
						  <option value="kuwaiti" <?php if(isset($info) && $info->nationality=="kuwaiti"){echo "selected";}?>>Kuwaiti</option>
						  <option value="kyrgyz" <?php if(isset($info) && $info->nationality=="kyrgyz"){echo "selected";}?>>Kyrgyz</option>
						  <option value="laotian" <?php if(isset($info) && $info->nationality=="laotian"){echo "selected";}?>>Laotian</option>
						  <option value="latvian" <?php if(isset($info) && $info->nationality=="latvian"){echo "selected";}?>>Latvian</option>
						  <option value="lebanese" <?php if(isset($info) && $info->nationality=="lebanese"){echo "selected";}?>>Lebanese</option>
						  <option value="liberian" <?php if(isset($info) && $info->nationality=="liberian"){echo "selected";}?>>Liberian</option>
						  <option value="libyan" <?php if(isset($info) && $info->nationality=="libyan"){echo "selected";}?>>Libyan</option>
						  <option value="liechtensteiner" <?php if(isset($info) && $info->nationality=="liechtensteiner"){echo "selected";}?>>Liechtensteiner</option>
						  <option value="lithuanian" <?php if(isset($info) && $info->nationality=="lithuanian"){echo "selected";}?>>Lithuanian</option>
						  <option value="luxembourger" <?php if(isset($info) && $info->nationality=="luxembourger"){echo "selected";}?>>Luxembourger</option>
						  <option value="macedonian" <?php if(isset($info) && $info->nationality=="macedonian"){echo "selected";}?>>Macedonian</option>
						  <option value="malagasy" <?php if(isset($info) && $info->nationality=="malagasy"){echo "selected";}?>>Malagasy</option>
						  <option value="malawian" <?php if(isset($info) && $info->nationality=="malawian"){echo "selected";}?>>Malawian</option>
						  <option value="malaysian" <?php if(isset($info) && $info->nationality=="malaysian"){echo "selected";}?>>Malaysian</option>
						  <option value="maldivan" <?php if(isset($info) && $info->nationality=="maldivan"){echo "selected";}?>>Maldivan</option>
						  <option value="malian" <?php if(isset($info) && $info->nationality=="afghan"){echo "selected";}?>>Malian</option>
						  <option value="maltese" <?php if(isset($info) && $info->nationality=="maltese"){echo "selected";}?>>Maltese</option>
						  <option value="marshallese" <?php if(isset($info) && $info->nationality=="marshallese"){echo "selected";}?>>Marshallese</option>
						  <option value="mauritanian" <?php if(isset($info) && $info->nationality=="mauritanian"){echo "selected";}?>>Mauritanian</option>
						  <option value="mauritian" <?php if(isset($info) && $info->nationality=="mauritian"){echo "selected";}?>>Mauritian</option>
						  <option value="mexican" <?php if(isset($info) && $info->nationality=="mexican"){echo "selected";}?>>Mexican</option>
						  <option value="micronesian" <?php if(isset($info) && $info->nationality=="micronesian"){echo "selected";}?>>Micronesian</option>
						  <option value="moldovan" <?php if(isset($info) && $info->nationality=="moldovan"){echo "selected";}?>>Moldovan</option>
						  <option value="monacan" <?php if(isset($info) && $info->nationality=="monacan"){echo "selected";}?>>Monacan</option>
						  <option value="mongolian" <?php if(isset($info) && $info->nationality=="mongolian"){echo "selected";}?>>Mongolian</option>
						  <option value="moroccan" <?php if(isset($info) && $info->nationality=="moroccan"){echo "selected";}?>>Moroccan</option>
						  <option value="mosotho" <?php if(isset($info) && $info->nationality=="mosotho"){echo "selected";}?>>Mosotho</option>
						  <option value="motswana" <?php if(isset($info) && $info->nationality=="motswana"){echo "selected";}?>>Motswana</option>
						  <option value="mozambican" <?php if(isset($info) && $info->nationality=="mozambican"){echo "selected";}?>>Mozambican</option>
						  <option value="namibian" <?php if(isset($info) && $info->nationality=="namibian"){echo "selected";}?>>Namibian</option>
						  <option value="nauruan" <?php if(isset($info) && $info->nationality=="nauruan"){echo "selected";}?>>Nauruan</option>
						  <option value="nepalese" <?php if(isset($info) && $info->nationality=="nepalese"){echo "selected";}?>>Nepalese</option>
						  <option value="new zealander" <?php if(isset($info) && $info->nationality=="new zealander"){echo "selected";}?>>New Zealander</option>
						  <option value="ni-vanuatu" <?php if(isset($info) && $info->nationality=="ni-vanuatu"){echo "selected";}?>>Ni-Vanuatu</option>
						  <option value="nicaraguan" <?php if(isset($info) && $info->nationality=="nicaraguan"){echo "selected";}?>>Nicaraguan</option>
						  <option value="nigerien" <?php if(isset($info) && $info->nationality=="nigerien"){echo "selected";}?>>Nigerien</option>
						  <option value="north korean" <?php if(isset($info) && $info->nationality=="north korean"){echo "selected";}?>>North Korean</option>
						  <option value="northern irish" <?php if(isset($info) && $info->nationality=="northern irish"){echo "selected";}?>>Northern Irish</option>
						  <option value="norwegian" <?php if(isset($info) && $info->nationality=="norwegian"){echo "selected";}?>>Norwegian</option>
						  <option value="omani" <?php if(isset($info) && $info->nationality=="omani"){echo "selected";}?>>Omani</option>
						  <option value="pakistani" <?php if(isset($info) && $info->nationality=="pakistani"){echo "selected";}?>>Pakistani</option>
						  <option value="palauan" <?php if(isset($info) && $info->nationality=="palauan"){echo "selected";}?>>Palauan</option>
						  <option value="panamanian" <?php if(isset($info) && $info->nationality=="panamanian"){echo "selected";}?>>Panamanian</option>
						  <option value="papua new guinean" <?php if(isset($info) && $info->nationality=="papua new guinean"){echo "selected";}?>>Papua New Guinean</option>
						  <option value="paraguayan" <?php if(isset($info) && $info->nationality=="paraguayan"){echo "selected";}?>>Paraguayan</option>
						  <option value="peruvian" <?php if(isset($info) && $info->nationality=="peruvian"){echo "selected";}?>>Peruvian</option>
						  <option value="polish" <?php if(isset($info) && $info->nationality=="polish"){echo "selected";}?>>Polish</option>
						  <option value="portuguese" <?php if(isset($info) && $info->nationality=="portuguese"){echo "selected";}?>>Portuguese</option>
						  <option value="qatari" <?php if(isset($info) && $info->nationality=="qatari"){echo "selected";}?>>Qatari</option>
						  <option value="romanian" <?php if(isset($info) && $info->nationality=="romanian"){echo "selected";}?>>Romanian</option>
						  <option value="russian" <?php if(isset($info) && $info->nationality=="russian"){echo "selected";}?>>Russian</option>
						  <option value="rwandan" <?php if(isset($info) && $info->nationality=="rwandan"){echo "selected";}?>>Rwandan</option>
						  <option value="saint lucian" <?php if(isset($info) && $info->nationality=="saint lucian"){echo "selected";}?>>Saint Lucian</option>
						  <option value="salvadoran" <?php if(isset($info) && $info->nationality=="salvadoran"){echo "selected";}?>>Salvadoran</option>
						  <option value="samoan" <?php if(isset($info) && $info->nationality=="samoan"){echo "selected";}?>>Samoan</option>
						  <option value="san marinese" <?php if(isset($info) && $info->nationality=="san marinese"){echo "selected";}?>>San Marinese</option>
						  <option value="sao tomean" <?php if(isset($info) && $info->nationality=="sao tomean"){echo "selected";}?>>Sao Tomean</option>
						  <option value="saudi" <?php if(isset($info) && $info->nationality=="saudi"){echo "selected";}?>>Saudi</option>
						  <option value="scottish" <?php if(isset($info) && $info->nationality=="scottish"){echo "selected";}?>>Scottish</option>
						  <option value="senegalese" <?php if(isset($info) && $info->nationality=="senegalese"){echo "selected";}?>>Senegalese</option>
						  <option value="serbian" <?php if(isset($info) && $info->nationality=="serbian"){echo "selected";}?>>Serbian</option>
						  <option value="seychellois" <?php if(isset($info) && $info->nationality=="seychellois"){echo "selected";}?>>Seychellois</option>
						  <option value="sierra leonean" <?php if(isset($info) && $info->nationality=="sierra leonean"){echo "selected";}?>>Sierra Leonean</option>
						  <option value="singaporean" <?php if(isset($info) && $info->nationality=="singaporean"){echo "selected";}?>>Singaporean</option>
						  <option value="slovakian" <?php if(isset($info) && $info->nationality=="slovakian"){echo "selected";}?>>Slovakian</option>
						  <option value="slovenian" <?php if(isset($info) && $info->nationality=="slovenian"){echo "selected";}?>>Slovenian</option>
						  <option value="solomon islander" <?php if(isset($info) && $info->nationality=="solomon islander"){echo "selected";}?>>Solomon Islander</option>
						  <option value="somali" <?php if(isset($info) && $info->nationality=="somali"){echo "selected";}?>>Somali</option>
						  <option value="south african" <?php if(isset($info) && $info->nationality=="south african"){echo "selected";}?>>South African</option>
						  <option value="south korean" <?php if(isset($info) && $info->nationality=="south korean"){echo "selected";}?>>South Korean</option>
						  <option value="spanish" <?php if(isset($info) && $info->nationality=="spanish"){echo "selected";}?>>Spanish</option>
						  <option value="sri lankan" <?php if(isset($info) && $info->nationality=="sri lankan"){echo "selected";}?>>Sri Lankan</option>
						  <option value="sudanese" <?php if(isset($info) && $info->nationality=="sudanese"){echo "selected";}?>>Sudanese</option>
						  <option value="surinamer" <?php if(isset($info) && $info->nationality=="surinamer"){echo "selected";}?>>Surinamer</option>
						  <option value="swazi" <?php if(isset($info) && $info->nationality=="swazi"){echo "selected";}?>>Swazi</option>
						  <option value="swedish" <?php if(isset($info) && $info->nationality=="swedish"){echo "selected";}?>>Swedish</option>
						  <option value="swiss" <?php if(isset($info) && $info->nationality=="swiss"){echo "selected";}?>>Swiss</option>
						  <option value="syrian" <?php if(isset($info) && $info->nationality=="syrian"){echo "selected";}?>>Syrian</option>
						  <option value="taiwanese" <?php if(isset($info) && $info->nationality=="taiwanese"){echo "selected";}?>>Taiwanese</option>
						  <option value="tajik" <?php if(isset($info) && $info->nationality=="tajik"){echo "selected";}?>>Tajik</option>
						  <option value="tanzanian" <?php if(isset($info) && $info->nationality=="tanzanian"){echo "selected";}?>>Tanzanian</option>
						  <option value="thai" <?php if(isset($info) && $info->nationality=="thai"){echo "selected";}?>>Thai</option>
						  <option value="togolese" <?php if(isset($info) && $info->nationality=="togolese"){echo "selected";}?>>Togolese</option>
						  <option value="tongan" <?php if(isset($info) && $info->nationality=="tongan"){echo "selected";}?>>Tongan</option>
						  <option value="trinidadian or tobagonian" <?php if(isset($info) && $info->nationality=="trinidadian or tobagonian"){echo "selected";}?>>Trinidadian or Tobagonian</option>
						  <option value="tunisian" <?php if(isset($info) && $info->nationality=="tunisian"){echo "selected";}?>>Tunisian</option>
						  <option value="turkish" <?php if(isset($info) && $info->nationality=="turkish"){echo "selected";}?>>Turkish</option>
						  <option value="tuvaluan" <?php if(isset($info) && $info->nationality=="tuvaluan"){echo "selected";}?>>Tuvaluan</option>
						  <option value="ugandan" <?php if(isset($info) && $info->nationality=="ugandan"){echo "selected";}?>>Ugandan</option>
						  <option value="ukrainian" <?php if(isset($info) && $info->nationality=="ukrainian"){echo "selected";}?>>Ukrainian</option>
						  <option value="uruguayan" <?php if(isset($info) && $info->nationality=="uruguayan"){echo "selected";}?>>Uruguayan</option>
						  <option value="uzbekistani" <?php if(isset($info) && $info->nationality=="uzbekistani"){echo "selected";}?>>Uzbekistani</option>
						  <option value="venezuelan" <?php if(isset($info) && $info->nationality=="venezuelan"){echo "selected";}?>>Venezuelan</option>
						  <option value="vietnamese" <?php if(isset($info) && $info->nationality=="vietnamese"){echo "selected";}?>>Vietnamese</option>
						  <option value="welsh" <?php if(isset($info) && $info->nationality=="welsh"){echo "selected";}?>>Welsh</option>
						  <option value="yemenite" <?php if(isset($info) && $info->nationality=="yemenite"){echo "selected";}?>>Yemenite</option>
						  <option value="zambian" <?php if(isset($info) && $info->nationality=="zambian"){echo "selected";}?>>Zambian</option>
						  <option value="zimbabwean" <?php if(isset($info) && $info->nationality=="zimbabwean"){echo "selected";}?>>Zimbabwean</option>
						</select><br>
							<div class="row">
								<div class="col-md-6">
									<label><i class="fa fa-files-o"></i> <b>Civil Status</b></label>
									<select type="text" name="status" class="form-control" required >
										<option <?php if(isset($info) && $info->status=="Single"){echo "selected";}?>>Single</option>
										<option <?php if(isset($info) && $info->status=="Married"){echo "selected";}?>>Married</option>
										<option <?php if(isset($info) && $info->status=="Widow"){echo "selected";}?>>Widow</option>
										<option <?php if(isset($info) && $info->status=="Widower"){echo "selected";}?>>Widower</option>
									</select>
								</div>
								<div class="col-md-6">
									<label><i class="fa fa-calendar"></i> <b>Date of Birth</b></label>
									<input type="date" name="bday" class="form-control" required value="<?php if(isset($info)){echo $info->birthdate;}?>">		
								</div>
							</div>	

							<div class="row">
								<div class="col-md-6">
									<label><i class="fa fa-sort-numeric-desc"></i> <b>Age</b></label>
									<input type="number" id="age" name="age" class="form-control" required  min="18" max="100" value="18" path="note" value="<?php if(isset($info)){echo $info->age;}?>">
								</div>
								<script>

								$("#age").keydown(function (evt) {
								     if (evt.keyCode === 8 && !elid) {
								        return false;
								    };
								});	
								</script>
								<div class="col-md-6">
								<label><i class="fa fa-male"></i><i class="fa fa-female"></i> <b>Gender</b></label>
									<select type="text" name="gender" class="form-control" required >
										<option <?php if(isset($info) && $info->gender=="Male"){echo "selected";}?>>Male</option>
										<option <?php if(isset($info) && $info->gender=="Female"){echo "selected";}?>>Female</option>
									</select>
								</div>
							</div>
							<br>
						<label><i class="fa fa-map-marker"></i> <b>Birthplace</b></label>
						<input type="text" name="birthplace" class="form-control" required value="<?php if(isset($info)){echo $info->born_in;}?>" >
						<br>
						
						<!-- <textarea type="text" name="home" class="form-control" required ></textarea> -->
						<div class="row">
							<div class="col-md-12">
								<label> <b>Home Address</b></label>
							</div>
							<div class="col-md-6">
								<label><i class="fa fa-home"></i> <b>City</b></label>
								<select name="homeCity" class="form-control" required >
									<option value="Alcantara">Alcantara</option>
									<option value="Alcoy">Alcoy</option>
									<option value="Alegria">Alegria</option>
									<option value="Aloguinsan">Aloguinsan</option>
									<option value="Argao">Argao</option>
									<option value="Asturias">Asturias</option>
									<option value="Badian">Badian</option>
									<option value="Balamban">Balamban</option>
									<option value="Bantayan">Bantayan</option>
									<option value="Barili">Barili</option>
									<option value="Bogo">Bogo</option>
									<option value="Boljoon">Boljoon</option>
									<option value="Borbon">Borbon</option>
									<option value="Carcar">Carcar</option>
									<option value="Carmen">Carmen</option>
									<option value="Catmon">Catmon</option>
									<option value="Cebu City">Cebu City</option>
									<option value="Compostela">Compostela</option>
									<option value="Consolacion">Consolacion</option>
									<option value="Cordova">Cordova</option>
									<option value="Daanbantayan">Daanbantayan</option>
									<option value="Dalaguete">Dalaguete</option>
									<option value="Danao City">Danao City</option>
									<option value="Dumanjug">Dumanjug</option>
									<option value="Ginatilan">Ginatilan</option>
									<option value="Lapu-Lapu City">Lapu-Lapu City</option>
									<option value="Liloan">Liloan</option>
									<option value="Madridejos">Madridejos</option>
									<option value="Malabuyoc">Malabuyoc</option>
									<option value="Mandaue City">Mandaue City</option>
									<option value="Medellin">Medellin</option>
									<option value="Minglanilla">Minglanilla</option>
									<option value="Moalboal">Moalboal</option>
									<option value="Naga">Naga</option>
									<option value="Oslob">Oslob</option>
									<option value="Pilar">Pilar</option>
									<option value="Pinamungahan">Pinamungahan</option>
									<option value="Poro">Poro</option>
									<option value="Ronda">Ronda</option>
									<option value="Samboan">Samboan</option>
									<option value="San Fernando">San Fernando</option>
									<option value="San Francisco">San Francisco</option>
									<option value="San Remigio">San Remigio</option>
									<option value="Santa Fe">Santa Fe</option>
									<option value="Santander">Santander</option>
									<option value="Sibonga">Sibonga</option>
									<option value="Sogod">Sogod</option>
									<option value="Tabogon">Tabogon</option>
									<option value="Tabuelan">Tabuelan</option>
									<option value="Talisay City">Talisay City</option>
									<option value="Tuburan">Tuburan</option>
									<option value="Tudela">Tudela</option>
									<option value="Toledo">Toledo</option>
								</select>		
							</div>
							<div class="col-md-6">
								<label><i class="fa fa-home"></i> <b>Baranggay</b></label>
								<input  type="text" name="homeBrgy" class="form-control" required ></textarea>
							</div>
							<div class="col-md-12">
								<label><i class="fa fa-home"></i> <b>Street</b></label>
								<input  type="text" name="homeStreet" class="form-control" required ></textarea>
							</div>
						</div>
						<br>
						<label><i class="fa fa-road"></i> <b>Provincial Address</b></label>
						<textarea type="text" name="province" class="form-control" required ></textarea><br>					
					</div>
				
					<div class="col-md-1 col-sm-0"></div> <!--Divider-->
					
					<div class="col-md-5 col-sm-12 well"><!--RIGHTSIDE-->
						<label><i class="fa fa-briefcase"></i> <b>Occupation</b></label>
						<input type="text" name="occupation" class="form-control" required value="<?php if(isset($info)){echo $info->occupation;}?>"><br>
						<label><i class="fa fa-male"></i> <b>Father's Name</b></label>
						<input type="text" name="father" class="form-control" required value="<?php if(isset($info)){echo $info->father;}?>">
						<label><i class="fa fa-female"></i> <b>Mother's Name</b></label>
						<input type="text" name="mother" class="form-control" required value="<?php if(isset($info)){echo $info->mother;}?>">
						<label><i class="fa fa-user"></i> <b>Relative's Name</b></label>
						<input type="text" name="relative" class="form-control" required value="<?php if(isset($info)){echo $info->relative;}?>">
						<label><i class="fa fa-refresh"></i> <b>Relation</b></label>
						<input type="text" name="relation" class="form-control" required value="<?php if(isset($info)){echo $info->relation;}?>">
						<!--<label><i class="fa fa-map-marker"></i> <b>Current Address</b></label>
						 <textarea type="text" name="address" class="form-control" required ></textarea><br> -->
						<br>
						<div class="row">
							<div class="col-md-12">
								<label> <b>Current Address</b></label>
							</div>
							<div class="col-md-6">
								<label><i class="fa fa-home"></i> <b>City</b></label>
								<select name="currentCity" class="form-control" required >
									<option value="Alcantara">Alcantara</option>
									<option value="Alcoy">Alcoy</option>
									<option value="Alegria">Alegria</option>
									<option value="Aloguinsan">Aloguinsan</option>
									<option value="Argao">Argao</option>
									<option value="Asturias">Asturias</option>
									<option value="Badian">Badian</option>
									<option value="Balamban">Balamban</option>
									<option value="Bantayan">Bantayan</option>
									<option value="Barili">Barili</option>
									<option value="Bogo">Bogo</option>
									<option value="Boljoon">Boljoon</option>
									<option value="Borbon">Borbon</option>
									<option value="Carcar">Carcar</option>
									<option value="Carmen">Carmen</option>
									<option value="Catmon">Catmon</option>
									<option value="Cebu City">Cebu City</option>
									<option value="Compostela">Compostela</option>
									<option value="Consolacion">Consolacion</option>
									<option value="Cordova">Cordova</option>
									<option value="Daanbantayan">Daanbantayan</option>
									<option value="Dalaguete">Dalaguete</option>
									<option value="Danao City">Danao City</option>
									<option value="Dumanjug">Dumanjug</option>
									<option value="Ginatilan">Ginatilan</option>
									<option value="Lapu-Lapu City">Lapu-Lapu City</option>
									<option value="Liloan">Liloan</option>
									<option value="Madridejos">Madridejos</option>
									<option value="Malabuyoc">Malabuyoc</option>
									<option value="Mandaue City">Mandaue City</option>
									<option value="Medellin">Medellin</option>
									<option value="Minglanilla">Minglanilla</option>
									<option value="Moalboal">Moalboal</option>
									<option value="Naga">Naga</option>
									<option value="Oslob">Oslob</option>
									<option value="Pilar">Pilar</option>
									<option value="Pinamungahan">Pinamungahan</option>
									<option value="Poro">Poro</option>
									<option value="Ronda">Ronda</option>
									<option value="Samboan">Samboan</option>
									<option value="San Fernando">San Fernando</option>
									<option value="San Francisco">San Francisco</option>
									<option value="San Remigio">San Remigio</option>
									<option value="Santa Fe">Santa Fe</option>
									<option value="Santander">Santander</option>
									<option value="Sibonga">Sibonga</option>
									<option value="Sogod">Sogod</option>
									<option value="Tabogon">Tabogon</option>
									<option value="Tabuelan">Tabuelan</option>
									<option value="Talisay City">Talisay City</option>
									<option value="Tuburan">Tuburan</option>
									<option value="Tudela">Tudela</option>
									<option value="Toledo">Toledo</option>
								</select>		
							</div>
							<div class="col-md-6">
								<label><i class="fa fa-home"></i> <b>Baranggay</b></label>
								<input  type="text" name="currentBrgy" class="form-control" required ></textarea>
							</div>
							<div class="col-md-12">
								<label><i class="fa fa-home"></i> <b>Street</b></label>
								<input  type="text" name="currentStreet" class="form-control" required ></textarea>
							</div>
						</div>
						<br>
						<button class="form-control btn btn-warning" type="submit">Submit Form</button>
					</div>
				</div><!--row-->
			</div>
			</div><!--container-->
	</div>		
	</div>
	</div>
	</div>
	</div>

		</section><!--end info-->
 <?php echo validation_errors(); ?>
		</form>	

</div><!--container top-->
<br>
       <?php $this->load->view('cpdrc/footer'); ?>
  </body>
</html>
