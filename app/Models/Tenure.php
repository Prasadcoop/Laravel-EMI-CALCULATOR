<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenure extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['months','deleted_at','status'];
    public function emiRules(){ return $this->hasMany(Emi_rules::class); }
}
