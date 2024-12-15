<?php

namespace App\Http\Controllers\Pok;

use App\Http\Controllers\Controller;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function index()

    {
        // $data['countries'] = Country::get(["name", "id"]);
        // return view('dropdown', $data);
    }

    public function fetchRevisi(Request $request)
    {
        $data['revisi'] = DB::table('poks')->distinct()
            ->where("tahun", $request->tahun)
            ->get('revisi');

        return response()->json($data);
    }

    public function getPok(Request $request)
    {

        // mengambil data pok terbaru
        $tahun = $request->tahun;
        $revisi = $request->revisi;
        $poks = Pok::where('tahun', $tahun)
            ->where('revisi', $revisi)
            ->get();
        // dd($request->all());
        // dd($poks);

        // inisiasi data untuk tampilan pok
        $pokk = $jlh_pokk = $sama = [];
        $j = $k = $l = $m = $n = $o = $p = 0;
        $list_akun_input = ['524113', '521213', '524111'];

        for ($i = 0; $i < count($poks); $i++) {

            if ($i == 0) {
                // baris pertama
                $jlh_pokk['program'][] = $poks[$i]->jumlah;
                $pokk['program'][] = $poks[$i]->kode_program . " : " . $poks[$i]->program;
                $jlh_pokk['kegiatan'][] = $poks[$i]->jumlah;
                $pokk['kegiatan'][] = $poks[$i]->kode_kegiatan . " : " . $poks[$i]->kegiatan;
                $jlh_pokk['output'][] = $poks[$i]->jumlah;
                $pokk['output'][] = $poks[$i]->kode_kegiatan . '.' . $poks[$i]->kode_output . " : " . $poks[$i]->output;
                $jlh_pokk['suboutput'][] = $poks[$i]->jumlah;
                $pokk['suboutput'][] = $poks[$i]->kode_kegiatan . '.' . $poks[$i]->kode_output . '.' . $poks[$i]->kode_suboutput . " : " . $poks[$i]->suboutput;
                $jlh_pokk['komponen'][] = $poks[$i]->jumlah;
                $pokk['komponen'][] = $poks[$i]->kode_komponen . " : " . $poks[$i]->komponen;
                $jlh_pokk['subkomponen'][] = $poks[$i]->jumlah;
                $pokk['subkomponen'][] = $poks[$i]->kode_subkomponen . " : " . $poks[$i]->subkomponen;
                $jlh_pokk['akun'][] = $poks[$i]->jumlah;
                $pokk['akun'][] = $poks[$i]->kode_akun . " : " . $poks[$i]->akun;
            } else {
                $sama['program'] = $poks[$i]->kode_program == $poks[$i - 1]->kode_program;
                $sama['kegiatan'] = $poks[$i]->kode_kegiatan == $poks[$i - 1]->kode_kegiatan;
                $sama['output'] = $poks[$i]->kode_output == $poks[$i - 1]->kode_output;
                $sama['suboutput'] = $poks[$i]->kode_suboutput == $poks[$i - 1]->kode_suboutput;
                $sama['komponen'] = $poks[$i]->kode_komponen == $poks[$i - 1]->kode_komponen;
                $sama['subkomponen'] = $poks[$i]->kode_subkoponen == $poks[$i - 1]->kode_subkoponen;
                $sama['akun'] = $poks[$i]->kode_akun == $poks[$i - 1]->kode_akun;

                // program 
                if ($sama['program']) {
                    $jlh_pokk['program'][$j] += $poks[$i]->jumlah;
                } else {
                    $j++;
                    $jlh_pokk['program'][$j] = $poks[$i]->jumlah;
                    $pokk['program'][] = $poks[$i]->kode_program . " : " . $poks[$i]->program;
                }

                // kegiatan 
                if ($sama['program'] && $sama['kegiatan']) {
                    $jlh_pokk['kegiatan'][$k] += $poks[$i]->jumlah;
                } else {
                    $k++;
                    $jlh_pokk['kegiatan'][$k] = $poks[$i]->jumlah;
                    $pokk['kegiatan'][] = $poks[$i]->kode_kegiatan . " : " . $poks[$i]->kegiatan;
                }

                // output 
                if ($sama['program'] && $sama['kegiatan'] && $sama['output']) {
                    $jlh_pokk['output'][$l] += $poks[$i]->jumlah;
                } else {
                    $l++;
                    $jlh_pokk['output'][$l] = $poks[$i]->jumlah;
                    $pokk['output'][] = $poks[$i]->kode_kegiatan . '.' . $poks[$i]->kode_output . " : " . $poks[$i]->output;
                }

                // suboutput 
                if ($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput']) {
                    $jlh_pokk['suboutput'][$m] += $poks[$i]->jumlah;
                } else {
                    $m++;
                    $jlh_pokk['suboutput'][$m] = $poks[$i]->jumlah;
                    $pokk['suboutput'][] = $poks[$i]->kode_kegiatan . '.' . $poks[$i]->kode_output . '.' . $poks[$i]->kode_suboutput . " : " . $poks[$i]->suboutput;
                }

                // komponen 
                if ($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen']) {
                    $jlh_pokk['komponen'][$n] += $poks[$i]->jumlah;
                } else {
                    $n++;
                    $jlh_pokk['komponen'][$n] = $poks[$i]->jumlah;
                    $pokk['komponen'][] = $poks[$i]->kode_komponen . " : " . $poks[$i]->komponen;
                }

                // subkomponen 
                if ($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen'] && $sama['subkomponen']) {
                    $jlh_pokk['subkomponen'][$o] += $poks[$i]->jumlah;
                } else {
                    $o++;
                    $jlh_pokk['subkomponen'][$o] = $poks[$i]->jumlah;
                    $pokk['subkomponen'][] = $poks[$i]->kode_subkomponen . " : " . $poks[$i]->subkomponen;
                }

                // akun 
                if ($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen'] && $sama['subkomponen'] && $sama['akun']) {
                    $jlh_pokk['akun'][$p] += $poks[$i]->jumlah;
                } else {
                    $p++;
                    $jlh_pokk['akun'][$p] = $poks[$i]->jumlah;
                    $pokk['akun'][] = $poks[$i]->kode_akun . " : " . $poks[$i]->akun;
                }
            }
        }

        // dd($pokk);
        // dd($jlh_pokk);
        // dd($sama);

        $view = view('pok._table-body-pok', compact('poks', 'pokk', 'jlh_pokk', 'sama', 'list_akun_input'))->render();
        // dd($view);
        return response()->json(['view' => $view], 200);
        // return view('pok._table-body-pok', compact('poks', 'pokk', 'jlh_pokk', 'sama', 'list_akun_input'));
    }
}
