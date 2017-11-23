							<div class="row">
								<div class="col-md-5" id="append" align="center">
									
								</div>
							</div>
							<div class="row">
									<div class="col-lg-4 col-md-4" align="center">
							    		<div id="photodiv">
							    			<img src="<?=base_url()?>uploads/visitors/source/192x192.jpg" width="300" height="300"/>
							    		</div>
							    			<form id="photoform" enctype="multipart/form-data">
											  <input  required type="file" name="userfile" id="photo">
											  <button class="btn btn-warning btn-xs" style="margin-top:15px;" type="submit" id="uploadphoto">Upload Photo</button>
											</form> 									
									</div>
									<div class="col-lg-6 col-md-6">
										<?php 
									 		$attr = array('class' => 'form_horizontal',
									 						'id' => 'myform');
											echo form_open('cpdrc/authvisit', $attr);
										?>
										<div class="row">
											<div class="col-md-8">
												<input type="hidden" name="id" value="<?=$id?>">
												<label><i class="fa fa-user"></i> <b>Full Name</b></label>
												<input type="text" name="fullname" class="form-control" required >
												<label><i class="fa fa-info"></i> <b>Relation</b></label>
												<input type="text" name="relation" class="form-control" required >
												<label><i class="fa fa-home"></i> <b>Address</b></label>
												<textarea rows="2" type="text" name="address" class="form-control" required ></textarea>
												<label><i class="fa fa-phone"></i> <b>Contact Number</b></label>
												<input type="text" name="contact" class="form-control" required ><br>
											
												<input type="submit" name="submit" class="btn btn-warning btn-lg form-control" value="Add user account" ><br><br>
											</form>
											</div>
										</div>
									</div>
							</div>

						<script>
				          $("#photoform").submit(function(){
				              var formdata=new FormData($("#photoform")[0]);
				              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
				              $("#photodiv").html(loader);
				                 $.ajax({data:formdata,cache: false,contentType: false,
				                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>cpdrc/upload/visitor',
				                                          success:function(e){                 
				                                              $("#photodiv").html(e);
				                                          }
				                }); //end of ajax 
				                return false;
				          });

					     $(document).ready(function(){
						    $("#myform").submit(function(){
							    var formdata=$("#myform").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>cpdrc/authvisit',
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