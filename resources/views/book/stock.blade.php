@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-layer-group"></i>&nbsp;Stock</h1>
    <p class="lead">See all the books available for reservation from other users in one place.</p>
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
                            <th scope="col">Available From</th>
                            <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->language }}</td>
                            <td>
                                {{ $book->exp }}
                           
                            </td>
                            <td>
                            <button type="button" class="btn btn-primary" onclick="window.location='{{ route("booking", $book->id) }}'"><i class="fas fa-plus"></i>&nbsp;Reserve</button>
                            </td>
                        </tr>
                        @endforeach                           
                        </tbody>
                    </table>
                    </div>

@endsection
