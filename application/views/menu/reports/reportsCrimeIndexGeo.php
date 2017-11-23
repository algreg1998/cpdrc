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
                            <select name="place" class='form-control' style='width:20%; display: inline' >
                                <option value=''> Select a location </option>
                                <?php
                                    $crimeCount = 0;
                                    foreach ($crimeIndex as $key) 
                                    {
                                        $crimeCount = $key['crimeCount'];
                                    }

                                    foreach($place_options as $category)
                                    {
                                        echo "<option value='{$category}'";
                                        if($category == $id)
                                        {
                                            echo "selected";
                                        }    
                                        echo ">{$category}";
                                    }
                                 ?>                                          
                            </select> 
                        </div>    
                        <button type="submit" class="btn btn-success">Submit</button>
                    <?php echo form_close(); ?>          

                    <br>
                    <?php if(count($crimeIndex)!= 0){ ?>
                    <form action="<?php echo site_url()?>cpdrc/pages/printCrimeIndexGeo" method="POST">
                        <input name="place" id='place' class="hidden" value="<?php echo $place;?>">
                        <button type="submit" class="btn btn-default"  id='printCrimeIndex'><i class="fa fa-print"></i> Print</button>
                    </form>
                    <?php }?>
                </div>
 
                <div class="panel-body" id="section-to-print">
                     <h3 class="text-center"> <strong>
                        <?php 
                            if($place != '')
                            {                                
                                echo strtoupper($place);                                
                                echo " ({$crimeCount})";
                            }
                            else
                            {
                                echo "CRIME INDEX - GEOGRAPHICAL";
                            }
                        ?>
                    </strong></h3>
                    <div class="table-responsive" >
                        <table class="table table-bordered table-hover table-striped tablesorter" id="crimeindex-violation"  style="font-size: 10px;">
                            <thead>
                                <th class='text-center' style="width:25px">NO.</th>
                                <th class='text-center' style="width:70px">NAME OF INMATE</th>
                                <th class='text-center' style="width:70px">CRIME</th>
                                <th class='text-center'  style="width:10px">CASE NO.</th>
                                <th class='text-center'  style="width:10px">COURT</th>
                                <th class='text-center'  style="width:10px">DATE COMMITTED</th>
                                <th class='text-center'  style="width:10px">PLACE</th>
                                <th class='text-center' style="width:10px">QTY</th>
                            </thead>

                            <tbody class="text-center">
                               <?php  
                                    if($place != '')
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
                                                echo "<td class='text-center'>".$ci['qty']."</td>";   
                                            echo "</tr>";
                                            $no++;
                                        }
                                    }
                                    else
                                    {
                                       
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