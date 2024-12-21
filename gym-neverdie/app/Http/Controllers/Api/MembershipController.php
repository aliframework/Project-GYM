<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MembershipsRequest;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::latest()->paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar Membership berhasil diambil',
            'data' => $memberships
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'duration'    => 'required|numeric|min:1',
            'description' => 'nullable|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan data membership
        $membership = Membership::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Membership berhasil ditambahkan',
            'data' => $membership
        ], 201);
    }

    /**
     * Menampilkan detail data membership tertentu (GET).
     */
    public function show($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json([
                'status' => 'error',
                'message' => 'Membership tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail Membership berhasil diambil',
            'data' => $membership
        ], 200);
    }

    /**
     * Memperbarui data membership tertentu (PUT/PATCH).
     */
    public function update(Request $request, $id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json([
                'status' => 'error',
                'message' => 'Membership tidak ditemukan'
            ], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'duration'    => 'required|numeric|min:1',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Perbarui data membership
        $membership->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Membership berhasil diperbarui',
            'data' => $membership
        ], 200);
    }

    /**
     * Menghapus data membership tertentu (DELETE).
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json([
                'status' => 'error',
                'message' => 'Membership tidak ditemukan'
            ], 404);
        }

        $membership->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Membership berhasil dihapus'
        ], 200);
    }
}
