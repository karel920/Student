<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    const UNITS = [
        ['title' => "深圳地铁", 'value' => 0],
        ['title' => "深科技", 'value' => 1],
        ['title' => "深圳中石化", 'value' => 2],
        ['title' => "芜湖比亚迪", 'value' => 3],
        ['title' => "芜湖德力西", 'value' => 4],
        ['title' => "安徽中电兴发", 'value' => 5],
        ['title' => "服从分配", 'value' => 6],
        ['title' => "中国核电集团", 'value' => 7],
    ];

    protected $table = "members";

    protected $fillable = [
        "name",
        "age",
        "phone_number",
        "id_number",
        "school",
        "unit"
    ];

    public function getUnitNameAttribute()
    {
        foreach(self::UNITS as $unit) {
            if ($this->unit == $unit['value']) {
                return $unit['title'];
            }
        }

        return "";
    }
}
