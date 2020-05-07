<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this-> repository = $user;
    }

    public function index()
    {
        $users = $this->repository->latest()->TenantUser()->paginate();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(StoreUpdateUser $request)
    {
        
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password'] = bcrypt($data['password']); // encrypt password

        $this->repository->create($data);

        return redirect()->route('users.index')->withSuccess('User cadastrado com sucesso!');
    }

    public function show($id)
    {
        if (!$user = $this->repository->TenantUser()->find($id))
            return redirect()->back();


        return view('admin.pages.users.show', compact('user'));
    }

    public function edit($id)
    {
        if (!$user = $this->repository->TenantUser()->find($id))
            return redirect()->back();

        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(StoreUpdateuser $request, $id)
    {

        if (!$user = $this->repository->TenantUser()->find($id))
            return redirect()->back();

        $data =$request->only('name','email');

        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }

        $user -> update($data);

        return redirect()->route('users.index')->withSuccess('Módulo editado com sucesso!');
    }

    public function destroy($id)
    {
        if (!$user = $this->repository->TenantUser()->find($id))
        return redirect()->back();

        $user -> delete();

        return redirect()->route('users.index')->withSuccess('Módulo deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $users = $this->repository
                            ->where(function($query) use($request){
                                if ($request->filter){
                                    $query->orwhere('name','LIKE', "%{$request->filter}%");
                                    $query->orwhere('email',$request->filter);
                                }

                            })
                            ->latest()
                            ->TenantUser()
                            ->paginate();

        return view('admin.pages.users.index', compact('users', 'filters'));
    }
}
