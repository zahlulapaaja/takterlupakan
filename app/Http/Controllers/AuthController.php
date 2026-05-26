<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required|email',
            'password'    => 'required',
        ]);

        // Check if email exists in the database
        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email does not exist.'])->withInput();
        }

        // gatau ini untuk apa
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('landing');
        // }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt login
        if (Auth::attempt($data)) {
            $user = Auth::user();
            Session::put('user_id', $user->id);
            Session::put('name', $user->name);
            Session::put('role', User::find($user->id)->roles);
            Session::put('email', User::find($user->id)->email);
            Session::put('avatar', asset('uploads/pegawai/' . User::find($user->id)->image));
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['password' => 'Invalid password.'])->withInput();
        }
    }

    public function login_sso(Request $request)
    {
        session_start();

        // Tentukan konfigurasi Keycloak
        $provider = new \JKD\SSO\Client\Provider\Keycloak([
            'authServerUrl'         => config('app.authServerUrl', 'https://sso.bps.go.id'),
            'realm'                 => config('app.realm', 'pegawai-bps'),
            'clientId'              => config('app.clientId', '11107-sirasaka-h7f'),
            'clientSecret'          => config('app.clientSecret', '770826a7-8353-4649-8779-6aa4fb1088d2'),
            'redirectUri'           => config('app.redirectUri', 'http://localhost:8000/login-sso'),
        ]);

        if (!isset($_GET['code'])) {
            // Untuk mendapatkan authorization code
            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            header('Location: ' . $authUrl);
            exit;

            // Mengecek state yang disimpan saat ini untuk memitigasi serangan CSRF
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
            exit('Invalid state');
        } else {
            try {
                $token = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);
            } catch (Exception $e) {
                exit('Gagal mendapatkan akses token : ' . $e->getMessage());
            }

            // Opsional: Setelah mendapatkan token, anda dapat melihat data profil pengguna
            try {

                $user = $provider->getResourceOwner($token);

                // echo "Nama : " . $user->getName();
                // echo "E-Mail : " . $user->getEmail();
                // echo "Username : " . $user->getUsername();
                // echo "NIP : " . $user->getNip();
                // echo "NIP Baru : " . $user->getNipBaru();
                // echo "Kode Organisasi : " . $user->getKodeOrganisasi();
                // echo "Kode Provinsi : " . $user->getKodeProvinsi();
                // echo "Kode Kabupaten : " . $user->getKodeKabupaten();
                // echo "Alamat Kantor : " . $user->getAlamatKantor();
                // echo "Provinsi : " . $user->getProvinsi();
                // echo "Kabupaten : " . $user->getKabupaten();
                // echo "Golongan : " . $user->getGolongan();
                // echo "Jabatan : " . $user->getJabatan();
                // echo "Foto : " . $user->getUrlFoto();
                // echo "Eselon : " . $user->getEselon();

                session()->put('username', $user->getUsername());
                session()->put('nama_pegawai', $user->getName());
                session()->put('nip_pegawai', $user->getNipbaru());
                session()->put('url_foto', $user->getUrlFoto());
                session()->put('url_logout', $provider->getLogoutUrl());

                // UserActivity::create([
                //     'user_id'    => $user->getNipBaru(),
                //     'activity'   => "Login",
                //     'ip_address' => request()->header('User-Agent'),
                //     'user_agent' => $user->getName(),
                // ]);

                $user2 = User::where('email', $user->getEmail())->first();
                if ($user2) {
                    Auth::login($user2);
                    Session::put('user_id', $user2->id);
                    Session::put('name', $user2->name);
                    Session::put('role', User::find($user2->id)->roles);
                    Session::put('email', User::find($user2->id)->email);
                    Session::put('avatar', $user->getUrlFoto());
                    return redirect()->route('home');
                } else {
                    // User tidak ditemukan, buat user baru dari data SSO
                    // $userGuest = new User();
                    // $userGuest->name = $user->getName();
                    // $userGuest->role = 'pegawai';
                    // $userGuest->username = $user->getUsername();
                    // $userGuest->kode_satker = substr($user->getKodeOrganisasi(), 0, 4);
                    // $userGuest->nip_pegawai = $user->getNipBaru();
                    // $userGuest->email = $user->getEmail();
                    // $userGuest->password =  Hash::make($request->get('password')); // <- hashing,
                    // session()->put('role', $userGuest->role);

                    // PENTING: Simpan ke database
                    // $userGuest->save();
                    // Auth::login($userGuest); // Login user yang baru dibuat

                    return response('Anda tidak memiliki akses.', 403);
                }

                $url_logout = $provider->getLogoutUrl();

                if (!empty($data)) {
                    $newdata = array(
                        'username'  => $data['username'],
                        'nama_pegawai' => $data['nama_pegawai'],
                        'nip_lama' => $data['nip_lama'],
                        'nip_pegawai' => $data['nip_pegawai'],
                        'kode_satker' => $data['kode_satker'],
                        'logged_in' => TRUE,
                        'foto' => $user->getUrlFoto(),
                        'logout' => $url_logout,

                    );

                    $params = array('url_foto' => $user->getUrlFoto(),);
                    $this->session->set_userdata($newdata);
                    // 	$this->master_model->update('master_pegawai', 'username', $data['username'], $params);

                    return redirect()->intended('/dashboard-kegiatan');
                } else {

                    echo "gagal";
                    exit;
                    // 	redirect('login');
                }
            } catch (Exception $e) {
                exit('Gagal Mendapatkan Data Pengguna: ' . $e->getMessage());
            }

            // Gunakan token ini untuk berinteraksi dengan API di sisi pengguna
            echo $token->getToken();
        }
    }

    public function logout()
    {
        if (session()->has('name')) {
            session()->pull('user_id');
            session()->pull('name');
            session()->pull('role');
            session()->pull('email');
            session()->pull('avatar');
        }

        Auth::logout();
        $cookieDomain = 'sso.bps.go.id'; // Sesuaikan dengan domain cookie yang akan dihapus
        $cookiePath = '/auth/realms/pegawai-bps/'; // Sesuaikan dengan path cookie yang akan dihapus

        // Hapus cookie yang diperlukan
        Cookie::queue(Cookie::forget('AUTH_SESSION_ID', $cookieDomain, $cookiePath));
        Cookie::queue(Cookie::forget('KEYCLOAK_IDENTITY', $cookieDomain, $cookiePath));
        Cookie::queue(Cookie::forget('KEYCLOAK_SESSION', $cookieDomain, $cookiePath));

        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}
