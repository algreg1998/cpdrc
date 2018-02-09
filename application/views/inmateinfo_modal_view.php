<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Inmates Info</h4>
    </div>
    <div class="modal-body" style="height: 500px;">
        <div class="row">
            <div class="col-lg-3 ">
                <img class="thumbnail" src="<?php echo inmatephoto_url("inmate/".$inmate_info->filename) ?>" alt="" width="192">
            </div>
            <div class="col-lg-9">
                <div class="col-lg-12" style="margin: 20px 0 0">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-4 control-label" style="font-size: 16px">Inmate ID :</label>
                            <div class="col-sm-8" style="margin-top: 7px; font-size: 16px">
                                <span  id="inmate_id"><?php echo $inmate_info->inmate_id ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label" style="font-size: 16px">Inmate Name :</label>
                            <div class="col-sm-8" style="margin-top: 7px; font-size: 16px">
                                <?php echo $inmate_info->inmate_lname.', '.$inmate_info->inmate_fname.' '.$inmate_info->inmate_mi ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label" style="font-size: 16px">Start Date :</label>
                            <div class="col-sm-8" style="margin-top: 7px; font-size: 16px">
                                <?php 
                                    if ($inmate_info->inmate_type == 'Detainee') {
                                        echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_detained));
                                    }elseif ($inmate_info->inmate_type == 'Probation') {
                                        echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_probation));
                                    }elseif ($inmate_info->inmate_type == 'Convict') {
                                        echo ($reason_info->start_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($inmate_info->date_convicted));
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label" style="font-size: 16px">Release Date :</label>
                            <div class="col-sm-8" style="margin-top: 7px; font-size: 16px">
                                <?php echo ($reason_info->release_date == NULL) ? "N/A" : mdate("%M %d, %Y",strtotime($reason_info->release_date)) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-lg-8"></div>
                              <div class="col-lg-4"><button type="button" class="btn btn-primary pull-right" data-toggle="collapse" data-target="#demo"><i class="fa fa-print"></i> Print</button></div>
                            </div>
                            <div class="row">
                              <div class="col-lg-1"></div>
                              <div class="col-lg-11" style="padding-top:5px;">
                                  <div id="demo" class="collapse">
                                  <form id="id" action="<?php echo site_url()?>search/printCPT" method="post" style="display: inline;">
                                    <input type="hidden" name="id" id= "id" class="id" value='<?php echo $inmate_info->inmate_id ?>'>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <input class="form-control" type="text" name="prep" placeholder="Prepared and Verified by:">    
                                      </div>
                                      <div class="col-lg-4" style="padding-left:0px;">
                                        <input class="form-control" type="text" name="app" placeholder="Approved by:">
                                      </div>
                                      <div class="col-lg-2">
                                        <button  id="printCPT" class="btn btn-success pull-right">Submit</button></a>
                                      </div>
                                    </div>
                                  </form>
                            </div>                   
                              </div>
                            </div>
                            
                        </div>


         
                    </div>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <table id="inmate_case" class="table table-striped table-bordered table-hover" style="margin-bottom:0">
                        <thead>
                            <tr>
                                <th>Case No</th>
                                <th>Violation</th>
                                <th>Level</th>
                                <th>RA</th>
                                <th style="width: 80px;" class="text-center">Min (yrs)</th>
                                <th style="width: 80px;" class="text-center">Max (yrs)</th>
                            </tr>
                        </thead>
                        <tbody>                             
                          <?php foreach ($cases as $case): ?>
                              <tr>
                                  <td style="width: 150px"><?php echo $case->case_no ?></td>
                                  <td><?php echo $case->name ?></td>
                                  <td><?php echo $case->level ?></td>
                                  <td><?php echo $case->RepublicAct ?></td>
                                  <td class="text-center"><?php echo $case->min_year ?></td>
                                  <td class="text-center"><?php echo $case->max_year ?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="modal-footer">
            <?php
                if($reqStat!=null){
             $reqStat =json_decode(json_encode($reqStat));  
             if($reqStat[0]->status == "pending"){ ?>
                
                <button type="button" class="btn btn-primary" disabled>Request sent</button>

            <?php }elseif($reqStat[0]->status == "approved"){?>
                
                    <form action="<?php echo base_url()?>cpdrc/editinmate/editInmate" method ="POST"  style="display: inline;">
                        <input type="text" name="inmate_id" value="<?php echo $inmate_info->inmate_id; ?>" class="hidden">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    
            <?php }else{?>
                    <button type="button" class="btn btn-primary" id="rfe">Request for Edit</button>
            <?php }
                }else{
                    echo '<button type="button" class="btn btn-primary" id="rfe">Request for Edit</button>';    
                }?>
        
       
        <a class="btn btn-primary" href="<?php echo base_url('inmate/cases/'.$inmate_info->inmate_id) ?>">Manage Case</a>
        <button type="button" class="colorboxClose btn btn-default" data-dismiss="modal">Close</button>
       
    </div>
</div>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle"></i> Edit Request Reason</h4>
      </div>
      <div class="modal-body">
        <form>
            <h2>Reason</h2>
             <textarea style="width:auto; resize: none; overflow: auto;" name="reason" id="reason" required></textarea>
    </div>
    <div class="modal-footer">
            <button type="button"  class="btn btn-success btn-sm" id="sub">Submit</button>
        </form>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>

<?php
  $datatables = 'vendor/datatables/media/js/jquery.dataTables.min.js';
  $dtBootstrap = 'vendor/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js';
  $jqueryColorbox = 'vendor/colorbox/js/jquery.colorbox-min.js';
 ?>
<script type="text/javascript" src="<?php echo assets_url($datatables); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url($dtBootstrap); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url($jqueryColorbox); ?>"></script>
<script>
    $(document).ready(function(){
      $('#inmate_case').DataTable({
        responsive: true
      });
    });

     $("#rfe").click(function(){
        $("#myModal4").modal("toggle");
    });

     $("#sub").prop("disabled", true);
     $("#reason").keyup(function() {
         $("#sub").prop("disabled", false);
     });

     $("#sub").click(function(){
         var inmate_id = $(document).find('#inmate_id').html();
         var reason = $(document).find('#reason').val();

         $.ajax({
             url:'<?php echo site_url();?>cpdrc/editinmate/addRequest',
             type:"POST",
             data: {"inmate_id":inmate_id ,"reason":reason},
             dataType:"text",
             success: function(e)
             {
                 $("#myModal4").modal("toggle");
                 $("#some").toggle(500);
                 $(document).find("#rfe").attr("disabled", true);
                 $(document).find("#rfe").text("Request sent");
             }
         });


    });
</script>