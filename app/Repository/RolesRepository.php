<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Models\Roles;
use App\Interfaces\RolesRepositoryInterface;
use App\Models\Role;

class RolesRepository implements RolesRepositoryInterface
{
    public function getAllRoles()
    {
        return Role::all();
    }
}