<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\ComplaintStatusHistory;
use Auth;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function complaint_list(){
        $complaints = Complaint::where('user_id', Auth::user()->id)->get();
        return view('user.complaints.complaintList', compact('complaints'));
    }

    public function complaint_form(){
        $categories = Category::all();
        return view('user.complaints.complaintForm', compact('categories'));
    }

    public function complaint_add(Request $request){
        $valid = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'category' => 'required'
        ]);

        try {
            $complaint = Complaint::create([
                'user_id' => Auth::user()->id,
                'category_id' => $valid['category'],
                'title' => $valid['title'],
                'description' => $valid['description']
            ]);

            ComplaintStatusHistory::create([
                'complaint_id' => $complaint->id,
                'chhanged_by' => Auth::user()->id,
                'status' => 'pending',
            ]);

            return redirect(route('complaint'))->with('message', 'Success Add Complaint');
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }

    public function complaint_view($id){
        $complaint = Complaint::find($id);
        return view('user.complaints.complaintView', compact('complaint'));
    }
}
