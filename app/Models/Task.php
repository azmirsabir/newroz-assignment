<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table="task";
    protected $fillable = [
      'title',
      'description',
      'assigned_to',
      'due_date',
      'created_by',
      'status',
      'parent_id',
    ];
}
