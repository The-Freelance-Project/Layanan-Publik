<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Complaint;
use App\Models\ComplaintStatusHistory;
use App\Models\User;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();

        foreach ($categories as $category) {
            $complaint = Complaint::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'Masalah '. $category->name . ' di Sumatera',
                'description' => 'Terjadi masalah serius di Sumatera terkait ' . $category->name,
                'status' => 'pending',
            ]);

            ComplaintStatusHistory::create([
                'complaint_id' => $complaint->id,
                'changed_by' => $user->id,
                'status' => 'pending',
            ]);
        }
    }
}