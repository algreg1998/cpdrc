					
					<?php 
						$attr = array('class' => 'form_horizontal',
									 'id' => 'myform');
						echo form_open('cpdrc/inmatearchives/addNewCase', $attr);
					?>
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
						<div class="col-md-5 well">
							<input type="hidden" name="id" value="<?=$id;?>">
							<div class="row">
								<div class="col-md-6">
									<label><i class="fa fa-calendar"></i> <b>Date of Confinement</b></label>
									<input type="date" name="confine" class="form-control" required >			
								</div>
								<div class="col-md-6">
									<label><i class="fa fa-sort-numeric-asc"></i> <b>Case Number</b></label>
									<input type="text" name="casenum" class="form-control" required ><br>
								</div>
							</div>
							<!-- <label><i class="fa fa-info"></i> <b>Court Name</b></label>
							<input type="text" name="court" class="form-control" required > -->
							<label><i class="fa fa-info"></i> <strong>Court Name</strong></label>
							<!--input type="text" name="court" class="form-control" required --> <!--Original -->
							<select name="court" class="form-control" required >
								<?php 
									foreach ($courts as $row) {
									 echo '<option value="'.$row->court_name.'">'.$row->court_name.'</option>';
									}
								?>
							</select> 
							<label><i class="fa fa-file"></i> <strong>Crime/Violation</strong></label>
							<!--textarea rows="3" type="text" name="crime" class="form-control" required ></textarea--><!-- Original -->
							<?php 
							if(count($violations) != 0){ 

										echo form_dropdown('crime', $violations, '',' onChange="getViolation();" id="crime"  class="form-control" ');
									}else{
										echo '<select  disabled id="crime" onchange="getViolation()" name="crime" class="form-control" >
												<option>No Crimes</option>
											</select>';
										}  ?> <!-- 
							<select id="crime" name="crime" class="form-control" onchange="getViolation()" required>
								
								<?php 
									foreach ($violations as $row) {
									 echo '<option value="'.$row->id.'">'.$row->name.'</option>';
									}
								?> -->
							</select>
							<!-- <label><i class="fa fa-file"></i> <b>Crime</b></label>
							<textarea rows="3" type="text" name="crime" class="form-control" required ></textarea> -->
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
                            <input type="number" min="0" name="counts" value="0"><br><br>

							<label><i class="fa fa-info"></i> Period of Preventive Imprisonment</label><br>
							<label>Date Received</label>&nbsp;&nbsp;&nbsp;<input type="date" name="dor"><br>
							<label>Date Commence</label>&nbsp;&nbsp;&nbsp;<input type="date" name="doc"><br>
							<!-- <label><i class="fa fa-file-o"></i> <b>Sentence</b></label>
							<textarea rows="3" type="text" name="sentence" class="form-control" required ></textarea> -->
<!--							<label><i class="fa fa-info"></i> <b>Commencing</b></label>						-->
<!--							<textarea rows="3" type="text" name="commencing" class="form-control" placeholder="Commencing" required ></textarea>-->
                            <br>
							<!-- <label><i class="fa fa-calendar"></i> <b>Expected Date of Release</b></label>
							<div class="row">
								<div class="col-md-6">
									<label class="text-muted">With good records</label><input type="date" id="dategood" name="dategood" class="form-control" placeholder="Date of Released(with good record)" required ><br>
								</div>
								<script>
									var wto;
									$("#dategood").change(function(){
										clearTimeout(wto);
										wto = setTimeout(function() {
									 
										var today = new Date($("#dategood").val());
										var dd = today.getDate();
										var mm = today.getMonth()+1; //January is 0!
										var yyyy = today.getFullYear();
										 if(dd<10){
										        dd='0'+dd
										    } 
										    if(mm<10){
										        mm='0'+mm
										    } 

										today = yyyy+'-'+mm+'-'+dd;
										document.getElementById("datebad").setAttribute("min", today);
										if($(document).find("#datebad").val() == '' || $(document).find("#datebad").val()<today){
											$(document).find("#datebad").val(today);
										}
									  }, 0);
									});

								</script>
								<div class="col-md-6">			
									<label class="text-muted">With misconduct records</label><input type="date" id="datebad" name="datebad" class="form-control" placeholder="Date of Released(with bad record)" required ><br>
								</div>
							</div> -->
							<input type="submit" name="submit" value="Add case information" class="btn btn-warning form-control">
						</form>
							
						</div>
						<div class="col-md-7">
							<?php
							if (isset($case)) {
								
							?>
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h3 class="panel-title">
											<i class="fa fa-exclamation-triangle"></i> Recently added Case information
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
											<i class="fa fa-exclamation-triangle"></i> Previous Case information
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
									  	        if (isset($arc)) {
									  	        	foreach ($arc as $key) {
										  		         echo "<tr>";
										  			       echo "<td>".$key['confine']."</td>";
										  			       echo "<td>".$key['case_no']."</td>";
										  			       echo "<td>".$key['vioName']."</td>";
										  			       echo "<td>".$key['counts']."</td>";
										  				 echo "</tr>";
													}	
									  	        }
  												  ?>	

									  			</tbody>
									  		</table>
										</div>
									</div>
								</div>				
							<?php
							}
							?>

							<?php
							if(isset($case) != NULL){  ?>
								<a class="btn btn-warning form-control" href="#" data-toggle="modal" data-target="#myModalss">Proceed to next step</a>
							<?php } ?>
						</div>

    <!-- Modal -->
<div class="modal fade" id="myModalss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle"></i> Confirmation</h4>
      </div>
      <div class="modal-body">
          <p>Do you want to add a new markings for the inmate?</p>
      </div>
      <div class="modal-footer">
		<div class="row">
			<div class="col-md-7" align="right">
				<?php
					$attr = array('class' => 'form_horizontal');
					echo form_open('cpdrc/inmatearchives/checkToUpdate2', $attr);
				?>
				<?php foreach($gos as $key2){ ?>
					<input type="hidden" name="id" value="<?=$key2['id'];?>">
					<input type="hidden" name="formid" value="<?=$key2['formid'];?>">
					<input type="hidden" name="name" value="<?=$key2['lname'].", ".$key2['fname']."".$key2['mi'];?>">
					<input type="hidden" name="filename" value="<?=$key2['filename'];?>">
				<?php } ?>							
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Add a new markings">				
				</form>
			</div>
			<div class="col-md-5" align="right">
				<?php
					$attr = array('class' => 'form_horizontal');
					echo form_open('cpdrc/inmatearchives/checkToUpdate', $attr);
				?>
				<input type="hidden" name="id" value="<?=$id;?>">							
				<input type="submit" name="submit" class="btn btn-warning btn-sm" value="Proceed to Inmate Management">				
				</form>
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

					<script>
					     $(document).ready(function(){
						    $("#myform").submit(function(){
							    var formdata=$("#myform").serialize();
							  
							   $.ajax({ url:'<?php echo site_url();?>cpdrc/inmatearchives/addNewCase',
							            type:"POST",
										data: formdata,
										success: function(e){
										  $("#theform").html(e);
										}
							   });
							   
							  return false;
							}); 
						 
						 });

					</script>

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

		function getViolation(){
			var data = null;
			data = $('#crime').find(':selected').val();
			
			$.post('<?php echo site_url();?>cpdrc/addinmate/getViolation/'+data,
				{},
				function(data)
				{
					var test = JSON.parse(data);
					
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
