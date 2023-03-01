<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 */
class Car extends Model
{
use HasFactory;

protected $fillable = ["reg_number", "brand", "model", "owner_id"];



    public function owner(): BelongsTo
{
return $this->belongsTo(Owner::class);
}
}
