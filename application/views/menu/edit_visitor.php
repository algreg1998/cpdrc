<?php foreach ($edit as $key) { ?>
<div class="container">
	<div class="row">

					<div class="row">
						<div class="col-md-5" align="center" id="append">
							<!--APPEND FORM RES-->
						</div>
					</div>

					<div class="col-md-4" align="center">
						<div id="photodiv">
						    <img src="<?=base_url()?>uploads/visitors/<?=$key['filename'];?>" width="50%" height="50%"/>
						</div>
						<form id="photoform" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?=$key['id'];?>">
							<input required type="file" name="userfile" id="photo">
							<button class="btn btn-warning btn-xs" style="margin-top:15px;" type="submit" id="uploadphoto">Change Photo</button>
						</form> 
					</div>
					<div class="col-md-4">
					  	<?php 
				 			$attr = array('class' => 'form_horizontal',
				 							'id' => 'myform');
							echo form_open('cpdrc/authvisit/update', $attr);
						?>

	                            	<input type="hidden" name="dbid" value="<?=$key['id']?>">

	                            	<label><b>Full Name</b></label>
	                            	<input type="text" name="fullname" class="form-control" value="<?=$key['full_name']?>">
	                            	<label><b>Relation</b></label>
	                            	<input type="text" name="relation" class="form-control" value="<?=$key['relation']?>">
	                            	<label><b>Current Address</b></label>
	                            	<input type="text" name="address" class="form-control" value="<?=$key['address']?>">
	                            	<label><b>Contact Number</b></label>
	                            	<input type="text" name="contact" class="form-control" value="<?=$key['contact_number']?>"><br>
	                          		<input type="submit" name="submit" class="btn btn-warning btn-lg form-control" value="Submit Changes">
		           					</form>
       
					</div>
	</div>
</div>
	<script>
          $("#photoform").submit(function(){
              var formdata=new FormData($("#photoform")[0]);
              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
              $("#photodiv").html(loader);
                 $.ajax({data:formdata,cache: false,contentType: false,
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>/cpdrc/upload/changeVisitorPic',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                          }
                }); //end of ajax 
                return false;
          });

					     $(document).ready(function(){
						    $("#myform").submit(function(){
							    var formdata=$("#myform").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>/cpdrc/authvisit/update',
							            type:"POST",
										data: formdata,
										success: function(e){
										  $("#append").html(e);
										}
							   });
							   
							  return false;
							}); 
						 
						 });        
       </script>
<?php } ?>