<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->paginate(10);
        return response()
            ->json(new UserCollection($users))
            ->setStatusCode(200);
    }
    public function show(User $user) {
        try {
            return response()
                ->json(new UserResource(User::query()->findOrFail($user)))
                ->setStatusCode(200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'error' => 'not found',
            ])
                ->setStatusCode(404);
        } catch (\Exception $exception) {
            return response()
                ->json([
                    'error' => $exception->getMessage(),
                ])
                ->setStatusCode(500);
        }
    }
}
