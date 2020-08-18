<?php

namespace App\Http\Controllers;

use App\Book;
use App\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $bookings = Booking::where([["user_id",auth()->user()->id],["end_date","<",$today]])->pluck("book_id")->toArray();
        $books = Book::where([["user_id","<>",auth()->user()->id],["state",1]])->whereNotIn("id",$bookings)->get();
        foreach ($books as $book) {
            $date = Booking::where("book_id",$book->id)->orderBy("id", "desc")->pluck("end_date")->first();
            if ($date == Carbon::now()->toDateString()){
                $date = "Today";
            }
            $book->exp = $date;
        }
        return view("book.stock")->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mybooks()
    {   
        $mybooks = Book::where("user_id",auth()->user()->id)->get();
        return view("book.mybooks")->with('mybooks', $mybooks);
    }
    public function addbook()
    {   
        
        return view("book.addbook");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerbook(Request $request)
    {
        $book = new Book;
        $book->user_id = auth()->user()->id;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->state = $request->state;
        $book->save();
        $booking = new Booking;
        $booking->user_id = auth()->user()->id;
        $booking->book_id = $book->id;
        $booking->start_date = Carbon::now()->toDateString();
        $booking->end_date = Carbon::now()->toDateString();
        $booking->save();
        return redirect("mybooks");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function editbook($id)
    {
        $book = Book::find($id);
        if ($book->user_id == auth()->user()->id){
            return view ("book.editbook")->with("book",$book);
        }else{
            return redirect("mybooks")->with("alert", "You don't own that book!");;
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function updatebook(Request $request)
    {
        $book = Book::find($request["id"]);
        $book->name = $request["name"];
        $book->author = $request["author"];
        $book->year = $request["year"];
        $book->publisher = $request["publisher"];
        $book->pages = $request["pages"];
        $book->language = $request["language"];
        $book->state = $request["state"];
        $book->save();
        return redirect("mybooks")->with("status", "Book updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function removebook($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect("mybooks")->with("status", "Book deleted!");
    }
}
