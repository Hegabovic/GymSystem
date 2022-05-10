<?php

namespace App\Http\Controllers;

use App\Contracts\GymRepositoryInterface;
use App\Http\Requests\EditClerkRequest;
use App\Http\Requests\StoreClerkRequest;
use App\Http\Requests\UpdateGymManagerRequest;
use App\Models\CityManager;
use App\Models\User;
use App\Repositories\CityManagerRepository;
use App\Repositories\CityRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private GymManagerRepository $gymManagerRepository;
    private CityManagerRepository $cityManagerRepository;
    private UserRepository $userRepository;

    private GymRepositoryInterface $gymRepository;
    private CityRepository $cityRepository;

    public function __construct(UserRepository $userRepository, GymManagerRepository $gymManagerRepository, CityManagerRepository $cityManagerRepository, GymRepositoryInterface $gymRepository, CityRepository $cityRepository)
    {
        $this->cityManagerRepository = $cityManagerRepository;
        $this->gymManagerRepository = $gymManagerRepository;
        $this->userRepository = $userRepository;
        $this->gymRepository = $gymRepository;
        $this->cityRepository = $cityRepository;
    }

    public function showGymManagers()
    {
        $gymManagers = $this->gymManagerRepository->allWithTrashed();
        return view('gymManagers.show', ['managers' => $gymManagers]);
    }

    public function showUsers()
    {
        return view('users.show_users');
    }

    public function createCityManager()
    {
        $cities = $this->cityRepository->all();
        return view('users.create_city_manager', ['cities' => $cities]);
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

    public function editGymManger($id)
    {
        $selectedGymManger = $this->gymManagerRepository->findById($id);
        $gyms = $this->gymRepository->all();
        return view('gymManagers.edit', ['manger' => $selectedGymManger, 'gyms' => $gyms]);
    }

    public function storeEditGymManger(UpdateGymManagerRequest $request)
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
        $avatarPath = env('DEFAULT_AVATAR');
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/photos');
        }

        if ($request->clerk === 'city-manager') {
            $user->assignRole('CityManager');

            $this->cityManagerRepository->create([
                'user_id' => $user->id,
                'n_id' => $input['n_id'],
                'city_id' => $input['facility']
            ]);
            return to_route('show_city_managers');
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

    public function deleteGymManager()
    {
        $selectedUserId = $this->gymManagerRepository->findById(request()->input('id'))->user_id;
        $userResult = $this->userRepository->delete($selectedUserId);
        $managerResult = $this->gymManagerRepository->delete(request()->input('id'));

        if ($userResult > 0)
            return ["success" => true];

        return ["success" => false, "message" => "Delete hasn't completed successfully."];

    }

    public function restoreGymManager()
    {
        $selectedManager = $this->gymManagerRepository->allWithTrashed()->where('id', request()->input('id'))->first();
        $selectedUser = $this->userRepository->allWithTrashed()->where('id', $selectedManager->user_id)->first();
        $userResult = $selectedUser->restore();
        $managerResult = $selectedManager->restore();

        if ($userResult > 0) {
            $response = [
                "n_id" => $selectedManager->n_id,
                "name" => $selectedUser->name,
            ];
            return ["success" => true, 'manager' => $response];
        }
        return ["success" => false, "message" => "Delete hasn't completed successfully."];
    }

    public function showCityManagers()
    {
        $cityManagers = CityManager::All();
        return view('users.show_city_managers', ['cityManagers' => $cityManagers]);
    }

    public function editCityManagers($id)
    {
        $cityManagers = CityManager::All();
        $cityManager = CityManager::find($id);

        return view('users/edit_city_managers', ['cityManagers' => $cityManagers, 'cityManager' => $cityManager]);
    }

    public function updateCityManagers(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $cityManagerId = $request->user()->id;

        $cityManager = CityManager::find($cityManagerId);
        $UserCityManagerId = $cityManager->user_id;
        $cityManager->update([
            "n_id" => $data['n_id'],
        ]);

        $UserCityManager = User::find($UserCityManagerId);
        $UserCityManager->update([
            "name" => $data['name'],
            "email" => $data['email'],
        ]);

        return to_route('show_city_managers');

    }

    public function deleteCityManagers()
    {
        $isDeleted = false;
        $id = request()->input('id');
        // dd(request()->all());
        $record = CityManager::find($id);
        if ($record) {
            $isDeleted = $record->delete();
        }
        if ($isDeleted) {
            return ['success' => 'true'];
        } else {
            return ['success' => 'false'];
        }
    }
}
