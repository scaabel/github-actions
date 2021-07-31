<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::query()
            ->join('users_has_roles', 'users_has_roles.role_id', 'roles.id')
            ->selectRaw("count(case when roles.name = 'qui' then 1 end) as qui")
            ->selectRaw("count(case when roles.name = 'quos' then 1 end) as quos")
            ->selectRaw("count(case when roles.name = 'illo' then 1 end) as illo")
            ->first();
    }
}
