# php-compress-and-upload-image
Easily set quality and upload image for php
## Edit RImageUpload/RConfig.php
$upload_folder = "../uploads"; // Image upload folder

$max_file_size = 10; // Max file size (MB)
## Preview image before upload
```
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
```
## Author
Ramazan Alkan
