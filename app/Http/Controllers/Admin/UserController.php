<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Batch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * retun view
     */

    public function index()
    {

        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.show', compact('user'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::orderBY('id')->get();

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.user-create', compact('roles', 'batches'));
    }

    public function store(StoreUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'batch_id' => $request->batch_id,
        ]);
        //  ddd($user);
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $batches = Batch::orderBY('id')->get();

        $roleSelected = $user->load('roles')->roles[0]->pivot->role_id;

        $batchJoined = $user->batch ? $user->batch->id : "";

        $user->load('roles');

        $redirectView = view('admin.user-edit', compact('user', 'roles', 'batches'));

        $redirectViewWithRole = view(
            'admin.user-edit',
            compact('user', 'roles', 'batches', 'roleSelected', 'batchJoined')
        );

        $redirectTo = $roleSelected ? $redirectViewWithRole : $redirectView;

        return $redirectTo;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'batch_id' => $request->batch_id,
        ]);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->roles()->detach();

        $user->results()->delete();

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {

        $user =  User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
