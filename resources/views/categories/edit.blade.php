<h1>Form Category</h1>
<form action="{{route('category.update',$dataEditcategory->category_id)}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    Category Name : <input type="text" name="category_name" value="{{$dataEditcategory->category_name}}" /></br>
    @if ($errors->has('category_name'))
    <span class="label label-danger">{{ $errors->first('category_name') }}</span>
    @endif</br>
    Description : <textarea name="description">{{$dataEditcategory->description}}</textarea></br>
    @if ($errors->has('description'))
    <span class="label label-danger">{{ $errors->first('description') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>