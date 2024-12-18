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
        $pegawai = DB::table('users as a')
            ->leftJoin('role as b', 'b.id', '=', 'a.id_role')
            ->leftJoin('department as c', 'c.id', '=', 'a.id_department')
            ->select(
                'a.*',
                'b.nama as role',
                'c.nama as department'
            )
            ->orderBy('a.created_at', 'desc') // Urutkan dari terbaru berdasarkan created_at
            ->paginate(10);
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
        $department = department::orderBy('nama', 'asc')->get();
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
    // public function update(Request $request, Siswa $siswa)
    // {
    //     //define validation rules
    //     $validator = Validator::make($request->all(), [
    //         'nama'     => 'required',
    //         'noinduk'   => 'required',
    //         'nisn'   => 'required',
    //         'id_kelas'   => 'required'
    //     ]);

    //     //check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     //create post
    //     $siswa->update([
    //         'nama'     => $request->nama,
    //         'noinduk'   => $request->noinduk,
    //         'id_kelas'   => $request->id_kelas
    //     ]);

    //     $siswa->load('kelas');

    //     //return response
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Berhasil Diudapte!',
    //         'data'    => $siswa
    //     ]);
    // }

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
            'message' => 'Data Pegawai Berhasil Dihapus!.',
        ]);
    }
}
