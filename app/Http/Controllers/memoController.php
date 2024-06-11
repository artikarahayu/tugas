<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Memo::all();
        return view('memo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required',
            'deskripsi' => 'required',
            'semester' => 'required|numeric',
        ],[
            'mata_kuliah.required' => 'Mata kuliah Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'semester.required' => 'Semester Wajib Diisi',
            'semester.numeric' => 'Semester Harus Diisi Nomor',
        ]);

        $data = [
            'mata_kuliah' => $request->mata_kuliah,
            'deskripsi' => $request->deskripsi,
            'semester' => $request->semester,
        ];

        Memo::create($data);
        return redirect()->to('memo')->with('success', 'Data telah tersimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $memo = Memo::findOrFail($id);
        return view('memo.edit', ['memo' => $memo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mata_kuliah' => 'required',
            'deskripsi' => 'required',
            'semester' => 'required|numeric',
        ]);

        $memo = Memo::findOrFail($id);
        $memo->mata_kuliah = $request->mata_kuliah;
        $memo->deskripsi = $request->deskripsi;
        $memo->semester = $request->semester;
        $memo->save();

        return redirect('/memo')->with('success', 'Catatan berhasil di edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();

        return redirect('/memo')->with('success', 'Catatan berhasil dihapus.');
    }
}