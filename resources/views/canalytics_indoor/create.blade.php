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
                        <form method="POST" action="{{ route('canalytics_indoor.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if ($message = Session::get('error'))
                                <div class="alert alert-error">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            
                            <div class="form-group row">
                                <label for="time_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Data Time') }}</label>

                                <div class="col-md-6">
                                    <select id="time_id" class="form-control{{ $errors->has('time_id') ? ' is-invalid' : '' }}" name="time_id" value="{{ old('time_id') }}" required>
                                        <option value="">Select</option>
                                        @foreach($analytics_time as $time)
                                            <option value="{{ $time->id }}">{{ $time->time_hrs }} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('time_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('time_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Select  Board/Location') }}</label>

                                <div class="col-md-6">
                                    <select id="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" value="{{ old('location_id') }}" required>
                                        <option value="">Select</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }} ({{$location->node}})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('location_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_persons" class="col-md-4 col-form-label text-md-right">{{ __('Number of Persons') }}</label>

                                <div class="col-md-6">
                                    <input id="num_persons" type="number" class="form-control{{ $errors->has('num_persons') ? ' is-invalid' : '' }}" name="num_persons" value="{{ old('num_persons') }}" required autofocus>
                                    @if ($errors->has('num_persons'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('num_persons') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="soe_a" class="col-md-4 col-form-label text-md-right">
                                    {{ __('SOE') }}<br/>
                                    <small class="text-info">Total %: <span id="soe_total"></span></small>
                                </label>

                                <div class="col-md-1">
                                    <input id="soe_a" type="number" class="soe_item form-control{{ $errors->has('soe_a') ? ' is-invalid' : '' }}" name="soe_a" value="{{ old('soe_a') }}" required autofocus>
                                    <small class="text-info">A SOE</small>
                                </div>
                                <div class="col-md-1">
                                    <input id="soe_b" type="number" class="soe_item form-control{{ $errors->has('soe_b') ? ' is-invalid' : '' }}" name="soe_b" value="{{ old('soe_b') }}" required autofocus>
                                    <small class="text-info">B SOE</small>
                                </div>
                                <div class="col-md-1">
                                    <input id="soe_c" type="number" class="soe_item form-control{{ $errors->has('soe_c') ? ' is-invalid' : '' }}" name="soe_c" value="{{ old('soe_c') }}" required autofocus>
                                    <small class="text-info">C SOE</small>
                                </div>
                                <div class="col-md-1">
                                    <input id="soe_d" type="number" class="soe_item form-control{{ $errors->has('soe_d') ? ' is-invalid' : '' }}" name="soe_d" value="{{ old('soe_d') }}" required autofocus>
                                    <small class="text-info">D SOE</small>
                                </div>
                                <div class="col-md-1">
                                    <input id="soe_e" type="number" class="soe_item form-control{{ $errors->has('soe_e') ? ' is-invalid' : '' }}" name="soe_e" value="{{ old('soe_e') }}" required autofocus>
                                    <small class="text-info">E SOE</small>
                                </div>
                                <div class="col-md-1">
                                    <input id="soe_f" type="number" class="soe_item form-control{{ $errors->has('soe_f') ? ' is-invalid' : '' }}" name="soe_f" value="{{ old('soe_f') }}" required autofocus>
                                    <small class="text-info">F SOE</small>
                                </div>

                                <div class="col-md-12">
                                    @if ($errors->has('soe_a'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_a') }}</strong>
                                            </span>
                                        </p>
                                    @endif

                                    @if ($errors->has('soe_b'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_b') }}</strong>
                                            </span>
                                        </p>
                                    @endif

                                    @if ($errors->has('soe_c'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_c') }}</strong>
                                            </span>
                                        </p>
                                    @endif

                                    @if ($errors->has('soe_d'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_d') }}</strong>
                                            </span>
                                        </p>
                                    @endif

                                    @if ($errors->has('soe_e'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_e') }}</strong>
                                            </span>
                                        </p>
                                    @endif

                                    @if ($errors->has('soe_f'))
                                        <p>
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('soe_f') }}</strong>
                                            </span>
                                        </p>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Gender') }}<br/>
                                    <small class="text-info">Total %: <span id="gender_total"></span></small>
                                </label>

                                <div class="col-md-3">
                                    <input id="gender_male" type="number" class="gender_item form-control{{ $errors->has('gender_male') ? ' is-invalid' : '' }}" name="gender_male" value="{{ old('gender_male') }}" required autofocus>
                                    <small class="text-info">Male</small>
                                    @if ($errors->has('gender_male'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender_male') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <input id="gender_female" type="number" class="gender_item form-control{{ $errors->has('gender_female') ? ' is-invalid' : '' }}" name="gender_female" value="{{ old('gender_female') }}" required autofocus>
                                    <small class="text-info">Female</small>
                                    @if ($errors->has('gender_female'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender_female') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="show_at" class="col-md-4 col-form-label text-md-right">{{ __('Date Added') }}</label>

                                <div class="col-md-6">
                                    <input id="show_at" type="date" class="form-control{{ $errors->has('show_at') ? ' is-invalid' : '' }}" name="show_at" value="{{ old('show_at') }}" required autofocus>

                                    @if ($errors->has('show_at'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('show_at') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Analytic Stats') }}
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
