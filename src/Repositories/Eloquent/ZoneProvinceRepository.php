<?php

namespace Module\ZoneModule\Repositories\Eloquent;

use DnSoft\Core\Repositories\BaseRepository;
use Module\ZoneModule\Models\ZoneProvince;

class ZoneProvinceRepository extends BaseRepository implements ZoneProvinceRepositoryInterface
{
    public function __construct(ZoneProvince $zoneProvince)
    {
        parent::__construct($zoneProvince);
    }

    public function allActiveWithSort($columns = ['*'])
    {
        return $this->model
            ->where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get($columns);
    }
}
