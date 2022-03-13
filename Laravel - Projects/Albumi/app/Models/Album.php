<?php
//      1:M
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Image;

class Album extends Model
{
    use HasFactory;

    protected  $fillable = [
        'title',
    ];

    public function Images()
    {
        return $this->hasMany(Image::class);
    }
}
