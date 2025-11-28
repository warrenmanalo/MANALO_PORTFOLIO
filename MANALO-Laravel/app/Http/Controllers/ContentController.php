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
        $data = $request->validate([
            'heading' => 'required|string',
            'highlight' => 'required|string',
            'subheading' => 'required|string',
        ]);

        $hero = Hero::first();

        if ($hero) {
            $hero->update($request->all());
        } else {
            Hero::create($request->all());
        }

        return back()->with('success','Hero updated!');
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
