<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <div class="panel">
                
                <div class="panel-body">
<!-- Start Content -->                
    <div class="row" style="margin-top:20px;">

          <div class="row">
              <div class="col-md-8" align="left">
                <h1 class="text-warning" id="h1">Inmate Profile Management</h1>
                <h5 class="text-muted">This would display all active inmates in CPDRC.</h5>
              </div>
              <div class="col-md-4" align="right" style="margin-top:30px;" id="button">
                <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/cpdrc/pages"><i class="fa fa-arrow-left"></i> Back to main menu</a>
              </div>  
          </div>
          <div class="row">
            <div id="info" class="col-md-8">
               <br>
            </div>
          </div>

    <div class="bs-example" id="append">
        <ul class="nav nav-tabs nav-pills" style="margin-bottom: 15px;">
          <li class="active"><a href="#manage" data-toggle="tab"><i class="fa fa-user"></i> List of Active Inmates</a></li>
          <li><a href="#2d" data-toggle="tab"><i class="fa fa-files-o"></i> List of registered markings</a></li>
        </ul>

        <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="manage">
                  <div class="col-lg-12 col-md-12">
                      <table border="0" cellspacing="5" cellpadding="5">
                          <tbody>
                            <tr>
                                <td>Search for an Inmate's Information</td>
                                <td><input type="text" id="searchboxx" placeholder="Search" class="form-control"></td>
                            </tr>
                          </tbody>
                      </table>
                      <div id="title">
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

                              foreach($manage as $key)  
                              {    
                               echo "<tr>";
                               echo " <td>".$key['id']."</td>";
                               echo " <td id='owner'>".$key['fname']."</td>";
                               echo " <td>".$key['lname']."</td>";
                               echo " <td>".$key['mi']."</td>";
                               echo " <td>".$key['alias']."</td>";

                               if($id['type'] == 1)
                               {

                                 echo "<td>";
                                 echo "<a  class=\"col-lg-12 viewSingle btn btn-primary btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                                 echo "</td>";
                                 echo "<td>";
                                 echo "<a  class=\"col-lg-12 editSingle btn btn-warning btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-edit'></i> Update</a> ";
                                 echo "</td>";
                                 echo "<td>";
                                 echo "<a  class=\"col-lg-12 archiveSingle btn btn-danger btn-xs\" id=\"{$key['id']}\" href=\"#\"><i class='fa fa-archive'></i> Set Pending</a> ";
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
                      </div>
                  </div>
              </div>

              <div class="tab-pane fade in" id="2d">
                  <div class="col-lg-12 col-md-12">
                    
                      <table border="0" cellspacing="5" cellpadding="5">
                          <tbody>
                            <tr>
                                <p class="text-warning">Search multiple marks to trace the inmate's information.</p>
                                <td>Search for</td>
                                <td><input type="text" id="searchbox" class="form-control" placeholder="Inmate's information"></td>
                            
                                <td>that has a</td>
                                <td><input type="text" id="searchbox2" class="form-control" placeholder="Name of the mark"></td>
                            
                                <td>and</td>
                                <td><input type="text" id="searchbox3" class="form-control" placeholder="Name of the mark"></td>

                                <td>and</td>
                                <td><input type="text" id="searchbox4" class="form-control" placeholder="Name of the mark"></td>

                                <td>and</td>
                                <td><input type="text" id="searchbox5" class="form-control" placeholder="Name of the mark"></td>
                            </tr>
                          </tbody>
                        </table>
                        <hr>
                        <table border="0" cellspacing="5" cellpadding="5">
                          <tbody>
                            <tr>
                                <p class="text-warning">Search for a specific mark.</p>
                                <td>Search for</td>
                                <td><input type="text" id="searchbox6" class="form-control" placeholder="Name of the mark"></td>
                            
                                <td>that is located in</td>
                                <td><input type="text" id="searchbox7" class="form-control" placeholder="Location of the mark"></td>
                            
                                <td>with the Description of</td>
                                <td><input type="text" id="searchbox8" class="form-control" placeholder="Description"></td>

                                <td>and is owned by</td>
                                <td><input type="text" id="searchbox9" class="form-control" placeholder="Owner of the mark"></td>
                            </tr>
                          </tbody>
                      </table>
                      <br>
                     <div id="title2">
                      <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid2">
                        <thead>
                          <tr>
                            <th><center>Image</center></th>
                            <th>Body Location</th>
                            <th>Name of the mark</th>
                            <th>Details of the mark</th>
                            <th>Owned by</th>    
                          </tr>
                        </thead>
                        <tbody id="gridBody2">
                          <?php 
                              foreach ($allmarks as $key) {

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
                                      $type = "Body and arm (Left)";
                                  }
                                  elseif ($key['type'] == 'B3L' || $key['type'] == 'G3L'){
                                      $type = "Leg (Left)";
                                  }
                                  elseif ($key['type'] == 'B1R' || $key['type'] == 'G1R'){
                                      $type = "Head (Right)";
                                  }
                                  elseif ($key['type'] == 'B2R' || $key['type'] == 'G2R'){
                                      $type = "Body and arm (Right)";
                                  }
                                  elseif ($key['type'] == 'B3R' || $key['type'] == 'G3R'){
                                      $type = "Leg (Right)";
                                  }

                                  echo "<tr>";
                                    echo "<td align='center'>";
                                      echo "<a  class=\"viewImg\" id=\"{$key['mfilename']}\" href=\"#\"><img src=".base_url()."uploads/markings/".$key['mfilename']." width='100' height='120'></a>";
                                    echo "</td>";
                                    echo "<td><b>".$type."</b></td>";
                                    echo "<td id='owner'><b>".$key['mname']."</b></td>";
                                    echo "<td>".$key['mdesc']."</td>";
                                    echo "<td>".$key['lname'].", ".$key['fname']." ".$key['mi']."<br>Inmate number: ".$key['inmate_id']."<br>Status: <b>".$key['status']."</b></td>";
                                  echo "</tr>";
                              }
                          ?>                           
                        </tbody>
                      </table>                       
                     </div>
                  </div>
              </div>
        </div><!--tab content-->
        <?php $this->load->view('cpdrc/footer'); ?> 
    </div><!--bs example-->
    </div><!--row-->
      
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

    <!--VIEWING OF IMAGES-->
    <div id="genModal2" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="genLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="genLabel2"></h4>
          </div>
          <div id="genText2" class="modal-body" align="center">
              <h4><i class='fa fa-spinner fa-spin'></i></h4>
              <p>Please wait.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Close</button>
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
.dataTables_filter {
     display: none;
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
    // "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ records per page"
    }
  });
        
    
      //EDITING 
        $('#theGrid').on('click','.editSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#append").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/edit',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                 $("#append").html(e);
                                                 $("#h1").html("Update Inmate's information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/manageinmate'><i class='fa fa-arrow-left'></i> Back to table</a>")
                                              },200);
                                          }
                       }); 
                        
        });//end of editSingle*/
        
        
     
     
     
     /* END OF EDITING */
     
     //DETAILS 
         $('#theGrid').on('click','.viewSingle',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#append").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/view',
                                          success:function(e){
                                              setTimeout(function(){ 
                                                $("#append").html(e);
                                                $("#h1").html("Inmate's information");
                                                 $("#button").html("<a class='btn btn-warning btn-sm' href='<?php echo base_url();?>index.php/cpdrc/pages/manageinmate'><i class='fa fa-arrow-left'></i> Back to table</a>")
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle

      /* DELETION */   
        $('#theGrid').on('click',".archiveSingle",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();
                
               $("#genLabel").html("<i class='text-danger fa fa-exclamation-circle'></i> Confirmation");
               $("#genText").html("You are about to set the status of <b><em>"+owner+"</em></b> to Pending. Press 'Confirm' to proceed");
               $('#genModalButton').html("Confirm");
               
               $('#genModalButton').addClass("delrec");                              
               $('#genModalButton').attr("recid",formdata);  
               $("#genModal").modal();                      
        }); //end of delSingle
        
        $(document).on('click','.delrec',function(){
            
        $(this).prop('disabled','true');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        var formdata="id="+$(this).attr("recid");
        
        $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/manageinmate/archives',
                                          success:function(e){
                                              $("#genModal").modal("toggle");
                                              $('body').removeClass('modal-open');
                                              $('.modal-backdrop').remove();
                                              setTimeout(function()
                                              {  $('#haha').html(e).fadeIn('slow');  
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


</script>
<script>
$(document).ready(function() {
    var dataTable = $('#theGrid').dataTable();
    $("#searchboxx").keyup(function() {
        dataTable.fnFilter(this.value);
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

        
      /* VIEW IMAGE MODAL */   
        $('#theGrid2').on('click',".viewImg",function(){
                var formdata=$(this).attr("id");
                row=$(this).closest("tr");
                var owner=$(this).closest('tr').children("#owner").html();  

               $("#genLabel").html("&nbsp;");
               $("#genText2").html("<img src='<?php echo base_url()?>uploads/markings/"+formdata+"' width='100%' height='100%'>");
  
               $("#genModal2").modal();                      
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

        //SEARCH MULTIPLE
        
        
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
$(document).ready(function() {
    var dataTable = $('#theGrid2').dataTable();

    $("#searchbox").keyup(function(){
         dataTable.fnFilter($("#searchbox").val());
    });
    $("#searchbox2").keypress(function(){
         dataTable.fnFilter($("#searchbox2").val());
    });
    $("#searchbox3").keypress(function(){
         dataTable.fnFilter($("#searchbox3").val());
    });
    $("#searchbox4").keypress(function(){
         dataTable.fnFilter($("#searchbox4").val());
    });
    $("#searchbox5").keypress(function(){
         dataTable.fnFilter($("#searchbox5").val());
    });
    $("#searchbox6").keypress(function(){
         dataTable.fnFilter($("#searchbox6").val());
    });
    $("#searchbox7").keypress(function(){
         dataTable.fnFilter($("#searchbox7").val());
    });
    $("#searchbox8").keypress(function(){
         dataTable.fnFilter($("#searchbox8").val());
    });
    $("#searchbox9").keypress(function(){
         dataTable.fnFilter($("#searchbox9").val());
    });
       
});

</script>
<!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>


