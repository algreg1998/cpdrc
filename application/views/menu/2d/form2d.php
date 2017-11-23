<div class="row" id="append">
	<div class="col-md-12">
		<div id="photodiv">
			<div align="center" id="error">
				<img src="<?=base_url()?>uploads/markings/source/192x192.jpg" width="300" height="300">
			</div>
			
			<form id="photoform" enctype="multipart/form-data">
				<input type="hidden" name="source" value="<?=$source;?>">
				<input type="hidden" name="type" value="<?=$type;?>">
				<input type="hidden" name="id" value="<?=$id;?>">
				<input  required type="file" name="userfile" id="photo">
				<label><b>Name of the mark</b></label><input type="text" class="form-control" name="markname" required autofocus placeholder="The name of the markings (tattoo, scar, etc.)">
				<label><b>Scar Type</b></label>
				<select class="form-control" name="markType" required> 
					<option value="scars">Scars</option>
					<option value="tatoo">Tatoo</option>
					<option value="birthmark">Birthmark</option>
					<option value="others">Other</option>
				</select>
				<label><b>Description</b></label><textarea rows="6" type="text" class="form-control" name="desc" placeholder="You may add the exact location of the markings.." required></textarea>
				
				<button class="btn btn-warning btn-xs form-control" style="margin-top:15px;" type="submit" id="uploadphoto">Submit data</button>
			</form> 
		</div>
	</div>
</div>

		<script>
          $("#photoform").submit(function(){
              var formdata=new FormData($("#photoform")[0]);
              var loader="<i class='fa fa-spinner fa-spin'></i> Uploading photo...";
              $("#photodiv").html(loader);
                 $.ajax({data:formdata,cache: false,contentType: false,
                    processData: false, type:'POST' ,url: '<?php echo site_url(); ?>cpdrc/markingmale',
                                          success:function(e){                 
                                              $("#photodiv").html(e);
                                              $("#paneltitle").html("Recently registered markings");
                                              
                                          }
                }); //end of ajax 
                return false;
          });
  
        </script>