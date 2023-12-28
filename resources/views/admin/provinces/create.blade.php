@extends('core::admin.master')

@section('meta_title', __('zone::message.create.page_title'))

@section('breadcrumbs')
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('zone.admin.province.index') }}">{{ trans('zone::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('zone::message.create.breadcrumb') }}</li>
        </ol>
      </div>
      <h4 class="page-title">{{ __('zone::message.index.page_title') }}</h4>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <form action="{{ route('zone.admin.province.store') }}" method="POST">
      @csrf
      @include('zone::admin.provinces._fields', ['item' => null])
      <button class="btn btn-success" type="submit">{{ __('core::button.submit') }}</button>
    </form>
  </div>
</div>
@stop