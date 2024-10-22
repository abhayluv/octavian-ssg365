<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'general_setting';

    protected $fillable = [
        'logo',
        'login_screen_text',
    ];

    /* --- Start:: Query --- */
    public function insertData($data)
    {
        return static::create($data);
    }

    public function getLastInsertedId()
    {
        return static::latest('id')->first(); 
    }

    public function singleData($id)
    {
        return static::where('id', $id)->first();
    }

    public function updateData($data, $where = [])
    {
        return static::where($where)->update($data);
    }
    /* --- End:: Query --- */
}
