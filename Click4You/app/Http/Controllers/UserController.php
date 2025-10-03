<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

use App\Models\User;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;


class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->showUser();

        return response()->json(
            UserResource::collection($users) // Usamos el Resource especializado
        , Response::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $request)
    {
        // Validamos la información
        $data = $request->validated();

        // Extraemos la información
        $userData = $data['user_data'];

        // Llamamos al servicio
        $user = $this->userService->storeUser($userData);

        // Respuesta
        return response()->json(
            new UserResource($user)
        , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->showUser($id);

        return response()->json(
            new UserResource($user)
        , Response::HTTP_ACCEPTED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // Validamos la información
        $data = $request->validated();

        $userData = $data['user_data'];

        // Llamamos al servicio
        $user = $this->userService->updateUser($userData, $id);

        // Generamos la respuesta
        return response()->json([
            'message'=>'Usuario editado correctamente',
            'data'=> new UserResource($user)
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->destroyUser($id);

        return response()->json([
            'message'=>'Usuario eliminado correctamente'
        ], Response::HTTP_ACCEPTED);
    }
}
