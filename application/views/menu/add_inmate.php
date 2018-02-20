<!DOCTYPE html>
<html>
		<!--FIRST PART OF ADDING A INMATE-->
		<!-- <section id="personal"> -->
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class='panel-body'>
				<div class="row">
					<div class="col-md-12" align="left">
						<h1 class="text-warning">Step 1: Inmate Basic Information</h1>
						<h5 class="text-muted">Basic information of an inmate.</h5>
						<div class="progress" style="height:30px;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>You're here!</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>80% Remaining</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    
						  </div>
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-5">
					<?php
					if(isset($error))
					{
						echo "<div class='alert alert-danger alert-dismissible' align='center'> <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>$error</div>";
					}
					?>
					</div>
				</div>

			    <div class="row">
			    	<div class="col-md-6" align="left">
			    		<h5 align="center" class="text-muted"><i class="fa fa-lock"></i> All fields are required.</h5>
			    		<div id="photodiv">
			    			<img src="<?=base_url()?>uploads/inmate/source/192x192.jpg" width="300" height="300"/>
			    		</div>
			    			<form id="photoform" enctype="multipart/form-data">
							  <input  required type="file" name="userfile" id="photo">
							  <button class="btn btn-warning btn-xs" style="margin-top:15px;" type="submit" id="uploadphoto">Upload Photo</button>
							</form> 
			    	</div>
					<?php 
				 		$attr = array('class' => 'form_horizontal');
						echo form_open('cpdrc/
						addinmate', $attr);
					?>
			    	<div class="col-md-6 well">
			   	
			    		<div class="form-group">
			    			<div style='display:none' class="row">
			    				<div class="col-md-6">
			    					<label><i class="fa fa-list-alt"></i> <b>Reference Form ID</b></label>
			    					<input type="text" name="formid" class="form-control" autofocus>
			    				</div>
			    			</div>
				    		<div class="row">
				    			<div class="col-md-6">
				    				<label><i class="fa fa-user"></i> <b>Inmate Number</b></label>
	                    			<input type="text" name="id" class="form-control" required>
	                    		</div>		
	                    		<div class="col-md-6">
	                    			<label><i class="fa fa-home"></i> <b>Cell Number</b></label>
	                    			<!-- <input type="text" name="cell" class="form-control" required> -->
	                    			<select name="cell" class="form-control" required>
	                    			<?php
	                    				foreach ($cells as $cell) {
	                    					
	                    				?>

	                    					<option               			value="<?php echo $cell['cellId'];?>" title="<?php echo $cell['total']." of ".$cell['cellCap']; ?>"><?php echo $cell['cellNumber']; ?></option>
	                    				<?php
	                    				}
	                    			?>
	                    			</select>
	                    				                    			
	                    		</div>
	                    	</div><br>
	                    		<label><i class="fa fa-info"></i> <b>First Name</b></label>	
                    			<input type="text" name="fname" class="form-control" pattern="([A-zA-Z\s]){2,}"   oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" required >
                    			<label><i class="fa fa-info"></i> <b>Last Name</b></label>
                    			<input type="text" name="lname" class="form-control" pattern="([A-zA-Z\s]){2,}"   oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" required >
                    			<label><i class="fa fa-info"></i> <b>Middle Name</b></label>
	                    		<input type="text" name="mi" class="form-control" pattern="([A-zA-Z\s]){2,}"   oninvalid="setCustomValidity('Please enter alphabets only')" onchange="try{setCustomValidity('')}catch(e){}" required >
	                    		<label><i class="fa fa-info"></i> <b>Aliases</b></label>
	                    		<textarea rows="3" type="text" name="alias" class="form-control" pattern="[a-zA-Z]+" required ></textarea><br>
	                    		<button class="form-control btn btn-warning" type="submit" id="submitForm">Submit Form</button>
                		</div>
			    	</div>
			    </div><!--row-->
			</div><!--container-->
			</div>
			</div>
			</div>
			</div>
		<!-- </section>end -->
<?php echo validation_errors(); ?>
		</form>
 	

	
		
</div><!--container top-->
<!--        --><?php
//            foreach($js_bottom as $js)
//            {
//                echo $js;
//            }
//
//        ?>
		<script>
          $("#photoform").submit(function(){
              var formdata=new FormData($("#photoform")[0]);
              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
              $("#photodiv").html(loader);
                 $.ajax({data:formdata,cache: false,contentType: false,
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>cpdrc/upload',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                              if($("#error").val() == 1)
                                              {
                                                  $("#photo").show();
                                              }
                                          }
                }); //end of ajax 
                return false;
          });
        
        </script>
       <?php $this->load->view('cpdrc/footer'); ?>
  </body>
</html>