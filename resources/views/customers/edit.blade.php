<h1>Form Customer</h1>
<form action="{{route('customer.update', $dataEditcustomer->customer_id)}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <label>Customer Name :</label>
    <input type="text" name="customer_name" value="{{$dataEditcustomer->customer_name}}"></br>
    @if ($errors->has('customer_name'))
    <span class="label label-danger">{{ $errors->first('customer_name') }}</span>
    @endif</br>
    <label>Email : </label>
    <input type="email" name="email" value="{{$dataEditcustomer->email}}"></br>
    @if ($errors->has('email'))
    <span class="label label-danger">{{ $errors->first('email') }}</span>
    @endif</br>
    Phone : <input type="number" name="phone" value="{{$dataEditcustomer->phone}}"></br>
    @if ($errors->has('phone'))
    <span class="label label-danger">{{ $errors->first('phone') }}</span>
    @endif</br>
    Member Status : <input type="radio" name="member_status" value=1 {{ ($dataEditcustomer->member_status == 1) ?
    'checked' : ''}}>True
    <input type="radio" name="member_status" value=0 {{ ($dataEditcustomer->member_status == 0) ? 'checked' :
    ''}}>False</br>
    @if ($errors->has('member_status'))
    <span class="label label-danger">{{ $errors->first('member_status') }}</span>
    @endif</br>
    Address: <textarea name="address">{{$dataEditcustomer->address}}</textarea></br>
    @if ($errors->has('address'))
    <span class="label label-danger">{{ $errors->first('address') }}</span>
    @endif</br>
    <button type="submit">Save</button>
</form>