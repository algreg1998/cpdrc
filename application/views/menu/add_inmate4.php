<!DOCTYPE html>
<head>
	<script type="text/javascript">
		function getViolation(){
			
			var data = null;
			data = $('#crimeList').find(':selected').val();
			
			$.post('<?php echo site_url();?>cpdrc/addinmate/getViolation/'+data,
				{},
				function(data)
				{
					var test = JSON.parse(data);
					console.log(data);
					if(test['max_day']==""){
							test['max_day'] =0;
					}
					if(test['max_month']==""){
							test['max_month'] =0;
					}
					if(test['max_year']==""){
							test['max_year'] =0;
					}
					$("#mad").text(test['max_day']);
					$("#mam").text(test['max_month']);
					$("#may").text(test['max_year']);
					
					if(test['min_day']==""){
							test['min_day'] =0;
					}
					if(test['min_month']==""){
							test['min_month'] =0;
					}
					if(test['min_year']==""){
							test['min_year'] =0;
					}
					$("#mid").text(test['min_day']);
					$("#mim").text(test['min_month']);
					$("#miy").text(test['min_year']);
					

				});
		}
		$( document ).ready(function() {
		   getViolation();
		});
	</script>
</head>
<html>
     <div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class='panel-body'>
		<div class="panel-body">
				<div class="row" style="margin-top:20px;">
					<div class="col-md-7" align="left">
						<h1 class="text-warning">Step 4: Inmate Case Information</h1>
						<h5 class="text-muted">This would add the Inmate's case information in the database.</h5>
						<div class="progress" style="height:30px;">
						  <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						    <span class>60% Complete</span>
						  </div>
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>You're now here!</span>
						  </div>
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class>20% Remaining</span>
						  </div>
						</div>
					</div>
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
										<p><strong>Reference Form ID</strong>: <?php echo $formid;?> <br>
										<strong>Inmate number</strong>: <?php echo $id;?><br>
										<strong>Inmate name</strong>: <?php echo $name;?></p>	
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-md-5">
					 <?php if ($this->session->flashdata('error_msg')): ?>
			            <div class="alert alert-danger">
			                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			                <?php echo $this->session->flashdata('error_msg') ?>
			            </div>
			        <?php endif ?>
			        <?php if (count($violations) == 0 || count($courts) == 0): ?>
			            <div class="alert alert-danger">
			                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			                <?php if (count($violations) == 0){?>
			                	No Violations to choose from.
			                <?php }elseif (count($courts) == 0){?>
			                	No Courts to choose from.
			                <?php }else{?>
			                	No Violations and Courts to choose from.
			                <?php } ?>
			            </div>
			        <?php endif ?>
					</div>
				</div>
				
				<?php 

				 if($this->session->flashdata('case_data')){
					$case_data = json_decode($this->session->flashdata('case_data'));
				}
					$attr = array('class' => 'form_horizontal',
								'id' => 'myform');
					echo form_open('cpdrc/addinmate/add4', $attr);
				?>
				<div class="row">
						<div style='margin-left: 15px' class="col-md-5 well">
							<input type="hidden" name="formid" value="<?=$formid;?>">
							<input type="hidden" name="id" value="<?=$id;?>">
							<input type="hidden" name="name" value="<?=$name;?>">
							<input type="hidden" name="filename" value="<?=$filename;?>">

							<div class="row">
								<div class="col-md-6">
									<label><i class="fa fa-calendar"></i> <strong>Date of Confinement</strong></label>
									<input value="<?php if(isset($case_data)){echo $case_data->date_confinment; } ?>" <?php if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?> id="confine" type="date" name="confine" class="form-control" required >			
								</div>
								<div class="col-md-6">
									<label><i class="fa fa-sort-numeric-asc"></i> <strong>Case Number</strong></label>
									<input value="<?php if(isset($case_data)){echo $case_data->case_no; } ?>" <?php if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?> type="text" name="casenum" class="form-control" required ><br>
								</div>
							</div>
							<label><i class="fa fa-info"></i> <strong>Court Name</strong></label>
							<!--input type="text" name="court" class="form-control" required --> <!--Original -->
							<select <?php if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?> name="court" id="courtList" class="form-control" required >
								
								<?php 
									foreach ($courts as $row) {
									 echo '<option value="'.$row->court_name.'">'.$row->court_name.'</option>';
									}
								?>
							</select> 
							<br><br>
							<label><i class="fa fa-file"></i> <strong>Crime/Violation</strong></label>
							<!--textarea rows="3" type="text" name="crime" class="form-control" required ></textarea--><!-- Original -->
							 <?php if(count($violations) != 0){
							 	if((count($courts) != 0)){
										$js = 'onchange="getViolation();"';
										
										echo form_dropdown('crime', $violations, '',' onChange="getViolation();" id="crimeList"  class="form-control" ');
									}else{
										echo form_dropdown('crime', $violations, '',' onChange="getViolation();" id="crimeList"  class="form-control" disabled');
									}
									}else{
										echo '<select  disabled id="crime" onchange="getViolation()" name="crime" class="form-control" >
												<option>No Crimes</option>
											</select>';
										}  ?> 
							<br>
							<br>
							<div class="panel panel-danger">
							  <div class="panel-heading"><b>MAXIMUM</b></div>
							  <div class="panel-body">
							  	<div class="row">
									<div class="col-md-4" align="center"><label>MONTH:</label>&nbsp;<h2><span id="mam"></span></h2></div>
									<div class="col-md-4" align="center"><label>DAY:</label>&nbsp;<h2><span id="mad"></span></h2></div>
									<div class="col-md-4" align="center"><label>YEAR:</label>&nbsp;<h2><span id="may"></span></h2></div>
								</div>
							  </div>
							</div>
							<div class="panel panel-danger">
							  <div class="panel-heading"><b>MINIMUM</b></div>
							  <div class="panel-body">
							  	<div class="row">
									<div class="col-md-4" align="center"><label>MONTH:</label>&nbsp;<h2><span id="mim"></span></h2></div>
									<div class="col-md-4" align="center"><label>DAY:</label>&nbsp;<h2><span id="mid"></span></h2></div>
									<div class="col-md-4" align="center"><label>YEAR:</label>&nbsp;<h2><span id="miy"></span></h2></div>
								</div>
							  </div>
							</div>
                            <label><i class="fa fa-sort-numeric-asc"></i> Counts(s)</label><br>
                            <input  value="<?php if(isset($case_data)){echo $case_data->counts; } ?>" type="number" min="0" name="counts" value="0"  <?php if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?>><br><br>

							<label><i class="fa fa-info"></i> Period of Preventive Imprisonment</label><br>
							<label>Date Received</label>&nbsp;&nbsp;&nbsp;<input type="date" name="dor"><br>
							<label>Date Commence</label>&nbsp;&nbsp;&nbsp;<input type="date" name="doc"><br>
