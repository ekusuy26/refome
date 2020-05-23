$(function() {
  $("#img-file").on('change', function(e){
    var reader;
    if (e.target.files.length) {
      reader = new FileReader;
      reader.onload = function(e) {
        var userThumbnail;
        userThumbnail = document.getElementById('thumbnail');
        $("#img-preview").addClass("is-active");
        $("#thumbnail").addClass("is-img");
        userThumbnail.setAttribute('src', e.target.result);
      };
      return reader.readAsDataURL(e.target.files[0]);
    }
  });
});
