<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'assigned_to', 'created_by'];
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /* public function comments()
    {
        return $this->hasMany(Comment::class);
    } */

    /* public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    use HasFactory; */
}
