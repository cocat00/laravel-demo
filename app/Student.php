<?php
/**
 * Created by PhpStorm.
 * User: chenjie
 * Date: 2018/7/6
 * Time: 上午11:55
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    /**允许批量赋值的字段*/
    protected $fillable = [
        'name', 'age', 'sex','updated_at', 'created_at',
    ];

    /**不允许批量赋值的字段*/
    protected $guarded = [];

    //指定表名
    protected $table = 'student';

    //指定id
    protected $primaryKey = 'id';

    public $timestamps = true;
}