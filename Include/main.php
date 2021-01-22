<section id="DisUpload" class="upload" style="text-align: center; margin-top: 5em;">
    <h1>Upload</h1>
    <form class="form-upload" id="uploadForm">
        <input style="display: none;" type="file" id="file" name="file"><br>
        <label for="file">Select File</label><br>
        <button type="submit">Upload</button>
    </form>
</section>

<a style="position: fixed; bottom: 1em; right: 1em; color: red" onclick="logout();">Logout</a>

<script>
    const form = document.getElementById('uploadForm');
    const file = document.getElementById('file');

    form.addEventListener("submit", e => {
        e.preventDefault();

        const formData = new FormData();

        formData.append("file", file.files[0]);

        fetch("Include/upload.php", {
            method: "post",
            body: formData
        }).catch(console.error);
    });
</script>