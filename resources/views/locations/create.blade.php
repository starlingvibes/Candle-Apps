@extends('layouts.dashboard.app')

@section('content')
  <!-- page title area end -->
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-0 mb-5">
          <div class="row">
            <div class="col-12 mt-5">
                <div class="card">

                    <div class="card-body">
                        <h4 class="header-title">{{ __('Add New') }} {{ $pages['title'] }}</h4>
                        <form method="POST" action="{{ route('locations.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Board Logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}">

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="node" class="col-md-4 col-form-label text-md-right">{{ __('Node ID') }}</label>

                                <div class="col-md-6">
                                    <input id="node" type="text" class="form-control{{ $errors->has('node') ? ' is-invalid' : '' }}" name="node" value="{{ old('node') }}" required autofocus>
                                    <small class="text-info">This is a unique Node ID for the Location/Board. It's an identifier and must be unique</small>
                                    @if ($errors->has('node'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('node') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>{{ old('address') }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="longtitude" class="col-md-4 col-form-label text-md-right">{{ __('Longtitude') }}</label>

                                <div class="col-md-6">
                                    <input id="longtitude" type="tel" class="form-control{{ $errors->has('longtitude') ? ' is-invalid' : '' }}" name="longtitude" value="{{ old('longtitude') }}" required>

                                    @if ($errors->has('longtitude'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('longtitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

                                <div class="col-md-6">
                                    <input id="latitude" type="tel" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') }}" required>

                                    @if ($errors->has('latitude'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('latitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Location') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
