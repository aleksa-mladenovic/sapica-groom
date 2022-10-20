<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dog;
use App\Models\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WorksController extends Controller
{
    // Gallery
    public function gallery()
    {
        $works = Work::where('status', '0')->get();
        return view('frontend.gallery.index', compact('works'));
    }

    public function view($work_slug)
    {
        $work = Work::where('slug', $work_slug)->first();
        return view('frontend.gallery.view', compact('work'));
    }

    public function index()
    {
        $works = Work::all();
        return view('admin.works.index', compact('works'));
    }

    public function add()
    {
        $dogs = Dog::all();
        return view('admin.works.add', compact('dogs'));    
    }

    public function insert(Request $request)
    {
        $works = new Work();
        if($request->hasFile('image1')){
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image1 = $filename;
        }
        if($request->hasFile('image2')){
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image2 = $filename;
        }
        if($request->hasFile('image3')){
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image3 = $filename;
        }
        if($request->hasFile('image4')){
            $file = $request->file('image4');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image4 = $filename;
        }

        $works->title       = $request->input('name');
        $works->slug        = $request->input('slug');
        $works->dog_id      = $request->input('dog_id');
        $works->description = $request->input('description');
        $works->status      = $request->input('status') == TRUE ? '1' : '0';
        $works->save();
        return redirect('/works')->with('status', "works Added Successfully");
    }

    public function edit($id)
    {
        $work = Work::find($id);
        return view('admin.works.edit', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $works = Work::find($id);
        if($request->hasFile('image1')){
            $path = 'asstes/uploads/category/'.$works->image1;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image1 = $filename;
        }
        if($request->hasFile('image2')){
            $path = 'asstes/uploads/category/'.$works->image2;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image2 = $filename;
        }
        if($request->hasFile('image3')){
            $path = 'asstes/uploads/category/'.$works->image3;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image3 = $filename;
        }
        if($request->hasFile('image4')){
            $path = 'asstes/uploads/category/'.$works->image4;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image4');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/works/', $filename);
            $works->image4 = $filename;
        }

        $works->title       = $request->input('name');
        $works->slug        = $request->input('slug');
        $works->dog_id      = $request->input('dog_id');
        $works->description = $request->input('description');
        $works->status      = $request->input('status') == TRUE ? '1' : '0';
        $works->update();
        return redirect('/works')->with('status', "Category Edited Successfully");
    }

    public function destroy($id)
    {
        $work = Work::find($id);
        if($work->image1){
            $path = 'assets/uploads/works/'.$work->image1;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        if($work->image2){
            $path = 'assets/uploads/works/'.$work->image2;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        if($work->image3){
            $path = 'assets/uploads/works/'.$work->image3;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        if($work->image4){
            $path = 'assets/uploads/works/'.$work->image4;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $work->delete();

        return redirect('/works')->with('status', "work Deleted Successfully");
    }
}