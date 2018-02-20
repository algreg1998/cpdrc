<html>
    <div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class='panel-body'>
<section id="body">
			<div class="container">
				<div class="row" style="margin-top:20px;">
					<div class="col-md-7" align="left">
						<h1 class="text-warning">Step 3: Inmate Body Information</h1>
						<h5 class="text-muted">This would ask the Body build information of the inmate.</h5>
						<div class="progress" style="height:30px;">
						  <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
						    <span class>40% Complete</span>
						  </div>
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>You're now here!</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>40% Remaining</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						</div>
					</div>
					</div>
					<div class="row" style="margin-top:10px; ">
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
<!--										<p><b>Reference Form ID</b>: --><?php //echo $formid;?><!-- <br>-->
										<b>Inmate number</b>: <?php echo $id;?><br>
										<b>Inmate name</b>: <?php echo $name;?></p>	
									</div>
								</div>	
							</div>
						</div>
					</div>
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
						if($info!=null){
							echo form_open('cpdrc/editinmate/edit3', $attr);
						}else{
							echo form_open('cpdrc/addinmate/add3', $attr);
						}
						
					?>
				<div class="row" style='margin-left: 15px'>
					<div class="col-md-5 well">
							<div class="row">
								<input type="hidden" name="formid" value="<?=$formid;?>">
								<input type="hidden" name="id" value="<?=$id;?>">
								<input type="hidden" name="name" value="<?=$name;?>">
								<input type="hidden" name="filename" value="<?=$filename;?>">
								

								<div class="col-md-12">
									<label><i class="fa fa-arrows-v"></i> <b>Height</b></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                        	<div class="input-group">    
	                                            <input type="number" id="ft" min="1" autofocus class="form-control">
	                                            <span class="input-group-addon">ft</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        	<div class="input-group">												
	                                            <input type="number" id="in" min="1" class="form-control">
	                                            <span class="input-group-addon">in</span>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="input-group">
										<input readonly type="number" name="height" min="0" step="0.01" id="cm" class="form-control" required   value="<?php if($info!=null){echo $info->height;}?>">
										<span class="input-group-addon">cm</span>
									</div>

                                    <br>

<!--                                    <div class="row">-->
<!--                                        <div class="col-md-12">-->
<!--                                            <button id="convertHeight" type="button" class="btn btn-info">Convert Height</button>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <br>

                                </div>

								<div class="col-md-12">
									<label><i class="fa fa-tachometer"></i> <b>Weight</b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                        	<div class="input-group">
                                            	<input type="number" id="kg" min="1" class="form-control">
                                            	<span class="input-group-addon">kg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="input-group">
                                    	<input readonly type="number" name="weight" min="0" step="0.01" id="lbs" class="form-control" required value="<?php if($info!=null){echo $info->weight;}?>">
                                    	<span class="input-group-addon">lbs</span>
                                    </div>	

                                    <br>

