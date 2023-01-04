<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$members = Member::all();
      return view('admin.members.index')->with("members", $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('admin.members.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$member = new Member();
			$member->nama = $request->nama;
			$member->status_anggota = $request->status_anggota;
			$member->alamat = $request->alamat;
			$member->nomor_hp = $request->nomor_hp;
			$member->save();
		
			return redirect('/home/members')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$member = Member::find($id);
			return view("admin.members.show")->with("member", $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$member = Member::find($id);
			return view("admin.members.edit")->with("member", $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$member = Member::find($id);
			$member->nama = $request->nama;
			$member->status_anggota = $request->status_anggota;
			$member->alamat = $request->alamat;
			$member->nomor_hp = $request->nomor_hp;
			$member->save();
		
			return redirect('/home/members')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$member = Member::find($id);
  		$member->delete();

      return redirect('home/members')->with('success', 'data berhasil dihapus');
    }

		public function print_members()
		{
			$members = Member::all();
    	$dateNow = Carbon::now()->format('d M Y');
 
    	$pdf = PDF::loadView('admin.members.members_pdf',[
				'members' => $members,
				'dateNow' => $dateNow
			]);
    	return $pdf->stream('laporan-daftar-anggota.pdf');
		}
}
