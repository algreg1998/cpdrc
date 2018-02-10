<style type="text/css">td img {display: block;}</style>
<!--Fireworks CS6 Dreamweaver CS6 target.  Created Wed Feb 11 19:55:03 GMT+0800 (Malay Peninsula Standard Time) 2015-->
<script language="JavaScript1.2" type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//-->
</script>


<?php foreach ($inmate as $key) { ?>

	<div class="row">
		<div class="col-md-4">
			<div id="photodiv">
			<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title" align="center">
							<i class="fa fa-user"></i> Inmate's Information
						</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<p align="center"><img src="<?=base_url()?>uploads/inmate/<?=$key['filename']?>" width="50%" height="50%"/></p>
							<p class="list-group-item"><b>Reference Form ID:</b> <?=$key['formid']?></p>
							<p class="list-group-item"><b>Inmate number:</b> <?=$key['id']?></p>
							<p class="list-group-item"><b>Cell number:</b> <?=$key['cell']?></p>
							<p class="list-group-item"><b>Full Name:</b> <?=$key['lname'].", ".$key['fname']." ".$key['mi']?></p>
							<p class="list-group-item"><b>Alias:</b> "<?=$key['alias']?>"</p>
							<p class="list-group-item"><b>Date registered:</b> <?=$key['date_added']?></p>
							<p class="list-group-item"><b>Added by:</b> <?=$key['user_lname'].", ".$key['user_fname']." ".$key['user_mi']?></p><br>
							<?php 
						 		$attr = array('class' => 'form_horizontal');
								echo form_open('cpdrc/manageinmate', $attr);
							?>
								<input type="hidden" name="id" value="<?=$id;?>">
								<input type="hidden" name="filename" value="<?=$key['filename'];?>">
								<input type="hidden" name="formid" value="<?=$key['formid'];?>">
								<input type="hidden" name="name" value="<?=$key['lname'].", ".$key['fname']." ".$key['mi'];?>">
								<input type="submit" name="submit" class="btn btn-primary form-control" value="Preview of 2D Model">
							</form>
						</div>
					</div>
			</div>	
			</div>
		</div>

		<div class="col-md-8">
			<div class="row">
				<div class="bs-example">
					  <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
						
                        <li class="active"><a href="#personal" data-toggle="tab"><i class="fa fa-info"></i> Personal</a></li>
                        <li><a href="#family" data-toggle="tab"><i class="fa fa-home"></i> Family</a></li>
                        <li><a href="#body" data-toggle="tab"><i class="fa fa-user"></i> Body Build</a></li>
                        <li><a href="#case" data-toggle="tab"><i class="fa fa-file"></i> Latest Case(s)</a></li>
                        <li><a href="#old" data-toggle="tab"><i class="fa fa-files-o"></i> Previous Case(s)</a></li>
					  </ul>
					<div id="myTabContent" class="tab-content">

							<div class="tab-pane fade active in" id="personal">
	                            <div class="col-lg-8 col-md-8">
	                            		<div class="table-responsive">
	 										<table class="table table-bordered table-hover table-striped tablesorter">
	                   							<tbody>
							                    <tr>
							                    	<td><b>Nationality</b></td>
							                    	<td><?=$key['nationality']?></td>
							                    </tr>
							                   	<tr>
							                    	<td><b>Occupation</b></td>
							                    	<td><?=$key['occupation']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Civil Status</b></td>
							                    	<td><?=$key['status']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Birthdate</b></td>
							                    	<td><?=$key['bday']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Birthplace</b></td>
							                    	<td><?=$key['born']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Age Confined</b></td>
							                    	<td><?=$key['age']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Gender</b></td>
							                    	<td><?=$key['gender']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>City Address</b></td>
							                    	<td><?=$key['home']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Province Address</b></td>
							                    	<td><?=$key['province']?></td>
							                    </tr>
	                    						</tbody>
	                  						</table>
										</div>
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="family">
	                            <div class="col-lg-8 col-md-8">
	                            		<div class="table-responsive">
	 										<table class="table table-bordered table-hover table-striped tablesorter">
	                   							<tbody>
							                    <tr>
							                    	<td><b>Father's Name</b></td>
							                    	<td><?=$key['father']?></td>
							                    </tr>
							                   	<tr>
							                    	<td><b>Mother's Name</b></td>
							                    	<td><?=$key['mother']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Relative's Name</b></td>
							                    	<td><?=$key['relative']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Relation</b></td>
							                    	<td><?=$key['relation']?></td>
							                    </tr>
                                                <tr>
                                                    <td><b>Contact Person's Number</b></td>
                                                    <td><?=$key['contactpersonnum']?></td>
                                                </tr>
							                    <tr>
							                    	<td><b>Current Address</b></td>
							                    	<td><?=$key['address']?></td>
							                    </tr>
	                    						</tbody>
	                  						</table>
										</div>
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="body">
	                            <div class="col-lg-8 col-md-8">
	                            	    <div class="table-responsive">
	 										<table class="table table-bordered table-hover table-striped tablesorter">
	                   							<tbody>
							                    <tr>
							                    	<td><b>Weight</b></td>
							                    	<td><?=$key['weight']?> lbs.</td>
							                    </tr>
							                   	<tr>
							                    	<td><b>Height</b></td>
							                    	<td><?=$key['height']?> cms.</td>
							                    </tr>
							                    <tr>
							                    	<td><b>Body Build type</b></td>
							                    	<td><?=$key['build']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Body Complexion</b></td>
							                    	<td><?=$key['complexion']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Hair Type</b></td>
							                    	<td><?=$key['hair']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Hair Peculiarities</b></td>
							                    	<td><?=$key['hairp']?></td>
							                    </tr>
	                    						</tbody>
	                  						</table>
										</div>
									<?php } ?><!--end of foreach-->
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="case">
	                            <div class="col-lg-12 col-md-12" id="caseappend">

										<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
									  			<thead>
									  				<tr>					  					
									  					<th>Date</th>
									  					<th>Case number</th>
									  					<th>Crime</th>
									  					<th>Sentence</th>
									  					<th>&nbsp;</th>
									  				</tr>
									  			</thead>
									  			<tbody id="gridBody">
									  	        <?php
  												foreach ($case as $key2) {

									  		         echo "<tr>";
									  			       echo "<td>".$key2['confine']."</td>";
									  			       echo "<td>".$key2['case_no']."</td>";
									  			       echo "<td>".$key2['crime']."</td>";
									  			       echo "<td>".$key2['sentence']."</td>";

											           echo "<td>";
											           echo "<a class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key2['cid']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a>";
													   echo "</td>";
									  				 echo "</tr>";
												}  ?>	

									  			</tbody>
									  		</table>                            	
	                            </div>                               
							</div>

							<div class="tab-pane fade in" id="old">
	                            <div class="col-lg-12 col-md-12" id="caseappend2">

										<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid2">
									  			<thead>
									  				<tr>					  					
									  					<th>Date</th>
									  					<th>Case number</th>
									  					<th>Crime</th>
									  					<th>Sentence</th>
									  					<th>&nbsp;</th>
									  				</tr>
									  			</thead>
									  			<tbody id="gridBody2">
									  	        <?php
  												foreach ($old as $key3) {

									  		         echo "<tr>";
									  			       echo "<td>".$key3['confine']."</td>";
									  			       echo "<td>".$key3['case_no']."</td>";
									  			       echo "<td>".$key3['crime']."</td>";
									  			       echo "<td>".$key3['sentence']."</td>";

											           echo "<td>";
											           echo "<a class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key3['cid']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a>";
													   echo "</td>";
									  				 echo "</tr>";
												}  ?>	

									  			</tbody>
									  		</table>                            	
	                            </div>                               
							</div>
						
					</div><!--END OF TAB CONTENT-->
				</div><!--DIV BS-EXAMPLE-->
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
        
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#caseappend").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/viewcase',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#caseappend").html(e);
                                                
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle    

     
     
     
     
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
        
         $('#theGrid2').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#caseappend2").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/viewcase',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#caseappend2").html(e);
                                                
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle    

     
     
     
     
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