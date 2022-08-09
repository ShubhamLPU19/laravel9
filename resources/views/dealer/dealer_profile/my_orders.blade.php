@extends('layouts.admin')
@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sum_of_amount = 0; ?>
    @foreach ($orders as $order)
        <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->quantity}}</td>
        <td>{{$order->total_amount}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->created_at}}</td>
        <td>View Detail</td>
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

@endsection
