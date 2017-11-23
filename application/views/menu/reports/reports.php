<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel">
				<div class='panel-body'>
					<div class="row">
						<!-- <div class="row">
				              <div class="col-md-8" align="left">
				                <h1 class="text-warning" id="h1">About CPDRC IPS</h1>
				                
				              </div>
				              
				         </div> -->
				         <br>
				         <div class="row">
				         	<div class="col-md-5">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											<i class="fa fa-user"></i> Inmate Reports
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter">
							                    <tbody>
							                    	<tr>
								                    	<th>Total number of registered inmates</th>
								                    	<td><?=$all;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of detained/convicted inmates</th>
								                    	<td><?=$active;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of transfered inmates</th>
								                    	<td><?=$transfer;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of released inmates</th>
								                    	<td><?=$transfer;?></td>
								                    </tr>
								                </tbody>
							                </table>
							            </div>
				         			</div>
				         		</div>
				         		
				         		<div class="panel panel-warning">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											<i class="fa fa-files-o"></i> Case Reports
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter">
							                    <tbody>
							                    	<tr>
								                    	<th>Total number of registered case information</th>
								                    	<td><?=$cases;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of latest case information</th>
								                    	<td><?=$latest;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of previous case information</th>
								                    	<td><?=$prev;?></td>
								                    </tr>
								                    
								                </tbody>
							                </table>
							            </div>
				         			</div>
				         		</div>

				         		<div class="panel panel-danger">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											<i class="fa fa-list"></i> Others
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter">
							                    <tbody>
							                    	<tr>
								                    	<th>Total number of authorized visitors</th>
								                    	<td><?=$visitors;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of conduct records</th>
								                    	<td><?=$records;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of registered markings</th>
								                    	<td><?=$marks;?></td>
								                    </tr>
								                    <tr>
								                    	<th>Total number of user accounts</th>
								                    	<td><?=$users;?></td>
								                    </tr>						                  	                    
								                </tbody>
							                </table>
							            </div>
				         			</div>
				         		</div>

				         	</div>
				         	<div class="col-md-7">

				         	</div>
				         </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('cpdrc/footer'); ?>