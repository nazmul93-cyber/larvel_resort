<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // sorting  by price, availability, room numbers
    public function scopeOrderSort($query, $order)
    {
        if ($order) {
            $query->orderBy('id', request('order'));
        }
    }
    public function scopePriceSort($query, $price)
    {
        if ($price) {
            $query->orderBy('room_price', request('price'));
        }
    }
    public function scopeAvailabilitySort($query, $availability)
    {
        if ($availability) {
            $query->orderBy('available_from', request('availability'));
        }
    }
    public function scopeRoomSort($query, $room)
    {
        if ($room) {
            $query->orderBy('room_numbers', request('room'));
        }
    }

    // search function 
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('company', 'like', '%' . request('search') . '%')
                ->orWhere('website', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // filter by tags
    public function scopeFilter($query, $tags)
    {
        if($tags){
            $query->where('tags', 'like', '%' . request('tags') . '%');
        }
    }
}
