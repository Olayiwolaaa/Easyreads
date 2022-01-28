<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBookRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['media', 'author.user', 'category'])
            ->latest()
            ->get();

        return view('dashboard.admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->select('name', 'id')
            ->get()
            ->prepend(new Category(['name' => '-- Please choose category --']));

        return view('dashboard.admin.books.create', compact('categories'));
    }
    
    public function store(StoreBookRequest $request)
    {
        $request_data = $request->all();
        $request_data['discount_price'] = isset($request['discount_price']) ?
            $request['init_price'] - ($request['init_price'] * ($request['discount_price'] / 100)) :
            $request['init_price'];
        $request_data['author_id'] = auth()->id();
        
        $book = Book::create($request_data);

        if ($request->hasFile('cover_image')) 
        {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_images');
        }

        return redirect()->route('admin.books.index')->with('success_message', 'Book Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = DB::table('categories')
            ->select('name', 'id')
            ->get()
            ->prepend(new Category(['name' => '-- Please choose category --']));

        return view('dashboard.admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $input = $request->all();
        $input['discount_price'] = isset($request['discount_price']) ?
            $request['init_price'] - ($request['init_price'] * ($request['discount_price'] / 100)) :
            $request['init_price'];
        
        $book->update($input);
        
        if ($request->hasFile('cover_image')) 
        {
            $book->media()->delete('cover_image');
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_images');
        }

        return redirect()->route('admin.books.index')->with('success_message', 'Book Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('alert_message', 'Book moved to trash');
    }
    
    public function trashBooks() 
    {
        $books = Book::onlyTrashed()
            ->with(['media', 'author.user', 'category'])
            ->get();
            
        return view('dashboard.admin.books.trashBooks', compact('books'));
    }
    
    public function restore($id) 
    {
        Book::onlyTrashed()
            ->findOrFail($id)
            ->restore();
            
        return back()->with('success_message', 'Book restored');
    }
    
    public function forceDelete($id) 
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->clearMediaCollection();
        $book->forceDelete();

        return back()->with('alert_message', 'Book permanenetly deleted');
    }
}
