<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\User;


class Task extends Model
{

    protected $fillable = [
        'name',
        'detail',
        'user_id',
        'project_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

}