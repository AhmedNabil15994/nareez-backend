<?php

namespace Modules\User\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Authorization\Repositories\Dashboard\RoleRepository as Role;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Core\Traits\DataTable;
use Modules\User\Http\Requests\Dashboard\UserRequest;
use Modules\User\Repositories\Dashboard\UserRepository as User;
use Modules\User\Transformers\Dashboard\UserResource;

class UserController extends Controller
{
    use CrudDashboardController;
}
