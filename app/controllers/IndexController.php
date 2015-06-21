<?php

/*
*
*/

class IndexController extends BaseController{

    public function index(){
        $dropdown = DB::table('jenis_pastry')->lists('nama','Id');
        $soal = DB::table('pertanyaan')->lists('soal','id');
        $data = array('soal' => $soal, 'dropdown' => $dropdown);
        //var_dump($data);
        //exit();
        return View::make('questionaire')->with($data);
    }

    function getProduk($jenis_pastry){
        $dropdownproduk = DB::table('produk')->where('kode_pastry', '=', $jenis_pastry)->lists('nama', 'id_produk');
        //var_dump($dropdownproduk);
        return Response::json($dropdownproduk);
    }

    //go to page login
    public function login(){
        return View::make('login');
    }

    //otentifikasi
    
    public function authenticate(){
        $user = array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
        );
        var_dump(Auth::attempt($user));
        exit();
        if (Auth::attempt($user)){
            return Redirect::to('admin');   
        }
        return Redirect::to('login')->with('login_error', 'Could not log in');
    }

    //logout
    public function logout() {
        Auth::logout();
        return Redirect::to('login');
    }

    public function admin(){
        return View::make('admin');   
    }

    public function register(){
        return View::make('register');
    }

    public function registerresult(){
        $rules = array(
            'username' => 'required|min:5',
            'password' => 'required|min:5',
            'nama' => 'required|min:3',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('register')->withErrors($validator)->withInput();
        } else {
            DB::table('user')->insert(
                array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password')),
                    'nama' => Input::get('nama'),
                    'alamat' => Input::get('alamat'),
                    'no_telp' => Input::get('no_telp'),
                )
            );
            Session::flash('message', 'Data Berhasil Ditambahkan');
            return Redirect::to('login');
        }
    }

    public function postjawaban(){
        $date = new \DateTime;
        $idProduk = Input::get('produk');
        foreach(Input::get('jawaban') as $idSoal => $jawaban){
            $insert = array('id_produk' => $idProduk,
                            'id_pertanyaan' => $idSoal,
                            'jawaban' => $jawaban,
                            'timestamp' => $date);
            DB::table('jawaban')->insert($insert);
        }
        Session::flash('message', 'Data Berhasil Ditambahkan');
        return Redirect::to('login');
    }
    
    public function groupJawaban(){
        $group = DB::select(DB::raw('SELECT x.id_produk, x.id_pertanyaan, avg(x.jawaban) - y.gap AS GAP from jawaban x, pertanyaan y GROUP BY x.id_produk, x.id_pertanyaan'));

        //check the result
            //var_dump($group);
        
        //check the query correct or not in eloquent
            //$queries = DB::getQueryLog();
            //var_dump(end($queries));
        
        return View::make('hasil');
    }

}
