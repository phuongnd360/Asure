@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('User Detail') }} </div>
                <div class="card-body">
                    @if(!empty($user))
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $user->name }}">
                        </div>
                      </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email: </label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="type" class="col-sm-2 col-form-label">Type User: </label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="type" value="{{ $user->type }}">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="created_at" class="col-sm-2 col-form-label">Created Date: </label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="created_at" value="{{ \Carbon\Carbon::parse($user->created_at)->format('m/d/Y')}}">
                        </div>
                      </div>
                    @endif

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info" onclick="location.href='{{ route('home') }}'">
                                <i class="fa-solid fa-arrow-left"></i> {{ __('Back') }}
                            </button>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
