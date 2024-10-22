<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceMaster extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_master';

    protected $fillable = [
        'image',
        'service_name',
        'status'
    ];

    /* --- Start:: Query --- */
    public function insertData($data)
    {
        return static::create($data);
    }

    public function singleData($id)
    {
        return static::where('id', $id)->first();
    }

    public function getList($filterData = [], $pagination = true, $limit = 10, $orderBy = ['created_at', 'desc'])
    {
        $data = static::select('*');
        $this->filterData($data, $filterData);
        $data->orderBy($orderBy[0], $orderBy[1]);
        if ($pagination == true) {
            $output = $data->paginate($limit);
        } else {
            $output = $data->get();
        }
        return $output;
    }

    public function filterData($data, $filterData)
    {
        $search     = isset($filterData['search']) ? $filterData['search'] : '';

        if ($search != '') {
            $data->where('service_name', 'like', '%' . $search . '%');
        }
        return $data;
    }

    public function updateData($data, $where = [])
    {
        return static::where($where)->update($data);
    }
    /* --- End:: Query --- */
}
