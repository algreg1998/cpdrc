<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">

<div class="panel">
<div class="panel-body">
    <div class="row" style="margin-top:20px;">
          <div class="row">
              <div class="col-md-8" align="left">
                <h1 class="text-warning" id="h1">Inmate Conduct Records</h1>
                <h5 class="text-muted">This would display all the recorded activities of an inmate inside CPDRC.</h5>
              </div>
              <div class="col-md-4" align="right" style="margin-top:30px;" id="button">
                <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
              </div>  
          </div>
          <br>
	<div id="title">
        <?php if ($this->session->flashdata('success_msg')): ?>
            <div class="alert alert-success">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <?php echo $this->session->flashdata('success_msg') ?>
            </div>
        <?php endif ?>

        <?php if ($this->session->flashdata('error_msg')): ?>
            <div class="alert alert-danger">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <?php echo $this->session->flashdata('error_msg') ?>
            </div>
        <?php endif ?>
  		<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
  			<thead>
  				<tr>
          <?php
              //checking whether the user is a admin or not
              $id=$this->session->userdata('logged_in');  
          ?>
  					<th>Inmate No.</th>
  					<th>First Name</th>
  					<th>Last Name</th>
  					<th>Middle Initial</th>
  					<th>Aliases</th>
  					<th>&nbsp;</th>
  					<th>&nbsp;</th>      
  				</tr>
  			</thead>
  			<tbody id="gridBody">
  	        <?php

  	          foreach($record as $key)  
  	          {    
  		         echo "<tr>";
  			       echo "	<td id='ownid'>".$key['id']."</td>";
  			       echo "	<td id='owner'>".$key['fname']."</td>";
  			       echo "	<td id='owner2'>".$key['lname']."</td>";
  			       echo "	<td>".$key['mi']."</td>";
  			       echo "	<td>".$key['alias']."</td>";


                 	echo "<td>";
                 		echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                 	echo "</td>";
                 	echo "<td>";
                 		echo "<a  class=\"col-lg-12 editSingle btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-edit'></i> Add Record</a> ";
 					echo "</td>";
  		       echo "</tr>";
  	          }
  		
  	        ?>			
  			</tbody>
  		</table>
	</div>  
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
          <div id="genText" class="modal-body">
              <div class="row">
                <div class="col-md-12">
              <?php
                $attr = array('class' => 'form_horizontal',
                              'id' => 'myform' );
                echo form_open('cpdrc/conductrecords', $attr);
              ?>  
                    <div id="append"></div>
                    <div class="row col-md-6">
                      <label><i class="fa fa-calendar"></i> <b>Date Incurred</b></label>
                      <input type="date" name="date" class="form-control" required autofocus><br>
                      <div class="row">
                        <div class="col-md-6">
                          <label><i class="fa fa-info"></i> <b>Type</b></label>
                          <select type="text" name="type" class="form-control" required>
                            <option value="Good Conduct">Good Conduct</option>
                            <option value="Bad Conduct">Bad Conduct</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label><i class="fa fa-info"></i> <b>Points</b></label>
                          <input type="number" name="pointValue"  value="0" class="form-control" style="display: inline">
                          <select type="text" name="pointUnit" class="form-control" required>
                            <option value="day">Day</option>
                            <option value="month">Month</option>
                            <option value="year">Year</option>
                          </select>
                        </div>
                      </div>
                      
                      <br>
                    </div>
                    <div class="row col-md-8">
                      <label><i class="fa fa-info"></i> <b>Cause</b></label>
                      <textarea rows="4" type="text" name="cause" class="form-control" required></textarea>
                      <label><i class="fa fa-info"></i> <b>Punishment/Commendation</b></label>
                      <textarea rows="4" type="text" name="punish" class="form-control" placeholder="You may place the commendation or punishment of the act stated above" required></textarea>
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
    $("#myform").submit(function() {
        $("#genModalButton").prop("disabled", true);
    });
       var row;
	oTable=$('#theGrid').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );
        
     
     /* END OF EDITING */
     
     //DETAILS 
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/conductrecords/view',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                $("#title").html(e);
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/records'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle 
        
     
    //*ADD RECORD
        $('#theGrid').on('click',".editSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this) .closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                var owner2=$(this).closest('tr').children("#owner2").html();
                var ownid=$(this).closest('tr').children("#ownid").html();
                
               $("#genLabel").html("<i class='text-warning fa fa-file'></i> Add a new record to "+owner+"");
               $("#append").append("<input type='hidden' name='id' value='"+formdata+"' >");
              //$('#genModalButton').addClass("addrec");                             
             // $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle

        $(document).on('click','.addrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        //var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/conductrecords',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#title').html("<div class='col-lg-6 col-md-6'><div class='alert alert-warning'>Action Successful. <a href='<?php echo site_url();?>/cpdrc/pages/records'>Go back to table</a></div></div>").fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });     
     
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

  </body>
<?php $this->load->view('cpdrc/footer'); ?>
</html>