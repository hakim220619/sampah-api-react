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
            $Sql .= 'and u.fullName like "%'.$request->q.'%" ';
        }
        $data = DB::select("select row_number() over (order by u.created_at desc) no, u.*, p.nama as province, r.nama as regency, d.nama as district, v.nama as village from users u, province p, regency r, district d, village v where u.provinceId=p.id AND u.regencyId=r.id and u.districtId=d.id AND u.villageId=v.id $Sql");
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
    public static function EditUsers($request)  {
        // dd($request->all());
        if ($request->villageED != null) {
            $data = [
                'fullName' => $request->fullNameEd,
                'email' => $request->emailEd,
                'phone' => $request->phoneEd,
                'address' => $request->addressEd,
                'role' => $request->roleEd,
                'provinceId' => $request->provinceED,
                'regencyId' => $request->regencyED,
                'districtId' => $request->districtED,
                'villageId' => $request->villageED,
                'state' => $request->stateEd,
                'updated_at' => now()
            ];
        } else {
            
            $data = [
                'fullName' => $request->fullNameEd,
                'email' => $request->emailEd,
                'phone' => $request->phoneEd,
                'address' => $request->addressEd,
                'role' => $request->roleEd,
                'state' => $request->stateEd,
                'updated_at' => now()
            ];
        }
        
        DB::table('users')->where('id', $request->id)->update($data);
    }
    public static function deleteUsers($id)  {
        DB::table('users')->where('id', $id)->delete();
    }
}
