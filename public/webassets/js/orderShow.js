$(document).ready(function () {

    $(document).on("input", "#searchbyOrderNumber", function (e) {
        make_search();
    });
    $(document).on("change", "#Order_typeSearch", function (e) {
        make_search();
    });
    function make_search() {
        var token_search = $("#token_search").val();
        var ajax_search_url = $("#ajax_search_url").val();
        var searchbyOrderNumber = $("#searchbyOrderNumber").val();
        var Order_type = $("#Order_typeSearch").val();

        jQuery.ajax({
            url: ajax_search_url,
            type: "post",
            dataType: "html",
            cache: false,
            data: {
                "_token": token_search,
                Order_type: Order_type,
                searchbyOrderNumber: searchbyOrderNumber,
            },
            success: function (data) {
                $("#ajax_search_table").html(data);
            },
            error: function () {},
        });
    }



});
