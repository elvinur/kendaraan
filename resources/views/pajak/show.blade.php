
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            @if ($kendaraan->gambar)
                <img width="150" height="150" @if($kendaraan->gambar) src="{{ asset('Storage/'.$kendaraan->gambar) }}" @endif />
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> {{ $kendaraan->nama_kendaraan }}</li>  
                        <!-- <li class="list-group-item">Tipe : {{ $kendaraan->tipe }}</li>  
                        <li class="list-group-item">Merek : {{ $kendaraan->merek }}</li>   -->
                        <li class="list-group-item">No_polisi : {{ $kendaraan->no_polisi }}</li>  
                    </ul>
                </div>
                <div class="card-text text-right"><small class="text-muted">{{  $kendaraan->nama_kendaraan }}</small></div>
            </div>
        </div>
    </div>
</div>

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