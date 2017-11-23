<div id="page-wrapper">
    <br>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Masterlist
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url_full(), 'class="form-horizontal gender-form"'); ?>
                        <div style="display: inline;">
                            <label> Filter by Gender: </label><br>
                            <select name="gender" class='form-control gender-select' style='width:20%; display: inline' >
                                <option value='both' <?php if($gender == "both"){echo "selected";}?>> All </option>
                                <option value='male' <?php if($gender == "male"){echo "selected";}?>> Male</option>
                                <option value='female' <?php if($gender == "female"){echo "selected";}?>>Female</option>
                            </select> 
                        </div>    
                        <button type="submit" class="btn btn-success submit">Submit</button>
                    <?php echo form_close(); ?> 
                </div>

                <div class="panel-body" id="section-to-print">
                     <h3 class="text-center"><strong> DETAINEES MASTERLIST </strong></h3> 

                     <a href="<?php echo site_url()?>cpdrc/pages/printMasterList/<?php echo $gender; ?>"><button class="btn btn-default"><i class="fa fa-print"></i> Print</button></a><br><br>
                    <div class="table-responsive" >
                        <table class="table table-bordered table-hover table-striped tablesorter" id="masterlist" style="font-size: 10px;">
                            <thead >
                                <th class='text-center' style="width:25px">NO.</th>
                                <th class='text-center' style="width:70px">NAME OF INMATE</th>
                                <th class='text-center' style="width:70px">CRIME</th>
                                <th class='text-center'  style="width:10px">CASE NO.</th>
                                <th class='text-center'  style="width:10px">CELL NO.</th>
                                <th class='text-center'  style="width:10px">COURT</th>
                                <th class='text-center'  style="width:10px">DATE COMMITED</th>
                                <th class='text-center'  style="width:10px">PLACE</th>
                                <!-- <th class='text-center' style="width:10px">QTY</th> -->
                            </thead>

                            <tbody class="text-center">
                               <?php               
                                    $no = 1;                   
                                    foreach ($master as $m) 
                                    {
                                        echo '<tr align="center" ';
                                        if($m['inmateGender'] == 'Female')
                                        {
                                            if($gender != 'female')
                                                {
                                                    echo "style='background-color:#ffc180'";
                                                } 
                                        }
                                        echo'>';
                                            echo "<td class='text-center'>".$no."</td>";
                                            echo "<td class='text-center'>".$m['nameOfInmate']."</td>";
                                            echo "<td class='text-center'>".$m['crime']."</td>";
                                            echo "<td class='text-center'>".$m['case_no']."</td>";
                                            echo "<td class='text-center'>".$m['cellNumber']."</td>";
                                            echo "<td class='text-center'>".$m['court']."</td>";
                                            echo "<td class='text-center'>".$m['dateCommitted']."</td>";
                                            echo "<td class='text-center'>".$m['place']."</td>";  
                                        echo "</tr>";
                                        $no++;
                                    }                                    
                               ?>
                            </tbody>
                        </table>
                        <?php 
                            if($gender == 'both')
                            {
                                echo "<h5> <label class='fa fa-20 fa-square' style='color:#ffc180'> </label> - Female Inmates </h5>";
                            }
                        ?>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>