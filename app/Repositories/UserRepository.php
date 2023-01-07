<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function index(Request $request)
    {
        return User::query()
            ->when($request->username, $this->likeCondition('username'))
            ->when($request->first_name, $this->likeCondition('first_name'))
            ->when($request->last_name, $this->likeCondition('last_name'))
            ->get();
    }

    private function likeCondition($column) :callable
    {
        return function ($query, $value) use ($column) {
            $query->likeCondition($column, $value);
        };
    }
}
