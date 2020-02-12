<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
    ];

    /**
     * Get filename attribute / accessor
     *
     * @param $filename
     * @return string
     */
    public function getFilenameAttribute($filename)
    {
        return url("files/{$filename}");
    }

    /**
     * Get the User that owns the file.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