<!--							<label><i class="fa fa-info"></i> <strong>Commencing</strong></label>						-->
<!--							<textarea rows="3" --><?php //if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?><!-- type="text" name="commencing" class="form-control" placeholder="Commencing" required ></textarea>-->
                            <br>

							<button <?php if(count($violations) == 0 || count($courts) == 0){ echo "disabled";} ?> class="form-control btn btn-warning" type="submit">Submit Form</button>
  		<?php echo validation_errors(); ?>
									</form>
							 				
						</div>
						<div class="col-sm-12 col-md-6">
							<?php
							if (isset($case)) {
								
							?>
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h3 class="panel-title">
											<i class="fa fa-exclamation-triangle"></i> Case information
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
										<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
									  			<thead>
									  				<tr>					  					
									  					<th>Date</th>
									  					<th>Case number</th>
									  					<th>Crime</th>
									  					<th>Counts</th>
									  				</tr>
									  			</thead>
									  			<tbody id="gridBody">
									  	        <?php
  												foreach ($case as $key) {
									  		         echo "<tr>";
									  			       echo "<td>".$key['confine']."</td>";
									  			       echo "<td>".$key['case_no']."</td>";
									  			       echo "<td>".$key['name']."</td>";
									  			       echo "<td>".$key['counts']."</td>";

									  				 echo "</tr>";
												}  ?>	

									  			</tbody>
									  		</table>
										</div>
									</div>
								</div>

							<?php
							}
							else{
							?>
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h3 class="panel-title">
											<i class="fa fa-exclamation-triangle"></i> Case information
										</h3>
									</div>
									<div class="panel-body">
										<p class="text-danger">No recent case information.</p>
									</div>
								</div>					
							<?php
							}
							?>

							<?php
							if(isset($case) != NULL){  ?>
								<!-- <a class="btn btn-warning form-control" href="#" data-toggle="modal" data-target="#myModalss">Proceed to Step 5 (2D Modeling)</a> -->
								<?php
									$attr = array('class' => 'form_horizontal',
									'id' => 'myform');
									echo form_open('cpdrc/addinmate/add5', $attr);
								?>
									<input type="hidden" name="formid" value="<?=$formid;?>">
									<input type="hidden" name="id" value="<?=$id;?>">
									<input type="hidden" name="name" value="<?=$name;?>">
									<input type="hidden" name="filename" value="<?=$filename;?>">

									<button type="submit" name="submit" class="btn btn-warning form-control">Proceed to Step 5 (2D Modeling)</button>
								</form>

							<?php } ?>	
						</div>
				</div>
			<br>
		</div>
		</div>
		</div>
		</div>
		</div>
		<?php echo validation_errors(); ?>

    <!-- Modal -->
<div class="modal fade" id="myModalss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle"></i> Confirmation</h4>
      </div>
      <div class="modal-body">
          <p><strong>Next: Step 5 - Inmate Marking Management</strong></p>
          <p>If you proceed, you cannot add another case information, but data inputted would
          be stored in the database. Do you want to proceed?</p>
      </div>
      <div class="modal-footer">
		<div class="row">
			<div class="col-md-5" align="right">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			</div>
			<div class="col-md-7">
				
			</div>
		</div> 	
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

</div><!--container top-->
<br>
       <?php $this->load->view('cpdrc/footer'); ?>

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
</html>