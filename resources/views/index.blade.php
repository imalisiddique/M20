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

<a href="{{ route('products.index') }}">All Products</a>
<br>
<br>

<form>

  
  <select name="perPage" id="perpage">
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
  </select>
  <select name="sortBy" id="sort">
    <option value="name">Name</option>
    <option value="price">Price</option>
  </select>
  <select name="order" id="order">
    <option value="asc">ASC</option>
    <option value="desc">DESC</option>
  </select>

  <input type="text" id="search" name="search" placeholder="search"><br><br>
  <input type="submit" value="Submit">
</form> 


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