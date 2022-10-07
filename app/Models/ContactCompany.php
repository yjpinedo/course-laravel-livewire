<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'email', 'extra', 'choises', 'contact_general_id'];
    protected $timestamp = false;

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class);
    }
}