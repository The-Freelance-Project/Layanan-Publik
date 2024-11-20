<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Auth;
use Illuminate\Http\Request;

class CompaintStatusHistoryController extends Controller
{
    public function history_list(){
        $complaints = Complaint::where('user_id', Auth::user()->id)->get();

        $historyComplaint = $complaints->map(function($complaint){
            return [
                "title" => $complaint->title,
                "created_at" => $complaint->created_at,
                "status" => $complaint->status,
                "url" => route('complaint.view', ['id' => $complaint->id]),
            ];
        });

        return view('user.complaints.historyComplaint', compact('historyComplaint'));
    }
}
