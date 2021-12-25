<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\Photo;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Book::all(); 
        return view('book.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('book.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'photo' => 'required',
                'kategori' => 'required',
                'judul' => 'required|min:3|max:50|unique:books,judul_buku',
                'nomor' => 'required|numeric|unique:books,nomor_buku',
                'stok' => 'required|numeric',
                'sinopsis' => 'required|min:3|max:1000',
                'pengarang' => 'required|max:100',
                'penerbit' => 'required|max:100',
            ],
            [
                'judul.unique' => 'Nama sudah ada',
                'judul.required' => 'WAJIB DIISI!',
                'judul.min' => 'Min. diisi 3 huruf!',
                'judul.max' => 'Limit 100 huruf!',
                'nomor.required' => 'WAJIB DIISI',
                'sinopsis.required' => 'WAJIB DIISI',
                'sinopsis.min' => 'Min. diisi 3 huruf! ',
                'sinopsis.max' => 'Limit 100 huruf!',
                'pengarang.required' => 'WAJIB DIISI',
                'pengarang.min' => 'Min. diisi 3 huruf! ',
                'pengarang.max' => 'Limit 100 huruf!',
                'penerbit.required' => 'WAJIB DIISI',
                'penerbit.min' => 'Min. diisi 3 huruf! ',
                'penerbit.max' => 'Limit 100 huruf!',
                
            ]
        );
        $img = $request->file('photo');
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto kelaravel

        // untuk memasukkan data ketable
        Book::create([
            'photo'=> $nama_file,
            'judul_buku' => $request->judul,
            'nomor_buku' => $request->nomor,
            'stok_buku' => $request->stok,
            'sinopsis' => $request->sinopsis,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'category_id' => $request->kategori,
        ]);

        $data = Book::where('judul_buku', $request->judul)->get();
        // dd($data);  

        return redirect('/book')->with('status', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // $kategori = Category::where('id',$id)->get();
        // return $category;
        $category= Category::all();
        return view('book.edit', compact('book','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate(
            [
                'photo' => 'required',
                'kategori' => 'required',
                'judul' => 'required|min:3|max:50|unique:books,judul_buku',
                'nomor' => 'required|numeric|unique:books,nomor_buku',
                'stok' => 'required|numeric',
                'sinopsis' => 'required|min:3|max:1000',
                'pengarang' => 'required|max:100',
                'penerbit' => 'required|max:100',
            ],
            [
                'judul.unique' => 'Nama sudah ada',
                'judul.required' => 'WAJIB DIISI!',
                'judul.min' => 'Min. diisi 3 huruf!',
                'judul.max' => 'Limit 100 huruf!',
                'nomor.required' => 'WAJIB DIISI',
                'sinopsis.required' => 'WAJIB DIISI',
                'sinopsis.min' => 'Min. diisi 3 huruf! ',
                'sinopsis.max' => 'Limit 100 huruf!',
                'pengarang.required' => 'WAJIB DIISI',
                'pengarang.min' => 'Min. diisi 3 huruf! ',
                'pengarang.max' => 'Limit 100 huruf!',
                'penerbit.required' => 'WAJIB DIISI',
                'penerbit.min' => 'Min. diisi 3 huruf! ',
                'penerbit.max' => 'Limit 100 huruf!',
                
            ]
        );

        $img = $request->file('photo');
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $img->move('dist/img', $nama_file); //proses upload foto kelaravel

        // untuk memasukkan data ketable
        Book::where('id', $book->id)->update([
            'photo'=> $nama_file,
            'judul_buku' => $request->judul,
            'nomor_buku' => $request->nomor,
            'stok_buku' => $request->stok,
            'sinopsis' => $request->sinopsis,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'category_id' => $request->kategori,
        ]);
        return redirect('/book')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy('id', $book->id);
        return redirect('/book')->with('status', 'Berhasil Dihapus');
    }

    public function promo(Book $book){
        // if($product->promo==1){
        //     $promo=0;
        // }
        // else{
        //     $promo=1;
        // }
        $promo=$book->promo==1 ? 0:1;
        Book::where('id', $book->id)->update(['promo'=>$promo]);
        return redirect()->back();
    }
    public function rekomendasi(Book $book){
        // if($product->rekomendasi==1){
        //     $rekomendasi=0;
        // }
        // else{
        //     $rekomendasi=1;
        // }
        $rekomendasi=$book->rekomendasi==1 ? 0:1;
        Book::where('id', $book->id)->update(['rekomendasi'=>$rekomendasi]);
        return redirect()->back();
    }
}
