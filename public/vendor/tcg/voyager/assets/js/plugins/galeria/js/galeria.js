/**
 * Youtube search - a TinyMCE youtube search and place plugin
 * youtube/js/youtube.js
 *
 * This is not free software
 *
 * Plugin info: http://www.cfconsultancy.nl/
 * Author: Ceasar Feijen
 *
 * Version: 2.0 released 14/08/2014
 */

$(function () {

	$.ajax({
		type: "GET",
		url: "/admin/galeria/ajaxgetlist",
		success: function(s) {
			// $.each(s, )
			$('#galleryList').empty();
			for(var key in s){
				$('#galleryList').append($('<option>', {
			        value: key,
			        text : s[key]
			    }));
			}
		}
	});

	$('#btnInsert').click(function(){
		var gallery_id = $('#galleryList').val();
		var sHTML = '<gallery value="'+gallery_id+'"></gallery>';
		parent.tinymce.activeEditor.insertContent(sHTML);
	});

});
