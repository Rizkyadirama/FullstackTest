@extends('product.producttopper')

@section('content')

<a href="{{ route('product.input') }}" class="btn btn-custom-green mb-2">Tambah</a>
   
	<div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Product</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Waktu dibuat</th>
                    <th>Terakhir di ubah</th>                    
                </tr>
            </thead>
                @forelse ($prod as $p)
            <tbody>
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nama_product}}</td>
                    <td>{{$p->deskripsi}}</td>
                    <td>{{$p->harga}}</td>
                    <td>{{$p->nama_kategori}}</td>
                    <td>
                        <img  class="img-fluid" src="{{ Storage::url('public/product/').$p->image }}" alt="">
                    </td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->updated_at}}</td>
                </tr>
                @empty
                <div class="alert alert-custom-red">
                    Belum ada Product
                </div>
                @endforelse
            </tbody>
        </table>
    </div>


    



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