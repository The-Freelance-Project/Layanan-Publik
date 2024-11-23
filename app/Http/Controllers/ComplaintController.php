<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\ComplaintStatusHistory;
use App\Models\Notification;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ComplaintController extends Controller
{
    public function complaint_list(){
        $complaints = Complaint::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
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
            'category' => 'required',
            'location' => 'required',
            'photo' => 'required',
        ]);

        $file = $request->file('photo');
        $userId = Auth::user()->id;
        $timestamp = now()->timestamp;
        $fileName = $userId . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
        $filePath = 'complaints';

        try {
            $file->move($filePath, $fileName);
        } catch (\Throwable $th) {
            return back()->with('error', "Terjadi Kesalahan saat mengupload file, tunggu beberapa saat dan coba lagi.");
        }

        try {
            $complaint = Complaint::create([
                'user_id' => $userId,
                'category_id' => $valid['category'],
                'title' => $valid['title'],
                'description' => $valid['description'],
                'location' => $valid['location'],
                'photo' => "/".$filePath."/".$fileName
            ]);

            ComplaintStatusHistory::create([
                'complaint_id' => $complaint->id,
                'changed_by' => $userId,
                'status' => 'pending',
                'note' => 'Aduan Dikirim Oleh User'. Auth::user()->name
            ]);

            $tanggal = Carbon::parse($complaint->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY');
            Notification::create([
                "user_id" => $userId,
                "title" => "Pengaduan Terkirim",
                "text" => "Terima kasih! Pengaduan Anda pada $tanggal, tentang $complaint->title, telah berhasil terkirim dan saat ini sedang dalam proses peninjauan oleh tim kami. Kami akan segera memberikan tanggapan terkait laporan Anda."
            ]);

            return redirect(route('complaint'))->with('message', 'Success Add Complaint');
        } catch (\Throwable $th) {
            return back()->with('error', "Terjadi Kesalahan saat mengupload file, tunggu beberapa saat dan coba lagi.");
        }
    }

    public function complaint_view($id){
        $complaint = Complaint::find($id);
        if (Auth::user()->role == 'user') {
            return view('user.complaints.complaintView', compact('complaint'));
        } else {
            return view('admin.complaints.complaintView', compact('complaint'));
        }
    }

    public function complaint_list_admin(Request $request){
        $request->validate([
            'status' => 'nullable|string', // Optional
            'start_date' => 'nullable|date', // Optional
            'end_date' => 'nullable|date|after_or_equal:start_date', // Optional
        ]);

        // Query dasar
        $query = Complaint::query();

        // Tambahkan kondisi berdasarkan input
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Eksekusi query
        $complaints = $query->orderBy('created_at', 'DESC')->get();
        
        return view('admin.complaints.complaintList', compact('complaints'));
    }
}
