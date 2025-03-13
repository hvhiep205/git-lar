<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Chỉnh sửa sản phẩm</h2>

        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product['name'] }}" required>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Link ảnh đại diện</label>
                <input type="url" name="avatar" id="avatar" class="form-control" value="{{ $product['avatar'] }}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

    </div>

</body>
</html>
