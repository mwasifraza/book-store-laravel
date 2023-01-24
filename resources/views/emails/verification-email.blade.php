<!doctype html>
<html lang="en">
<head>
<title>Online Book Store</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- mobile will display zoomed in -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
<meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
<meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS -->
<meta name="format-detection" content="address=no"> <!-- disable auto address linking in iOS -->
<meta name="format-detection" content="email=no"> <!-- disable auto email linking in iOS -->
<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="p-5 bg-warning text-center">
    {{-- <div><i class="fa-solid fa-book fa-4x"></i></div> --}}
    <div>
        <?xml version="1.0" encoding="utf-8"?>
        <svg fill="#000000" width="100px" height="100px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <title>book1</title>
        <path d="M17 26c0 0 6.188-2.062 11 1.812 0-0.062 0-1.812 0-1.812-5.625-3.125-11 0-11 0zM2 6v19.875c0 0 2.688-1.938 6.5-1.938s6.5 1.938 6.5 1.938v-19.625c0 0-2.688-2.25-6.5-2.25s-6.5 2-6.5 2zM4 8h4v5h-4v-5zM13 21h-9v-1h9v1zM13 19h-9v-1h9v1zM13 17h-9v-1h9v1zM13 15h-9v-1h9v1zM9 8h4v1h-4v-1zM9 10h4v1h-4v-1zM9 12h4v1h-4v-1zM22.5 4c-3.812 0-6.5 2-6.5 2v19.875c0 0 2.688-1.938 6.5-1.938s6.5 1.938 6.5 1.938v-19.625c0 0-2.688-2.25-6.5-2.25zM27 21h-9v-1h9v1zM27 19h-9v-1h9v1zM27 17h-9v-1h9v1zM27 15h-9v-1h9v1zM27 13h-9v-1h9v1zM27 11h-9v-1h9v1zM27 9h-9v-1h9v1zM3 26c0 0 0 1.75 0 1.812 4.812-3.874 11-1.812 11-1.812s-5.375-3.125-11 0z"></path>
        </svg>
    </div>
    <h3 class="">Online Book Store</h3>
    <h1 class="text-uppercase mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 640 512"><<path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0l57.4-43c23.9-59.8 79.7-103.3 146.3-109.8l13.9-10.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176V384c0 35.3 28.7 64 64 64H360.2C335.1 417.6 320 378.5 320 336c0-5.6 .3-11.1 .8-16.6l-26.4 19.8zM640 336a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-76.7-43.3c6.2 6.2 6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 353.4l60.7-60.7c6.2-6.2 16.4-6.2 22.6 0z"/></svg>
        Verify Your Email Address
    </h1>
</div>
<div class="p-5 text-center bg-light">
    <h3>Hello {{ $name ?? "" }}!</h3>
    <p>Please click the button below to verify your email address.</p>
    <a href="{{ $url ?? "" }}" class="btn btn-warning px-5 mb-3">Verify Email Address</a>
    <p>Note: If you did not create an account, no further action is required.</p>
    <div>
        <p>Regards:</p>
        <h6>Online Book Store Team.</h6>
    </div>
</div>
</body>
</html>