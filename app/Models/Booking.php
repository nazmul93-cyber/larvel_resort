<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relationships 
    public function resort() {
        return $this->belongsTo(Resort::class);
    }

    // sorting  by order,check in date, bill type
    public function scopeOrderSort($query, $order)
    {
        if ($order) {
            $query->orderBy('id', request('order'));
        }
    }
    public function scopeCheckInSort($query, $check_in)
    {
        if ($check_in) {
            $query->orderBy('check_in', request('check_in'));
        }
    }
    public function scopeBillSort($query, $bill)
    {
        if ($bill) {
            $query->where('bill', request('bill'));
        }
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->whereHas('resort', function($query){
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
            })
            ->orWhere('visitor_email', 'like', '%' . request('search') . '%');
        }
    }
}
