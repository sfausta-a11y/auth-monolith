<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .btn { display: inline-block; padding: 8px 16px; background: #0d6efd; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>