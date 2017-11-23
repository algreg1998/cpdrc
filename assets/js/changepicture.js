function selectFile(){
    $("input[name=photo]").trigger("click");
}

function resetCrop(){
    $("#theimage").cropper("destroy");
}

function showimagepreview(input) {
    if (input.files && input.files[0]) {
        var filerdr = new FileReader();
        filerdr.onload = function(e) {

            var $image = $("#theimage"),
            $dataX = $("#data-x"),
            $dataY = $("#data-y"),
            $dataHeight = $("#data-height"),
            $dataWidth = $("#data-width");

            $image.cropper({
                aspectRatio: 1,
                preview: ".img-preview",
                minHeight : 100,
                minWidth : 100,
                done: function(data) {
                    $dataX.val(data.x);
                    $dataY.val(data.y);
                    $dataHeight.val(data.height);
                    $dataWidth.val(data.width);
                }
            });
    
            $("#theimage").cropper("setImgSrc",e.target.result);
        }
        
        filerdr.readAsDataURL(input.files[0]);
    }
}