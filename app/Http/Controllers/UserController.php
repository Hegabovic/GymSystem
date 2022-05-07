<?php

namespace App\Http\Controllers;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\GymRepositoryInterface;
use App\Http\Requests\EditClerkRequest;
use App\Http\Requests\StoreClerkRequest;
use App\Models\User;
use App\Repositories\CityManagerRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private GymManagerRepository $gymManagerRepository;
    private CityManagerRepository $cityManagerRepository;
    private UserRepository $userRepository;
    private GymRepositoryInterface $gymRepository;

    public function __construct(UserRepository $userRepository, GymManagerRepository $gymManagerRepository, CityManagerRepository $cityManagerRepository, GymRepositoryInterface $gymRepository)
    {
        $this->cityManagerRepository = $cityManagerRepository;
        $this->gymManagerRepository = $gymManagerRepository;
        $this->userRepository = $userRepository;
        $this->gymRepository = $gymRepository;
    }

    public function store(StoreClerkRequest $request)
    {
        $input = $request->validated();

        $avatarPath = env('DEFAULT_AVATAR');
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/photos');
        }

        $user = $this->userRepository->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'avatar_path' => $avatarPath
        ]);


        if ($request->clerk === 'city-manager') {
            $user->assignRole('CityManager');

            $this->cityManagerRepository->create([
                'user_id' => $user->id,
                'n_id' => $input['n_id'],
                'city_id' => $input['facility']
            ]);
        } elseif ($request->clerk === 'gym-manager') {
            $user->assignRole('GymManager');
            $this->gymManagerRepository->create([
                'user_id' => $user->id,
                'n_id' => $input['n_id'],
                'gym_id' => $input['facility']
            ]);

            return to_route('show_gymManagers');
        }


        return to_route('show_users');
    }

    public function showGymManagers()
    {
        $gymManagers = $this->gymManagerRepository->all();
        return view('gymManagers.show', ['managers' => $gymManagers]);
    }

    public function showUsers()
    {
        return view('users.show_users');
    }

    public function createCityManager()
    {
        return view('users.create_city_manager');
    }

    public function createGymManager()
    {
        $gyms = $this->gymRepository->all();
        return view('gymManagers.create', ['gyms' => $gyms]);
    }

    public function edit()
    {
        return view('users.edit_profile');
    }

    public function update(EditClerkRequest $request)
    {
        $input = $request->validated();
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/photos');
            $this->userRepository->updateAvatar($request->user()->id, $avatarPath);
        }
        if (isset($input['password'])) $input['password'] = Hash::make($input['password']);
        $this->userRepository->update($request->user()->id, $input);
        return to_route('edit_profile');
    }

    public function editGymManger($id)
    {
        $selectedGymManger = $this->gymManagerRepository->findById($id);
        $gyms = $this->gymRepository->all();
        return view('gymManagers.edit', ['manger' => $selectedGymManger, 'gyms' => $gyms]);
    }

    public function storeEditGymManger(EditClerkRequest $request)
    {
        $formData = $request->all();

        $selectedUser = $this->userRepository->findById($request->id);

        $updatedGymManager = [
            "n_id" => $formData["n_id"],
            "gym_id" => $formData["gym_id"]
        ];

        $updatedUser = [
            "name" => $formData["name"],
            "email" => $formData["email"],
            "avatar_path" => $request->hasFile('avatar') ? $formData["avatar"]->store('public/avatars') : $selectedUser->avatar_path
        ];
        $this->userRepository->update($request->id, $updatedUser);
        $this->gymManagerRepository->update($selectedUser->gymManger->id, $updatedGymManager);

        return to_route('show_gymManagers');
    }

    public function deleteGymManager()
    {


        $selectedUserId = $this->gymManagerRepository->findById(request()->input('id'))->user_id;
        $userResult = $this->userRepository->delete(request()->input('id'));
        $managerResult = $this->gymManagerRepository->delete(request()->input('id'));
//        if ($userResult > 0)
//            return ["success" => true];
//
//        else
//            return ["success" => false, "message" => "Delete hasn't completed successfully."];

        return ["success" => true, "userResult" => $userResult, "managerResult" => $managerResult];
    }
}
