<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $headings = Heading::all();

        return view('index', compact('headings'));
    }

    public function create($find_heading)
    {
        $heading = Heading::where('name', $find_heading)->first()->id;

        $announcements = Announcement::all()->where('heading_id', '=', $heading)->sortByDesc('updated_time');

        return view('create', compact('announcements', 'heading'));
    }

    public function store(Request $request)
    {
        $request->validate([ 'name' => 'required', 'body' => 'required', ]);

        Announcement::create($request->all());

        $redirect_heading_helper = Heading::all()->find($request->request->all())->first()->name;

        return redirect()->route('create', ['find_heading' => $redirect_heading_helper])->with('success', 'Created successfully');
    }

    public function update($id)
    {
        $announcement = Announcement::where('id', '=', $id)->first();

        $announcement->update(['updated_time' => Carbon::now()]);
        $heading = Heading::find($announcement->heading_id)->name;

        return redirect()->route('create', ['find_heading' => $heading]);
    }
}
