/**
 * Youtube search - a TinyMCE youtube search and place plugin
 * youtube/plugin.js
 *
 * This is not free software
 *
 * Plugin info: http://www.cfconsultancy.nl/
 * Author: Ceasar Feijen
 *
 * Version: 2.0 released 14/08/2014
 */
tinymce.PluginManager.add('galeria', function(editor) {
    function openmanager() {
        win = editor.windowManager.open({
            title: 'Escolha a Galeria',
            file: tinyMCE.baseURL + '/plugins/galeria/galeria.html',
	    	width: 500,
            height: 145,
            inline: 1,
        });

    }
	editor.addButton('galeria', {
		icon: true,
		image: tinyMCE.baseURL + '/plugins/galeria/icon.png',
		tooltip: 'Galeria',
		shortcut: 'Ctrl+G',
		onclick: openmanager
	});

	editor.addShortcut('Ctrl+G', '', openmanager);

	editor.addMenuItem('galeria', {
		icon:'media',
		text: 'Galeria',
		shortcut: 'Ctrl+G',
		onclick: openmanager,
		context: 'insert'
	});
});
