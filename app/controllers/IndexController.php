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
        // Getting all post data
        $data = Input::all();
        // Applying validation rules.
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:6',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            // If validation falis redirect back to login.
            return Redirect::to('login')->withInput(Input::except('password'))->withErrors($validator);
        }
        else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );
            // doing login.
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    Session::flash('pesan_error', 'Login Sukses'); 
                    return Redirect::intended('admin');
                }
            } 
            else {
                // if any error send back with message.
                Session::flash('pesan_error', 'Username atau Password salah'); 
                return Redirect::to('login');
            }
        }
    }


    //logout
    public function logout() {
        Auth::logout(); // logout user
        Session::flash('pesan_error', 'Logout Sukses'); 
        return Redirect::to('login'); //redirect back to login
    }

    public function admin(){
        $dropdown = DB::table('jenis_pastry')->lists('nama','Id');
        $soal = DB::table('pertanyaan')->lists('soal','id');
        $data = array('soal' => $soal, 'dropdown' => $dropdown);
        return View::make('questionaireadmin')->with($data);   
    }
    
    function getProdukAdmin($jenis_pastry){
        $dropdownproduk = DB::table('produk')->where('kode_pastry', '=', $jenis_pastry)->lists('nama', 'id_produk');
        //var_dump($dropdownproduk);
        return Response::json($dropdownproduk);
    }
    
    public function postjawabanadmin(){
        $date = new \DateTime;
        $idProduk = Input::get('produk');
        foreach(Input::get('jawaban') as $idSoal => $jawaban){
            $insert = array('id_produk' => $idProduk,
                            'id_pertanyaan' => $idSoal,
                            'jawaban' => $jawaban,
                            'timestamp' => $date);
            DB::table('jawaban')->insert($insert);
        }
        Session::flash('pesan_error', 'Data Kuisioner Berhasil Ditambahkan');
        return Redirect::to('admin');
    }

    public function register(){
        return View::make('register');
    }

    public function registerresult(){
        $rules = array(
            'nama' => 'required|min:3',
            'username' => 'required|min:5',
            'email' => 'required|min:3',
            'password' => 'required|min:5',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('register')->withErrors($validator)->withInput();
        } else {
            DB::table('users')->insert(
                array(
                    'name' => Input::get('nama'),
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => Hash::make(Input::get('password')),                 
                )
            );
            Session::flash('pesan_error', 'Registrasi Sukses, Silahkan login');
            return Redirect::to('login')->with('login_error', 'Could not log in');;
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
        Session::flash('pesan_error', 'Data Kuisioner Berhasil Ditambahkan');
        return Redirect::to('hasilforuser');
    }

    public function screenHasil(){
        $hasil = DB::select(DB::raw('SELECT y.nama, cast(x.hasil as decimal(10,2)) as hasil from produk y, ranking x where y.id_produk=x.id_produk order by hasil desc'));

        return View::make('hasil')->with('has', $hasil); 
    }

    public function screenHasilUser(){
        $hasil2 = DB::select(DB::raw('SELECT y.nama from produk y, ranking x where y.id_produk=x.id_produk order by hasil desc'));

        return View::make('hasilforuser')->with('has2', $hasil2); 
    }

    public function groupJawaban(){
        DB::table('ranking')->delete();

        $results = DB::select(DB::raw('SELECT x.id_produk, x.id_pertanyaan, x.jawaban, y.gap, avg(x.jawaban) - y.gap AS GAP from jawaban x, pertanyaan y where x.id_pertanyaan = y.id GROUP BY x.id_produk, x.id_pertanyaan'));

        //check the result
        //var_dump($results);

        //check the query correct or not in eloquent
        //$queries = DB::getQueryLog();
        //var_dump(end($queries));

        $aspect = [];
        foreach($results as $result){
            $idProduct = $result->id_produk;
            $idQuestion= $result->id_pertanyaan;

            if($result->GAP >= 2){
                $bobot = 5;
            }else if($result->GAP >= 1){
                $bobot = 4.5;
            }else if($result->GAP >= 0){
                $bobot = 4;
            }else if($result->GAP >= - 1){
                $bobot = 3.5;
            }else{
                $bobot = 3;
            }

            $aspect[$idProduct][$idQuestion] = $bobot;
        }
        //var_dump($aspect);

        foreach($aspect as $idProduct => $asp){

            $n1 = ((0.6 * ($asp[11]+$asp[12]) / 2) + (0.4 * ($asp[13])));
            $n2 = (0.6 * ($asp[15] + $asp[17]) / 2) + ((0.4 * ($asp[14] + $asp[16]) / 2));
            $ranking = (0.6 * $n1) + (0.4 * $n2);             
            var_dump($ranking);
            $insert2 = array('id_produk'=>$idProduct,
                             'hasil'=>$ranking);
            DB::table('ranking')->insert($insert2);
            //var_dump($insert2);
        }
        return Redirect::to('hasil');
    }

}
