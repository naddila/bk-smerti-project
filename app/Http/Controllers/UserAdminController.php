<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller
{

    // master user
    public function daftar_user()
    {
        $users = User::paginate(10000);
        return view('bk.page.user.daftar-user', compact('users'));
    }

    // simpan user
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|digits:10',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255',
            'role' => 'required|integer',
            'info' => 'required|boolean',
        ]);
        User::create([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'info' => $request->info,
        ]);

        return redirect()->route('master.user')->with('success', 'User berhasil dibuat!');
    }

    // form edit
    public function edit($id)
    {
        return User::findOrFail($id);
    }

    // simpan update
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nisn' => 'unique:users,nisn,' . $id,
            'email' => 'unique:users,email,' . $id,
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()
            ]);
        } else {

            // $user->update([
            $user->nisn = $request->post('nisn');
            $user->name = $request->post('name');
            $user->email = $request->post('email');
            $user->role = $request->post('role');
            $user->info = $request->post('info');
            // ]);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User Berhasil diubah.'
            ]);
        }
    }

    // hapus user
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil dihapus.'
        ]);
    }

    // daftar guru
    public function daftar_guru()
    {
        $wali_kelas = WaliKelas::with('kelas')->latest()->paginate(10000);
        $kelas = Kelas::doesnthave('wali')->get();
        $users = User::doesnthave('wali')->where('role', 2)->get();
        return view('bk.page.guru.daftar-guru', compact('wali_kelas', 'kelas', 'users'));
    }

    // tambah guru
    public function tambah_guru(Request $request)
    {
        $wali = WaliKelas::create([
            'name' => $request->post('name'),
            'user_id' => $request->post('user'),
            'kelas_id' => $request->post('kelas'),
        ]);

        $user = User::where('id', $wali->user_id);
        $user->update([
            'info' => 1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Guru berhasil dibuat!.'
        ]);
    }

    // hapus guru
    public function hapus_guru($id)
    {
        WaliKelas::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Guru berhasil dihapus!'
        ]);
    }
}
