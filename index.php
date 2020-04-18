<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIU (Ramazan Image Upload)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="upload.php" method="post" enctype='multipart/form-data'>
        <h1>RIU (Ramazan Image Upload)</h1>
        <div class="form-group">
            <input type="file" id="file" name="image" onchange="fileChanged()">
        </div>
        <div class="form-group">
            <label for="quality">Quality Size (%)</label>
            <input type="number" name="quality" class="quality" value="60">
        </div>
        <button type="submit" name="upload" id="upload" disabled>Upload Image</button>
    </form>

    <p id="text">Choose a image for enable upload button!</p>
    <img width="200px" id="img">

</body>
    <script>
        function fileChanged() {
            var file = document.getElementById("file");
            var text = document.getElementById("text");
            var img = document.getElementById("img");
            if (file.value != "") {
                text.innerText = "File selected, upload button enabled.";
                var fReader = new FileReader();
                fReader.readAsDataURL(file.files[0]);
                fReader.onloadend = function(event){
                    var img = document.getElementById("img");
                    img.src = event.target.result;
                    document.getElementById("upload").disabled = false;
                }
            } else {
                document.getElementById("upload").disabled = true;
                text.innerHTML = "<p style='color:red'>Choose a image for enable upload button!</p>";
            }
        }
    </script>
</html>