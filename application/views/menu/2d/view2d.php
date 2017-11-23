                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
                  			<thead>
                  				<tr>
                            <th><center>Image</center></th>
                  					<th>Body Location</th>
                  					<th>Name</th>
                  					<th>Description</th> 
                            <th>&nbsp;</th>    
                  				</tr>
                  			</thead>
                  			<tbody id="gridBody">
                  	        <?php

                  	          foreach($marks as $key)  
                  	          { 
                                  //changing of the type to sentences.
                                  if($key['type'] == 'B1F' || $key['type'] == 'G1F'){
                                      $type = "Head (Front)";
                                  }
                                  elseif ($key['type'] == 'B2F' || $key['type'] == 'G2F'){
                                      $type = "Body (Front)";
                                  }
                                  elseif ($key['type'] == 'B3F' || $key['type'] == 'G3F'){
                                      $type = "Left arm (Front)";
                                  }
                                  elseif ($key['type'] == 'B4F' || $key['type'] == 'G4F'){
                                      $type = "Right arm (Front)";
                                  }
                                  elseif ($key['type'] == 'B5F' || $key['type'] == 'G5F'){
                                      $type = "Left leg (Front)";
                                  }
                                  elseif ($key['type'] == 'B6F' || $key['type'] == 'G6F'){
                                      $type = "Right leg (Front)";
                                  }
                                  elseif ($key['type'] == 'B1B' || $key['type'] == 'G1B'){
                                      $type = "Head (Back)";
                                  }
                                  elseif ($key['type'] == 'B2B' || $key['type'] == 'G2B'){
                                      $type = "Body (Back)";
                                  }
                                  elseif ($key['type'] == 'B3B' || $key['type'] == 'G3B'){
                                      $type = "Left arm (Back)";
                                  }
                                  elseif ($key['type'] == 'B4B' || $key['type'] == 'G4G'){
                                      $type = "Right arm (Back)";
                                  }
                                  elseif ($key['type'] == 'B5B' || $key['type'] == 'G5B'){
                                      $type = "Left leg (Back)";
                                  }
                                  elseif ($key['type'] == 'B6B' || $key['type'] == 'G6B'){
                                      $type = "Right leg (Back)";
                                  }
                                  elseif ($key['type'] == 'B1L' || $key['type'] == 'G1L'){
                                      $type = "Head (Left)";
                                  }
                                  elseif ($key['type'] == 'B2L' || $key['type'] == 'G2L'){
                                      $type = "Body (Left)";
                                  }
                                  elseif ($key['type'] == 'B3L' || $key['type'] == 'G3L'){
                                      $type = "Leg (Left)";
                                  }
                                  elseif ($key['type'] == 'B1R' || $key['type'] == 'G1R'){
                                      $type = "Head (Right)";
                                  }
                                  elseif ($key['type'] == 'B2R' || $key['type'] == 'G2R'){
                                      $type = "Body (Right)";
                                  }
                                  elseif ($key['type'] == 'B3R' || $key['type'] == 'G3R'){
                                      $type = "Leg (Right)";
                                  }

                  		           echo "<tr>";
                    			       echo "	<td><a  class=\"viewImg\" id=\"{$key['filename']}\" href=\"#\"><img src='".base_url()."uploads/markings/".$key['filename']."' width='60' height='70'/></td>";
                    			       echo "	<td>".$type."</td>";
                    			       echo "	<td id='owner'>".$key['name']."</td>";
                    			       echo "	<td>".$key['desc']."</td>";

                                 echo "<td>";
                                 echo "<a  class=\"col-lg-12 delSingle btn btn-danger btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-archive'></i> Delete</a> ";
                                 echo "</td>";
   
                    		         echo "</tr>";
                  	          }
                  		
                  	        ?>			
                  			</tbody>
                  		</table>

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
            <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal" id="genModalButton">Close</button>
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
  });

      /* DELETION */   
        $('#theGrid').on('click',".delSingle",function(){
                var formdata=$(this).attr("id");
                
               $("#genLabel").html("<i class='fa fa-exclamation-circle'></i> Confirmation");
               $("#genText").html("You are about to delete this mark. Press 'Delete' to proceed");
               $('#genModalButton').html("<i class='fa fa-trash-o'></i> Delete");
               
               $('#genModalButton').addClass("delrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/deletemark',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#formapp').html(e).fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 
     /*END OF DELETION */      
     
     
     /* END OF DETAILS */
     
         /* VIEW IMAGE MODAL */   
        $('#theGrid').on('click',".viewImg",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();  

               $("#genLabel").html("&nbsp;");
               $("#genText").html("<img src='<?php echo base_url()?>uploads/markings/"+formdata+"' width='100%' height='100%'>");
  
               $("#genModal").modal();                      
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