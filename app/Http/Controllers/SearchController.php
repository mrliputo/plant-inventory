<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;
use App\Tree;
use App\Messages;

class SearchController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Search Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the search feature by matching the keyword entered
    | by a user with the data in the database.
    */


    /* -------- Search with keyword ----------- */

    public function search(Request $request) {
    	$keyword = $request->input('q');
        $n = 15; //Number of row per page
        $category = $request->input('cat');

        if($category == 'all') {
            $results = Species::where('nama_lokal', 'like', '%' . $keyword . '%')
                                ->orWhere('spesies', 'like', '%' . $keyword . '%')
                                ->orWhere('genus', 'like', '%' . $keyword . '%')
                                ->orWhere('famili', 'like', '%' . $keyword . '%')->paginate($n);
        }else{
            $results = Species::where($category, 'like', '%' . $keyword . '%')->paginate($n);
        }

        return view('search.index')->with('results', $results);
    }

    /* ./End of search with keyword */

    

    /* -------- Search by group in alphabetical order ----------- */

    // All
    public function allList($letter) {
        $results = Species::where('spesies', 'like', $letter . '%')
                            ->orderBy('spesies', 'asc')->get();

        return view('search.group.all')->with('letter', $letter)
                                       ->with('results', $results);
    }

    // Local name
    public function commonList($letter) {
        $results = Species::where('nama_lokal', 'like', $letter . '%')
        ->orderBy('nama_lokal', 'asc')->get();

        return view('search.group.common')->with('letter', $letter)
                                          ->with('results', $results);    
    }

    // Scientific name
    public function botanicalList($letter) {
        $results = Species::where('spesies', 'like', $letter . '%')
        ->orderBy('spesies', 'asc')->get();

        return view('search.group.botanical')->with('letter', $letter)
                                             ->with('results', $results); 
    }

    // Family name
    public function familyList() {
        $results = Species::distinct()->orderBy('famili', 'asc')->get(['famili']);
        return view('search.group.family')->with('results', $results); 
    }

    // Family member
    public function familyResult($family_name) {
        $results = Species::where('famili', $family_name)
                            ->orderBy('spesies', 'asc')->paginate(15);

        return view('search.group.family_member')->with('family_name', $family_name)
                                                 ->with('results', $results); 
    }

    /* ./End of search in alphabetical order */


    /* -------- Search on admin pages ----------- */

    public function speciesSearch(Request $request) {
        $keyword = $request->input('s');
        $tree = Tree::where('id', '=', $keyword)->paginate(30);
        return view('tree.index')->with('tree', $tree);
    }

    public function messageSearch(Request $request) {
        $keyword = $request->input('s');
        $messages = Messages::where('name', 'like', '%' . $keyword . '%')
                            ->orWhere('content', 'like', '%' . $keyword . '%')
                            ->paginate(30);
        return view('messages.index')->with('messages', $messages);
    }

    /* ./End of search on admin pages */


    // Search based on the first letter of the species (for mobile users)
    public function sort(Request $request) {
        $letter = $request->input('letter');
        return redirect('/species/' . $letter . '/all');
    }


    /* -- Show plant location on a map -- */

    public function searchLocation() {
        $data = [];
        $results = Tree::all();

        for($i=0; $i < count($results); $i++) {
            $data[$i]['id'] = $results->find($results[$i]->id)->id;
            $data[$i]['spesies'] = $results->find($results[$i]->id)->species->spesies;
            $data[$i]['nama_lokal'] = $results->find($results[$i]->id)->species->nama_lokal;
            $data[$i]['latitude'] = $results->find($results[$i]->id)->latitude;
            $data[$i]['longitude'] = $results->find($results[$i]->id)->longitude;
        }

        return view('search.location')->with('results', $data)->with('itemOnMap', 'all');
    }

    private function retrieveData($keyword, $n) {
        return Species::where('spesies', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_lokal', 'like', '%' . $keyword . '%')
                        ->select('id', 'spesies', 'nama_lokal')
                        ->groupBy('id', 'spesies', 'nama_lokal')
                        ->paginate($n);
    }

    public function returnAjaxData(Request $request) {
        $results = $this->retrieveData($request->input('q'), 9);
        return response()->json($results);
    }

    public function returnNonAjaxData(Request $request) {
        $results = $this->retrieveData($request->input('q'), 9);
        return view('search.location')->with('results', $results)
                                      ->with('withSubmit', true)
                                      ->with('itemOnMap', 'none'); 
    }

    public function getItemLocation($name) {
        $data = [];

        $species_id = Species::where('spesies', '=', $name)->get()->first()->id;
        $tree = Tree::where('species_id', '=', $species_id)->get();

        for($i=0; $i < count($tree); $i++) {
            $data[$i]['id'] = $tree->find($tree[$i]->id)->id;
            $data[$i]['spesies'] = $tree->find($tree[$i]->id)->species->spesies;
            $data[$i]['nama_lokal'] = $tree->find($tree[$i]->id)->species->nama_lokal;
            $data[$i]['latitude'] = $tree->find($tree[$i]->id)->latitude;
            $data[$i]['longitude'] = $tree->find($tree[$i]->id)->longitude;
        }

        return view('search.location')->with('results', $data)
                                      ->with('itemOnMap', 'selected');
    }

    /* ./End of location */

}
