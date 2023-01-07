<?php

namespace App\Http\Controllers;

use App\Jobs\UserDelete;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserRepository $repository)
    {
        return view('users', [
            'users' => $repository->index($request),
        ]);
    }

    public function destroy(User $user)
    {
        $response = [
            'status' => false,
            'message' => null,
        ];

        if ($user->id == auth()->id()) {
            $response['message'] = "You can't delete yourself";
        } else {
            UserDelete::dispatch($user);
            $response['status'] = true;
        }

        return response()->json($response);
    }
}
