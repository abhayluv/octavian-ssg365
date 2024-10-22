<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiaLicence extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sia_licences';

    protected $fillable = [
        'licence_name',
        'logo',
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
              $data->where('licence_name', 'like', '%' . $search . '%');
          }
          return $data;
      }
  
      public function updateData($data, $where = [])
      {
          return static::where($where)->update($data);
      }
      /* --- End:: Query --- */
}
