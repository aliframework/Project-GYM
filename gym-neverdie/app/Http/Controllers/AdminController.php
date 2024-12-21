<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     // Menampilkan dasbor admin
     public function index()
     {
         // Assuming you want to return the dashboard or some overview page
         return view('admin.dashboard');
     }
     public function dashboard()
     {
         return view('admin.dashboard');  // Halaman dashboard admin
     }
     
     
         // Menampilkan daftar menu
         public function membershipsIndex()
         {
             $memberships = Membership::all();
             return view('admin.memberships.index', compact('memberships'));
         }
     
         // Menampilkan form untuk membuat menu
         public function membershipsCreate()
         {
             return view('admin.memberships.create');
         }
     
         // Menyimpan menu baru
         public function membershipsStore(Request $request)
         {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);
     
             Membership::create($request->all());
     
             return redirect()->route('admin.memberships.index')->with('success', 'Menu created successfully!');
         }
     
         // Menampilkan form untuk mengedit menu
         public function membershipsEdit($id)
         {
             $membership = Membership::findOrFail($id);
             return view('admin.memberships.edit', compact('menu'));
         }
     
         // Memperbarui menu
         public function membershipsUpdate(Request $request, $id)
         {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);
     
             $membership = Membership::findOrFail($id);
             $membership->update($request->all());
     
             return redirect()->route('admin.memberships.index')->with('success', 'Menu updated successfully!');
         }
     
         // Menampilkan detail menu
         public function membershipsShow($id)
         {
             $membership = Membership::findOrFail($id);
             return view('admin.memberships.show', compact('menu'));
         }
     
         // Menghapus menu
         public function membershipsDestroy($id)
         {
             $membership = Membership::findOrFail($id);
             $membership->delete();
     
             return redirect()->route('admin.memberships.index')->with('success', 'Menu deleted successfully!');
         }
     
}
