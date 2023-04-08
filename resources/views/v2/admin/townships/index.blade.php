@extends('core::v2.admin.master')

@section('title', __('zone::township.index.page_title'))

@section('breadcrumbs')
<div class="title_left">
  <div class="page-title-box">
    <div class="page-title-right">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
        <li class="breadcrumb-item active">{{ trans('zone::township.index.breadcrumb') }}</li>
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
        <h2>{{ __('zone::township.index.page_title') }}</h2>
        <div class="clearfix text-right">
          <x-button-create url="{{ route('zone.admin.township.create', request()->id) }} }}" />
          <x-button-reload url="{{ route('zone.admin.township.index', request()->id) }}" />
          <a class="btn btn-secondary" href="{{ route('zone.admin.district.index', $townships[0]->district()->get()[0]->province_id)}}" style="font-size: 1em;">Back To List</a>
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
                <th>{{ __('zone::township.name') }}</th>
                <th>{{ __('zone::township.status') }}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($townships as $item)
              <tr>
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                <td class="text-right">
                  <x-button-edit url="{{ route('zone.admin.township.edit', $item->id) }}" title="Edit township" icon="fa fa-pencil-square-o" />
                  <x-button-delete url="{{ route('zone.admin.township.destroy', $item->id) }}" />
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop