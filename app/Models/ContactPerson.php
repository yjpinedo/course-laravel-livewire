<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surnema', 'other', 'choises', 'contact_general_id'];
    protected $timestamp = false;

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class);
    }
}
