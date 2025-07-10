<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name', 'description', 'industry_id', 'website', 
        'logo_url', 'founded_date', 'tax_id', 'is_active'
    ];
    
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}