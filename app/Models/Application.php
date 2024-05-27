<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Получение сотрудника по заявке
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
