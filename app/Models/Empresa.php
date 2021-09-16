<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Rubro;
class Empresa extends Model
{
    use HasFactory;

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function imageUrl()
    {
        return 'www.test.com/'.$this->imagen;
    }
}
