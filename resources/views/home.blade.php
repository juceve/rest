@extends('layouts.app')
@section('content')
<div class="card border-0 shadow">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="fs-5 fw-bold mb-0">Bienvenidos al Admin Rest</h2>
      </div>
      {{-- <div class="col text-end">
        <a href="#" class="btn btn-sm btn-primary">See all</a>
      </div> --}}
    </div>
  </div>
  <div class="card-body">
   {{-- @dump(Auth::user()->empresa_id) --}}
  </div>
</div>
@endsection