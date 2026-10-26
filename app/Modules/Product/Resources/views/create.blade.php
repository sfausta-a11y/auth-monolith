<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 500px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { padding: 10px 20px; background: #198754; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-back { display: inline-block; margin-bottom: 15px; color: #6c757d; text-decoration: none; }
    </style>
</head>
<body>
    <a href="{{ route('products.index') }}" class="btn-back">&larr; Kembali ke Daftar Produk</a>
    
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Produk:</label>
            <input type="text" name="name" required placeholder="Contoh: Keyboard Mechanical">
        </div>
        
        <div class="form-group">
            <label>Harga (Rp):</label>
            <input type="number" name="price" required placeholder="Contoh: 350000">
        </div>
        
        <div class="form-group">
            <label>Stok:</label>
            <input type="number" name="stock" required placeholder="Contoh: 15">
        </div>
        
        <button type="submit" class="btn-submit">Simpan Produk</button>
    </form>
</body>
</html>