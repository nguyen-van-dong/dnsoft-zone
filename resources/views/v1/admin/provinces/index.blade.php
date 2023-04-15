@extends('core::v1.admin.master')

@section('meta_title', __('zone::message.index.page_title'))

@section('page_title', __('zone::message.index.page_title'))

@section('page_subtitle', __('zone::message.index.page_subtitle'))

@section('content-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('zone::message.index.page_title') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('zone::message.index.page_title') }}</h4>
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
                        {{ __('zone::message.index.page_title') }}
                    </h4>
                </div>
                <div class="text-right">
                    <div class="actions">
                        <a href="{{ route('zone.admin.province.create') }}" class="action-item">
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
                    <th>{{ __('zone::province.name') }}</th>
                    <th>{{ __('zone::province.sort_order') }}</th>
                    <th>{{ __('zone::province.status') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="{{ route('zone.admin.district.index', $item->id) }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>{{ $item->sort_order }}</td>
                        <td>
                            @if($item->status)
                                <i class="fas fa-check text-success"></i>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ route('zone.admin.province.edit', $item->id) }}" class="btn btn-success-soft btn-sm mr-1" style="background-color: rgb(211 250 255); color: #0fac04; width: 32px;border-color: rgb(167 255 247); border: 1px solid">
                                <i class="fas fa-pencil-alt" style="font-size: 15px; margin-left: -5px; margin-top: 5px"></i>
                            </a>
                            <x-button-delete-v1 url="{{ route('zone.admin.province.destroy', $item->id) }}"></x-button-delete-v1>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    </div>
@stop
