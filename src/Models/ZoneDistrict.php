<?php

namespace Module\ZoneModule\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Module\ZoneModule\Models\ZoneDistrict
 *
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property bool $status
 * @property int|null $sort_order
 * @property int $province_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Module\ZoneModule\Models\ZoneProvince $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\Module\ZoneModule\Models\ZoneTownship[] $townships
 * @property-read int|null $townships_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Module\ZoneModule\Models\ZoneDistrict whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ZoneDistrict extends Model
{
    protected $table = 'zone_districts';

    protected $fillable = [
        'name',
        'code',
        'status',
        'sort_order',
        'province_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function province()
    {
        return $this->belongsTo(ZoneProvince::class, 'district_id', 'id');
    }

    public function townships()
    {
        return $this->hasMany(ZoneTownship::class, 'district_id', 'id');
    }
}
