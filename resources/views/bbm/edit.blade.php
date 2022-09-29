<form action="{{ route('kendaraan.update',$kendaraan->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="form-group">
    <label for="">Nam Kendaraan</label>
    <input type="text" name="nama" value="{{ $kendaraan->nama }}" class="form-control">   
</div>
<div class="form-group">
    <label for="">Warna</label>
    <input type="text" name="warna" value="{{ $kendaraan->warna }}" class="form-control">   
</div>
<div class="form-group">
    <label for="">No Polisi</label>
    <input type="text" name="no_polisi" value="{{ $kendaraan->no_polisi }}" class="form-control">   
</div>
<div class="form-group">
    <img width="150" height="150" @if($buku->gambar) src="{{ asset('Storage/'.$kendaraan->gambar) }}" @endif />
    <input type="file" name="gambar" value="{{ $kendaraan->gambar }}" class="uploads form-control mt-2">   
</div>
<div class="float-right">
    <button type="reset" class="btn btn-danger">reset</button>
    <button type="submit" class="btn btn-primary">update</button>
</div>
</form>

<script>
 function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                return false
            })
        })

</script>