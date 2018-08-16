@extends('master')


@section('css')

@endsection
@section('js')
<script src="{{ asset('adminlte/plugins/ckfinder/ckfinder.js') }}"></script>
@endsection
@section("content")
<section class="content">
    <div class="row">
      <div class="col-12">
        @include('layouts.errors')
        <div class="card">
          
          <div class="card-header" style="border-bottom: 0">
            <h3 class="card-title">Settings</h3>
          </div>
          
          <div class="card-body p-0">
            <iframe src="/adminlte/plugins/ckfinder/ckfinder.html" width="100%" style="min-height:500px"></iframe>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

