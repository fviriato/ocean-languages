<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }
}
