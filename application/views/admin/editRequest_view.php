    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Requests</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Requests
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-bordered table-hover table-striped" id="table-editReqs">
                                <thead class="text-center">
                                    <tr>
                                        <th>Request # </th>
                                        <th>Inmate ID</th>
                                        <th>Inmate Name</th>
                                        <th>Reason</th>
                                        <th>Requested by</th>
                                        <th>Requested On</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <?php
                                    if(isset($data)){
                                        foreach ($data as $d) {
                                            ?>
                                            <tr>
                                                <td><?php echo $d->editRequestID; ?></td>
                                                <td><?php echo $d->inmate_id; ?></td>
                                                <td><?php echo $d->inmateName; ?></td>
                                                <td><?php echo $d->reason; ?></td>
                                                <td><?php echo $d->requestedByName; ?></td>
                                                <td><?php echo $d->addedOn; ?></td>
                                                <td id="stat-<?php echo $d->editRequestID; ?>">
                                                    <?php if($d->status =="approved"){?>
                                                    <label class="label label-success" style="font-size: 100%;"><?php echo ucwords($d->status); ?>
                                                        </label>
                                                <?php }?>
                                                        <?php if($d->status =="pending"){?>
                                                        <label class="label label-default" style="font-size: 100%;"><?php echo ucwords($d->status); ?>
                                                            </label>
                                                <?php }?>
                                                            <?php if($d->status =="rejected"){?>
                                                            <label class="label label-danger" style="font-size: 100%;"><?php echo ucwords($d->status); ?>
                                                                </label>
                                                <?php }?>
                                                                <?php if($d->status =="finished"){?>
                                                                <label class="label label-primary" style="font-size: 100%;"><?php echo ucwords($d->status); ?>
                                                                    </label>
                                                <?php }?>
                                                </td>
                                                <?php if($d->status =="pending"){?>
                                                    <td id="opt-<?php echo $d->editRequestID; ?>">
                                                        <button class="btn btn-success accept">Approve</button>
                                                        <button class="btn btn-danger reject">Reject</button>
                                                    </td>
                                                <?php }else{
                                                    echo "<td></td>";
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function(){
    $('#table-editReqs').DataTable({
        responsive: true,
        order: [[ 5, "desc" ]]
    });
});

$(".accept").click(function(){
var itemid = $(this).closest('tr').find("td:first").html();
  $.ajax({ url:'<?php echo site_url();?>cpdrc/editinmate/approve',
                          type:"POST",
                    data: {"editRequestID":itemid },
                    dataType:"json",
                    success: function(e){
                        $("#stat-"+e).html('<label class="label label-success" style="font-size: 100%;">Approved</label>')
                        $("#opt-"+e).html('')
                    }
                  });
});
$(".reject").click(function(){
    var itemid = $(this).closest('tr').find("td:first").html();

  $.ajax({ url:'<?php echo site_url();?>cpdrc/editinmate/reject',
                          type:"POST",
                    data: {"editRequestID":itemid },
                    dataType:"json",
                    success: function(e){
                        $("#stat-"+e).html('<label class="label label-danger" style="font-size: 100%;">Rejected</label>')
                        $("#opt-"+e).html('')
                    }
                  });
});


</script>