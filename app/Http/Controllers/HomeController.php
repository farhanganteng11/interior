<?php
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;

class HomeController extends Controller {
    public function index() {
        $featuredProjects = Project::where('is_featured', true)->orderBy('sort_order')->take(6)->get();
        $services = Service::orderBy('sort_order')->get();
        $testimonials = Testimonial::where('is_active', true)->take(3)->get();
        $stats = [
            'projects' => Project::count(),
            'years' => 10,
            'clients' => 250,
            'awards' => 15,
        ];
        return view('home', compact('featuredProjects','services','testimonials','stats'));
    }

    public function about() {
        $team = TeamMember::orderBy('sort_order')->get();
        return view('about', compact('team'));
    }

    public function services() {
        $services = Service::orderBy('sort_order')->get();
        return view('services', compact('services'));
    }
}