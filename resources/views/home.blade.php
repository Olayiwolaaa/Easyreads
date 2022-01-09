@extends('layouts.app')

@section('content')
<div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
      <div class="row">
        <div class="col-sm-12">
            {{ __('Dashboard') }}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
