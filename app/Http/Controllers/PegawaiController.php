<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
{
    // Mendapatkan ID role dari sesi atau data pengguna yang sedang login
    $roleId = auth()->user()->id_role;

    // Mulai query
    $pegawai = DB::table('users as a')
        ->leftJoin('role as b', 'b.id', '=', 'a.id_role')
        ->leftJoin('department as c', 'c.id', '=', 'a.id_department')
        ->select(
            'a.*',
            'b.nama as role',
            'c.nama as department'
        );

    // Kondisi berdasarkan role
    if ($roleId == 1 || $roleId == 2) {
        // Role 1 dan 2: Menampilkan semua data
        $pegawai = $pegawai->orderBy('a.created_at', 'desc')
            ->paginate(10);
    } elseif ($roleId == 3) {
        // Role 3: Menampilkan data berdasarkan id_department
        $pegawai = $pegawai->where('a.id_department', auth()->user()->id_department)
            ->orderBy('a.created_at', 'desc')
            ->paginate(10);
    } elseif ($roleId == 4 || $roleId == 5) {
        // Role 4 dan 5: Menampilkan hanya data mereka sendiri
        $pegawai = $pegawai->where('a.id', auth()->user()->id)
            ->orderBy('a.created_at', 'desc')
            ->paginate(10);
    }

    // Format tanggal lahir
    foreach ($pegawai as $pgw) {
        $pgw->tanggal_lahir = Carbon::parse($pgw->tanggal_lahir)->translatedFormat('d F Y');
    }

    // Data tambahan untuk view
    $data = [
        'title' => "Data Pegawai",
        'users' => $pegawai
    ];

    // Return view with data
    return view('pegawai', compact('pegawai'), $data);
}

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show(User $pegawai)
    {
        //return response
        $pegawai->load('role', 'department');

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Pegawai',
            'data'    => $pegawai
        ]);
    }

    public function carirole()
    {
        $role = role::orderBy('nama', 'asc')->get();
        return response()->json(['data' => $role]);
    }

    public function caridepartment()
{
    // Exclude department with name 'all'
    $department = Department::where('nama', '!=', 'all')
                             ->orderBy('nama', 'asc')
                             ->get();

    return response()->json(['data' => $department]);
}

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'email' => 'required|email|unique:users,email',
            'alamat'   => 'required',
            'tanggal_lahir' => 'required|date',
            'nohp' => 'required|string|max:16',
            'gaji' => 'required|numeric',
            'id_role'   => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Check if the error is for the email field
            if ($validator->errors()->has('email')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email sudah terdaftar. Silakan gunakan email lain.'
                ], 422);
            }
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = User::create([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'alamat'   => $request->alamat,
            'password'  => Hash::make($request->password),
            'nohp'   => $request->nohp,
            'gaji'   => $request->gaji,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'id_role'   => $request->id_role,
            'id_department'   => $request->id_department
        ]);
        $post->load('role', 'department');

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $post
        ]);
    }

    // /**
    //  * update
    //  *
    //  * @param  mixed $request
    //  * @param  mixed $post
    //  * @return void
    //  */
    public function update(Request $request, User $pegawai)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'email' => 'required|email',
            'alamat'   => 'required',
            'tanggal_lahir' => 'required|date',
            'nohp' => 'required|string|max:16',
            'password'   => 'required',
            'gaji' => 'required|numeric',
            'id_role'   => 'required',
            'id_department'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $pegawai->update([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'alamat'   => $request->alamat,
            'password'  => Hash::make($request->password),
            'nohp'   => $request->nohp,
            'gaji'   => $request->gaji,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'id_role'   => $request->id_role,
            'id_department'   => $request->id_department
        ]);

        $pegawai->load('role', 'department');

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $pegawai
        ]);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */



    public function destroy($id)
    {
        //delete post by ID
        User::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Pegawai Berhasil Dihapus!',
        ]);
    }
}