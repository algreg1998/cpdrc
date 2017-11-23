<?php foreach ($inmate as $key) { ?>

	<div class="row">
		<div class="row">
			<div class="col-md-5" align="center" id="append">
				<!--APPEND FORM RES-->
			</div>
		</div>

		<div class="col-md-4" align="center">
			<div id="photodiv"><br><br>
			    <img src="<?=base_url()?>uploads/inmate/<?=$key['filename'];?>" width="50%" height="50%"/>
			</div>
			<form id="photoform" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$key['id'];?>">
				<input required type="file" name="userfile" id="photo">
				<button class="btn btn-warning btn-xs" style="margin-top:15px;" type="submit" id="uploadphoto">Change Photo</button>
			</form> 
		</div>
		<div class="col-md-8">
						<?php 
				 			$attr = array('class' => 'form_horizontal',
				 							'id' => 'myform');
							echo form_open('cpdrc/updateinmate', $attr);
						?>
			<div class="row">

				<div class="bs-example">
					  <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
						<li class="active"><a href="#inmate" data-toggle="tab"><i class="fa fa-user"></i> Inmate</a></li>
                        <li><a href="#personal" data-toggle="tab"><i class="fa fa-list"></i> Personal</a></li>
                        <li><a href="#family" data-toggle="tab"><i class="fa fa-home"></i> Family</a></li>
                        <li><a href="#body" data-toggle="tab"><i class="fa fa-user"></i> Body Build</a></li>
                        <li><a href="#case" data-toggle="tab"><i class="fa fa-file"></i> Latest Case</a></li>
					  </ul>

					<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="inmate">
	                            <div class="col-lg-6 col-md-6">
	                            	<input type="hidden" name="dbid" value="<?=$key['id']?>">
	                            	<div class="row">
	                            		<div class="col-md-6">
	                            			<label>Prisoner number</label>
	                            			<input type="text" name="id" class="form-control" value="<?=$key['id']?>" autofocus>		
	                            		</div>
	                            		<div class="col-md-6">
	                            			<label>Cell Number</label>
	                            			<input type="text" name="cell" class="form-control" value="<?=$key['cell']?>">
	                            		</div>
	                            	</div>
	                            	<label>Last Name</label>
	                            	<input type="text" name="lname" class="form-control" value="<?=$key['lname']?>">
	                            	<label>First Name</label>
	                            	<input type="text" name="fname" class="form-control" value="<?=$key['fname']?>">
	                            	<label>Middle Name</label>
	                            	<input type="text" name="mi" class="form-control" value="<?=$key['mi']?>">
	                            	<label>Alias</label>
	                            	<input type="text" name="alias" class="form-control" value="<?=$key['alias']?>">
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="personal">
							
	                            <div class="col-lg-6 col-md-6">
	                            	<label>Nationality</label>
	                            	<input type="text" name="nationality" class="form-control" value="<?=$key['nationality']?>">
	                            	<label>Occupation</label>
	                            	<input type="text" name="occupation" class="form-control" value="<?=$key['occupation']?>">
	                            	<label>Civil Status</label>
	                            	<input type="text" name="status" class="form-control" value="<?=$key['status']?>">
	                            	<div class="row">
	                            		<div class="col-md-6">
	                            			<label>Age</label>
	                            			<input type="text" name="age" class="form-control" value="<?=$key['age']?>">
	                            		</div>
	                            		<div class="col-md-6">
	                            			<label>Gender</label>
	                            			<input type="text" name="gender" class="form-control" value="<?=$key['gender']?>">
	                            		</div>
	                            	</div>
	                            </div>
	                            <div class="col-lg-6 col-md-6">
	                            	<label>Birthdate</label>
	                            	<input type="date" name="bday" class="form-control" value="<?=$key['bday']?>">
	                            	<label>Birthplace</label>
	                            	<input type="text" name="birthplace" class="form-control" value="<?=$key['born']?>">
	                            	<label>City Address</label>
	                            	<input type="text" name="home" class="form-control" value="<?=$key['home']?>">
	                            	<label>Provincial Address</label>
	                            	<input type="text" name="province" class="form-control" value="<?=$key['province']?>">
	                            </div>
							</div>
							<div class="tab-pane fade in" id="family">
	                            <div class="col-lg-6 col-md-6">
									<label>Father's Name</label>
	                            	<input type="text" name="father" class="form-control" value="<?=$key['father']?>">
	                            	<label>Mother's Name</label>
	                            	<input type="text" name="mother" class="form-control" value="<?=$key['mother']?>">
	                            	<label>Relative's Name</label>
	                            	<input type="text" name="relative" class="form-control" value="<?=$key['relative']?>">
	                            	<label>Relation</label>
	                            	<input type="text" name="relation" class="form-control" value="<?=$key['relation']?>">
	                            	<label>Current Address</label>
	                            	<input type="text" name="address" class="form-control" value="<?=$key['address']?>">
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="body">
	                            <div class="col-lg-6 col-md-6">
	                            	<div class="row">
	                            		<div class="col-md-6">
	                            			<label>Weight</label>
	                            			<input type="text" name="weight" class="form-control" value="<?=$key['weight']?> lbs.">
	                            		</div>
	                            		<div class="col-md-6">
	                            			<label>Height</label>
	                            			<input type="text" name="height" class="form-control" value="<?=$key['height']?> cms.">
	                            		</div>
	                            	</div>
	                            	<label>Body Type</label>
	                            	<input type="text" name="build" class="form-control" value="<?=$key['build']?>">
	                            	<label>Body Complexion</label>
	                            	<input type="text" name="complexion" class="form-control" value="<?=$key['complexion']?>">
	                            	<label>Hair Type</label>
	                            	<input type="text" name="hair" class="form-control" value="<?=$key['hair']?>">
	                            	<label>Hair Peculiarities</label>
	                            	<input type="text" name="hairp" class="form-control" value="<?=$key['hairp']?>">
<?php } ?>
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="case">
	                            <div class="col-lg-12 col-md-12">
	                            	<div id="tableapp">
							  		<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
							  			<thead>
							  				<tr>
									          <?php
									              //checking whether the user is a admin or not
									              $id=$this->session->userdata('logged_in');  
									          ?>
							  					<th>Case No.</th>
							  					<th>Date of Remand</th>
							  					<th>Court Name</th>
							  					<th>Crime</th>
							  					<th>Sentence</th>
							  					<th>&nbsp;</th>
							  				</tr>
							  			</thead>
							  			<tbody id="gridBody">
							  	        <?php

							  	          foreach($case as $key2)  
							  	          {    
							  		         echo "<tr>";
							  			       echo "<td id='owner'>".$key2['case_no']."</td>";
							  			       echo "<td>".$key2['confine']."</td>";
							  			       echo "<td>".$key2['court']."</td>";
							  			       echo "<td>".$key2['crime']."</td>";
							  			       echo "<td>".$key2['sentence']."</td>";
							                   echo "<td>";
							                 		echo "<a  class=\"col-lg-12 editSingle btn btn-warning btn-xs\" id=\"{$key2['cid']}\" href=\"#\"><i class='fa fa-edit'></i> Edit</a> ";
							                   echo "</td>"; 
							  		       echo "</tr>";
							  	          }
							  		
							  	        ?>			
							  			</tbody>
							  		</table>
							  		</div>
	                            </div>                               
							</div>
					</div><!--END OF TAB CONTENT-->
				</div><!--DIV BS-EXAMPLE-->

			</div>
			<div class="row" style="margin-top:30px;" align="center">
				<div class="col-md-12" id="but">
	           		<input type="submit" name="submit" class="btn btn-warning btn-lg form-control" value="Submit Changes">
	           		</form>
	           	</div>
	        </div>
		</div>
	</div>


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
	});
        
     
 });

      //EDITING 
        $('#theGrid').on('click','.editSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");

          $("#tableapp").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>/cpdrc/manageinmate/editing',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                 $("#tableapp").html(e);
                                                 $("#h1").html("Update Case information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/manageinmate'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of editSingle*/

        
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
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>/cpdrc/upload/changepic',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                          }
                }); //end of ajax 
                return false;
          });


</script>