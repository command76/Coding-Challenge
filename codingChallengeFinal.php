<?php 
echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
echo "\t<label>Input CSV file</label>";
echo "\t<input type='file' name='fileToUpload' id='fileToUpload' accept='.csv'>";
echo "\t<input type='submit' value='Upload File' name='submit'>";
echo "</form>";
?>