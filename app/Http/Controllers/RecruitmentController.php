<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\RecruitmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Storage;

class RecruitmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Recruitments';
        confirmDelete();
        return view('admin.recruitments.index', ['pageTitle' => $pageTitle]);
    }

    public function getRecruitments(Request $request)
    {
        $recruitments = Recruitment::with('job')->get();
        if ($request->ajax()) {
            return datatables()->of($recruitments)
                ->addIndexColumn()
                ->addColumn('actions', function ($recruitment) {
                    return view('admin.recruitments.actions', compact('recruitment'));
                })
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'job_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'file' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('file');

        if ($file != null) {
            $encryptedFilename = $file->hashName();
            $file->store('public/recruitments');
        }

        $recruitment = new Recruitment;
        $recruitment->user_id = auth()->id();
        $recruitment->job_id = $request->job_id;
        $recruitment->name = $request->name;
        $recruitment->email = $request->email;
        $recruitment->address = $request->address;
        $recruitment->status = "Review Berkas Oleh HRD";

        if ($file != null) {
            $recruitment->file = $encryptedFilename;
        }

        $recruitment->save();

        Alert::success('Apply Success', 'Your application has been sent');
        return redirect()->route('tracking');
    }

    public function tracking()
    {
        $pageTitle = 'Recruitment Tracking';
        $recruitments = Recruitment::with('job')
            ->where('user_id', auth()->id())
            ->get();
        return view('recruitments.tracking', compact('pageTitle', 'recruitments'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Recruitment Status';
        $recruitment = Recruitment::find($id);
        return view('admin.recruitments.edit', compact('pageTitle', 'recruitment'));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $recruitment = Recruitment::find($id);
        $recruitment->status = $request->status;
        $recruitment->save();
        Alert::success('Changed Successfully', 'Recruitment Status Changed Successfully.');
        return redirect()->route('admin.recruitments.index');
    }

    public function destroy(string $id)
    {
        $recruitment = Recruitment::findOrFail($id);
        if ($recruitment->file) {
            $filePath = 'public/recruitments/' . $recruitment->file;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
        $recruitment->delete();
        Alert::success('Deleted Successfully', 'Recruitment Data Deleted  Successfully.');
        return redirect()->route('admin.recruitments.index');
    }

    public function export_excel()
    {
        return Excel::download(new RecruitmentsExport, 'recruitments.xlsx');
    }
}
