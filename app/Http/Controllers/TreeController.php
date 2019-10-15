<?php

namespace App\Http\Controllers;

use App\Tree;
use App\Species;
use Illuminate\Http\Request;
use App\Classes\Common;

class TreeController extends Controller
{

    private $request_data = [
        'id' => 'required',
        'species_id' => 'required'
    ];

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $tree = Tree::orderBy('created_at', 'desc')->paginate(30);
        return view('tree.index')->with('tree', $tree);
    }

    public function create()
    {
        return view('tree.create');
    }

    public function store(Request $request)
    {
        if($this->validateId($request->input('id'))) {

            $this->validate($request, $this->request_data);

            $tree = new Tree;
            $tree->id = $request->input('id');
            $tree->species_id = $request->input('species_id');
            $tree->tgl_tanam = $request->input('tgl_tanam');
            $tree->latitude = $request->input('lat');
            $tree->longitude = $request->input('lng');
            $tree->save();

            return redirect(route('tree.index'))->with('success', 'Tanaman berhasil ditambahkan.');
        }else{
            return redirect(route('tree.create'))->with('error', 'Tanaman dengan no. registrasi \'' . $request->input('id') . '\' telah terdaftar.');
        }
    }

    public function show(Tree $tree)
    {
        if($tree) {
            
            $locations = [];
            $trees = Tree::where('species_id', '=', $tree->species_id)->get();

            for($i = 0; $i < count($trees); $i++) {
                $locations[$i]['id'] = $trees[$i]->id;
                $locations[$i]['spesies'] = $tree->species->spesies;
                $locations[$i]['nama_lokal'] = $tree->species->nama_lokal;
                $locations[$i]['latitude'] = $trees[$i]->latitude;
                $locations[$i]['longitude'] = $trees[$i]->longitude;
            }

            if($tree->tgl_tanam != "") $age = Common::findPlantAge($tree->tgl_tanam); 
            else $age = '-';

            return view('tree.show')->with('tree', $tree)
                                    ->with('age', $age)
                                    ->with('locations', $locations);  

        }else return abort(404);
    }

    public function edit(Tree $tree)
    {
        return view('tree.edit')->with('tree', $tree);
    }

    public function update(Request $request, Tree $tree)
    {
        $this->validate($request, $this->request_data);
        
        $tree->species_id = $request->input('species_id');
        $tree->tgl_tanam = $request->input('tgl_tanam');
        $tree->latitude = $request->input('lat');
        $tree->longitude = $request->input('lng');
        $tree->save();

        return redirect(route('tree.index'))->with('success', 'Tanaman berhasil diubah.');
    }

    public function destroy(Tree $tree)
    {
        $tree->delete();
        return redirect(route('tree.index'))->with('success', 'Tanaman berhasil dihapus.');
    }

    /**
     * This method generates the QRcode containing all the detailed information 
     * of the specific species.
     **/
    public function generateQrcode(Tree $tree) {
        if($tree) {
            $speciesObj = (object) array(
                'item' => (object) array(
                    'id' => $tree->id,
                    'ln' => $tree->species->nama_lokal, // Local name
                    'sn' => $tree->species->spesies, // Scientific name
                    'fm' => $tree->species->famili, // Family
                    'pd' => $tree->tgl_tanam // Planted date
                )
            );
            return view('tree.qrcode')->with('species', $speciesObj);
        } else return abort(404);
    }


    public function downloadNameTag(Tree $tree) {
        if($tree) {
            $speciesObj = (object) array(
                'item' => (object) array(
                    'id' => $tree->id,
                    'ln' => $tree->species->nama_lokal, // Local name
                    'sn' => $tree->species->spesies, // Scientific name
                    'fm' => $tree->species->famili, // Family
                    'pd' => $tree->tgl_tanam // Planted date
                )
            );
            return view('tree.qrcode-dl')->with('species', $speciesObj);
        } else return abort(404);
    }

    /* ./End of qrcode methods */


    private function validateId($id) {
        if(Tree::find($id)) return false;
        else return true;
    }
}
