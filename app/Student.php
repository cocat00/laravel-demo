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

    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;

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


    public function getSex($ind = null) {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
        ];

        if ($ind != null) {
            return array_key_exists($ind, $arr) ? $arr[$ind]: $arr[self::SEX_UN];
        }

        return $arr;
    }
}