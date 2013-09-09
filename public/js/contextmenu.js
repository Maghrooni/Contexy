$(function() {

    $("#contextmenu").sortable({cursor: "move"}).disableSelection().menu({ position: { my: "left top", at: "right-5 top+5", collision: 'flipfit' } });
    $(document).bind("contextmenu", function(e) {
        e.preventDefault();
        $('#contextmenu').show().css({
            top: e.pageY + 'px',
            left: e.pageX + 'px'
        })
    }).click(function() {
        $('#contextmenu').hide();
    });
});