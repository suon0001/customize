<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<footer class="bg-black">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="img/logo.png" alt="" width="180" class="mb-3">
                <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <ul class="list-inline mt-4">
                    <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-reddit"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-twitch"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-white">Shop</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="#" class="text-muted">Controller</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Headset</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Accessories</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">DYI</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-white">Company</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Wishlist</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-white">Newsletter</h6>
                <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
                <div class="p-1 rounded border">
                    <div class="input-group">
                        <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-light py-1">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">&copy <?php echo date('Y') ?></p>
        </div>
    </div>
</footer>
<!-- End -->

<style>
    body {
        background: #ff5f6d;
        background: -webkit-linear-gradient(to right, #ff5f6d, #ffc371);
        background: linear-gradient(to right, #ff5f6d, #ffc371);
        min-height: 100vh;
    }

    #button-addon1 {
        color: #ffc371;
    }

    i {
        color: #ffc371;
    }

    .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
    }

    .form-control.shadow-0:focus {
        box-shadow: none;
    }
</style>
</body>
</html>