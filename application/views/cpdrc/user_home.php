<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <div class="panel">
                
                <div class="panel-body">
<!-- Start Content --> 
<div  style="margin-top:40px;">

      <div class="row">
        <div class="col-md-4" align="center">
          <div class="listing listing-default">
              <a href="#" data-toggle="modal" data-target="#myModals"><img src="<?php echo base_url();?>resources/img/add_inmate.png" width="150" height="150"></a><br>
              <p align="center" class="text-warning text-center">Inmate Profiling</p>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <div class="listing listing-default">
              <a href="<?php echo site_url();?>cpdrc/pages/manageinmate"><img src="<?php echo base_url();?>resources/img/manage_inmate.png" width="150" height="150"></a><br>
              <p align="center" class="text-warning text-center">Inmate Profile Management</p>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <div class="listing listing-default">
              <a href="<?php echo site_url();?>cpdrc/pages/authvisit"><img src="<?php echo base_url();?>resources/img/auth_visit.png" width="150" height="150"></a><br>
              <p align="center" class="text-warning text-center">Inmate Authorized Visitors</p>
          </div>
        </div>
      </div>
<br>
<br>

      <div class="row">
        <!-- <div class="col-md-4"></div><!--SIDE--> 
        <div class="col-md-6" align="center">
          <div class="listing listing-default">
              <a href="<?php echo site_url();?>cpdrc/pages/records"><img src="<?php echo base_url();?>resources/img/records.png" width="150" height="150"></a><br>
              <p align="center" class="text-warning text-center">Inmate Conduct Records</p>
          </div>
        </div>
        <div class="col-md-6" align="center">
          <div class="listing listing-default">
              <a href="<?php echo site_url();?>cpdrc/pages/archives"><img src="<?php echo base_url();?>resources/img/archives.png" width="150" height="150"></a><br>
              <p align="center" class="text-warning text-center">Inmate Archive Management</p>
          </div>
        </div>
       <!--  <div class="col-md-4"></div><!--SIDE--> 
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title text-warning" id="myModalLabel"><i class="fa fa-exclamation-circle"></i> Confirmation</h4>
      </div>
      <div class="modal-body">
          <p><b>Note:</b> Upon proceeding, you must complete the five(5) steps in 
          profiling an Inmate before proceeding to another function.<br></p>
          
          <p>Do you want to continue?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <a href="<?php echo site_url();?>cpdrc/pages/addinmate" class="btn btn-warning btn-sm">Continue to Inmate profiling</a>
      </div>
    </div>
  </div>
</div>

<style>
.shape {
    border-style: solid;
    border-width: 0 70px 40px 0;
    float: right;
    height: 0px;
    width: 0px;
    -ms-transform: rotate(360deg); /* IE 9 */
    -o-transform: rotate(360deg); /* Opera 10.5 */
    -webkit-transform: rotate(360deg); /* Safari and Chrome */
    transform: rotate(360deg);
}
.listing {
    background: #fff;
    overflow: hidden;
}
.listing:hover {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: rotate scale(1.1);
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}
.shape {
    border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.listing-radius {
    border-radius: 7px;
}
.listing-danger {
    border-color: #d9534f;
}
.listing-danger .shape {
    border-color: transparent #d9533f transparent transparent;
}
.listing-success {
    border-color: #5cb85c;
}
.listing-success .shape {
    border-color: transparent #5cb75c transparent transparent;
}
.listing-default {
    border-color: #999999;
}
.listing-default .shape {
    border-color: transparent #999999 transparent transparent;
}
.listing-primary {
    border-color: #428bca;
}
.listing-primary .shape {
    border-color: transparent #318bca transparent transparent;
}
.listing-info {
    border-color: #5bc0de;
}
.listing-info .shape {
    border-color: transparent #5bc0de transparent transparent;
}
.listing-warning {
    border-color: #f0ad4e;
}
.listing-warning .shape {
    border-color: transparent #f0ad4e transparent transparent;
}
.shape-text {
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    position: relative;
    right: -40px;
    top: 2px;
    white-space: nowrap;
    -ms-transform: rotate(30deg); /* IE 9 */
    -o-transform: rotate(360deg); /* Opera 10.5 */
    -webkit-transform: rotate(30deg); /* Safari and Chrome */
    transform: rotate(30deg);
}
.listing-content {
    padding: 0 20px 10px;
}
</style>
<!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>
