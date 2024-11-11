<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntroScreen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'intro_screen';

    protected $fillable = [
        'image',
        'title',
    ];

    /* --- Start:: Query --- */
    public function insertData($data)
    {
        return static::create($data);
    }

    public function updateOrCreateData(array $data)
    {
        return static::updateOrCreate(
            ['id' => $data['id']],
            [
                'image' => $data['image'] ?? null,
                'title' => $data['title'],
            ]
        );
    }

    public function findById($id)
    {
        return static::find($id);
    }

    public function getAllData()
    {
        $data = static::all();
        return $data->isEmpty() ? null : $data;
    }
    /* --- End:: Query --- */
}
