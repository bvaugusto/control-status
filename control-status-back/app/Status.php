<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;
    
    public $table = "status";
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

    /**
     * Opcional, informar a coluna deleted_at como um Mutator de data
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @var array
     */
    protected $dates = ['deleted_at'];
}
