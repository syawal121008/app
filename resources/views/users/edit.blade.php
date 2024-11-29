<h1>Form User</h1>
<form action="{{route('user.update',$dataEdituser->user_id)}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    Name : <input type="text" name="name" value="{{$dataEdituser->name}}"></br>
    @if ($errors->has('name'))
    <span class="label label-danger">{{ $errors->first('name') }}</span>
    @endif</br>
    Email : <input type="email" name="email" value="{{$dataEdituser->email}}"></br>
    @if ($errors->has('email'))
    <span class="label label-danger">{{ $errors->first('email') }}</span>
    @endif</br>
    Password : <input type="password" name="password" value=""></br>
    Role : <input type="radio" name="role" value="Admin" {{ ($dataEdituser->role=="Admin")? "checked" : "" }}>Admin
    <input type="radio" name="role" value="Cashier" {{ ($dataEdituser->role=="Cashier")? "checked" : "" }}>Cashier</br>
    @if ($errors->has('role'))
    <span class="label label-danger">{{ $errors->first('role') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>