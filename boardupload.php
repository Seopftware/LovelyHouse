<html>
<head>
  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>
</head>
<body>
  <div id="fileuploader">Upload</div>




  <script>
$(document).ready(function()
{
 $("#fileuploader").uploadFile({
url:"upload.php",
fileName:"myfile",
acceptFiles:"image/*",
showPreview:true,
 previewHeight: "100px",
 previewWidth: "100px",
});
});
</script>
</body>
</html>
