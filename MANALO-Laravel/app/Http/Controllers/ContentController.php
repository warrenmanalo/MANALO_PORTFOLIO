<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\About;
use App\Models\Contact;

class ContentController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'heroes' => Hero::first(),
            'about' => About::first(),
            'contact' => Contact::first()
        ]);
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required',
            'subheading' => 'required',
            'highlight' => 'required',
            'profile_photo' => 'nullable|image',
        ]);

        $hero = Hero::first() ?? new Hero();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $hero->profile_photo = $path;
        }

        $hero->heading = $validated['heading'];
        $hero->subheading = $validated['subheading'];
        $hero->highlight = $validated['highlight'];

        $hero->save();

        return back()->with('success', 'Hero section updated!');
    }

    public function updateAbout(Request $request)
    {
        $about = $request->validate([
            'about_text' => 'required',
        ]);

         $about = About::first();

        if ($about){
            $about->update($request->all());
        } else {
            About::create($request->all());
        }

        return back()->with('success','About updated!');
    }

    public function updateContact(Request $request)
    {

        $contact = Contact::first();
    
        if ($contact) {
            $contact->update($request->all());
        } else {
            Contact::create($request->all());
        }

        return back()->with('success', 'Contact links updated!');
    }
}
