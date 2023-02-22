<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgiLog extends Model
{
    use HasFactory;
    protected $table = 'agi_log';
    protected $primaryKey = null;
    public $incrementing = false;
}
