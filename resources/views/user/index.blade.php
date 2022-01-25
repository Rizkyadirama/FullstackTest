<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom2.css') }}">
    <title>Product</title>
</head>
<body>
<div class="container">
    <div class="box-custom">
    <h2 class="mt-5">Product</h2>

    <div class="row">
    @forelse ($prod as $p)
            <div class="col-sm-3">
                <div class="item-custom-box mb-5">
                <img  class="img-fluid" src="{{ Storage::url('public/product/').$p->image }}" alt="">
                    <h3 class="text-center">{{$p->nama_product}}</h3>
                    <p class="text-center">Rp {{$p->harga}}</p>
                    <p>{{$p->deskripsi}}</p>
                    <button class="btn btn-custom-green">beli</button>                   
                </div>
            </div>
    @empty
        <h2>Maaf product belum diinput</h2>
    @endforelse        
    </div>
    {{ $prod->links() }}
    </div>
</div>


</body>
</html>











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

 
