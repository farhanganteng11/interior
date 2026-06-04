<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class ProjectController extends Controller {
    public function index(Request $request) {
        $query = Project::orderBy('sort_order');
        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        $projects = $query->get();
        $categories = ['all'=>'Semua','residential'=>'Residential','commercial'=>'Commercial','hospitality'=>'Hospitality'];
        return view('projects.index', compact('projects','categories'));
    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->firstOrFail();
        $related = Project::where('category', $project->category)
            ->where('id','!=',$project->id)->take(3)->get();
        return view('projects.show', compact('project','related'));
    }

    // 1. Fungsi untuk menampilkan halaman form upload foto
    public function create() {
        return view('projects.create');
    }

    // 2. Fungsi untuk memproses foto yang di-upload ke server & database
    public function store(Request $request) {
        // Validasi agar wajib diisi gambar dengan format yang benar dan maksimal 2MB
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Menyimpan file gambar asli ke folder storage/app/public/projects
        $path = $request->file('thumbnail')->store('projects', 'public');

        // Memasukkan data proyek baru ke Database MySQL
        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), 
            'thumbnail' => 'storage/' . $path, 
            'description' => 'Proyek baru hasil upload form sendiri.',
            'category' => 'residential', 
            'location' => 'Jakarta',
            'year' => 2026,
            'area_sqm' => 150,
            'is_featured' => true,
            'sort_order' => (Project::max('sort_order') ?? 0) + 1, // Ditambahkan pengaman jika database masih kosong
            'gallery' => json_encode([]),
            'client_name' => 'Klien Baru'
        ]);

        // Kembalikan ke halaman form dengan pesan sukses berwarna hijau
        return back()->with('success', 'Keren! Proyek baru beserta fotomu berhasil disimpan ke database!');
    }
}