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
											Releases

										</h3>
									</div>
									<div class="panel-body">

									<a href="<?php echo site_url()?>cpdrc/pages/printMunicipality"><button class="btn btn-default" ><i class="fa fa-print"></i> Print</button></a>
									
									<div class="row">
										<div class="col-md-12" align="center">
											<h2>GEOGRAPHICAL ORIGIN OF DETAINEE</h2>
											<h1>
											</h1>
										</div>
									</div>
									
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter datatable">
						 						<thead align="center">
						 							<th>No.</th>
						 							<th>PLACE</th>
						 							<th>TOTAL</th>
						 						</thead>
						 						<tbody>
						 							
						 							<?php
						 							$a = json_decode(json_encode($municipalities));
						 							
						 							for ($i=0;$i<count($municipalities); $i++) {?>
						 							<tr align="center">

						 								<td><?php echo $i+1;?></td>
						 								<td><?php echo $a[$i][0]->place;?></td>
						 								<td><?php echo $a[$i][0]->count;?></td>
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