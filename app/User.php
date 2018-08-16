<?php


namespace App;


use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Modules\Group\Models\Group;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'username','name', 'email', 'phone','gender', 'password', 'group'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getGroupName($id)
    {
        $group = Group::find($id);
        return $group['name'];
    }

    public static function getName($id)
    {
        $user = User::select('name')->findOrFail($id);
        return $user->name;
    }

    public function checkUserActive($id)
    {
        $user = new User;
        $user = User::select('status')->where('id',$id)->first();
        if( $user->status ==  1 )
        {
            return true;
        }
        return false;
    }
}
