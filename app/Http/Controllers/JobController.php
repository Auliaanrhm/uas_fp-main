<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\Job;


class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Jobs';
        confirmDelete();
        return view('admin.jobs.index', ['pageTitle' => $pageTitle]);
    }

    public function getJobs(Request $request)
    {
        $jobs = Job::all();
        if ($request->ajax()) {
            return datatables()->of($jobs)
                ->addIndexColumn()
                ->addColumn('actions', function ($job) {
                    return view('admin.jobs.actions', compact('job'));
                })
                ->toJson();
        }
    }

    public function apply($id){
        $job = Job::findOrFail($id);
        return view('recruitments.apply', compact('job')); 
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'description' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('image');

        if ($file != null) {
            $encryptedFilename = $file->hashName();
            $file->store('public/jobs');
        }

        // ELOQUENT
        $job = new Job;
        $job->position = $request->position;
        $job->description = $request->description;

        if ($file != null) {
            $job->image = $encryptedFilename;
        }

        $job->save();

        Alert::success('Added Successfully', 'Job Added Successfully.');

        return redirect()->route('admin.jobs.index');
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Job';
        $job = Job::find($id);
        return view('admin.jobs.edit', compact('pageTitle', 'job'));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'description' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('image');

        if ($file != null) {
            $encryptedFilename = $file->hashName();
            $file->store('public/jobs');
        }

        $job = Job::find($id);
        $job->position = $request->position;
        $job->description = $request->description;

        if ($file) {
            if ($job->image) {
                $oldFile = 'public/jobs/' . $job->image;
                if (Storage::exists($oldFile)) {
                    Storage::delete($oldFile);
                }
            }
            $encryptedFilename = $file->hashName();

            $file->store('public/jobs');
            $job->image = $encryptedFilename;
        }

        $job->save();
        Alert::success('Changed Successfully', 'Job Data Changed Successfully.');
        return redirect()->route('admin.jobs.index');
    }

    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        if ($job->image) {
            $filePath = 'public/jobs/' . $job->image;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
        $job->delete();
        Alert::success('Deleted Successfully', 'Job Data Deleted  Successfully.');

        return redirect()->route('admin.jobs.index');
    }
}
