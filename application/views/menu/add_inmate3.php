<!DOCTYPE html>
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
										<p><b>Reference Form ID</b>: <?php echo $formid;?> <br>
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
						if(isset($info)){
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
								

								<div class="col-md-6">
									<label><i class="fa fa-arrows-v"></i> <b>Height in centimeters</b></label>
									<input type="number" name="height" class="form-control" required autofocus  value="<?php if(isset($info)){echo $info->height;}?>">
								</div>
								<div class="col-md-6">
									<label><i class="fa fa-tachometer"></i> <b>Weight in pounds</b></label>
									<input type="number" name="weight" class="form-control" required value="<?php if(isset($info)){echo $info->weight;}?>">		
								</div>
							</div><br>
							<label><i class="fa fa-user-md"></i> <b>Body Build</b></label>
							<input type="text" name="build" class="form-control" required value="<?php if(isset($info)){echo $info->build;}?>">
							<label><i class="fa fa-user"></i> <b>Body Complexion</b></label>
							<textarea rows="3" type="text" name="complexion" class="form-control" required ><?php if(isset($info)){echo $info->complexion;}?></textarea>
							<label><i class="fa fa-crosshairs"></i> <b>Hair</b></label>
							<input type="text" name="hair" class="form-control" required value="<?php if(isset($info)){echo $info->hair;}?>">
							<label><i class="fa fa-info"></i> <b>Hair Peculiarities</b></label>
							<textarea rows="3" type="text" name="hairp" class="form-control" required ><?php if(isset($info)){echo $info->hair_peculiarities;}?></textarea><br>
							<button class="form-control btn btn-warning" type="submit">Submit Form</button>

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