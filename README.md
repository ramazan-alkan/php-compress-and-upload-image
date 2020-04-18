# php-compress-and-upload-image
Easily set quality and upload image for php
## Edit RImageUpload/RConfig.php
$upload_folder = "../uploads"; // Image upload folder

$max_file_size = 10; // Max file size (MB)
## Button Disabled
![Button Disabled](https://raw.githubusercontent.com/ramazan-alkan/php-compress-and-upload-image/master/Screenshots/1.png)
## Preview Image and Enable Upload Button
![Preview Image and Enable Upload Button](https://raw.githubusercontent.com/ramazan-alkan/php-compress-and-upload-image/master/Screenshots/2.png)
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
## Compress and Upload Image
![Preview Image and Enable Button](https://raw.githubusercontent.com/ramazan-alkan/php-compress-and-upload-image/master/Screenshots/3.png)
## Author
Ramazan Alkan
