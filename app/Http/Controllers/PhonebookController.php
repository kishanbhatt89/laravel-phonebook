<?php

namespace App\Http\Controllers;

use App\Phonebook;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PhonebookFormRequest;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Phonebook::orderBy('name','desc')->where('user_id',Auth::user()->id)->paginate(5);
        return view('phonebook.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookFormRequest $request)
    {

        $contact = new Phonebook;

        $contact->avatar = 'default.png';

        if ($request->hasFile('avatar')) {

            $image = $request->file('avatar');
            $name = str_slug($request->name) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/avatars');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $contact->avatar = $name;
        }

        $contact->name = $request->name;
        $contact->user_id = Auth::user()->id;
        $contact->contactno = $request->contactno;
        $contact->notes = $request->notes;
        $contact->save();

        return redirect(route('phonebook.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        return view('phonebook.edit',compact('phonebook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookFormRequest $request, Phonebook $phonebook)
    {

        $phonebook->name = $request->name;
        $phonebook->contactno = $request->contactno;
        $phonebook->notes = $request->notes;

        if ($request->hasFile('avatar')) {

            if($phonebook->avatar == 'default.png') {

                $image = $request->file('avatar');
                $name = str_slug($request->name) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/avatars');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $phonebook->avatar = $name;

            } else {

                $image_path = public_path('uploads/avatars/' . $phonebook->avatar);

                if (File::exists($image_path)) {

                    File::delete($image_path);

                    $image = $request->file('avatar');
                    $name = str_slug($request->name) . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/avatars');
                    $imagePath = $destinationPath . "/" . $name;
                    $image->move($destinationPath, $name);
                    $phonebook->avatar = $name;

                }

            }
        } else {

            if ($phonebook->avatar == 'default.png') {

                $image = $request->file('avatar');
                $name = str_slug($request->name) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/avatars');
                $imagePath = $destinationPath . "/" . $name;
                $image->move($destinationPath, $name);
                $phonebook->avatar = $name;

            }
        }

        $phonebook->save();
        return redirect(route('phonebook.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {

        if($phonebook->avatar != 'default.png') {

            $image_path = public_path('uploads/avatars/' . $phonebook->avatar);

            if (File::exists($image_path)) {

                File::delete($image_path);
            }

        }

        if ($phonebook->delete()) {

            return redirect(route('phonebook.index'));
        }
        return redirect(back());
    }


    public function exportPDF() {

        $contacts = Phonebook::orderBy('name', 'desc')->where('user_id', Auth::user()->id)->get();
        /* $pdf = PDF::loadView('phonebook.pdf',compact('contacts'));

        return $pdf->download('invoice.pdf'); */

    }

}
