<!DOCTYPE html>
<html>
<head>
  <script src='assets/tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
	plugins : 'advlist autolink link image imagetools lists charmap print preview table bbcode help textcolor colorpicker fullscreen media',
	 toolbar: 'undo redo | styleselect | bold italic | link image | numlist  bullist | alignleft  aligncenter  alignright | forecolor  backcolor | table | preview media'
  });
  </script>
</head>

<body>
<h1>TinyMCE Quick Start Guide</h1>
  <form method="post">
    <textarea id="mytextarea">Hey ,There !</textarea>
  </form>
</body>
</html>