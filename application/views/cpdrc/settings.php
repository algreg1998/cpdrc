<!DOCTYPE html>
<html>
    <?php
      $this->load->view('cpdrc/head');
      foreach ($user as $key) {
    ?>

			<div class="container" style="margin-top:20px;">
				<div class="row">
					<div class="col-md-8" align="left">
						<h1 class="text-warning">Account Settings</h1>
						<h5 class="text-muted">This allows you to update your profile and password.</h5>
					</div>
					<div class="col-md-4" align="right" style="margin-top:30px;">
						<a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4" align="center">
					<p class="text-warning"><i class="fa fa-upload"></i> Change Profile picture</p>
						<div id="photodiv">
						    <img src="<?=base_url()?>uploads/users/<?=$key['filename'];?>" width="50%" height="50%"/>
						</div>
						<form id="photoform" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?=$key['user_id'];?>">
							<input required type="file" name="userfile" id="photo">
							<button class="btn btn-warning btn-xs" style="margin-top:15px;" type="submit" id="uploadphoto">Change Photo</button>
						</form> 						
					</div>

	                            <div class="col-md-4" id="append">
	                            	<?php 
							 			$attr = array('class' => 'form_horizontal',
							 							'id' => 'myform');
										echo form_open('cpdrc/userupdate', $attr);
									?>
									<p class="text-warning"><i class="fa fa-list"></i> Update User Information</p>
	                            	<input type="hidden" name="dbid" value="<?=$key['user_id']?>">
	                            	<label><i class="fa fa-info"></i> <b>Username</b></label>
	                            	<input type="text" name="username" class="form-control" value="<?=$key['username']?>" autofocus>
	                            	<label><i class="fa fa-info"></i> <b>Last Name</b></label>
	                            	<input type="text" name="user_lname" class="form-control" value="<?=$key['user_lname']?>">
	                            	<label><i class="fa fa-info"></i> <b>First Name</b></label>
	                            	<input type="text" name="user_fname" class="form-control" value="<?=$key['user_fname']?>">
	                            	<label><i class="fa fa-info"></i> <b>Middle Name</b></label>
	                            	<input type="text" name="user_mi" class="form-control" value="<?=$key['user_mi']?>">
	                            	<label><i class="fa fa-home"></i> <b>Current Address</b></label>
	                            	<input type="text" name="user_add" class="form-control" value="<?=$key['user_add']?>">
	                            	<label><i class="fa fa-phone"></i> <b>Contact number</b></label>
	                            	<input type="text" name="user_contact" class="form-control" value="<?=$key['user_contact']?>"><br>
	                            	<input type="submit" name="submit" class="btn btn-warning btn-xs form-control" value="Submit Changes">
	                            	</form> 
	                            </div>

	                            <div class="col-md-4" id="append2">
	                            	<?php 
							 			$attr = array('class' => 'form_horizontal',
							 							'id' => 'myform2');
										echo form_open('cpdrc/userupdate/changepass', $attr);
									?>	                            
	                            	<p class="text-warning"><i class="fa fa-refresh"></i> Reset your password</p>
	                            	<input type="hidden" name="dbid" value="<?=$key['user_id']?>">
	                            	<label><i class="fa fa-lock"></i> <b>New password</b></label>
	                            	<input type="password" name="password" class="form-control" placeholder="***********" required>
	                            	<label><i class="fa fa-check"></i> <b>Confirm password</b></label>
	                            	<input type="password" name="confirm" class="form-control" placeholder="***********" required><br>
	                            	<input type="submit" name="submit" class="btn btn-warning btn-xs form-control" value="Reset password">
	                            </div>
	                    
				</div>

			</div>

		<script>
          $("#photoform").submit(function(){
              var formdata=new FormData($("#photoform")[0]);
              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
              $("#photodiv").html(loader);
                 $.ajax({data:formdata,cache: false,contentType: false,
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>/cpdrc/upload/changeuserpic',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                          }
                }); //end of ajax 
                return false;
          });

					     $(document).ready(function(){
						    $("#myform").submit(function(){
							    var formdata=$("#myform").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>/cpdrc/userupdate',
							            type:"POST",
										data: formdata,
										success: function(e){
										  $("#append").html(e);
										}
							   });
							   
							  return false;
							}); 
						 
						 });

					     $(document).ready(function(){
						    $("#myform2").submit(function(){
							    var formdata=$("#myform2").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>/cpdrc/userupdate/changepass',
							            type:"POST",
										data: formdata,
										success: function(e){
										  $("#append2").html(e);
										}
							   });
							   
							  return false;
							}); 
						 
						 });  						         
        </script>	

	<?php
		}
      $this->load->view('cpdrc/footer');
    ?>
  </body>
</html>    