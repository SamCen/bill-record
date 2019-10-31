<?php

namespace App\Models;

use App\Models\Traits\ModelAssistTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin[] $admins
 * @property-read int|null $admins_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Privilege[] $privileges
 * @property-read int|null $privileges_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role query()
 * @mixin \Eloquent
 */
class Role extends Model
{
    use ModelAssistTrait;

    protected $fillable = ['name','is_admin'];

    protected $hidden = ['pivot'];

    /**
     * Author sam
     * DateTime 2019-06-03 10:25
     * Description:角色和用户多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class,'admin_role_pivot','role_id','admin_id');
    }

    /**
     * Author sam
     * DateTime 2019-06-03 15:20
     * Description:角色和权限的多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function privileges()
    {
        return $this->belongsToMany(Privilege::class,'role_privilege_pivot','role_id','privilege_code');
    }
}
