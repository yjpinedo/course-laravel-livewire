<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'contact_general_id'];
    public $timestamps = false;

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class, 'contact_general_id');
    }
}
