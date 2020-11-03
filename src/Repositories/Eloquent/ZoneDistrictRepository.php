<?php
namespace Module\ZoneModule\Repositories\Eloquent;

use Dnsoft\Core\Repositories\BaseRepository;
use Module\ZoneModule\Models\ZoneDistrict;

class ZoneDistrictRepository extends BaseRepository implements ZoneDistrictRepositoryInterface
{
    public function __construct(ZoneDistrict $zoneDistrict)
    {
        parent::__construct($zoneDistrict);
    }

    public function allActiveWithSortOf($provinceId, $columns = ['*'])
    {
        return $this->model
            ->where('status', 1)
            ->where('province_id', $provinceId)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get($columns);
    }
}
