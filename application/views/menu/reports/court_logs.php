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
									<div class="row">
										<div class="col-md-12" align="center">
											<h2>Court Logs for the month of</h2>
											<h1>
												<?php  
													$dateObj   = DateTime::createFromFormat('!m', $month);
													$monthName = $dateObj->format('F'); // March
													echo $monthName.' '. $year;
												?>
											</h1>
										</div>
									</div>
									<?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
							         	<select name="month">
							         		<option value="1"<?php if($month == 1){echo "selected";}?>>January</option>
							         		<option value="2"<?php if($month == 2){echo "selected";}?>>Febuary</option>
							         		<option value="3"<?php if($month == 3){echo "selected";}?>>March</option>
							         		<option value="4"<?php if($month == 4){echo "selected";}?>>April</option>
							         		<option value="5"<?php if($month == 5){echo "selected";}?>>May</option>
							         		<option value="6"<?php if($month == 6){echo "selected";}?>>June</option>
							         		<option value="7"<?php if($month == 7){echo "selected";}?>>July</option>
							         		<option value="8" <?php if($month == 8){echo "selected";}?>>August</option>
							         		<option value="9" <?php if($month == 9){echo "selected";}?>>September</option>
							         		<option value="10"<?php if($month == 10){echo "selected";}?>>October</option>
							         		<option value="11" <?php if($month == 11){echo "selected";}?>>November</option>
							         		<option value="12" <?php if($month == 12){echo "selected";}?>>December</option>
							         	</select>
							         	<select name="year">
							         		<option value="2011" <?php if($year == 2011){echo "selected";}?>>2011</option>
							         		<option value="2012" <?php if($year == 2012){echo "selected";}?>>2012</option>
							         		<option value="2013" <?php if($year == 2013){echo "selected";}?>>2013</option>
							         		<option value="2014" <?php if($year == 2014){echo "selected";}?>>2014</option>
							         		<option value="2015" <?php if($year == 2015){echo "selected";}?>>2015</option>
							         		<option value="2016" <?php if($year == 2016){echo "selected";}?>>2016</option>
							         		<option value="2017"<?php if($year == 2017){echo "selected";}?>>2017</option>
							         	</select>
							         	<button type="submit" class="btn btn-success">Submit</button>
							         <?php echo form_close(); ?>
							         <form action="<?php echo site_url()?>cpdrc/pages/printRelease" method="POST">
										<input name="month" class="hidden" value="<?php echo $month;?>">
										<input name="year" class="hidden" value="<?php echo $year;?>">
										<button type="submit" class="btn btn-default" ><i class="fa fa-print"></i> Print</button>
									</form>
									<br>
										<div class="table-responsive">
						 					<table class="table table-bordered table-hover table-striped tablesorter">
						 						<thead align="center">
						 							<th>ACCUSED</th>
						 							<th>TIME</th>
						 							<th>JUDGE</th>
						 							<th>PLACE</th>
						 							<th>REMARKS</th>


						 						</thead>
						 						<tbody>
						 							<?php 
						 							$a = json_decode(json_encode($inmates));
						 							
						 							for ($i=0;$i<count($inmates); $i++) {?>
						 							<tr align="center">
						 								<td><?php echo $a[$i]->accused;?></td>
						 								<td><?php echo $a[$i]->time;?></td>
						 								<td><?php echo $a[$i]->judge;?></td>
						 								<td><?php echo $a[$i]->place;?></td>
						 								<td><?php echo $a[$i]->remarks;?></td>
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