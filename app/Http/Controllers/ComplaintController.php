<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\ComplaintStatusHistory;
use App\Models\Notification;
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
                'changed_by' => Auth::user()->id,
                'status' => 'pending',
            ]);

            Notification::create([
                "user_id" => Auth::user()->id,
                "title" => "Pengaduan Telah Terkirim!",
                "text" => "Terima kasih! Pengaduan Anda telah berhasil terkirim dan saat ini sedang dalam proses peninjauan oleh tim kami. Kami akan segera memberikan tanggapan terkait laporan Anda."
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
