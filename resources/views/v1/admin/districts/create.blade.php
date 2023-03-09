@extends('core::v1.admin.master')

@section('meta_title', __('zone::district.create.page_title'))

@section('page_title', __('zone::district.create.page_title'))

@section('page_subtitle', __('zone::district.create.page_subtitle'))

@section('content-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('zone.admin.district.index', $id) }}">{{ trans('zone::district.index.breadcrumb') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('zone::message.create.breadcrumb') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Collapsed Sidebar</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fs-17 font-weight-600 mb-2">
                        {{ __('zone::district.create.page_title') }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('zone.admin.district.store', $id) }}" method="POST">
                @csrf

                @include('zone::admin.provinces._fields', ['item' => null])

                <button class="btn btn-success" type="submit">{{ __('core::button.submit') }}</button>
            </form>
        </div>
    </div>
@stop
