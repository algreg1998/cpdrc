
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title" align="center">
							<i class="fa fa-user"></i> Inmate's Information
						</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<?php foreach ($rec as $key) { ?>
							<p align="center"><img src="<?=base_url()?>uploads/inmate/<?=$key['filename']?>" width="50%" height="50%"/></p>
							<p class="list-group-item"><b>Inmate number:</b> <?=$key['id']?></p>
							<p class="list-group-item"><b>Cell number:</b> <?=$key['cell']?></p>
							<p class="list-group-item"><b>Full Name:</b> <?=$key['lname'].", ".$key['fname']." ".$key['mi']?></p>
							<p class="list-group-item"><b>Alias:</b> "<?=$key['alias']?>"</p>
							<p class="list-group-item"><b>Status:</b> <?=$key['status']?></p>
							<p class="list-group-item"><b>Added by:</b> <?=$key['user_lname'].", ".$key['user_fname']." ".$key['user_mi']?></p>
							<?php } ?>
						</div>
					</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-file"></i> Conduct Records
						</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
	             <div id="title2">
									<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
									  			<thead>
									  				<tr>
									  					<th>Date Incurred</th>
                              <th>Type</th>
									  					<th>Cause</th>
                              <th>Commendation/Punishment</th>
                              <th>Points</th>
                              <th>Action</th>
									  				</tr>
									  			</thead>
									  			<tbody id="gridBody">
									  	        <?php

  												foreach ($view as $key2) {
  													if($key2['id'] != NULL){
									  		         	echo '<tr  ';
                                  if($key2['type'] == 'Bad Conduct')
                                  {
                                      echo 'style="background-color: #ffc180"';
                                  }
                                  echo'>';
									  			        echo "<td>".$key2['date']."</td>";
                                  echo "<td>".$key2['type']."</td>";
                                  echo "<td>".$key2['cause']."</td>";
                                  echo "<td>".$key2['punish']."</td>";
                                  echo "<td>".$key2['pointValue']."</td>";


											            echo "<td>";
											            echo "<a  class=\"col-lg-12 delSingle btn btn-danger btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-times'></i> Delete</a> ";
														echo "</td>";
									  					echo "</tr>";
													}    
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
          <div class="modal-footer" id="genFooter">
            <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="genModalButton" class="btn  btn-sm btn-danger">Save changes</button>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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

       
     
      /* DELETION */   
        $('#theGrid').on('click',".delSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                
               $("#genLabel").html("<i class='text-danger fa fa-exclamation-circle'></i> Delete conduct record");
               $("#genText").html("You are about to <b><em>delete this record.</em></b> Press 'Delete' to proceed");
               $('#genModalButton').html("Delete");
               
               $('#genModalButton').addClass("delrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/conductrecords/delete',
                                          success:function(e){
                                             $("#genModal").modal("toggle");
                                             $('body').removeClass('modal-open');
                                             $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              { //$('#genText').html("<h5><em>Action Successful.</em></h5>").fadeIn('slow');
                                                $('#title2').html(e).fadeIn('slow');  
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







