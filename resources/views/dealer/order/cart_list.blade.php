@extends('layouts.admin')
@section('content')
<div class="alert alert-success d-none" id="msg_div">
    <span id="res_message"></span>
</div>
<form action="{{route('admin.checkout')}}" method="post">
@csrf
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">MRP</th>
      <th scope="col">Add-on Price</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sum_of_amount = 0; ?>
    @foreach ($carts as $cart)
    <input type="hidden" name="id[]" value="{{$cart->user_id}}"
    <?php $sum_of_amount += $cart->amount; ?>
        <tr>
        <th scope="row">{{$cart->product_name}}</th>
        <td>{{$cart->price}}</td>
        <td>{{$cart->attribute_price}}</td>
        <td>{{$cart->dd_price}}</td>
        <td><input type="text" name="qty" value="{{$cart->quantity}}"/></td>
        <td>{{$cart->amount}}</td>
        <td><button class="btn btn-success update" data-batch="" data-batch_id="" data-qty="" data-id="{{$cart->id}}">Update</button>||<button data-id="{{$cart->id}}" class="btn btn-danger delete">Delete</button></td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total Amount: </strong></td>
        <td>{{$sum_of_amount}}</td>
        </tr>
  </tbody>
</table>
<div class="text-center">
    <button type="submit" class="btn btn-primary">Order Proceed</button>
</div>
</form>
@endsection
@section('scripts')
<script>
    $(document).on('click','.delete', function(){
        //let qty = $(this).parent().siblings().find(".qty").val();
        let id = $(this).attr("data-id");
        //console.log('qty',qty);
        console.log('id',id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "cartitemdelete/"+id,
            type: 'DELETE',
            data: {id:id},
            success: function(response){
            console.log(response);
                $('#res_message').show();
                $('#res_message').html(response);
                $('#msg_div').removeClass('d-none');
                setTimeout(function(){
                location.reload();
                }, 1000);
                setTimeout(function(){
                    $('#res_message').hide();
                    $('#msg_div').hide();
                },1000);
            }
        });
    });
</script>
@endsection
