<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    protected $fillable = [
        'content',
        'remark',
        'is_completed',
        'project_id'
    ];

    protected $attributes = [
        'remark'=> "",
        'is_completed' => false,
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}