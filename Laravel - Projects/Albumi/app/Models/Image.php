<?php
//      1:M
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function Albums()
    {
        return $this->belongsTo(Album::class);
    }
}
