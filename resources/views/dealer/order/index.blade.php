@extends('layouts.admin')
@section('content')
<?php $j = sizeof($modelData);
$percentage =0;
    if(auth()->user()->isDealer())
    {
        $data = Session::get('id_percentage');
        $arr = explode('_',$data);
        $percentage = $arr[1];
    }
?>
@for($i=0;$i<$j/2;$i++)
    {{-- @if(sizeof($modelData)>1) --}}
    <?php
        $data = array_splice($modelData,0,2);
        {{-- dd(sizeof($modelData)); --}}

    ?>
    {{-- @else
    <?php $data= array_splice($modelData,0,1) ?>
    @endif --}}
<div class="row">
@foreach ($data as $key => $value)
<?php $model_id = 0; $model_id = $value['model']['id']; ?>
  <?php $calculate = ($percentage/100)*$value['model']['price'];  ?>
  <div class="col-sm-6">
  <form action="{{route('admin.addorders')}}" id="{{$model_id}}" method="post">
    @csrf
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">{{$value['model']['title']}}</h5>
            <p class="card-text">MRP. <span><del>{{$value['model']['price']}}</del> </span></p>
            <p class="card-text">Your Price. <span>{{getDDPrice($value['model']['price'],1)}}</span></p>
            <input type="hidden" name="model" value="{{$model_id}}"/>
        <div class="row">
            <div class="col-sm-3">
                <p><strong>Color</strong></p>
                @foreach ($value['color'] as $colKey => $colVal)
                    @if(empty($value['variant']))
                        <div class="form-check">
                            <input class="form-check-input" name="color[]" type="checkbox" value="{{$colVal['id']}}" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                {{$colVal['name']}}
                            </label>
                        </div>
                    @else
                        <div class="form-check radio-green">
                            <input type="radio" class="form-check-input" id="radioGreen1" name="color[]" value="{{$colVal['id']}}" required>
                            <label class="form-check-label" for="radioGreen1">{{$colVal['name']}}</label>
                        </div>
                    @endif

                @endforeach
            </div>
            <div class="col-sm-3">
                @if(!empty($value['variant']))
                <p><strong>Body Color</strong></p>
                @foreach ($value['variant'] as $varKey => $varVal)
                <div class="form-check">
                <input class="form-check-input" name="variant[]" type="checkbox" value="{{$varVal['id']}}" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    {{$varVal['name']}}
                </label>
                </div>
                @endforeach
                @endif
            </div>
            @if(empty($value['variant']))
            <div class="col-sm-3">
                <p><strong>Quantity</strong></p>
                @foreach ($value['color'] as $colKey => $colVal)
                <input class="form-control qty_<?php $colKey?>" name="qty[]" type="number" value=""/>
                @endforeach
            </div>
            @endif
            <div class="col-sm-3">
                @if(!empty($value['variant']))
                <p><strong>Variant</strong></p>
                @foreach ($value['variant'] as $varKey => $varVal)
                <div class="form-check">
                <input class="form-check-input qty_<?php $colKey?>" name="variant[]" type="checkbox" value="{{$varVal['id']}}" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    {{$varVal['name']}}
                </label>
                </div>
                @endforeach
                @endif
            </div>
            @if(!empty($value['variant']))
            <div class="col-sm-3 ctext">
                <p><strong>Quantity</strong></p>
                @foreach ($value['variant'] as $varKey => $varVal)
                <input class="form-control ctext" name="qty[]" type="number" value=""/>
                @endforeach
            </div>
            @endif
        </div>
        <br>
        <button type="button" class="btn btn-primary model"><i class="fas fa-shopping-cart"></i> ADD TO CART</button>
      </div>
    </div>
    </form>
  </div>

@endforeach
</div>
@endfor
@endsection
@section('scripts')
<script>
$(document).on("click",".model", function(){
    var formid = $(this).closest("form").attr("id");
    alert(formid);
    $('form#'+formid).submit();
});

$(document).ready(function(){
   // $(".ctext").hide();
});
</script>
@endsection
