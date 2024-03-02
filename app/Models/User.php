<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getUsersAll($request)  {
        $Sql = '';
        if (isset($request->q)) {
            $Sql .= 'and fullName like "%'.$request->q.'%" ';
        }
        $data = DB::select("select * from users where 1=1 $Sql");
        return $data;
    }
    public static function AddUsers($request)  {
        $data = [
            'fullName' => $request->data['fullName'],
            'email' => $request->data['email'],
            'password' => $request->data['password'],
            'phone' => $request->data['phone'],
            'address' => $request->data['address'],
            'role' => $request->role,
            'provinceId' => $request->province,
            'regencyId' => $request->regency,
            'districtId' => $request->district,
            'villageId' => $request->village,
            'created_at' => now()
        ];
        DB::table('users')->insert($data);
    }
    public static function deleteUsers($id)  {
        DB::table('users')->where('id', $id)->delete();
    }
}
