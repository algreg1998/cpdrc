						<?php foreach ($case as $key) { ?>				
										<table class="table table-bordered table-hover table-striped tablesorter">
	                   							<tbody>
							                    <tr>
							                    	<td><b>Date of Confinement</b></td>
							                    	<td><?=$key['date']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Case number</b></td>
							                    	<td><?=$key['case_no']?></td>
							                    </tr>
							                   	<tr>
							                    	<td><b>Court Name</b></td>
							                    	<td><?=$key['court']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Crime</b></td>
							                    	<td><?=$key['crime']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Sentence</b></td>
							                    	<td><?=$key['sentence']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Commencing</b></td>
							                    	<td><?=$key['commencing']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Date of Release with good conduct</b></td>
							                    	<td><?=$key['dateg']?></td>
							                    </tr>
							                    <tr>
							                    	<td><b>Date of Release with bad conduct</b></td>
							                    	<td><?=$key['dateb']?></td>
							                    </tr>
	                    						</tbody>
	                  						</table>
	                  			<?php } ?>