<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table="transactions";
    protected $fillable=["id","user_id","type_id","entered_at","exit_at","duration","price","total","payment_status",];
    public $timestamps=false;
    public function service()
    {
        return $this->belongsTo(Service::class, 'type_id');
    }
}
