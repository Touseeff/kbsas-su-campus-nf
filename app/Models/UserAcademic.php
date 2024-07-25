<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAcademic extends Model
{
    use HasFactory;

    protected $table = 'user_academics';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'matricCategory',
        'matricYear',
        'matricPercentage',
        'matricCertificate',
        'interCategory',
        'interYear',
        'interPercentage',
        'interCertificate',
    ];

    public function userAcademic()
    {
        return $this->belongsTo(User::class);
    }
}
