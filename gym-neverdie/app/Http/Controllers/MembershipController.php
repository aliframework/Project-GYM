<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;
use App\Http\Requests\StoreMembershipRequest;
class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.memberships.index', compact('memberships')); // Halaman untuk admin
        }
    
        if (Auth::user() && Auth::user()->hasRole('user')) {
            return view('user.memberships.index', compact('memberships')); // Menggunakan $memberships untuk view user
        }
    
        abort(403, 'Access denied.');
    }
        
    // Menampilkan form untuk membuat membership baru
    public function create()
    {
        if (!Auth::check() || !Auth::user()->hasRole('user')) {
            abort(403, 'Hanya User yang dapat menambahkan membership');
        }
        
        $categories = Category::all();
        $memberships = Membership::all();
        return view('user.memberships.create', compact('categories'));
    }

    // Menyimpan data membership baru
    public function store(StoreMembershipRequest $request)
{
    $validated = $request->validated();
    Membership::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date'],
        'status' => $validated['status'],
        'id_category' => $validated['id_category'],
    ]);

    return redirect()->route('memberships.index')->with('success', 'Membership created successfully.');
}



    public function edit(Membership $membership)
    {
        // Ambil semua kategori
        $categories = Category::all();
    
        // Kirim data membership dan categories ke view
        return view('admin.memberships.edit', compact('membership', 'categories'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'start_date' => 'required|date',
        'id_category' => 'required|exists:categories,id',
        'end_date' => 'required|date',
        'status' => 'required|in:active,inactive,expired',
    ]);

    $category = Category::find($request->id_category);
    $durasi = $category->durasi ?? 0;

    $endDate = Carbon::parse($request->start_date)->addDays($durasi);

    $membership = Membership::findOrFail($id);
    $membership->update([
        'name' => $request->name,
        'email' => $request->email,
        'start_date' => $request->start_date,
        'id_category' => $request->id_category,
        'end_date' => $endDate->toDateString(),
        'status' => $request->status, 
    ]);

    return redirect()->route('admin.memberships.index')->with('success', 'Membership berhasil diperbarui.');
}

// Menampilkan detail membership tertentu
public function show($id)
{
    $membership = Membership::findOrFail($id); // Mencari data berdasarkan ID atau gagal jika tidak ditemukan

    // Memeriksa role dan menampilkan halaman yang sesuai
    if (Auth::user()->hasRole('admin')) {
        return view('admin.memberships.show', compact('membership')); // Halaman untuk admin
    }

    if (Auth::user() && Auth::user()->hasRole('user')) {
        return view('user.memberships.show', compact('membership')); // Halaman untuk user
    }

    abort(403, 'Access denied.'); // Jika role tidak sesuai
}

    // Menghapus membership
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete(); // Soft delete data
    
        return redirect()->route('user.memberships.index')->with('success', 'Membership has been deleted.');
    }

    // Soft delete membership
    public function softDelete($id)
    {
        $membership = Membership::findOrFail($id); 
        $membership->delete(); 
        return redirect()->back()->with('success', 'Membership berhasil dihapus sementara.');
    }

    // Mengembalikan membership yang dihapus
    public function restore($id)
    {
        $membership = Membership::withTrashed()->find($id);
        if ($membership) {
            $membership->restore();
            return redirect()->back()->with('message', 'Membership berhasil dipulihkan.');
        }
        return redirect()->back()->with('error', 'Membership not found.');
    }

    // Menghapus membership secara permanen
    public function forceDelete($id)
    {
        $membership = Membership::withTrashed()->find($id);
        if ($membership) {
            $membership->forceDelete();
            return redirect()->back()->with('message', 'Membership dihapus secara permanen.');
        }
        return redirect()->back()->with('error', 'Membership not found.');
    }

    // Menampilkan semua membership termasuk yang dihapus
    public function indexWithTrashed()
    {
        $memberships = Membership::withTrashed()->get();  // Use $memberships to store the collection
        return view('admin.memberships.withTrashed', compact('memberships'));
    }
    
    // Menampilkan hanya membership yang dihapus
    public function onlyTrashed()
    {
        $memberships = Membership::onlyTrashed()->get();  // Use $memberships to store the collection
        return view('admin.memberships.archived', compact('memberships'));
    }
}
