<style>
	@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
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
				         </div>
				         <br> -->
				        
				         <div class="row">
				         	<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title" id="paneltitle">
											<i class="fa fa-user"></i> Inmate Reports
										</h3>
									</div>
									<div class='panel-body'>
						<?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
							         	<select name="month" class='form-control' style='width:15%; display: inline' >
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
							         	<select name="year" class='form-control' style='width:10%; display: inline' >
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
				        <h1><?php 
		 						
								$dateObj   = DateTime::createFromFormat('!m', $month);
								$monthName = $dateObj->format('F'); // March
								echo $monthName;
							?>
							<small>
								<?php echo $year;?>
							</small>
						</h1>
						<form action="<?php echo site_url()?>cpdrc/pages/printDaily" method="POST">
							<input name="month" class="hidden" value="<?php echo $month;?>">
							<input name="year" class="hidden" value="<?php echo $year;?>">
							
							<a href="<?php echo site_url()?>cpdrc/pages/printDaily"><button class="btn btn-default" ><i class="fa fa-print"></i> Print</button></a>
							<!-- <button type="submit" class="btn btn-default" ><i class="fa fa-print"></i> Print</button> -->
						</form>
					</div>
									
									<div class="panel-body" id="section-to-print">

										<div class="table-responsive" >
						 		<table class="table table-bordered table-hover table-striped tablesorter" style="font-size: 10px;">
						 					<thead>
						 						<th style="width:25px">DAY	</th>
					 							<th style="width:100px">PRISONERS STRENGTH</th>
					 							<th style="width:100px">PRISONERS RECEIVED</th>
					 							<!-- <th style="width:10px">RELEASED</th> -->
				 								<th  style="width:10px">SERVED</th>
					 							<th  style="width:10px">PROATION</th>
					 							<th  style="width:10px">SHIPPED</th>
					 							<th  style="width:10px">BONDED</th>
					 							<th  style="width:10px">ACQUITTED</th>
					 							<th  style="width:10px">DISMISSED</th>
					 							<th  style="width:10px">DEAD</th>
					 							<th  style="width:10px">GCTA</th>
					 							<th  style="width:10px">OTHERS</th>
					 							<th  style="width:10px">TOTAL PRISONERS RELEASED</th>
					 							<th  style="width:10px">TOTAL</th>
					 						</thead>
						                    <tbody>
						                    	<?php 
						                    	if(isset($day)){
						                    		$served=0;
						                    		$probation=0;
						                    		$shipped=0;
						                    		$bonded=0;
						                    		$acquitted=0;
						                    		$dismissed=0;
						                    		$dead=0;
						                    		$gcta=0;
						                    		$others=0;
					                    			foreach ($day as $c) {
					                    				echo '<tr align="center">';
					                    					echo "<td style='font-weight:bold;'>".$c['day']."</td>";
					                    					echo "<td style='font-weight:bold;'>".$c['pStrength']."</td>";
					                    					echo "<td>".$c['prisonersReceived']."</td>";
					                    					echo "<td>".$c['served']."</td>";
					                    					echo "<td>".$c['probation']."</td>";
					                    					echo "<td>".$c['shipped']."</td>";
					                    					echo "<td>".$c['bonded']."</td>";
					                    					echo "<td>".$c['acquitted']."</td>";
					                    					echo "<td>".$c['dismissed']."</td>";
					                    					echo "<td>".$c['dead']."</td>";
					                    					echo "<td>".$c['gcta']."</td>";
					                    					echo "<td>".$c['others']."</td>";
					                    					echo "<td style='font-weight:bold;'>".$c['prisonersReleased']."</td>";
					                    					echo "<td style='font-weight:bold;'>".$c['total']."</td>";
					                    					if($c['served']!=""){
					                    						$served += $c['served'];
					                    					}
					                    					if($c['probation']!=""){
					                    						$probation += $c['probation'];
					                    					}
					                    					if($c['shipped']!=""){
					                    						$shipped += $c['shipped'];
					                    					}
					                    					if($c['bonded']!=""){
					                    						$bonded += $c['bonded'];
					                    					}
					                    					if($c['acquitted']!=""){
					                    						$acquitted += $c['acquitted'];
					                    					}
					                    					if($c['dismissed']!=""){
					                    						$dismissed += $c['dismissed'];
					                    					}
					                    					if($c['dead']!=""){
					                    						$dead += $c['dead'];
					                    					}
					                    					if($c['gcta']!=""){
					                    						$gcta += $c['gcta'];
					                    					}
					                    					if($c['others']!=""){
					                    						$others += $c['others'];
					                    					}

					                    				echo "</tr>";
					                    			}
					                    			
					                    		}else{
					                    			echo "<tr>";
					                    			echo "<td></td>";
					                    			echo "<td></td>";
					                    			echo "<td></td>";
					                    			echo "<td></td>";
					                    			echo "<td></td>";
					                    			echo "</tr>";
					                    		}	
					                    		$total = json_decode(json_encode($total));
					                    		echo '<tr style="font-weight:bold" align="center" >';
							                   			echo '<td colspan="2">TOTAL</td>';
							                   			
							                   			echo "<td>";
							                   			echo $total[0]->prisonersReceivedWMonth; 
							                   			echo "</td>";
							                   			
							                   			
														echo "<td>";
														echo $served;
							                   			echo "</td>";
														echo "<td>";
														echo $probation;
							                   			echo "</td>";
														echo "<td>";
														echo $shipped ;
							                   			echo "</td>";
														echo "<td>";
														echo $bonded;
							                   			echo "</td>";
														echo "<td>";
														echo $acquitted;
							                   			echo "</td>";
														echo "<td>";
														echo $dismissed;
							                   			echo "</td>";
							                   			echo "<td>";
							                   			echo $dead;
							                   			echo "</td>";
							                   			echo "<td>";
							                   			echo $gcta;
							                   			echo "</td>";
														echo "<td>";
														echo $others;
							                   			echo "</td>";

														echo "<td>";
							                   			echo $total[1]->prisonersReleasedWMonth; 
							                   			echo "</td>";

							                   			echo "<td>";
							                   			echo $c['total']; 
							                   			echo "</td>";
							                   		echo "</tr>";

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