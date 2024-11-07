<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<h2>Product Lists</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
  <tr>
    <th>Product Name</th>
    <th>Product Description</th>
    <th>Price</th>
    <th>Stock</th>
    <th></th>
  </tr>

  @foreach ($products as $product)
  <tr>
    <td>{{ $product->name }} </td>
    <td>{{ $product->description }} </td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->stock }}</td>
    <td><a href="{{ route('products.edit', $product->id) }}">Edit</a> | <a href="{{ route('products.show', $product->id) }}">View</a> | <form method="POST" action="{{ route('products.destroy', $product->id) }}"> @csrf @method('DELETE')<button>Delete</button></form></td>
  </tr>
  @endforeach
</table>

<br>
<br>

{{ $products->links() }}

<a href="{{ route('products.create') }}">Create Product</a>