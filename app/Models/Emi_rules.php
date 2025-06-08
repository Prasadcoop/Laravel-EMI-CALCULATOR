<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emi_rules extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['min_amount','max_amount','tenure_id','interest_rate','deleted_at','status'];
    public function tenure(){ return $this->belongsTo(Tenure::class); }
}
