<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use SoftDeletes;

    public $table = "";
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @var array
     */
    protected $fillable = ['name_status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
