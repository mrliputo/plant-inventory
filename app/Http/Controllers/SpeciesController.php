<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Species;
use App\Classes\Common;

class SpeciesController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Species Controller
    |--------------------------------------------------------------------------
    |
    | This controller manages all the data related to species, such us creation
    | editing, etc.
    */

    private $request_data = [
        'nama_lokal' => 'required',
        'spesies' => 'required',
        'genus' => 'required',
        'famili' => 'required',
        'ordo' => 'required',
        'kelas' => 'required',
        'divisi' => 'required',
        'kingdom' => 'required',
        'botani' => 'required',
        'syarat_tumbuh' => 'required',
        'manfaat' => 'required',
        'image' => 'image|nullable|max:1999'
    ];


    /* Resource methods */

    public function index()
    {
        return abort(404);
    }

    public function create()
    {
        return view('species.create');
    }

    public function show($id)
    {
        // if($species = Species::find($id)) {
        //     return view('species.show')->with('species', $species);    
        // }else return abort(404);
        return abort(404);
    }

    public function edit($id)
    {
        if($species = Species::find($id)) return view('species.edit')->with('species', $species);
        else return abort(404);
    }

    public function store(Request $request)
    {
        if($this->validateId($request->input('spesies'))) {

            $this->validate($request, $this->request_data);

            if($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $ext;
                $path = $request->file('image')->move(public_path('images/species'), $filenameToStore);
                Common::generateCarouselImage($filenameToStore);
            }else{
                $filenameToStore = 'noimage.jpg';
            }

            // Serialize botani, syarat, manfaat so that they can be stored to the database
            $s_botani = serialize(explode("\n", str_replace("\r", "", $request->input('botani'))));
            $s_syarat_tumbuh = serialize(explode("\n", str_replace("\r", "", $request->input('syarat_tumbuh'))));
            $s_manfaat = serialize(explode("\n", str_replace("\r", "", $request->input('manfaat'))));

            $species = new Species;
            $species->nama_lokal = $request->input('nama_lokal');
            $species->spesies = $request->input('spesies');
            $species->genus = $request->input('genus');
            $species->famili = $request->input('famili');
            $species->ordo = $request->input('ordo');
            $species->kelas = $request->input('kelas');
            $species->divisi = $request->input('divisi');
            $species->kingdom = $request->input('kingdom');
            $species->botani = $s_botani;
            $species->syarat_tumbuh = $s_syarat_tumbuh;
            $species->manfaat = $s_manfaat;
            $species->image = $filenameToStore;
            $species->save();

            return redirect(route('search', ['cat' => 'spesies', 'q' => $request->input('spesies'), 'afterSubmit' => '1']))
            ->with('success', 'Spesies berhasil ditambahkan.')
            ->with('afterSubmit', true);
        }else{
            return redirect(route('species.create'))->with('error', 'Spesies dengan nama \'' . $request->input('spesies') . '\' telah terdaftar.');
        }

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, $this->request_data);

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('image')->move(public_path('images/species'), $filenameToStore);
            Common::generateCarouselImage($filenameToStore);
        }else{
            $filenameToStore = 'noimage.jpg';
        }

            // Serialize botani, syarat, manfaat so that they can be stored to the database
        $s_botani = serialize(explode("\n", str_replace("\r", "", $request->input('botani'))));
        $s_syarat_tumbuh = serialize(explode("\n", str_replace("\r", "", $request->input('syarat_tumbuh'))));
        $s_manfaat = serialize(explode("\n", str_replace("\r", "", $request->input('manfaat'))));


        $species = Species::find($id);
        $species->nama_lokal = $request->input('nama_lokal');
        $species->spesies = $request->input('spesies');
        $species->genus = $request->input('genus');
        $species->famili = $request->input('famili');
        $species->ordo = $request->input('ordo');
        $species->kelas = $request->input('kelas');
        $species->divisi = $request->input('divisi');
        $species->kingdom = $request->input('kingdom');
        $species->botani = $s_botani;
        $species->syarat_tumbuh = $s_syarat_tumbuh;
        $species->manfaat = $s_manfaat;
        if($request->hasFile('image')) {
            if($species->image != 'noimage.jpg') {
                File::delete(public_path('images/species/'. $species->image));
                File::delete(public_path('images/species/thumbs/'. $species->image));
            }
            $species->image = $filenameToStore;
        }
        $species->save();

        return redirect(route('search', ['cat' => 'spesies', 'q' => $request->input('spesies'), 'afterSubmit' => '1']))
                ->with('success', 'Spesies berhasil diubah.')
                ->with('afterSubmit', true);
        
    }

    public function destroy($id)
    {
        $numberOfTrees = $this->numberOfTrees($id);
        
        if($numberOfTrees == 0) {
            $species = Species::find($id);

            if($species->image != 'noimage.jpg') {
                File::delete(public_path('images/species/'. $species->image));
                File::delete(public_path('images/species/thumbs/'. $species->image));
            }

            $species->delete();

            return redirect(route('species.create'))->with('success', 'Spesies berhasil dihapus.');
        } else {
            return redirect(route('species.edit', $id))->with('error', 'Tidak dapat menghapus spesies karena terdapat ' . $numberOfTrees .' tanaman yang menggunakan spesies ini.');
        }
    }

    /* ./End of resource methods */
    

    private function validateId($spesies) {
        if(count(Species::where('spesies', '=', $spesies)->get()) > 0) return false;
        else return true;
    }

    private function numberOfTrees($species_id) {
        $foo = Species::find($species_id)->trees;
        return count($foo);
    }

}
