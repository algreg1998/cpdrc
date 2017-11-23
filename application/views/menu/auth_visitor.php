<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <div class="panel">
                
                <div class="panel-body">
<!-- Start Content -->   
    <?php
 
      $id=$this->session->userdata('logged_in');  
    ?>
  


  <!--MENUS-->
    <div class="row" style="margin-top:20px;">

          <div class="row">
              <div class="col-md-8" align="left">
                <h1 class="text-warning" id="h1">Inmate Authorized Visitors</h1>
                <h5 class="text-muted">This would display all the authorized visitors in each inmate.</h5>
              </div>
              <div class="col-md-4" align="right" style="margin-top:30px;" id="button">
                <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
              </div>  
          </div>
          <br>
          <div class="row">
	         	<div class="col-lg-12 col-md-12">
                  <div class="bs-example">
                      <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
                        <li class="active"><a href="#add" data-toggle="tab"><i class="fa fa-users"></i> All authorized visitors</a></li>
                        <li><a href="#user" data-toggle="tab"><i class="fa fa-user"></i> Inmate's authorized visitors</a></li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                          <div class="tab-pane fade active in" id="add">
                            <div id="title2">
                              <div class="col-lg-12 col-md-12"> 
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid2">
                                      <thead>
                                        <tr>    
                                          <th>Visitor no.</th>
                                          <th>Full name</th>
                                          <th>Address</th>
                                          <th>Contact number</th>
                                          <th>Inmate information</th>
                    										  <?php
                    											if($id['type'] == 1)
                    											{
                    												echo "<th>&nbsp;</th>";
                    												echo "<th>&nbsp;</th>";
                    												echo "<th>&nbsp;</th>";
                    											}
                    											else
                    											{
                    												echo "<th>&nbsp;</th>";
                    											}
                    										  ?>
                                         
                                        </tr>
                                      </thead>
                                      <tbody id="gridBody">
                                        <?php
                                            foreach ($auth as $key2) {
                                                  echo "<tr>";
                                                       echo "<td>".$key2['id']."</td>";
                                                       echo "<td id='owner'>".$key2['full_name']."</td>";
                                                       echo "<td>".$key2['address']."</td>";
                                                       echo "<td>".$key2['contact_number']."</td>";
                                                       echo "<td>".$key2['inmate_fname']." ".$key2['inmate_lname']." (".$key2['inmate_id'].")</td>";
                                                  if($id['type'] == 1)
                                                  {
                                                       echo "<td>";
                                                       echo "<a  class=\"col-lg-12 viewSingle2 btn btn-primary btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
													                             echo "</td>";
													                             echo "<td>";
                                                       echo "<a  class=\"col-lg-12 editSingle btn btn-warning btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-edit'></i> Update</a> ";
                          													   echo "</td>";
                          													   echo "<td>";
                                                       echo "<a  class=\"col-lg-12 delSingle btn btn-danger btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-trash'></i> Delete</a> ";
                                                       echo "</td>";
                                                  }
                                                  else
                                                  {
                                                       echo "<td>";
                                                       echo "<a  class=\"col-lg-12 viewSingle2 btn btn-primary btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
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
                          <div class="tab-pane fade in" id="user">
                            <div id="title">
                              <div class="col-lg-12 col-md-12">
	                               
                      							<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid">
                      								<thead>
                      									<tr>
                      									    <?php
                      									        //checking whether the user is a admin or not
                      									        $id=$this->session->userdata('logged_in');  
                      									    ?>			
                      									  <th>Inmate no.</th>
                      									  <th>First Name</th>
                      									  <th>Last Name</th>
                      									  <th>Middle Name</th>
                      									  <th>Alias</th>
                      									  <th>&nbsp;</th>
														  <th>&nbsp;</th>
                      									</tr>
                      								</thead>
                      								<tbody id="gridBody">
                      									<?php
                        										foreach ($visit as $key) {
                      									  		    echo "<tr>";
                      									  			       echo "<td>".$key['id']."</td>";
                      									  			       echo "<td>".$key['fname']."</td>";
                      									  			       echo "<td>".$key['lname']."</td>";
                      									  			       echo "<td>".$key['mi']."</td>";
                      									  			       echo "<td>".$key['alias']."</td>";

                      											           echo "<td>";
                      											           echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View all visitors</a> ";
																		   echo "</td>";
																		   echo "<td>";
                      											           echo "<a  class=\"col-lg-12 addSingle btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-edit'></i> Add Visitors</a> ";
                      											           echo "</td>";
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
//-------------------------------------------
//FOR THE SECOND TABLE
//-------------------------------------------
     //VIEW
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/view',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title").html(e);
                                                $("#h1").html("List of Inmate's Authorized Visitors");
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>cpdrc/pages/authvisit'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle



        //DEACTIVATE
         $('#theGrid').on('click','.addSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/add',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title").html(e);
                                                $("#h1").html("Add Authorized Visitors");
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/authvisit'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle   
     
     
     
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
        
         if(e.keyCode==13 && $("#gridSearch").val().length >= 1)
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
  } );
//-----------------------------------------------
//FOR THE FIRST TABLE
//----------------------------------------------
     //VIEW
         $('#theGrid2').on('click','.viewSingle2',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title2").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/view2',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title2").html(e);
                                                $("#h1").html("Inmate's Visitor Details");
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/authvisit'><i class='fa fa-arrow-left'></i> Back to table</a>");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle2

     /* DELETION */   
        $('#theGrid2').on('click',".delSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                
               $("#genLabel").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText").html("You are about to delete <b><em>"+owner+"</em></b> in the visitor's list. Press 'Delete' to proceed");
               $('#genModalButton').html("Delete"); 
               
               $('#genModalButton').addClass("delrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/delete',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#title2').html(e).fadeIn('slow');  
                                              },200);
                                          }
                }); //end of ajax
       });//end modal button 
     /*END OF DELETION */  

     
        //EDIT
         $('#theGrid2').on('click','.editSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title2").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/edit',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title2").html(e);
                                                $("#h1").html("Edit Visitor's information");
                                                $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/authvisit'><i class='fa fa-arrow-left'></i> Back to table</a>");
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
        
         if(e.keyCode==13 && $("#gridSearch").val().length >= 1)
         { alert("Database Search");
         }
        
     });
});

</script>

       
<!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>

