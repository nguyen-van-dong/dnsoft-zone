@extends('core::admin.master')

@section('meta_title', __('zone::message.index.page_title'))

@section('breadcrumbs')
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
<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="mb-2">
        <form>
          <div class="row">
            <div class="col-2 form-inline">
              <a id="demo-btn-addrow" class="btn btn-primary" href="{{ route('zone.admin.province.create') }}"><i class="mdi mdi-plus-circle mr-2"></i> Add New Item</a>
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
                <span class="badge badge-success">Enable</span>
                @else
                <span class="badge badge-danger">Disabled</span>
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

      </div>
      <div class="mt-3">
        {{ $items->links() }}
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

@push('scripts')
<script>
  function isDisplayDeleteButton() {
    var baseCheck = $('.itemCustomer').is(":checked");
    $('.itemCustomer').each(function() {
      if (!$(this).is(':disabled')) {
        if (baseCheck) {
          $('#btnDeleteCustomer').css('display', 'inline');
        } else {
          $('#btnDeleteCustomer').css('display', 'none');
        }
      }
    });
  }

  function checkCustomerItem(baseId, itemClass) {
    var baseCheck = $('#' + baseId).is(":checked");
    if (baseCheck) {
      $('#btnDeleteCustomer').css('display', 'inline');
    } else {
      $('#btnDeleteCustomer').css('display', 'none');
    }
    $('.' + itemClass).each(function() {
      if (!$(this).is(':disabled')) {
        $(this).prop('checked', baseCheck);
      }
    });
  }

  function deleteCheckedCustomerItem() {
    let arrayCustomerIds = [];
    $('input:checkbox.itemCustomer').each(function() {
      var sThisVal = (this.checked ? $(this).val() : "");
      if (sThisVal) {
        arrayCustomerIds.push(sThisVal);
      }
    });
    if (arrayCustomerIds.length > 0) {
      $.ajax({
        url: adminPath + '/customer/customer/' + JSON.stringify(arrayCustomerIds),
        method: 'DELETE',
        data: {
          "_token": "{{ csrf_token() }}"
        },
        success: function(response) {
          location.reload();
        },
        error: function(e) {
          console.log(e)
        }
      });
    } else {
      alert('Please choose at least a item.')
    }
  }
</script>

<script src="{{ asset('vendor/cms/assets/admin/js/post.js') }}"></script>
@endpush