@extends('core::v1.admin.master')

@section('meta_title', __('zone::district.index.page_title'))

@section('page_title', __('zone::district.index.page_title'))

@section('page_subtitle', __('zone::district.index.page_subtitle'))

@section('content-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('zone::district.index.breadcrumb') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('zone::district.index.page_title') }}</h4>
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
                        {{ __('zone::district.index.page_title') }}
                    </h4>
                </div>
                <div class="text-right">
                    <div class="actions">
                        <a href="{{ route('zone.admin.district.create', request()->id) }}" class="action-item">
                            <i class="fa fa-plus"></i>
                            {{ __('core::button.add') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap bootstrap4-styling">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('zone::message.name') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="{{ route('zone.admin.township.index', $item->id) }}">
                                {{ $item->name }}
                            </a>
                        </td>

                        <td class="text-right">
                            <a href="{{ route('zone.admin.district.edit', $item->id) }}" class="btn btn-success-soft btn-sm mr-1" style="background-color: rgb(211 250 255); color: #0fac04; width: 32px;border-color: rgb(167 255 247); border: 1px solid">
                                <i class="fas fa-pencil-alt" style="font-size: 15px; margin-left: -6px; margin-top: 4px"></i>
                            </a>
                            <x-button-delete-v1 url="{{ route('zone.admin.district.destroy', $item->id) }}"></x-button-delete-v1>
                        </td>

                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        <a class="btn btn-secondary" href="{{route('zone.admin.province.index')}}">Back To List</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
