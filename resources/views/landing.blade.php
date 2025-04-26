<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-text {
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-text p {
            font-size: 1.25rem;
        }

        .features .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .features .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        section {
            padding: 60px 0;
        }

        #about p {
            max-width: 800px;
            margin: auto;
            font-size: 1.1rem;
            color: #555;
        }

        #programs .card-title {
            font-weight: 600;
            color: #2a5298;
        }

        #contact form .form-control {
            border-radius: 12px;
            border-color: #ced4da;
        }

        #contact button {
            border-radius: 12px;
            background-color: #2a5298;
            border: none;
        }

        #contact button:hover {
            background-color: #1e3c72;
        }

        footer {
            background: #1e1e2f;
            color: white;
            padding: 40px 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Modern University</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">Program</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item login-btn"><a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header>
        <div class="container">
            <div class="hero-text">
                <h1 class="display-4">Selamat Datang di Modern University</h1>
                <p class="lead">Universitas masa depan dengan pendekatan pembelajaran inovatif dan teknologi terkini.
                </p>
                <a href="#programs" class="btn btn-light btn-lg mt-3">Lihat Program</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="container text-center">
            <h2 class="mb-4">Tentang Kami</h2>
            <p>Modern University adalah institusi pendidikan tinggi yang mengedepankan inovasi, teknologi, dan
                pengembangan karakter. Kami berkomitmen untuk mencetak lulusan yang siap bersaing di tingkat global.</p>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="features bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Program Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="card-title">Teknologi Informasi</h5>
                        <p class="card-text">Mempelajari teknologi terkini seperti AI, Data Science, dan pengembangan
                            perangkat lunak.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="card-title">Bisnis Digital</h5>
                        <p class="card-text">Menggabungkan konsep bisnis dan teknologi digital untuk menciptakan inovasi
                            baru.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="card-title">Desain Komunikasi Visual</h5>
                        <p class="card-text">Kembangkan kreativitas dalam desain grafis, UI/UX, dan media digital.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="text-center mb-4">Hubungi Kami</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 Modern University. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
