@extends('layouts.app')
 @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Product</div>
                     <div class="panel-body">
                        <form method="POST" action="{{ route('products.store') }}">
                            {{ csrf_field() }}
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Name</label>
                                 <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">Description</label>
                                 <textarea id="description" class="form-control" name="description" required>{{ old('description') }}</textarea>
                                 @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="control-label">Price</label>
                                 <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                                 @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="control-label">Image</label>
                                 <input id="image" type="file" class="form-control" name="image" required>
                                 @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Create Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection