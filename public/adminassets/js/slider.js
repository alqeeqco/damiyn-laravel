$(document).ready(function(){

    $(document).on('click','#add_image',function(e){
        e.preventDefault();
        if (!$("#photo").length) {
            $("#add_image").hide();
            $("#cancel_add_image").show();
            $("#oldimage").html(
                '<br><input type="file" onchange="readURL(this)"  name="logo" id="logo" > '
            );
        }
        return false;
    });
    $(document).on("click", "#cancel_add_image", function (e) {
        e.preventDefault();

        $("#add_image").show();
        $("#cancel_add_image").hide();
        $("#oldimage").html("");

        return false;
    });

});
