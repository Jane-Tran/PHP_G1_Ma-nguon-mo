$(document).ready(function(){
    $("#add").click(function(){
       $("#insert").val("Thêm");
       $("#insert_form")[0].reset();
    });

        $('#insert_form').on("submit", function(event){  
                event.preventDefault();  
                if($('#schoolName').val() == "")  
                {  
                    alert(" Tên trường bỏ trống !!!");  
                }  
                else if($('#yearFrom').val() == "")  
                {  
                    alert(" Năm bắt đầu học bỏ trống !!!");  
                }  
                else if($('#yearTo').val() == "")  
                {  
                    alert("Năm kết thúc bỏ trống !!!");  
                }  
                else if($('#schoolAddress').val() == "")  
                {  
                    alert(" Địa chỉ bỏ trống !!!");  
                }
                else
                    $('#addModal').modal('hide');  
            
    }); 
});