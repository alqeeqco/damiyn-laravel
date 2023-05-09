$(document).ready(function () {

    $(document).on("click", "#task1", function (e) {
        $('#task2').show();
        $('#task1').hide();
    });
    $(document).on("click", "#task2", function (e) {
        $('#task3').show();
        $('#task2').hide();
    });
    $(document).on("click", "#task3", function (e) {
        $('#task1').show();
        $('#task3').hide();
    });


});
