<?php

namespace Module\ZoneModule\Http\Controllers\Web;

use Illuminate\Routing\Controller;
use Module\ZoneModule\Repositories\Eloquent\ZoneDistrictRepositoryInterface;
use Module\ZoneModule\Repositories\Eloquent\ZoneProvinceRepositoryInterface;
use Module\ZoneModule\Repositories\Eloquent\ZoneTownshipRepositoryInterface;

class ZoneApiController extends Controller
{
    /**
     * @var ZoneProvinceRepositoryInterface
     */
    protected $zoneProvinceRepository;

    /**
     * @var ZoneDistrictRepositoryInterface
     */
    protected $zoneDistrictRepository;

    /**
     * @var ZoneTownshipRepositoryInterface
     */
    protected $zoneTownshipRepository;

    public function __construct(
        ZoneProvinceRepositoryInterface $zoneProvinceRepository,
        ZoneDistrictRepositoryInterface $zoneDistrictRepository,
        ZoneTownshipRepositoryInterface $zoneTownshipRepository
    ) {
        $this->zoneProvinceRepository = $zoneProvinceRepository;
        $this->zoneDistrictRepository = $zoneDistrictRepository;
        $this->zoneTownshipRepository = $zoneTownshipRepository;
    }

    public function provinces()
    {
        $provinces = $this->zoneProvinceRepository->allActiveWithSort(['id', 'name']);

        return [
            'success' => true,
            'items' => $provinces,
        ];
    }

    public function districts($provinceId)
    {
        $districts = $this->zoneDistrictRepository->allActiveWithSortOf($provinceId, ['id', 'name']);

        return [
            'success' => true,
            'items' => $districts,
        ];
    }

    public function townships($districtId)
    {
        $townships = $this->zoneTownshipRepository->allActiveWithSortOf($districtId, ['id', 'name']);

        return [
            'success' => true,
            'items' => $townships,
        ];
    }
}
