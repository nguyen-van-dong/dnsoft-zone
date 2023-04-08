@extends('core::v2.admin.master')

@section('title', __('zone::message.index.page_title'))

@section('page_title', __('zone::message.index.page_title'))

@section('page_subtitle', __('zone::message.index.page_subtitle'))

@section('breadcrumbs')
<div class="title_left">
  <div class="page-title-box">
    <div class="page-title-right">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
        <li class="breadcrumb-item active">{{ __('zone::message.index.page_title') }}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('search')
<div class="title_right">
  <div class="col-md-5 col-sm-5 form-group pull-right top_search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row" style="display: block;">
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ __('zone::message.index.page_title') }}</h2>
        <div class="clearfix text-right">
          <x-button-create url="{{ route('zone.admin.province.create') }}" />
          <x-button-reload url="{{ route('zone.admin.province.index') }}" />
        </div>
        <span>
        </span>
      </div>

      <div class="x_content">
        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr>
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
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
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td>{{ $item->id }}</td>
                <td>
                  <a href="{{ route('zone.admin.district.index', $item->id) }}">
                    {{ $item->name }}
                  </a>
                </td>
                <td>{{ $item->sort_order }}</td>
                <td>
                  @if($item->status)
                  <i class="fa fa-check text-success"></i>
                  @endif
                </td>
                <td class="text-right">
                  <x-button-edit url="{{ route('zone.admin.province.edit', $item->id) }}" title="Edit profile" icon="fa fa-pencil-square-o" />
                  <x-button-delete url="{{ route('zone.admin.province.destroy', $item->id) }}" />
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop