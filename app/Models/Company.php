<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 * 
 * @property int id
 * @property string $name
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $logo
 * @property string|null $website
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = ['name'];
}
