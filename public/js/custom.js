$(function () {
    $('gallery').each(function( index ) {
        var gallery_id = $(this).attr('value');
        var elm = $(this);
        console.log($(this).parent());
        $.ajax({
        	type: "GET",
        	url: "/admin/midias/gethtml/"+gallery_id,
        	success: function(s) {
                elm.after(s);
                elm.remove();
        	}
        });
    });
});