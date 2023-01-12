<?php

namespace App\Http\Controllers;

use App\Exports\SocietiesExport;
use App\Imports\SocietiesImport;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Society::get();
        return view('societies.index', compact('data'), ['title' => 'Admin | Societies', 'breadcrumb' => 'Societies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('societies.create', ['title' => 'Admin | Societies', 'breadcrumb' => 'Create Society']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Society::$rules);
        $req = $request->all();
        $req['nik'] = fake()->unique()->nik();
        $req['photo'] = "";
        if ($request->hasFile('photo')) {
            $fullFileName = Str::random('10') . '_' . date('Y-m-d') . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('images/societies/', $fullFileName);
            $req['photo'] = "images/societies/" . $fullFileName;
        }

        $society = Society::create($req);

        if ($society) {
            return redirect('admin/societies')->with('success', 'Success Add New Society');
        } else {
            return redirect('admin/societies')->with('failed', 'Failed Add New Society');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $society = Society::findOrFail($id);

        return view('societies.detail', compact('society'), ['title' => 'Admin | Societies', 'breadcrumb' => 'Societies']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $society = Society::findOrFail($id);

        return view('societies.edit', compact('society'), ['title' => 'Admin | Societies', 'breadcrumb' => 'Edit Society']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldSociety = Society::find($id);

        if ($oldSociety == null) {
            return redirect('admin/societies')->with('failed', 'Society Not Found');
        }
        $request->validate(Society::$rules);
        $req = $request->all();

        if ($request->hasFile('photo')) {
            if ($oldSociety->photo !== null) {
                Storage::delete("$oldSociety->photo");
            }
            $newSociety = Str::random('10') . '_' . date('Y-m-d') . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('images/societies/', $newSociety);
            $req['photo'] = "images/societies/" . $newSociety;
        }

        $data = Society::findOrFail($id)->update($req);

        if ($data) {
            return redirect('admin/societies')->with('success', 'Success to update society');
        } else {
            return redirect('admin/societies')->with('failed', 'Failed to update society');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::find($id);

        if (!$society) {
            return redirect('admin/societies')->with('failed', 'Society Not Found');
        }

        if ($society->photo !== null || $society->photo !== "") {
            Storage::delete("$society->photo");
        }
        $society->destroy($id);

        return redirect('admin/societies')->with('success', 'Success Deleted Society');
    }

    public function exportCsv()
    {
        return Excel::download(new SocietiesExport, 'Societies.csv');
        // return Excel::download(new SocietiesExport, 'Societies.xlsx');
    }

    public function importCsv()
    {
        Excel::import(new SocietiesImport, request()->file('file'));

        return redirect('admin/societies')->with('success', 'Success import socities');
    }

    public function exportPdf()
    {
        $data = Society::all();
        view()->share('society', $data);
        $pdf = PDF::loadView('societies.index', compact('data'), ['data' => $data,  'title' => 'Admin | Societies', 'breadcrumb' => 'Societies']);

        return $pdf->stream();
    }
}
