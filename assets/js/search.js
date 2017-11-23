$(function(){
	var pTable = $('#table-inmaterecords').DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "sServerMethod": "POST",
        "ajax": BASE_URL+"search/getinmates"
        // "columnDefs": [
        //     {
        //         "targets": [ 1 ],
        //         "visible": false,
        //         "searchable": false
        //     },
        //     {
        //         "targets": [ 2 ],
        //         "visible": false
        //     }
        // ]
    });

    $('#table-inmaterecords').on('click','tbody tr',function(){

	    var itemid = $(this).find("td:first").html();
	    $.colorbox({
            href:BASE_URL+"search/inmateinfo_modal/"+itemid,
            closeButton:false,
            overlayClose: false,
            width:700
        });
	});

    $("body").on("click",".colorboxClose",function(){
        $.colorbox.close();
    });
})	