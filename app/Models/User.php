<?php
namespace App\Models;

use App\Models\UserAcademic;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable = [
        'roleType',
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'password',
        'profileImage',
    ];

    public function academic()
    {
        return $this->hasOne(UserAcademic::class); // Assuming 'roleId' is the foreign key in 'users' table
    }
}
