<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel">
				<div class='panel-body'>
					<div class="row">
						<!-- <div class="row">
				              <div class="col-md-6" align="left">
				                <h1 class="text-warning" id="h1">About CPDRC IPS</h1>
				                
				              </div> 
				         </div> -->
				         <br>
				        
				         <div class="row">
				         	<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											Crime Index Tabulated
										</h3>
									</div>
									<div class="panel-body">
									<div class="row">
										<div class="col-md-12" align="center">
											<h2>CRIME INDEX </h2>
											<h1>
											</h1>
										</div>
									</div>
									<a href="<?php echo site_url()?>cpdrc/pages/printCIT"><button class="btn btn-default" ><i class="fa fa-print"></i> Print</button></a>
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter datatable">
						 						<thead align="center">
						 							<th>No.</th>
						 							<th>CRIME</th>
						 							<th>TOTAL</th>
						 						</thead>
						 						<tbody>
						 							
						 							<?php
						 							
						 							for ($i=0;$i<count($crimes); $i++) {?>
						 							<tr align="center">

						 								<td><?php echo $i+1;?></td>
						 								<td><?php echo $crimes[$i]['name'];?></td>
						 								<td><?php echo $crimes[$i]['count'];?></td>
						 							</tr> 
						 							<?php } ?>
						 							
						 						</tbody>
							                </table>
							            </div>
				         			</div>
				         		</div>

				         	</div>
				         </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('cpdrc/footer'); ?>
