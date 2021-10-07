function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#output_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#input_img").change(function() {
    readURL(this);
});




var inputLocalFont = document.getElementById("file");
inputLocalFont.addEventListener("change",previewImages,false);

function previewImages(){
    var fileList = this.files;

    var anyWindow = window.URL || window.webkitURL;

    for(var i = 0; i < fileList.length; i++){
        var objectUrl = anyWindow.createObjectURL(fileList[i]);
        $('#imagePreview').append('<img src="' + objectUrl + '" width="200" height="200"/>');
        window.URL.revokeObjectURL(fileList[i]);

    }
    document.getElementById('hide_img').style.display='none'
}


