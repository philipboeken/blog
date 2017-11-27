require('froala-editor/js/froala_editor.pkgd.min.js');

$(function () {
  $('textarea.post').froalaEditor({
    charCounterCount: false,
    toolbarButtons: ['bold', 'italic', 'underline', '|', 'fontFamily', 'fontSize', 'color', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons', '|', 'undo', 'redo']
  });
  $('textarea.comment').froalaEditor({
    charCounterMax: 140,
    toolbarButtons: ['bold', 'italic', 'underline', 'color', '|', 'emoticons']
  });
  $('div[style="position: absolute; bottom: 0px; left: 0px; z-index: 9999;"]').remove();
});