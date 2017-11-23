<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <div class="panel">
  

<div class="panel-body">
  <!--MENUS-->
    <div class="row" style="margin-top:20px;">

          <div class="row">
              <div class="col-md-8" align="left">
                <h1 class="text-warning">User Account Management</h1>
                <h5 class="text-muted">This would allow you to add and check the warden's activity in the system.</h5>
              </div>
              <div class="col-md-4" align="right" style="margin-top:30px;" id="button">
                <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
              </div>  
          </div>
          <br>
          <div class="row">
				<div class="bs-example">
					  <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
						  <li class="active"><a href="#user" data-toggle="tab"><i class="fa fa-users"></i> User Accounts</a></li>
              <li><a href="#add" data-toggle="tab"><i class="fa fa-user"></i> Add user account</a></li>
					  </ul>
					<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="user">
	                            <div class="col-lg-12">
	                            	<div id="title">
                									<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
                									  			<thead>
                									  				<tr>
                									          <?php
                									              //checking whether the user is a admin or not
                									              $id=$this->session->userdata('logged_in');  
                									          ?>
                									  					
                									  					<th>Username</th>
                									  					<th>First Name</th>
                									  					<th>Last Name</th>
                									  					<th>User Type</th>
                									  					<th>Account Status</th>
                														<th>&nbsp;</th>
                														<th>&nbsp;</th>
                									  				</tr>
                									  			</thead>
                									  			<tbody id="gridBody">
                									  	        <?php

                  												foreach ($user as $key) {
                  													//changing the type num to desc.
                	  													if ($key['type'] == 1) {
                	  														$type='Chief Warden';
                	  													}
                	  													else
                	  													{
                	  														$type='Warden';
                	  													}

                									  		         echo "<tr>";
                									  			       echo "<td>".$key['username']."</td>";
                									  			       echo "<td id='owner'>".$key['user_fname']."</td>";
                									  			       echo "<td>".$key['user_lname']."</td>";
                									  			       echo "<td>".$type."</td>";
                									  			       echo "<td>".$key['status']."</td>";

                	
                									  			    if($key['status'] == 'Active')
                									  			    {

                											                 echo "<td>";
                											                 echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['user_id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                        															 echo "</td>";
                        															 echo "<td>";
                															         echo "<a  class=\"col-lg-12 deactiveSingle btn btn-danger btn-xs\" id=\"{$key['user_id']}\" href=\"#\"><i class='fa fa-times-circle-o'></i> Deactivate</a> ";
                											                 echo "</td>";										  			    		


                									  			    }

                									  			    else
                									  			    {
                										                 echo "<td>";
                										                 echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['user_id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                        														 echo "</td>";
                        														 echo "<td>";
                										                 echo "<a  class=\"col-lg-12 activeSingle btn btn-warning btn-xs\" id=\"{$key['user_id']}\" href=\"#\"><i class='fa fa-check-square-o'></i> Activate</a> ";
                										                 echo "</td>";									  			    	
                									  			    }
                									  			echo "</tr>";
                												}    
                									  			
                									  	        ?>			
                									  			</tbody>
                									  		</table>
                            	       </div><!--id tittle-->	
	                            </div>                               
							</div>
							<div class="tab-pane fade in" id="add">
							<div class="container">
								<div class="row">
									<div class="row">
										<div class="col-md-5" align="center" id="append">
											<!--THIS IS FOR THE FORM-->
										</div>
									</div>
									<div class="col-lg-4 col-md-4" align="center">
							    		<div id="photodiv">
							    			<img src="<?=base_url()?>uploads/users/source/192x192.jpg" width="300" height="300"/>
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
											echo form_open('cpdrc/useraccounts', $attr);
										?>
										<div class="row">
											<div class="col-md-6">
												<label><b>User account type</b></label><select type="text" name="type" class="form-control" required >
													<option value="0">Please select a account type</option>
													<option value="Warden Administrator">Warden Administrator</option>
													<option value="Warden">Warden</option>
												</select>
												<br>
                        <label><i class="fa fa-info"></i> <b>First Name</b></label>
												<input type="text" name="fname" class="form-control" required >
                        <label><i class="fa fa-info"></i> <b>Last Name</b></label>
												<input type="text" name="lname" class="form-control" required >
                        <label><i class="fa fa-info"></i> <b>Middle Name</b></label>
												<input type="text" name="mi" class="form-control" required >
                        <label><i class="fa fa-home"></i> <b>Current Address</b></label>
												<input type="text" name="address" class="form-control" required ><br>
											</div>

											<div class="col-md-6">
												<label><i class="fa fa-phone"></i> <b>Contact number</b></label>
												<input type="text" name="contact" class="form-control" required ><br>
												<label><i class="fa fa-info"></i> <b>Username</b></label>
												<input type="text" name="username" class="form-control" required >
                        <label><i class="fa fa-lock"></i> <b>Password</b></label>
												<input type="password" name="password" class="form-control" placeholder="**********" required >
                        <label><i class="fa fa-lock"></i> <b>Confirm Password</b></label>
                        <input type="password" name="confirm" class="form-control" placeholder="**********" required ><br><br>
											</div>
										</div>
										<div class="row" align="right">
											<input type="submit" name="submit" class="btn btn-warning btn-lg form-control" value="Add user account" ><br><br>
											</form>
										</div>
									</div>
								</div>
							</div>
							</div>
					</div><!--tab content-->
				</div><!--bs example end-->
			</div>

    </div>
          <?php $this->load->view('cpdrc/footer'); ?>
</div>

</div>
</div>
      
</div>
</div>
</div>

       <div id="genModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="genLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="genLabel"></h4>
          </div>
          <div id="genText" class="modal-body text-center">
              <h4><i class='fa fa-spinner fa-spin'></i></h4>
              <p>Please wait.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="genModalButton" class="btn  btn-sm btn-danger">Save changes</button>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<link rel="stylesheet"  href="<?php echo base_url();?>datatables/css/DT_bootstrap.css"/>
<style>
table.table thead .sorting,
table.table thead .sorting_asc,
table.table thead .sorting_desc,
table.table thead .sorting_asc_disabled,
table.table thead .sorting_desc_disabled {
    cursor: pointer;
    *cursor: hand;
}
 
table.table thead .sorting { background: url('<?php echo base_url();?>datatables/images/sort_both.png') no-repeat center right; }
table.table thead .sorting_asc { background: url('<?php echo base_url();?>datatables/images/sort_asc.png') no-repeat center right; }
table.table thead .sorting_desc { background: url('<?php echo base_url();?>datatables/images/sort_desc.png') no-repeat center right; }
 
table.table thead .sorting_asc_disabled { background: url('<?php echo base_url();?>datatables/images/sort_asc_disabled.png') no-repeat center right; }
table.table thead .sorting_desc_disabled { background: url('<?php echo base_url();?>datatables/images/sort_desc_disabled.png') no-repeat center right; }
</style>

<script type="text/javascript" src="<?php echo base_url();?>datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>datatables/js/DT_bootstrap.js"></script>


<script>
  
/* Table initialisation */
$(document).ready(function() {
       var row;
	oTable=$('#theGrid').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );

      /* ACTIVE */   
        $('#theGrid').on('click',".activeSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                
               $("#genLabel").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText").html("You are about to return access to <b><em>"+owner+".</em></b> Press 'Activate' to proceed");
               $('#genModalButton').html("Activate");
               
               $('#genModalButton').addClass("addrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.addrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/useraccounts/setactive',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#haha').html(e).fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 
     /*END OF DELETION */   
     
     //VIEW
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/useraccounts/view',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title").html(e);
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/user'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle
       
     
      /* DELETION */   
        $('#theGrid').on('click',".deactiveSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                
               $("#genLabel").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText").html("You are about to remove access to <b><em>"+owner+".</em></b> Press 'Deactivate' to proceed");
               $('#genModalButton').html("Deactivate");
               
               $('#genModalButton').addClass("delrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/useraccounts/setdeactive',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#haha').html(e).fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 
     /*END OF DELETION */      
     
     /* END OF DETAILS */
     
     
     
     
    });
        
// nicifier


$(function(){
    $('#theGrid').each(function(){
        var datatable = $(this);
       //THE Lenght area
        var len = datatable.closest('.dataTables_wrapper').find('div[id$=_length] label');
        
        len.css('width','100%')
      
        //THE LABEL
        var label = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] label');
        label.css('float','right');
        label.css('clear','both');
      
        // SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search')
        search_input.addClass('form-control')
        search_input.css('width', '250px')
        search_input.attr('id','gridSearch')
 
        // SEARCH CLEAR - Use an Icon
       // var clear_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] a');
        //clear_input.html('<i class="fa fa-times-circle-o"></i>')
        //clear_input.css('margin-left', '5px')
 
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control')
 
        // LENGTH - Info adjust location
        //var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_info]');
        //length_sel.css('margin-top', '18px')
    });
    
     $("#gridSearch").keypress(function(e){
        
         if(e.keyCode==13 && $("#gridSearch").val().length >= 3)
         { alert("Database Search");
         }
        
     });
});

          $("#photoform").submit(function(){
              var formdata=new FormData($("#photoform")[0]);
              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
              $("#photodiv").html(loader);
                 $.ajax({data:formdata,cache: false,contentType: false,
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>cpdrc/upload/userpic',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                          }
                }); //end of ajax 
                return false;
          });
 
					     $(document).ready(function(){
						    $("#myform").submit(function(){
							    var formdata=$("#myform").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>cpdrc/useraccounts',
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

 

  </body>
</html>