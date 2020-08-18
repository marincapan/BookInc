@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-history"></i>&nbsp;Booking History</h1>
    <p class="lead">Here You can see all reservation histories for the book that You have picked!</p>
  </div>
</div>
                    @if (session('status'))
                        <div id="message" class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <hr/>
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mybookings as $mybooking)
                        <tr>
                            <th scope="row">{{ $mybooking->user_id }}</th>
                            <td>{{ $mybooking->start_date }}</td>
                            <td>{{ $mybooking->end_date }}</td>
                            <td>
                            @if($mybooking->cancel == 1)
                            <button type="button" class="btn btn-primary" onclick="window.location='{{ route("cancelbooking", $mybooking->id) }}'"><i class="fas fa-times"></i>&nbsp;Cancel</button>
                            @endif    
                        </td>
                        </tr>
                        @endforeach                           
                        </tbody>
                    </table>
                    </div>
                    

@endsection
