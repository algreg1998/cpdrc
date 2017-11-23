<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <div class="panel">

<div class="panel-body">
    <div class="row" style="margin-top:20px;">

          <div class="row">
              <div class="col-md-8" align="left">
                <h1 class="text-warning" id="h1">Inmate Archive Management</h1>
                <h5 class="text-muted" id="desc">This would display all Pending, Transfered and Released status of inmates from the database.</h5>
              </div>
              <div class="col-md-4" align="right" style="margin-top:30px;" id="button">
                <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
              </div>  
          </div>
          <br>
    </div>

    <div class="row" id="theform">
		<div class="bs-example">
				<ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
					<li class="active">
            <a href="#pending" data-toggle="tab"><i class="fa fa-files-o"></i> Status: Active</a>
          </li>
          <li>
            <a href="#transfer" data-toggle="tab"><i class="fa fa-map-marker"></i> Status: Transfered</a>
          </li>
          <li>
            <a href="#released" data-toggle="tab"><i class="fa fa-book"></i> Status: Released</a>
          </li>
				</ul>
        <?php $user = $this->session->userdata('logged_in');  ?>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="pending">
	                    <div class="col-lg-12 col-md-12">
							         <div id="title">
                				<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
                					<thead>
                						<tr>				  					
                							<th>Inmate number</th>
                							<th>Full Name</th>
                              <?php
                                if($user['type'] == "Warden Administrator"){
                                    echo "<th>&nbsp;</th>";
                                    // echo "<th>&nbsp;</th>";
                                    echo "<th>&nbsp;</th>";
                                    echo "<th>&nbsp;</th>";
                                 }
                                 else{
                                    echo "<th>&nbsp;</th>";
                                 }
                              ?>
                						</tr>
                					</thead>
                					<tbody id="gridBody">
                						<?php
                  							foreach ($datapen as $key) {
                                  
                								echo "<tr id=".$key['id'].">";
                									echo "<td>".$key['id']."</td>";
                									echo "<td id='owner3'>".$key['lname'].", ".$key['fname']." ".$key['mi']."</td>";
                                  if($user['type'] == "Warden Administrator"){
  				                          echo "<td>";
  				                            echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
  				                          echo "</td>";
  				                          // echo "<td>";
  				                          //   echo "<a  class=\"col-lg-12 active2 btn btn-info btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-check-circle'></i> Set Active</a> ";
  				                          // echo "</td>";
                  									echo "<td>";
                  										echo "<a  class=\"col-lg-12 setTransfer btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-map-marker'></i> Set Transfer</a> ";
                          					echo "</td>";
                          					echo "<td>";
                  										echo "<a  class=\"col-lg-12 setReleased btn btn-danger btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-edit'></i> Set Release</a> ";
                          					echo "</td>";
                                  }
                                  else{
                                    echo "<td>";
                                      echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                                    echo "</td>";
                                  }
                								echo "</tr>";
                								}    
               							?>			
                					</tbody>
                				</table>
                           	</div>
	                    </div>
	        </div> 
	        <div class="tab-pane fade in" id="transfer">
	          <div class="col-lg-12 col-md-12">
							     <div id="title2">
                				<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid2">
                					<thead>
                						<tr>				  					
                							<th>Inmate number</th>
                							<th>Full Name</th>
                							<?php
                                if($user['type'] == "Warden Administrator"){
                                  echo "<th>&nbsp;</th>";
                                  echo "<th>&nbsp;</th>";
                                }
                                else{
                                  echo "<th>&nbsp;</th>";
                                }
                              ?>
                						</tr>
                					</thead>
                					<tbody id="gridBody2">
                						<?php
                  							foreach ($transfer as $key) {
                								echo "<tr>";
                									echo "<td>".$key['id']."</td>";
                									echo "<td id='owner'>".$key['lname'].", ".$key['fname']." ".$key['mi']."</td>";
                                  if($user['type'] == "Warden Administrator"){
                  									echo "<td>";
                  										echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                          					echo "</td>";
                          					echo "<td>";
                  										echo "<a  class=\"col-lg-12 setActive btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-check-circle'></i> Set Active</a> ";
                          					echo "</td>";
                                  }
                                  else
                                  {
                                    echo "<td>";
                                      echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
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
	        <div class="tab-pane fade in" id="released">
	         <div class="col-lg-12 col-md-12">
							<div id="title3">
                				<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid3">
                					<thead>
                						<tr>				  					
                							<th>Inmate number</th>
                							<th>Full Name</th>
                							<?php
                                if($user['type'] == "Warden Administrator"){
                                  echo "<th>&nbsp;</th>";
                                  echo "<th>&nbsp;</th>";
                                }
                                else{
                                  echo "<th>&nbsp;</th>";
                                }
                              ?>
                						</tr>
                					</thead>
                					<tbody id="gridBody3">
                						<?php
                  							foreach ($released as $key) {
                								echo "<tr>";
                									echo "<td>".$key['id']."</td>";
                									echo "<td id='owner2'>".$key['lname'].", ".$key['fname']." ".$key['mi']."</td>";

                                  if($user['type'] == "Warden Administrator"){
                  									echo "<td>";
                  										echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                          					echo "</td>";
                          					echo "<td>";
                  										echo "<a  class=\"col-lg-12 setActive btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-check-circle'></i> Set Active</a> ";
                          					echo "</td>";
                                  }
                                  else{
                                    echo "<td>";
                                      echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
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
	         </div>
	    </div>
    </div>
           <?php $this->load->view('cpdrc/footer'); ?>
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
          <div id="genText" class="modal-body">
              <div class="row">
                <div class="col-md-12">
              <?php
                $attr = array('class' => 'form_horizontal',
                              'id' => 'myform' );
                echo form_open('cpdrc/inmatearchives', $attr);
              ?>  
                    <div id="append"></div>
                    <div class="row col-md-6">
                      <label><i class="fa fa-calendar"></i> <b>Date of Transfer</b></label>
                      <input type="date" name="date" class="form-control" required autofocus><br>
                    </div>
                    <div class="row col-md-8">
                      <label><i class="fa fa-location-arrow"></i> <b>Name of the Detention Facility</b></label>
                      <input type="text" name="transferto" class="form-control" required>
                      <label><i class="fa fa-info"></i> <b>Information</b></label>
                      <textarea rows="4" type="text" name="info" class="form-control" required></textarea>
                    </div>
                </div>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" id="genModalButton" class="btn btn-sm btn-warning" value="Save changes">
            </form>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--FOR THE TRANSFER DATATABLES-->
       <div id="genModal2" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="genLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="genLabel2"></h4>
          </div>
          <div id="genText2" class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" id="genModalButton2" class="btn btn-sm btn-warning">Set Active</button> 
            </form>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    

       <div id="genModal3" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="genLabel3" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="genLabel3"></h4>
          </div>
          <div id="genText3" class="modal-body">
              <div class="row">
                <div class="col-md-12">
              <?php
                $attr = array('class' => 'form_horizontal',
                              'id' => 'myform' );
                echo form_open('cpdrc/inmatearchives/released', $attr);
              ?>  
                    <div id="append3"></div>
                    <div class="row col-md-6">
                      <label><i class="fa fa-calendar"></i> <b>Date of Release</b></label>
                      <input type="date" name="date" class="form-control" required autofocus><br>
                    
                      <label><i class="fa fa-list-alt"></i> <b>Type of Release</b></label>
                      <select type="text" name="type" class="form-control" required >
                        <option value="SERVED">Served</option>
                        <option value="PROBATION">Probation</option>
                        <option value="SHIPPED">Shipped</option>
                        <option value="BONDED">Bonded</option>
                        <option value="ACQUITTED">Acquitted</option>
                        <option value="DISMISSED">Dismissed</option>
                        <option value="DEAD">Dead</option>
                        <option value="GCTA">GCTA</option>
                        <option value="OTHERS">Others</option>
                      </select>
                    </div>
                    <div class="row col-md-8">
                      <label><i class="fa fa-info"></i> <b>Information</b></label>
                      <textarea rows="4" type="text" name="info" class="form-control" required></textarea>
                    </div>
                </div>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" id="genModalButton3" class="btn btn-sm btn-warning" value="Save changes">
            </form>
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
     //DETAILS 
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#theform").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/view',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                $("#theform").html(e);
                                                $("#h1").html("Inmate's Information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/archives'><i class='fa fa-arrow-left'></i> Back to table</a>")
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle

    //*ADD RECORD
        $('#theGrid').on('click',".setTransfer",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();

               $("#genLabel").html("<i class='text-warning fa fa-map-marker'></i> Set Status: Transfered ");
               $("#append").append("<input type='hidden' name='id' value='"+formdata+"' >");
              //$('#genModalButton').addClass("addrec");                             
             // $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle

        $(document).on('click','.addrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        //var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  //	$('#title').html("<div class='col-lg-6 col-md-6'><div class='alert alert-warning'>Action Successful. <a href='<?php echo site_url();?>cpdrc/pages/records'>Go back to table</a></div></div>").fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });   
     
     /* END OF DETAILS */
  
      //*ADD RECORD
        $('#theGrid').on('click',".setReleased",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();

               $("#genLabel3").html("<i class='text-warning fa fa-map-marker'></i> Set Status: Released ");
               $("#append3").append("<input type='hidden' name='id' value='"+formdata+"' >");
              //$('#genModalButton').addClass("addrec");                             
             // $('#genModalButton').attr("recid",formdata);  
               $("#genModal3").modal();                      
        }); //end of delSingle

        $(document).on('click','.addrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        //var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/released',
                                          success:function(e){
                                              $("#genModal3").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  // $('#title').html("<div class='col-lg-6 col-md-6'><div class='alert alert-warning'>Action Successful. <a href='<?php echo site_url();?>cpdrc/pages/records'>Go back to table</a></div></div>").fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });   

      /* DELETION */   
        $('#theGrid').on('click',".active2",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner3").html();
                
               $("#genLabel2").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText2").html("You are about to set the status of <b><em>"+owner+"</em></b> to Active. Press 'Confirm' to proceed");
               $('#genModalButton2').html("Confirm");
               
               $('#genModalButton2').addClass("delrec2");                              
               $('#genModalButton2').attr("recid2",formdata);  
               $("#genModal2").modal();  
                // $(this).closest('tr').remove();
                // var trid = $(this).closest('tr').attr('id');
                // trid.remove();
                // alert("asdasd");
        }); //end of delSingle
        
        $(document).on('click','.delrec2',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid2");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/setActive2',
                                          success:function(e){
                                              $("#genModal2").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#haha').html(e).fadeIn('slow');  
                                              },200);
                                              $id = "#"+e;
                                              $(document).find($id).remove();
                                          }
                }); //end of ajax
       });//end modal button 
     /*END OF DELETION */    


     
     
     
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

</script>


<script>
  
/* Table initialisation */
$(document).ready(function() {
       var row;
	oTable=$('#theGrid2').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	});

     //DETAILS 
         $('#theGrid2').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#theform").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/view',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                $("#theform").html(e);
                                                $("#h1").html("Inmate's Information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/archives'><i class='fa fa-arrow-left'></i> Back to table</a>")
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle

      /* setACTIVE */   
        $('#theGrid2').on('click',".setActive",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                
               $("#genLabel2").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText2").html("You are about to set the status of <b><em>"+owner+"</em></b> to Active. Press 'Confirm' to proceed");
               $('#genModalButton2').html("Confirm");
               
               $('#genModalButton2').addClass("delrec");                              
               $('#genModalButton2').attr("recid",formdata);  
               $("#genModal2").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/setActive',
                                          success:function(e){
                                              $("#genModal2").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#h1').html("New Case information");
                                                 $('#desc').html("This would add a new Case information of the inmate in the database."); 
                                                 $('#theform').html(e).fadeIn('slow');
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/archives'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 
     
     
     
     
    });
        
// nicifier


$(function(){
    $('#theGrid2').each(function(){
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

</script>

<script>
  
/* Table initialisation */
$(document).ready(function() {
       var row;
	oTable=$('#theGrid3').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );

     //DETAILS 
         $('#theGrid3').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#theform").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/view',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                $("#theform").html(e);
                                                $("#h1").html("Inmate's Information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/archives'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle

      /* setACTIVE */   
        $('#theGrid3').on('click',".setActive",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner2").html();
                
               $("#genLabel2").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText2").html("You are about to set the status of <b><em>"+owner+"</em></b> to Active. Press 'Confirm' to proceed");
               $('#genModalButton2').html("Confirm");
               
               $('#genModalButton2').addClass("delrec");                              
               $('#genModalButton2').attr("recid",formdata);  
               $("#genModal2").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/inmatearchives/setActive',
                                          success:function(e){
                                              $("#genModal2").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#h1').html("New Case information");
                                                 $('#desc').html("This would add a new Case information of the inmate in the database.");
                                                 $('#theform').html(e).fadeIn('slow');
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/archives'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 

     
     
     
     
    });
        
// nicifier


$(function(){
    $('#theGrid3').each(function(){
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

</script>


  </body>
</html>