<?php

namespace Modules\ZoneModule\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\ZoneModule\Models\ZoneTownship
 *
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property bool $status
 * @property int|null $sort_order
 * @property int $district_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\ZoneModule\Models\ZoneDistrict $district
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\ZoneModule\Models\ZoneTownship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ZoneTownship extends Model
{
    protected $table = 'zone_townships';

    protected $fillable = [
        'name',
        'code',
        'status',
        'sort_order',
        'district_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function district()
    {
        return $this->belongsTo(ZoneDistrict::class);
    }
}
