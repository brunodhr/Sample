tinymce.init({
  menubar: false,
  selector:'textarea.customRichTextBox',
  skin: 'voyager',
  min_height: 600,
  resize: 'vertical',
  plugins: 'link, image, code, youtube, giphy, table, textcolor, lists, galeria',
  extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
  file_browser_callback: function(field_name, url, type, win) {
          if(type =='image'){
            $('#upload_file').trigger('click');
          }
      },
  toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code galeria',
  convert_urls: false,
  image_caption: true,
  image_title: true,
  content_css: tinyMCE.baseURL + '/plugins/galeria/css/galeria.css',
  extended_valid_elements : "gallery[value]",
  custom_elements: "gallery"
});
