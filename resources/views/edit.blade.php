<h2>Create Product</h2>
<a href="{{ route('products.index') }}">All Products</a>
<br>
<br>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form method="POST" action="{{ route('products.update', $product->id ) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    Product Name<br>
    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    Product description<br>
    <input type="text" name="description" value="{{ $product->description }}"><br><br>

    Product price<br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    Product stock<br>
    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    Product Image<br>
    <input type="file"name="image"><br><br>

    <input type="submit" value="Update">
</form>