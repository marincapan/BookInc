<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
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
        $books = Book::where("user_id",auth()->user()->id)->pluck("id")->toArray();
        $mybookings = Booking::where("user_id",auth()->user()->id)->whereNotIn("book_id",$books)->get();
        foreach ($mybookings as $booking) {
            $today = Carbon::now()->toDateString();
            if ($booking->end_date <= $today || $booking->end_date == $booking->start_date){
                $booking->cancel = 0;
            }else{
                $booking->cancel = 1;
            }
        }
        return view("booking.mybookings")->with("mybookings",$mybookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addbooking($id)
    {
        $book = Book::find($id);
        if ($book->user_id != auth()->user()->id){
            $booking = new Booking;
            $booking->user_id = auth()->user()->id;
            $booking->book_id = $id;
            $last_date_string = Booking::orderBy("id","desc")->pluck("end_date")->first();
            $booking->start_date = $last_date_string;
            $last_date_date = date('Y-m-d',strtotime($last_date_string));
            $last_date_date = date('Y-m-d', strtotime("+1 month", strtotime($last_date_date)));
            $booking->end_date =  $last_date_date;
            $booking->save();
            return redirect("mybookings");
        }else{
            return redirect("mybooks")->with("status", "You cannot reserve Your books! Make them private.");
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function history($id)
    {
        $book = Book::find($id);
        if ($book->user_id == auth()->user()->id){
            $bookings = Booking::where([["book_id",$id],["user_id","<>",auth()->user()->id]])->get();
            foreach ($bookings as $booking) {
                $today = Carbon::now()->toDateString();
                if ($booking->end_date <= $today || $booking->end_date == $booking->start_date){
                    $booking->cancel = 0;
                }else{
                    $booking->cancel = 1;
                }
            }

            return view("booking.history")->with("mybookings",$bookings);
        }else{
            return redirect("mybooks")->with("status", "You can only see history for Your own books!");
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function removebooking($id)
    {
        $today = Carbon::now()->toDateString();
        $booking = Booking::find($id);
        if ($booking->end_date >= Carbon::now()->toDateString()){
            if ($booking->start_date >= $today){
                $booking->end_date = $booking->start_date;
            }else{
                $booking->end_date = Carbon::now()->toDateString();
            }
            $booking->save();
            return redirect()->back()->with("status", "Booking canceled!");
        }else{
            return redirect()->back()->with("status", "You cannot cancel book reservaion that have already passed!");
        }
        
    }
}
