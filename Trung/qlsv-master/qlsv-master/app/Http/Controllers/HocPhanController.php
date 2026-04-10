<?php

namespace App\Http\Controllers;

use App\Models\HocPhan;
use Illuminate\Http\Request;

class HocPhanController extends Controller
{
    public function index()
    {
        $data = HocPhan::paginate(5);
        return view('hocphan.index', compact('data'));
    }

    public function create()
    {
        return view('hocphan.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'ma_hp' => 'required',
        'ten_hp' => 'required',
        'so_tin_chi' => 'required|numeric'
    ],[
        'ma_hp.required' => 'Mã học phần không được để trống',
        'ten_hp.required' => 'Tên học phần không được để trống',
        'so_tin_chi.required' => 'Số tín chỉ không được để trống',
        'so_tin_chi.numeric' => 'Số tín chỉ phải là số'
    ]);

    HocPhan::create($request->all());

    return redirect()->route('hocphan.index');
}

    public function edit($id)
    {
        $hp = HocPhan::findOrFail($id);
        return view('hocphan.edit', compact('hp'));
    }

    public function update(Request $request, $id)
    {
        $hp = HocPhan::findOrFail($id);
        $hp->update($request->all());
        return redirect()->route('hocphan.index');
    }

    public function destroy($id)
    {
        HocPhan::destroy($id);
        return redirect()->route('hocphan.index');
    }
}