<?php

namespace App\Http\Controllers;

use App\Imports\PokImport;
use App\Models\Pok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PokController extends Controller
{
    public function index()
    {

        $jlh['program'] = 0;
        $jlh['kegiatan'] = 0;
        $jlh['output'] = 0;
        $jlh['suboutput'] = 0;
        $jlh['komponen'] = 0;
        $jlh['subkomponen'] = 0;
        $jlh['akun'] = 0;
        $poks = Pok::all();
        $div['program'] = 0;
        $pokk = [];
        $jlh_pokk = [];

        $j = $k = $l = 0;
        for ($i = 0; $i < 593; $i++) {
            if ($i == 0) {
                // baris pertama
                $jlh_pokk['program'][$j] = $poks[$i]->jumlah;
                $pokk['program'][] = $poks[$i]->kode_program . " : " . $poks[$i]->program;
                $jlh_pokk['kegiatan'][$k] = $poks[$i]->jumlah;
                $pokk['kegiatan'][] = $poks[$i]->kode_kegiatan . " : " . $poks[$i]->kegiatan;
                $jlh_pokk['output'][$k] = $poks[$i]->jumlah;
                $pokk['output'][] = $poks[$i]->kode_output . " : " . $poks[$i]->output;
                // $kegiatan['jumlah'][$j] = $poks[$i]->jumlah;
                // $kegiatan['kode'][] = $poks[$i]->kode_kegiatan . " : " . $poks[$i]->kegiatan;
            } else {
                // program tok 
                if ($poks[$i]->kode_program == $poks[$i - 1]->kode_program) {
                    $jlh_pokk['program'][$j] += $poks[$i]->jumlah;
                } else {
                    $j++;
                    $jlh_pokk['program'][$j] = $poks[$i]->jumlah;
                    $pokk['program'][] = $poks[$i]->kode_program . " : " . $poks[$i]->program;
                }

                // kegiatan, output
                if ($poks[$i]->kode_kegiatan == $poks[$i - 1]->kode_kegiatan) {
                    $jlh_pokk['kegiatan'][$k] += $poks[$i]->jumlah;
                    if ($poks[$i]->kode_output == $poks[$i - 1]->kode_output) {
                        $jlh_pokk['output'][$l] += $poks[$i]->jumlah;
                    } else {
                        $l++;
                        $pokk['output'][] = $poks[$i]->kode_output . " : " . $poks[$i]->output;
                        $jlh_pokk['output'][$l] = $poks[$i]->jumlah;
                    }
                } else {
                    $k++;
                    $jlh_pokk['kegiatan'][$k] = $poks[$i]->jumlah;
                    $pokk['kegiatan'][] = $poks[$i]->kode_kegiatan . " : " . $poks[$i]->kegiatan;
                    $l++;
                    $pokk['output'][] = $poks[$i]->kode_output . " : " . $poks[$i]->output;
                    $jlh_pokk['output'][$l] = $poks[$i]->jumlah;

                    // if ($poks[$i]->kode_output == $poks[$i - 1]->kode_output) {
                    // $jlh_pokk['output'][$l] += $poks[$i]->jumlah;
                    // $jlh_pokk['output'][$l] += $poks[$i]->jumlah;
                    // } else {
                    //     $l++;
                    // }
                }


                // if ($poks[$i]->kode_kegiatan == $poks[$i - 1]->kode_kegiatan && $poks[$i]->kode_output == $poks[$i - 1]->kode_output) {
                //     $jlh_pokk['output'][$l] += $poks[$i]->jumlah;
                // } else {
                //     $l++;
                //     $jlh_pokk['output'][$l] = $poks[$i]->jumlah;
                //     $pokk['output'][] = $poks[$i]->kode_output . " : " . $poks[$i]->output;
                // }
            }
        }
        // dd($pokk);
        dd($jlh_pokk);
        // $pok['program'] = Pok::distinct()->get(['kode_program', 'program']);
        // $pok['kegiatan'] = Pok::distinct()->get(['kode_kegiatan', 'kegiatan']);
        // $pok['output'] = Pok::distinct()->get(['kode_output', 'output']);
        // $pok['suboutput'] = Pok::distinct()->get(['kode_suboutput', 'suboutput']);
        // $pok['komponen'] = Pok::distinct()->get(['kode_komponen', 'komponen']);
        // $pok['subkomponen'] = Pok::distinct()->get(['kode_subkomponen', 'subkomponen']);
        // $pok['akun'] = Pok::distinct()->get(['kode_akun', 'akun']);
        // dd($pok['program']);

        return view('pok.index', compact('poks', 'jlh'));
    }

    public function impor()
    {
        return view('pok.impor');
    }

    public function proses_impor(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // dd($request->file('file'));
        $res = Excel::import(new PokImport, $request->file('file'));
        dd($res);
        session()->pull('kode_pro');
        session()->pull('pro');
        session()->pull('kode_keg');
        session()->pull('keg');
        session()->pull('kode_out');
        session()->pull('out');
        session()->pull('kode_subout');
        session()->pull('subout');
        session()->pull('kode_komp');
        session()->pull('komp');
        session()->pull('kode_subkomp');
        session()->pull('subkomp');
        session()->pull('kode_akun');
        session()->pull('akun');
        // dd(session()->all());
        return redirect()->back()->with('success', 'Data pok berhasil di import');
    }
}
