<h1>FORM PRODUCTS</h1>
<form action="{{ route('product.update',$dataEditproduct) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <label>Product Name</label>
    <input type="text" name="product_name" value="{{$dataEditproduct->product_name}}"></br>
    @if ($errors->has('product_name'))
    <span class="label label-danger">{{ $errors->first('product_name') }}</span>
    @endif</br>
    <label for="photo">Foto Produk:</label>
    <input type="file" name="photo"><br>

    @if($dataEditproduct->photo)
    <p>Foto Saat Ini: <img src="{{ asset('storage/' . $dataEditproduct->photo) }}"
            alt="{{ $dataEditproduct->product_name }}" width="100"></p>
    @endif

    <label class="control-label col-sm-2">Product Category</label>
    <select name="category_id">
        <option value="">Select Category</option>
        @foreach ($categories as $v)
        <option value="{{ $v->category_id }}" {{ $v->category_id ==
            $dataEditproduct->category_id ? 'selected' : '' }}>{{ $v->category_name }}</option>
        @endforeach
    </select></br>
    @if ($errors->has('category_id'))
    <span class="label label-danger">{{ $errors->first('category_id') }}</span>
    @endif</br>
    <label>Price</label>
    <input type="text" name="price" value="{{$dataEditproduct->price}}"></br>
    @if ($errors->has('price'))
    <span class="label label-danger">{{ $errors->first('price') }}</span>
    @endif</br>
    <label>Stock</label>
    <input type="text" name="stock" value="{{$dataEditproduct->stock}}"></br>
    @if ($errors->has('stock'))
    <span class="label label-danger">{{ $errors->first('stock') }}</span>
    @endif</br>
    <label>Product Description</label>
    <textarea type="text" name="product_description">{{$dataEditproduct->product_description}}</textarea></br>
    @if ($errors->has('product_description'))
    <span class="label label-danger">{{ $errors->first('product_description') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>