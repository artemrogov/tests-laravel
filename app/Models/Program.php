<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
      'name_program',
        'program_uid',
      'active',
      'description',
      'created_at',
      'updated_at'
    ];

    public function getUuidAttribute()
    {
        return $this->program_uid;
    }
}
