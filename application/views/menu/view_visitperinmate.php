                              <div id="title3">
                                 <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="theGrid3">
                                      <thead>
                                        <tr>
                                            <?php
                                                //checking whether the user is a admin or not
                                                $id=$this->session->userdata('logged_in');  
                                            ?>      
                                          <th>Visitor no.</th>
                                          <th>Full name</th>
                                          <th>Relation</th>
                                          <th>Address</th>
                                          <th>Contact number</th>

                                          <th style="text-align:center;">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="gridBody">
                                        <?php
                                            foreach ($all as $key2) {
                                                  echo "<tr>";
                                                       echo "<td>".$key2['id']."</td>";
                                                       echo "<td>".$key2['fullname']."</td>";
                                                       echo "<td>".$key2['relation']."</td>";
                                                       echo "<td>".$key2['address']."</td>";
                                                       echo "<td>".$key2['contact_number']."</td>";

                                                       echo "<td class=\"center text-center\">";
                                                       echo "<a  class=\"col-lg-12 viewSingle3 btn btn-primary btn-xs\" id=\"{$key2['id']}\" href=\"#\"><i class='fa fa-search'></i> View Details</a> ";
                                                       echo "</td>";
                                                echo "</tr>";                                                               
                            
                                              }    
                                              
                                        ?>      
                                      </tbody>
                                    </table>
                                </div>
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
//-------------------------------------------
//FOR THE SECOND TABLE
//-------------------------------------------
     //VIEW
         $('#theGrid3').on('click','.viewSingle3',function(){
          var loader="<p align='center'><i class='fa fa-spinner fa-spin'></i> Loading details...</p>";
          var formdata="id="+$(this).attr("id");
          $("#title3").html(loader); 
                       $.ajax({data:formdata,type:"POST",url: '<?php echo site_url(); ?>cpdrc/authvisit/view2',
                                          success:function(e){
                                              setTimeout(function(){  
                                                $("#title3").html(e);
                                                $("#h1").html("Inmate's Visitor Details");
                                              },200);
                                          }
                       }); 
                        
        });//end of viewSingle 
     
     /* END OF DETAILS */
     
     
     
     
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
        
         if(e.keyCode==13 && $("#gridSearch").val().length >= 1)
         { alert("Database Search");
         }
        
     });
});

</script>