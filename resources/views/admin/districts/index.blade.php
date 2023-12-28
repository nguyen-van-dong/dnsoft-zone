@extends('core::admin.master')

@section('meta_title', __('zone::district.index.page_title'))

@section('breadcrumbs')
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('zone.admin.province.index') }}">{{ trans('Tỉnh/thành') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('zone::district.index.breadcrumb') }}</li>
        </ol>
      </div>
      <h4 class="page-title">{{ __('zone::message.index.page_title') }}</h4>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="mb-2">
        <form>
          <div class="row">
            <div class="col-2 form-inline">
              <a id="demo-btn-addrow" class="btn btn-primary" href="{{ route('zone.admin.district.create', request()->id) }}"><i class="mdi mdi-plus-circle mr-2"></i> Add New Item</a>
            </div>
            <div class="col-4">
              <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off" name="keyword" value="{{ request('keyword') }}">
            </div>
            <div class="col-2">
              <input type="submit" value="Search" class="btn btn-secondary">
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-centered table-striped table-bordered mb-0 toggle-circle">
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
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure delete the items?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left: 183px;">
        <a href="#" class="btn btn-success deleteImageListView" id="deleteImageListView" onclick="deleteCheckedCustomerItem()">Yes</a>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
        <div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop