<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerUpdateProfileRequest;
use App\Http\Resources\AttendanceResource;
use App\Repositories\AttendanceRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use App\Repositories\TrainingSessionsRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use function request;


class ApiUserController extends Controller
{


    private UserRepository $userRepository;
    private CustomerRepository $customerRepository;
    private AttendanceRepository $attendanceRepository;
    private OrderRepository $orderRepository;
    private TrainingSessionsRepository $trainingSessionsRepository;

    public function __construct(UserRepository $userRepository, CustomerRepository $customerRepository, AttendanceRepository $attendanceRepository, OrderRepository $orderRepository, TrainingSessionsRepository $trainingSessionsRepository)
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->attendanceRepository = $attendanceRepository;
        $this->orderRepository = $orderRepository;
        $this->trainingSessionsRepository = $trainingSessionsRepository;
    }

    public function attend()
    {
        $customer = request()->user()->customer;
        $session = $this->trainingSessionsRepository->findById(request()->id);
        if ($customer->order === null || $customer->order->remaining_sessions < 1) {
            return ['Out of sessions' => "You dont have remaining sessions to attend You can buy another package"];
        }
        /*if(now()>$session->ends_at || now()<$session->starts_at)
        {
            return ['wrong time'=>'Your session is not now'];
        }*/
        $customer->order->remaining_sessions--;
        $this->attendanceRepository->create([
            'customer_id' => $customer->id,
            'gym_id' => $customer->order->gym_id,
            'training_session_id' => request()->id,
        ]);
        $customer->order->save();
        return (['message' => 'welcome to your session',
            'session' => ['starts_at' => $session->start_at,
                'finishes_at' => $session->finish_at,
                'you attended at' => date('H:m:s a')]]);
    }

    public function getAttendedSessions()
    {
        $customer = request()->user()->customer;
        return AttendanceResource::collection($customer->attendance);
    }

    public function update(CustomerUpdateProfileRequest $request)
    {
        $input = $request->validated();
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/photos');
            $this->userRepository->updateAvatar($request->user()->id, $avatarPath);
        }
        if (isset($input['password'])) $input['password'] = Hash::make($input['password']);
        $this->userRepository->update($request->user()->id, $input);
        return $input;
    }

}
