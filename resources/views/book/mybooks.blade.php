@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-book"></i>&nbsp;My books</h1>
    <p class="lead">Check Your existing books and add new books that will be available for everyone to reserve!</p>
    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ route("addbook") }}'"><i class="far fa-plus-square"></i>&nbsp;Add a Book</button>
                    </div>
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
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Year</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Language</th>
                            <th scope="col">State</th>
                            <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mybooks as $mybook)
                        <tr>
                            <th scope="row">{{ $mybook->id }}</th>
                            <td>{{ $mybook->name }}</td>
                            <td>{{ $mybook->author }}</td>
                            <td>{{ $mybook->year }}</td>
                            <td>{{ $mybook->publisher }}</td>
                            <td>{{ $mybook->pages }}</td>
                            <td>{{ $mybook->language }}</td>
                            <td>
                                @if ($mybook->state == 0)
                                Private
                                @else
                                Public
                                @endif
                            </td>
                            <td>
                            <button type="button" class="btn btn-warning" onclick="window.location='{{ route("editbook", $mybook->id) }}'"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                            <button type="button" class="btn btn-danger" onclick="window.location='{{ route("removebook",$mybook->id) }}'"><i class="fas fa-backspace"></i>&nbsp;Delete</button>
                            <button type="button" class="btn btn-info" onclick="window.location='{{ route("history",$mybook->id) }}'"><i class="fas fa-history"></i>&nbsp;History</button>
                        </td>
                        </tr>
                        @endforeach                           
                        </tbody>
                    </table>
                    </div>
                    

           
@endsection
