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
                    Population
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <form class="form-inline">
                                <div class="form-group">
                                    <?php echo form_dropdown('year', $year_list, isset($_GET['year']) ? $_GET['year'] : 'default','id="selectYear" class="form-control" style="width: 80px"'); ?>
                                </div>
                                <button type="submit" class="btn btn-default btn-sm" style="padding: 4px 12px">Go</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12" id="populations"></div>
                </div>
            </div>
        </div>
    </div>
</div>