$(function(){
	// $(".ajax").colorbox({
	// 	closeButton:false,
	// 	overlayClose: false
	// });

	$("body").on("click",".colorboxClose",function(){
		$.colorbox.close();
	});

})