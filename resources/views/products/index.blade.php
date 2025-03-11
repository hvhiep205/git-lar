<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Mô tả</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Đơn vị</th>
                <th>Mới</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->id_type }}</td>
                    <td>{!! $product->description !!}</td>
                    <td>{{ number_format($product->unit_price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($product->promotion_price, 0, ',', '.') }} VND</td>
                    <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100"></td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->new ? 'Mới' : 'Cũ' }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
