<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('auth.users.index', compact('users'));
    }

    public function show(string $id)
    {
        $user = User::find($id);

        return view('auth.users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        return view('auth.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with(['type' => 'danger', 'message' => 'Usuário não encontrado']);
        }
        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('user.index')->with(['type' => 'success', 'message' => 'Usuário editado com sucesso']);

    }

    public function destroy(string $id)
    {

        if (Gate::denies('is-admin')) {
            return back()->with(['type' => 'danger', 'message' => 'Você não é um administrador']);
        }


        $user = User::find($id);
        if (!$user) {
            return back()->with(['type' => 'danger', 'message' => 'Usuário não encontrado']);
        }
        if (auth('')->user()->id === $user->id) {
            return back()->with(['type' => 'danger', "message" => 'Você não pode deletar seu próprio perfil']);

        }
        $user->delete();

        return redirect()->route('user.index')->with([
            'type' => 'success',
            'message' => 'Usuário apagado com sucesso'
        ]);

    }


}
