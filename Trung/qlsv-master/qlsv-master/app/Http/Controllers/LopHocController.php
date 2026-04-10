<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller {
    public function index() {
        $dsLop = LopHoc::paginate(5); 
        return view('lophoc.index', compact('dsLop'));
    }

    public function create() {
        return view('lophoc.create');
    }

    public function store(Request $request) {
        $request->validate([
            'ten_lop' => 'required',
            'ma_lop' => 'required|unique:lop_hocs'
        ]);

        LopHoc::create($request->all());
        return redirect()->route('lophoc.index')->with('success', 'Thêm lớp thành công!');
    }

    public function edit($id) {
        $lop = LopHoc::findOrFail($id);
        return view('lophoc.edit', compact('lop'));
    }

    public function update(Request $request, $id) {
        $lop = LopHoc::findOrFail($id);
        $lop->update($request->all());
        return redirect()->route('lophoc.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id) {
        LopHoc::destroy($id);
        return redirect()->route('lophoc.index')->with('success', 'Xóa lớp thành công!');
    }
}