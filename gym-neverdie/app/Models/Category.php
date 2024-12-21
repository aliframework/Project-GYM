<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'durasi',
        'deskripsi',
        'harga',
    ];

    /**
     * Relasi dengan Membership.
     * Satu Category bisa memiliki banyak Membership.
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'id_category');
    }
}
