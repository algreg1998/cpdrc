<?php foreach ($user as $key) { 
		if($key['type'] == 1)
		{
			$type="Chief Warden";
		}
		else
		{
			$type="Warden";
		}
	?>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-user"></i> Personal Information
				</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<p align="center"><img src="<?=base_url()?>uploads/users/<?=$key['filename']?>" width="50%" height="50%"/></p>
					<p class="list-group-item"><b>Full Name:</b> <?=$key['user_lname'].", ".$key['user_fname']." ".$key['user_mi']?></p>
					<p class="list-group-item"><b>Address:</b> <?=$key['user_add']?></p>
					<p class="list-group-item"><b>Contact number:</b> <?=$key['user_contact']?></p>
					<p class="list-group-item"><b>Username:</b> <?=$key['username']?></p>
					<p class="list-group-item"><b>Account type:</b> <?=$type?></p>
					<p class="list-group-item"><b>Status:</b> <?=$key['status']?></p>
<?php } ?>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-md-8">
				<div class="bs-example">
					  <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
						<li class="active"><a href="#logs" data-toggle="tab"><i class="fa fa-book"></i> Recent Login</a></li>
                        <li><a href="#inmate" data-toggle="tab"><i class="fa fa-user"></i> Inmate Activity</a></li>
                        <li><a href="#visitor" data-toggle="tab"><i class="fa fa-users"></i> Visitor Activity</a></li>
                        <li><a href="#record" data-toggle="tab"><i class="fa fa-files-o"></i> Conduct Record Activity</a></li>
					  </ul>

					  <div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="logs">
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h3 class="panel-title">
											<i class="fa fa-book"></i> Recent Login
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
													<thead>
														<tr>
															<th>Action</th>
															<th>Date & Time</th>
															<th>Information</th>
														</tr>
													</thead>
													<tbody id="gridBody">
															  	<?php
						  											foreach ($logs as $key) {

															  			echo "<tr>";
															  			echo "<td>".$key['action']."</td>";
															  			echo "<td>".$key['time']."</td>";
															  			echo "<td>".$key['agent']."</td>";
															  			echo "</tr>";
																		}    
															  	?>			
													</tbody>
												</table>
										</div>
									</div>
								</div><!--TABLE-->
							</div>


								<div class="tab-pane fade in" id="inmate">
									<div class="panel panel-warning">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-book"></i> Recent Activity (Inmate)
											</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
													<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid2">
														<thead>
															<tr>
																<th>Date & Time</th>
																<th>Information</th>
															</tr>
														</thead>
														<tbody id="gridBody2">
																  	<?php
							  											foreach ($act as $key) {

																  			echo "<tr>";
																  			echo "<td>".$key['date']."</td>";
																  			echo "<td>Added <b>".$key["lname"].", ".$key['fname']." ".$key['mi']." (".$key['id'].")</b></td>";
																  			echo "</tr>";
																			}    
																  	?>			
														</tbody>
													</table>
											</div>
										</div>
									</div>
								</div>


								<div class="tab-pane fade in" id="visitor">
									<div class="panel panel-warning">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-book"></i> Recent Activity (Visitors)
											</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
													<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid3">
														<thead>
															<tr>
																<th>Date & Time</th>
																<th>Information</th>
															</tr>
														</thead>
														<tbody id="gridBody3">
																  	<?php
							  											foreach ($actv as $key) {

																  			echo "<tr>";
																  			echo "<td>".$key['date']."</td>";
																  			echo "<td>Added <b>".$key['name']."</b>, ".$key['relation']." of <b>".$key["ilname"].", ".$key['ifname']." ".$key['imi']." (".$key['id'].")</b></td>";
																  			echo "</tr>";
																			}    
																  	?>			
														</tbody>
													</table>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade in" id="record">
									<div class="panel panel-warning">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-book"></i> Recent Activity (Conduct Records)
											</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
													<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid4">
														<thead>
															<tr>
																<th>Date Incurred</th>
																<th>Information</th>
															</tr>
														</thead>
														<tbody id="gridBody4">
																  	<?php
							  											foreach ($actr as $key) {

																  			echo "<tr>";
																  			echo "<td>".$key['date']."</td>";
																  			echo "<td> Added a record to:<b> ".$key["ilname"].", ".$key['ifname']." (".$key['id'].") </b> Cause:<b>".$key['cause']."</b> Punishment: <b>".$key['punish']."</b></td>";
																  			echo "</tr>";
																			}    
																  	?>			
														</tbody>
													</table>
											</div>
										</div>
									</div>
								</div>							


					  </div><!--TAB CONTENT-->
				</div><!--BS EX-->		
	</div>
</div>

<script>
//GRID ONE TABLE  
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

<script>
//GRID TWO TABLE  
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
//GRID THREE TABLE  
/* Table initialisation */
$(document).ready(function() {
       var row;
	oTable=$('#theGrid3').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	});

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

<script>
//GRID FOUR TABLE  
/* Table initialisation */
$(document).ready(function() {
       var row;
	oTable=$('#theGrid4').dataTable( {
		//"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	});

});
        
// nicifier


$(function(){
    $('#theGrid4').each(function(){
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