<!--                                    <div class="row">-->
<!--                                        <div class="col-md-12">-->
<!--                                            <button id="convertWeight" type="button" class="btn btn-info">Convert Weight</button>-->
<!--                                        </div>-->
<!--                                    </div>-->

								</div>
							</div><br>
							<label><i class="fa fa-user-md"></i> <b>Body Build</b></label>
							<select name="build" class="form-control">
								<option value="Ectomorph" <?php if($info!=null && $info->build == "Ectomorph"){echo "selected";} ?>>Ectomorph</option>
								<option value="Mesomorph" <?php if($info!=null && $info->build == "Mesomorph"){echo "selected";} ?>>Mesomorph</option>
								<option value="Endomorph" <?php if($info!=null && $info->build == "Endomorph"){echo "selected";} ?>>Endomorph</option>
							</select>
							<!-- <input type="text" name="build" class="form-control"  oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" required value="<?php if($info!=null){echo $info->build;}?>"> -->
							<label><i class="fa fa-user"></i> <b>Body Complexion</b></label>
							<select  name="complexion" class="form-control" required>
								<option value="Light skin that always burns and never tans." <?php if($info!=null && $info->complexion == "Light skin that always burns and never tans."){echo "selected";}?>> Light skin that always burns and never tans.</option>
								<option value="Fair skin that usually burns, then tans." <?php if($info!=null && $info->complexion == "Fair skin that usually burns, then tans."){echo "selected";}?>> Fair skin that usually burns, then tans.</option>
								<option value="Medium skin that may burn, but tans well." <?php if($info!=null && $info->complexion == "Medium skin that may burn, but tans well."){echo "selected";}?>> Medium skin that may burn, but tans well.</option>
								<option value="Olive skin that rarely burns and tans well." <?php if($info!=null && $info->complexion == "Olive skin that rarely burns and tans well."){echo "selected";}?>> Olive skin that rarely burns and tans well.</option>
								<option value="Tan brown skin that very rarely burns and tans well." <?php if($info!=null && $info->complexion == "Tan brown skin that very rarely burns and tans well."){echo "selected";}?>> Tan brown skin that very rarely burns and tans well.</option>
								<option value="Black brown skin that never burns and tans very well." <?php if($info!=null && $info->complexion == "Black brown skin that never burns and tans very well."){echo "selected";}?>> Black brown skin that never burns and tans very well.</option>
							</select>
							<label><i class="fa fa-crosshairs"></i> <b>Hair</b></label>
							<select name="hair" class="form-control">
								<option value="Straight Hair" <?php if($info!=null && $info->hair == "Straight Hair"){echo "selected";}?> >Straight Hair</option>
								<option value="Wavy Hair" <?php if($info!=null && $info->hair == "Wavy Hair"){echo "selected";}?> >Wavy Hair</option>
								<option value="Curly Hair" <?php if($info!=null && $info->hair == "Curly Hair"){echo "selected";}?> >Curly Hair</option>
								<option value="Coily Hair" <?php if($info!=null && $info->hair == "Coily Hair"){echo "selected";}?> >Coily Hair</option>
							</select>
							<!-- <input type="text" name="hair" class="form-control"  oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" required value="<?php if($info!=null){echo $info->hair;}?>"> -->
							<label><i class="fa fa-info"></i> <b>Hair Peculiarities</b></label>
							<textarea rows="3" type="text" name="hairp" class="form-control" required ><?php if($info!=null){echo $info->hair_peculiarities;}?></textarea><br>
							<button class="form-control btn btn-warning" type="submit">Submit Form</button>
			    	</div>
			    	<div class="col-md-7">
			    		<div class="panel panel-success">
						  <div class="panel-heading"><b>Body build</b></div>
						  <div class="panel-body">
						  	<div class="row">
				    			<div class="col-md-4" ><div align="middle"><img  src="<?php echo base_url("assets/images/step 3/ectomorph.png") ?>" ></div>
				    				<h4 align="middle"><b>Ectomorph</b></h4>
				    				<ul>
				    					<li>Narrow hips and clavicles </li>
										<li>Small joints (wrist/ankles)</li>
										<li>Thin build</li>
										<li>Stringy muscle bellies </li>
										<li>Long limbs </li>
				    				</ul>
				    			</div>
				    			<div class="col-md-4"><div align="middle"><img align="middle" src="<?php echo base_url("assets/images/step 3/mesomorph.png") ?>" ></div>
				    				<h4 align="middle"><b>Mesomorph</b></h4>
				    				<ul>
				    					<li>Wide clavicles</li>
				    					<li>Narrow waist</li>
				    					<li>Thinner joints</li>
				    					<li>Long and round muscle bellies</li>
				    				</ul>
				    			</div>
				    			<div class="col-md-4"><div align="middle"><img src="<?php echo base_url("assets/images/step 3/endomorph.png") ?>" ></div>
				    				<h4 align="middle"><b>Endomorph</b></h4>
				    				<ul>
				    					<li>Blocky </li>
										<li>Thick rib cage</li>
										<li>Wide/thicker joints</li>
										<li>Hips as wide (or wider)</li>
										<li>than clavicles</li>
										<li>Shorter limbs</li>
				    				</ul>
				    			</div>
				    			<div class="col-md-12" align="right"><b>Source:</b>https://www.bodybuilding.com/fun/becker3.htm</div>
				    		</div>
						  </div>
						</div>
			    		<!-- <div class="panel panel-success">
						  <div class="panel-heading"><b>Hair</b></div>
						  <div class="panel-body">
						  	<div class="row">
				    			<div class="col-md-6" align="middle"><img src="<?php echo base_url("assets/images/step 3/ectomorph.png") ?>" ><h4><b>Straight Hair</b></h4></div>
				    			<div class="col-md-6" align="middle"><img src="<?php echo base_url("assets/images/step 3/mesomorph.png") ?>" ><h4><b>Wavy Hair</b></h4></div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-6" align="middle"><img src="<?php echo base_url("assets/images/step 3/ectomorph.png") ?>" ><h4><b>Curly Hair</b></h4></div>
				    			<div class="col-md-6" align="middle"><img src="<?php echo base_url("assets/images/step 3/mesomorph.png") ?>" ><h4><b>Coily Hair</b></h4></div>
				    		</div>
						  </div>
						</div> -->
			    		
			    	</div>
				</div>
			</div>
		</section>
    <?php echo validation_errors(); ?>
		</form>

</div><!--container top-->
</div>
</div>
</div>
</div>
</div>
<br>
       <?php $this->load->view('cpdrc/footer'); ?>
  </body>
</html>