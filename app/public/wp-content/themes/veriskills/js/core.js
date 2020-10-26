$(function () {

    $("#faq_accordion").on('show.bs.collapse', function(e) {
        $(e.target).closest(".card").addClass("open");
    });

    $("#faq_accordion").on('hide.bs.collapse', function(e) {
        $(e.target).closest(".card").removeClass("open");
    });

});