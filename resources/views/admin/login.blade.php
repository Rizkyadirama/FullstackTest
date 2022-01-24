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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">
    <title>Document</title>
    
</head>
<body>
<div class="container">
    <div class="vh-100 d-flex justify-content-center flex-wrap align-content-center">
        <div class="p-4 box-login ">
            <form action="#">
                <h3 class="text-center my-2">Login</h3>
                <input class="d-block p-2 mb-2" type="text" placeholder="Username">
                <input class="d-block p-2 mb-2" type="password" placeholder="Password">
                <button class="w-100 btn btn-primary my-2">submit</button>
            </form>
            <a href="#">forgot password</a><br>
            <a href="/">back</a>
        </div>        
    </div>
</div>

</body>
</html>