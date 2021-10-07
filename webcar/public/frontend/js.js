$('.addservice').click(function (event){
    event.preventDefault();
    $.ajax({
        url: $(this).attr('href')
        ,success: function(response) {
            if (response == "success"){
                alertify.success('Đã thêm dịch vụ vào danh sách');
            }else{
                alertify.error('Dịch vụ đã có trong danh sách');
            }

        }
    });
    return false; //for good measure
});


