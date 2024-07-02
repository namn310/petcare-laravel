<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = ['idCus', 'status', 'address', 'note', 'thanhtoan'];
    use HasFactory;
    public function getCus($id)
    {
        $customer = DB::table('customer')->select('name')->where('id', $id)->get();
        foreach ($customer as $cus) {
            return $cus->name;
        }
    }
    public function getPhone($id)
    {
        $customer = DB::table('customer')->select('phone')->where('id', $id)->get();
        foreach ($customer as $cus) {
            return $cus->phone;
        }
    }
}
