function DisplayImg(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#DisplayProfil').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }

}