<div class="container my-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-4">Product List</h1>

    <!-- Grid Produk -->
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 mb-4">
            <!-- Kartu Produk dengan Efek Hover -->
            <div class="card h-100 shadow-sm card-hover">

                <!-- Gambar Produk (Jika Ada) -->


                <!-- Detail Produk -->
                <div class="card-body">
                    <!-- Nama Produk -->
                    <h5 class="card-title">{{ $product['name'] }}</h5>

                    <!-- Deskripsi Produk -->
                    <p class="card-text text-muted">{{ $product['description'] }}</p>

                    <!-- Harga Produk -->
                    <p class="card-text fw-bold">${{ $product['price'] }}</p>

                    <!-- Tombol Tambah ke Keranjang dengan Ikon -->
                    <a href="#" class="btn btn-gradient w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart me-2"></i> Add to Cart
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Tambahkan CSS untuk Efek Hover dan Tombol Gradasi -->
<style>
    /* Efek Hover untuk Kartu Produk */
    .card-hover:hover {
        transform: translateX(10px);
        /* Geser ke kanan */
        transition: transform 0.3s ease;
        /* Animasi transisi */
    }

    /* Efek Hover pada Gambar Produk (Jika Ada) */
    .card-hover:hover .card-img-top {
        transform: translateX(-10px);
        /* Geser gambar ke kiri */
        transition: transform 0.3s ease;
    }

    /* Styling untuk Tombol Gradasi */
    .btn-gradient {
        background: linear-gradient(90deg, #007bff, #00c6ff);
        /* Gradasi biru */
        color: white;
        /* Warna teks putih */
        border: none;
        /* Menghapus border */
    }

    /* Efek Hover pada Tombol Gradasi */
    .btn-gradient:hover {
        background: linear-gradient(90deg, #0056b3, #008fbf);
        /* Gradasi lebih gelap */
    }
</style>

<!-- Tambahkan Bootstrap Icons untuk Ikon Keranjang -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">