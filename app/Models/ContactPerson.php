<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'other', 'choices', 'contact_general_id'];
    public $timestamps = false;

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class);
    }
}
