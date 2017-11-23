
<div class="row">
	<p class="text-warning">Case information</p>
		<input type="hidden" name="cid" value="<?php echo $cid; ?>">
	<div class="col-md-4">
		<label>Case number</label>
		<input type="text" name="case_no" class="form-control" value="<?php echo $case_no; ?>" autofocus>
	</div>
	<div class="col-md-4">
		<label>Date of Confinement</label>
		<input type="date" name="confine" class="form-control" value="<?php echo $confine; ?>">
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<label>Court Name</label>
		<input type="text" name="court" class="form-control" value="<?php echo $court; ?>">
		<label>Crime</label>
		<input type="text" name="crime" class="form-control" value="<?php echo $crime; ?>">
		<label>Sentence</label>
		<input type="text" name="sentence" class="form-control" value="<?php echo $sentence; ?>">
		<label>Commencing</label>
		<input type="text" name="commencing" class="form-control" value="<?php echo $commencing; ?>">

	</div>
</div><br>
<div class="row">
		<p class="text-warning">Expected Date of Released</p>
	<div class="col-md-4">
		<label>With good conduct record</label>
		<input type="date" name="dategood" class="form-control" value="<?php echo $expireg; ?>">
	</div>
	<div class="col-md-4">
		<label>With bad conduct record</label>
		<input type="date" name="datebad" class="form-control" value="<?php echo $expireb; ?>">
	</div>
</div>