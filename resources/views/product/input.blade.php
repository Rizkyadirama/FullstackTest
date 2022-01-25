@extends('product.producttopper')

@section('content')

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="form-group">                            
                            <label class="font-weight-bold">Nama product</label>                            
                            <input type="text" name="nama" class="form-control" placeholder="Cth POS Mini" required>
                        </div>
                        <div class="form-group">                            
                            <label class="font-weight-bold">Harga</label>                            
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" name="harga" placeholder="Cth 5000000" class="form-control" required>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>                            
                            <select name="kategori" class="form-control">
                                <option value="">-pilih</option>
                                @foreach($option as $opt)
                                    <option value="{{$opt->nama_kategori}}">{{$opt->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>                            
                            <textarea class="form-control" name="desk" rows="5" placeholder="Deskripsi product" required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>                            
                            <input type="file" name="image" class="form-control"  required>
                        </div>

                        

                        <button type="submit" class="btn btn-md btn-custom-green mt-2">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-light mt-2">RESET</button>

                    </form> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>


@endsection