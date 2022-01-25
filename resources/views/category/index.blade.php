@extends('header')

@section('content')
    
    <button type="button" class="btn btn-custom-green mb-2" data-bs-toggle="modal" data-bs-target="#input">
        Tambah
    </button>
	<div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
                    <th>Waktu dibuat</th>
                    <th>Terakhir di ubah</th>
                    <th></th>
                </tr>
            </thead>
                @forelse ($cat as $c)
            <tbody>
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nama_kategori}}</td>
                    <td>{{$c->created_at}}</td>
                    <td>{{$c->updated_at}}</td>
                    <td class="d-flex justify-content-center">
                        
                        <form  onsubmit="return confirm('Anda yakin ingin menghapus? tindakan ini tidak bisa dibatalkan');" action="{{ route('category.destroy', $c->id) }}" method="POST">                                                                    
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-danger mx-1">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-custom-gray mx-1" data-bs-toggle="modal" data-bs-target="#edit{{$c->id}}">
                            Edit
                        </button>

                    </td>
                </tr>
                @empty
                <div class="alert alert-custom-red">
                    Belum ada kategori
                </div>
                @endforelse
            </tbody>
        </table>
    </div>

<!--  Modal for input-->
<div class="modal fade" id="input">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Masukkan Kategori</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">                        
                        @csrf                                              
                            <input type="text" class="w-100 d-block mb-2" name="namaCategory" required >
                            <!-- error message -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror                    
                        <button type="submit" class="btn btn-custom-green w-100 d-block mb-2">SIMPAN</button>
                        <button type="reset" class="btn btn-light w-100 d-block mb-2">RESET</button>
      </form> 
      </div>    

    </div>
  </div>
</div>
<!-- modal end -->



@foreach($cat as $c)
<!--  Modal for Edit-->
<div class="modal fade" id="edit{{$c->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah Kategori</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{ route('category.update', $c->id) }}" method="POST" enctype="multipart/form-data">                        
                        @csrf         
                        @method('PUT')              
                            <input type="text" class="w-100 d-block mb-2" name="nama" value="{{$c->nama_kategori}}" required >
                            <!-- error message -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror                    
                        <button type="submit" class="btn btn-custom-green w-100 d-block mb-2">SIMPAN</button>
                        <button type="reset" class="btn btn-light w-100 d-block mb-2">RESET</button>
      </form> 
      </div>    

    </div>
  </div>
</div>
<!-- modal end -->
@endforeach











    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'Berhasil'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'Gagal'); 
            
        @endif
    </script>

 
@endsection