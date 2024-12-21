<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'memberships';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_category',
        'name',
        'email',
        'start_date',
        'end_date',
        'status',
    ];

    // Tentukan tipe data untuk kolom tertentu, jika diperlukan
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Kolom yang akan digunakan untuk soft delete
    protected $dates = ['deleted_at']; 
    
    /**
     * Relasi ke tabel Category (one-to-many)
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
   
    /**
     * Menghitung tanggal berakhir membership berdasarkan tanggal mulai dan durasi
     */
    public static function calculateEndDate($startDate, $duration)
    {
        return Carbon::parse($startDate)->addDays($duration)->format('Y-m-d');
    }

    /**
     * Update status membership yang berakhir
     */
    public static function updateMembershipStatus()
    {
        $memberships = Membership::where('end_date', '<', Carbon::now())
                                  ->where('status', 'active')
                                  ->get();

        foreach ($memberships as $membership) {
            $membership->status = 'inactive';
            $membership->save();
        }
    }
}
