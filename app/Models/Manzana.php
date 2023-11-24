<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;
    protected $fillable = ['tipoManzana', 'precioKilo'];

    //constructor del ojeto manzana
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
         
        $this->attributes['tipoManzana'] = ''; // Valor predeterminado para 'tipoManzana'
        $this->attributes['precioKilo'] = 0; // Valor predeterminado para 'precioKilo'
    }
}
