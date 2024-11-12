<?php

namespace App\Models;

use App\Models\ComplaintResponse as ModelsComplaintResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Complaint extends Model
{
    use HasFactory;


protected $fillable = [
    'title',
    'description',
    'status',
    'image',
    'guest_name',
    'guest_telp',
    'guest_email',
    'user_id'
];

public function complaint() {
    return $this->hasMany( ModelsComplaintResponse::class);
}


//cara pertama untuk menampilkan badge enum status(penggunaan check di file semua-pengaduan.blade.php)

public  function getStatusBadgeAttribute()
{
    return match ($this->status) {
        'pending' => '<span class="badge" style="background-color: #ff7976;">PENDING</span>',
        'selesai' => '<span class="badge" style="background-color: #5ddab4;">SELESAI</span>',
        default => '<span class="badge" style="background-color: #57cacb;">' . strtoupper($this->status) . '</span>',
    };
 }



}
