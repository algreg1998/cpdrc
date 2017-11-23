<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel">
				<div class='panel-body'>
					<div class="row">
						<div class="row">
				              <div class="col-md-12" align="left">
				                <h1 class="text-warning" id="h1">About CPDRC IPS</h1>
				              </div>
				             
				         </div>
				         <br>
				         <div class="row">
				         	<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											<i class="fa fa-user"></i> Inmate Reports
										</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter">
						 					<thead>
						 						<tr>
						 							<td>Month</td>
						 							<td>Inmates Added</td>
						 							<td>Inmates Released</td>
						 							<td>Total</td>
						 						</tr>
						 					</thead>
							                    <tbody>
							                    	<?php 
							                    			foreach ($all as $c) {
							                    				echo "<tr>";
							                    				foreach ($c as $o) {
							                    					echo "<td>".$o['month']."</td>";
							                    					echo "<td>".$o['cnt']."</td>";
							                    					echo "<td>".$o['rel']."</td>";
							                    					echo "<td>".$o['total']."</td>";
							                    				}
							                    				echo "</tr>";
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
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('cpdrc/footer'); ?>