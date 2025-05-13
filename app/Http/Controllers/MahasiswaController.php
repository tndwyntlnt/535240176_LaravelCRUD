<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

//db
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
    //index
    public function index()
    {
        $mahasiswa = Mahasiswa::all();


        return view('mahasiswa.index', compact('mahasiswa'));
    }

    //create
    public function create()
    {
        return view('mahasiswa.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);
        
        // cara 1
        // $mahasiswa = Mahasiswa::create($request->all());

        // cara 2
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nim = $request->nim;
        // $mahasiswa->nama = $request->nama;
        // $mahasiswa->email = $request->email;
        // $mahasiswa->jurusan = $request->jurusan;
        // $mahasiswa->save();

        // cara 3
        DB::table('mahasiswa')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);
        
        return redirect()->route('mahasiswa')
            ->with('success', 'Mahasiswa created successfully.');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);

        $update = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];
        Mahasiswa::whereId($id)->update($update);

        return redirect()->route('mahasiswa')
            ->with('success', 'Mahasiswa updated successfully');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return redirect()->route('mahasiswa')
            ->with('success', 'Mahasiswa deleted successfully');
    }
}
