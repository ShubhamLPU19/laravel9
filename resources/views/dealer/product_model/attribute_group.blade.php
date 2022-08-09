@extends('layouts.admin')
@section('content')
<div class="alert alert-success d-none" id="msg_div">
    <span id="res_message"></span>
</div>
<div class="container">
<div class="row">
    <div class="col-sm">
      <div class="form-group">
            <label>Model</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Attribute</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Price</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>Minimum Quantity</label>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <label>New Quantity</label>
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
        <label>Action</label>
    </div>
    </div>
  </div>
@foreach ($attributeGroups as $group)
<input type="hidden" name="model_id" value="{{$group->model_id}}"/>
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control" type="text" value="{{$group->title}}" readonly>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control" type="text" value="{{$group->name}}" readonly>
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control price" type="text" value="{{$group->price}}">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control min_qty" type="text" value="{{$group->min_quantity}}">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
            <input class="form-control avail_qty" type="text" value="{{$group->available_quantity}}">
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <button class="form-control btn btn-primary update" data-model="{{$group->attribute_id}}" data-id="{{$group->id}}">Update</button>
    </div>
    </div>
  </div>
@endforeach
</div>
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
