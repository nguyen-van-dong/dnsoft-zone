@extends('core::admin.master')

@section('meta_title', __('zone::message.edit.page_title'))

@section('breadcrumbs')
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('zone.admin.province.index') }}">{{ trans('Tỉnh/thành') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('zone.admin.district.index', $item->district->province_id )}}">Quận/huyện</a></li>
          <li class="breadcrumb-item"><a href="{{ route('zone.admin.township.index', $item->district_id) }}">{{ trans('zone::township.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('zone::message.edit.breadcrumb') }}</li>
        </ol>
      </div>
      <h4 class="page-title"> {{ __('zone::message.edit.page_title') }}</h4>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <form action="{{ route('zone.admin.township.update', $item->id) }}" method="POST">
      @method('PUT')
      @csrf

      @include('zone::admin.townships._fields', ['item' => $item])

      <button class="btn btn-success" type="submit">{{ __('core::button.save') }}</button>
    </form>
  </div>
</div>
@stop