
{{ $product->name }} <br>
{{ $product->description }}<br>
{{ $product->price }}<br>
{{ $product->stock }}<br>
<img src="/upload/images/{{  $product->image }}" alt="" width="240px"><br>


<a href="{{ route('products.create') }}">Create Product</a><br><br>

<a href="{{ route('products.index') }}">All Products</a>