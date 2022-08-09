@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Product Model
    </div>

    <div class="card-body">
        <form action="{{ route("admin.product-model.update") }}" method="POST" onSubmit="return confirm('Please verify your colors and addons before submit.')" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Title<span style="color: red;">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{$productModel->title}}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
            </div>
            <input type="hidden" name="id" value="{{$productModel->id}}">
            <div class="form-group {{ $errors->has('model_no') ? 'has-error' : '' }}">
                <label for="model_no">Model<span style="color: red;">*</span></label>
                <input type="text" id="model_no" name="model_no" class="form-control" value="{{$productModel->model_no}}" required>
                @if($errors->has('model_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('model_no') }}
                    </em>
                @endif
            </div>
            {{-- <div class="form-group {{ $errors->has('available_stock') ? 'has-error' : '' }}">
                <label for="available_stock">Available Stock<span style="color: red;">*</span></label>
                <input type="text" id="available_stock" name="available_stock" class="form-control" value="" required>
                @if($errors->has('available_stock'))
                    <em class="invalid-feedback">
                        {{ $errors->first('model_no') }}
                    </em>
                @endif
            </div> --}}
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="model_no">Price<span style="color: red;">*</span></label>
                <input type="text" id="price" name="price" class="form-control" value="{{$productModel->price}}" required>
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p><strong>Color</strong></p>
                    @foreach($colors as $key => $value)
                    <input type="hidden" name="color_parent" value="{{$value->parent_id}}" />
                    <?php $checked = 0; ?>
                    @foreach ($groups as $k => $v)
                        @if($value->id == $v->attribute_id)
                            <?php $checked = 1; ?>
                        @endif
                    @endforeach
                        <div class="form-check">
                            <input class="form-check-input" name="color[]" type="checkbox" value="{{$value->id}}" {{ $checked == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1">
                                {{$value->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6">
                    <p><strong>Variant</strong></p>
                    @foreach($variants as $key => $value)
                    <input type="hidden" name="variant_parent" value="{{$value->parent_id}}" />
                    <?php $checked = 0; ?>
                    @foreach ($groups as $k => $v)
                        @if($value->id == $v->attribute_id)
                            <?php $checked = 1; ?>
                        @endif
                    @endforeach
                    <div class="form-check">
                    <input class="form-check-input" name="variant[]" type="checkbox" value="{{$value->id}}" {{ $checked == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="defaultCheck1">
                        {{$value->name}}
                    </label>
                    </div>
                    @endforeach
                </div>

            </div>
            {{-- <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="image">Image<span style="color: red;">*</span></label>
                <input type="file" id="image" name="image" class="form-control" value="" required>
                @if($errors->has('image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </em>
                @endif
            </div> --}}
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status" style="margin-top: 12px;">Status<span style="color: red;">*</span></label>
                <select name="status" id="status" class="form-control select2" required>
                    <option value="active" @if($productModel->status == "active" ? 'selected' : '')@endif>Active</option>
                    <option value="inactive" @if($productModel->status == "inactive" ? 'selected' : '')@endif>Inactive</option>
                </select>
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection
