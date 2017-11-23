<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Historical Graphical Tools
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Violations - Table
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
                        <div style="display: inline;">
                            <select name="crime" class='form-control' style='width:20%; display: inline' >
                                <option value=''> Select a crime </option>
                                <?php
                                    foreach($allCrime as $category)
                                    {
                                        echo "<option value='".$category['id']."'";
                                        if($category['id'] == $id)
                                        {
                                            echo "selected";
                                        }    
                                        echo ">".$category['crime']."</option>";
                                    }
                                 ?>                                          
                            </select> 
                        </div>    
                        <button type="submit" class="btn btn-success">Submit</button>
                    <?php echo form_close(); ?>          

                    <br>
                    <form action="<?php echo site_url()?>cpdrc/pages/printCrimeIndex" method="POST">
                        <input name="crime" id='crime' class="hidden" value="<?php echo $crime;?>">
                        <button type="submit" class="btn btn-default"  id='printCrimeIndex'><i class="fa fa-print"></i> Print</button>
                    </form>
                </div>
 
                <div class="panel-body" id="section-to-print">
                     <h3 class='text-center'> <strong>
                        <?php 
                            if($crime != '')
                            {
                                echo strtoupper($cName);
                            }
                            else
                            {
                                echo "CRIME INDEX";
                            }
                        ?>
                    </strong></h3>
                    <div class="table-responsive" >
                        <table class="table table-bordered table-hover table-striped tablesorter" id="crimeindex-violation"  style="font-size: 10px;">
                            <thead>
                                <th class='text-center' style="width:25px">NO.</th>
                                <th class='text-center' style="width:70px">NAME OF INMATE</th>
                                <th class='text-center'  style="width:10px">CRIME</th>
                                <th class='text-center'  style="width:10px">CASE NO.</th>
                                <th class='text-center'  style="width:10px">COURT</th>
                                <th class='text-center'  style="width:10px">DATE COMMITTED</th>
                                <th class='text-center'  style="width:10px">PLACE</th>
                            </thead>

                            <tbody class='text-center'>
                               <?php  
                                    if($crime != '')
                                    {
                                        $no = 1;                                    
                                        foreach ($crimeIndex as $ci) 
                                        {
                                            echo '<tr align="center">';
                                                echo "<td class='text-center'>".$no."</td>";
                                                echo "<td class='text-center'>".$ci['nameOfInmate']."</td>";
                                                echo "<td class='text-center'>".$ci['crime']."</td>";
                                                echo "<td class='text-center'>".$ci['case_no']."</td>";
                                                echo "<td class='text-center'>".$ci['court']."</td>";
                                                echo "<td class='text-center'>".$ci['dateCommitted']."</td>";
                                                echo "<td class='text-center'>".$ci['place']."</td>"; 
                                            echo "</tr>";
                                            $no++;
                                        }
                                    }
                                    else
                                    {
                                        // echo "<tr>";
                                        //     echo "<td colspan='7' class='text-center'> No data to show. Select a crime first.</td>";
                                        // echo "</tr>";
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