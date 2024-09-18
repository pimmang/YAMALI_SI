<?php

namespace App\Http\Controllers;

use App\Models\IKRumahTangga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IrtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = 'rumah-tangga';
        return view('IKRT.ik-rumah-tangga',compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $index)
    {
        $irt = new IKRumahTangga();
      
        $irt->kegiatan_ik = $request->kegiatanIk ;
        $irt->index_id = $index;
        $irt->fasyankes_id = $request->fasyankes ;
        $irt->kader_id = $request->kader ;
        $irt->save();
        session()->flash('ik-rumah-tangga', 'Data IK Rumah Tangga berhasil ditambahkan');
        return redirect('/rumah-tangga');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $irt = IKRumahTangga::find($id);
       
            $irt->kegiatan_ik = $request->kegiatanIk ;
        $irt->fasyankes_id = $request->fasyankes ;
        $irt->kader_id = $request->kader ;
        $irt->update();
        session()->flash('ik-rumah-tangga', 'Data IK Rumah Tangga berhasil diperbarui');
        return redirect('/rumah-tangga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
