
<!-- ----------------------model--------------- -->
protected $appends=['file_url'];
public function getFileUrlAttribute(){
return $this->image? url('uploads/'.$this->image):url('uploads/no_img.png');
}

<!-- ------------------------add-edit------------------------- -->
 
<div class="uploadIcon d-flex justify-content-center">

    <img class="img-thumbnail imgUpload" src="{{isset($data)? $data->file_url:'uploads/no_img.png'??''}}"
        width="200px" style="border-radius: 50%;">
</div>
<input type="file" id="photo" style="display: none;" value="image" name="image">

<!-- --------------------jqury--------------------- -->
<script>
    $(".uploadIcon").click(function() {
        $("#photo").trigger('click');
    });
    $("#photo").change(function() {
        file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                $(".imgUpload")
                    .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>