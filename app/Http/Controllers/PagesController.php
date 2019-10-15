<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;
use App\Tree;

class PagesController extends Controller
{

	public function index() {
		$trees = Tree::orderBy('created_at', 'desc')->groupBy('species_id')->take(3)->get();
		return view('pages.index')->with('trees', $trees);
	}

	public function message() {
		return view('pages.message');
	}


    // Article controllers
	public function showQrcodePage() {
		$species = Species::orderBy('created_at', 'desc')->take(1)->get();
		$speciesObj = (object) array(
			'item' => (object) array(
				'id' => $species[0]->id,
				'nama_lokal' => $species[0]->nama_lokal,
				'spesies' => $species[0]->spesies,
				'famili' => $species[0]->famili,
				'tt' => $species[0]->tgl_tanam
			)
		);
		return view('read.qrcode')->with('species', $speciesObj);
	}

}