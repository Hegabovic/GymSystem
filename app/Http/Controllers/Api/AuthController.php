<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\User;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    private UserRepository $userRepository;
    private CustomerRepository $customerRepository;

    public function __construct(UserRepository $userRepository, CustomerRepository $customerRepository)
    {

        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }

    public function register(CustomerRegisterRequest $request): JsonResponse
    {
        $input = $request->validated();
        $avatarPath = $request->file('photo')->store('public/customers_avatars');
        $user = $this->userRepository->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'avatar_path' => $avatarPath,
            'password' => Hash::make($input['password']),
        ]);

        // $user=$this->userRepository->findById($userid);

        $this->customerRepository->create([
            'user_id' => $user->id,
            'gender' => $input['gender'],
            'birth_date' => $input['birth_date']
        ]);
        event(new Registered($user));


        $token = $user->createToken('authtoken');

        return response()->json(
            [
                'message' => 'User Registered',
                'data' => ['token' => $token->plainTextToken, 'user' => $user]
            ]
        );
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        event(new Login('web', $user, true));
        return $user->createToken($request->device_name)->plainTextToken;
    }

}
