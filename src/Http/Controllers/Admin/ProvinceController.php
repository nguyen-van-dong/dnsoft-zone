<?php

namespace Module\ZoneModule\Http\Controllers\Admin;

use DnSoft\Core\Facades\MenuAdmin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Module\ZoneModule\Http\Requests\ZoneRequest;
use Module\ZoneModule\Repositories\Eloquent\ZoneDistrictRepositoryInterface;
use Module\ZoneModule\Repositories\Eloquent\ZoneProvinceRepositoryInterface;

class ProvinceController extends Controller
{
  /**
   * @var ZoneProvinceRepositoryInterface
   */
  private $zoneProvinceRepository;

  /**
   * @var ZoneDistrictRepositoryInterface
   */
  private $zoneDistrictRepository;

  /**
   * ZoneController constructor.
   * @param ZoneProvinceRepositoryInterface $zoneProvinceRepository
   */
  public function __construct(ZoneProvinceRepositoryInterface $zoneProvinceRepository)
  {
    $this->zoneProvinceRepository = $zoneProvinceRepository;
  }

  public function index(Request $request)
  {
    $items = $this->zoneProvinceRepository->paginate($request->input('max', 20));
    $version = get_version_actived();
    return view("zone::$version.admin.provinces.index", compact('items'));
  }

  public function create()
  {
    MenuAdmin::activeMenu('zone');
    $version = get_version_actived();
    return view("zone::$version.admin.provinces.create");
  }

  public function store(ZoneRequest $request)
  {
    $this->zoneProvinceRepository->create($request->input());

    return redirect()
      ->route('zone.admin.province.index')
      ->with('success', __('zone::message.notification.created'));
  }

  public function edit($id)
  {
    MenuAdmin::activeMenu('zone');
    $item = $this->zoneProvinceRepository->getById($id);
    $version = get_version_actived();
    return view("zone::$version.admin.provinces.edit", compact('item'));
  }

  public function update(ZoneRequest $request, $id)
  {
    $this->zoneProvinceRepository->updateById($request->input(), $id);

    return redirect()
      ->route('zone.admin.province.index')
      ->with('success', __('zone::message.notification.updated'));
  }

  public function destroy($id, Request $request)
  {
    $this->zoneProvinceRepository->delete($id);

    if ($request->ajax()) {
      Session::flash('success', __('zone::message.notification.deleted'));
      return response()->json([
        'success' => true,
      ]);
    }

    return redirect()
      ->route('zone.admin.provinces.index')
      ->with('success', __('zone::message.notification.deleted'));
  }

  public function districts(Request $request, $id)
  {
    MenuAdmin::activeMenu('zone');
    $item = $this->zoneProvinceRepository->getById($id);
    $districts = $item->districts()->get();
    $district_id = $request->district_id;
    $firstItemId = count($districts) > 0 ? $districts[0]->id : '';

    if ($request->ajax()) {
      $isTownship = false;
      $renderHtml = view('zone::admin.provinces.zone-ajax', compact('districts', 'isTownship', 'district_id'))->render();
      return response()->json(['districts' => $renderHtml, 'firstItemId' => $firstItemId]);
    }
    $version = get_version_actived();
    return view("zone::$version.admin.districts.index", compact('districts'));
  }
}
