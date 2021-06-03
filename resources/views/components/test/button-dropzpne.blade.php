<style>

/* IMAGe */
.file-upload {
  background-color: #ffffff;
  width: 600px;
  /* margin: 0 auto; */
  padding: 20px;
}

/* .file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: rgb(0, 135, 247);
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid rgb(0, 135, 247)4B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: rgb(0, 135, 247);
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
} */

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed rgba(33, 97, 180, 0.5);
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: rgba(0, 136, 247, 0.342);
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>



<div class="form-group row">
  <div class="file-upload">
    {{-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> --}}

    <div class="image-upload-wrap">
      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
      <div class="drag-text">
        <h3>
          <i class="fas fa-camera text-primary"></i>
        </h3>
      </div>
    </div>
    <div class="file-upload-content image-upload-wrap">
      <img class="file-upload-image" src="#" alt="your image" />
      <div class="image-title-wrap">
        <button type="button" onclick="removeUpload()" class="btn btn-danger">Remove <span class="image-title">Uploaded Image</span></button>
      </div>
    </div>
  </div>
</div>


<script>


  function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.image-upload-wrap').show();
  $('.file-upload-content').hide();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>