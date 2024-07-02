<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = ['name', 'type', 'name_service', 'goi', 'weight', 'date', 'note', 'idCus'];
    use HasFactory;
}
