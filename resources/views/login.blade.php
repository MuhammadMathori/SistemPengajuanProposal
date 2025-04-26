<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="">
        <div class="warapper">
            <form action="/login" method="POST">
                @csrf
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Your email"
                        @error('email') is-invalid @enderror required>
                    <label for="email"></label>
                    <i class="bi bi-person-circle"></i>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Your  Password" required>
                    <label for="password"></label>
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <button type="submit" class="btn">Login</button>
                {{-- <div class="register-link">
                    <p>Don't have an account? <a href="/register">Register Now</a></p>
                </div> --}}
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    @if ($errors->any())
        <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
        </div>
    @endif

    <script type="text/javascript">
        var cekError = {{ $errors->any() > 0 ? 'true' : 'false' }};
        var ht = $("#ERROR_COPY").html();
        if (cekError) {
            Swal.fire({
                title: 'Errors',
                icon: 'error',
                html: ht,
                showCloseButton: true,
            });
        }
    </script>
</body>

</html>
