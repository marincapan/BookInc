@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4"><i class="fas fa-hand-peace"></i>&nbsp;Hello, {{Auth::user()-> name}}!</h1>
  <p class="lead">Welcome to BookInc! Here is your Dashboard that contains all the information You need!</p>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-gavel"></i>&nbsp;Site Rules</h1>
    <p class="lead">Please follow our <a href="#">Community guidelines </a>!</p>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><i class="fas fa-question"></i>&nbsp; FAQ</h1>
    <p class="lead">Here are some frequently asked questions - answered!</p>
    
    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h4>How to add a Book?</h4>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        If You want to add a Book, You can simply click on Your name in the Navigation bar at the top of the page, and a side menu will appear. From there You have to click "My Books" option which will opet a page with a list of the Books You added. A the top of the page, You will see a green button "Add a Book" that will take You to the form that is needed to fill out and then click "Register Book" which add the Book in the system. You will be automatically redirect to the page "My Books" so You will see if the Book was added properly. Also, You will recieve a message of success.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h4>How to Reserve a Book?</h4>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         If You want to reserve a Book from another user, all You have to do is enter the Stock Market by click on the "Stock" option in the navigation bar. After that You will a see a list of available Books that You haven't alredy booked. You can see when the Book is available. If You click "Reserve", Your reservation will be places and You will have 1 month to read it and return it.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h4>How to check my Booking History?</h4>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        If You want to see what reservation You have places for each book, You have to click on the option "My Bookings" in the menu under Your name. It will open You a page with all of your booking history. 
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <h4>How to see reservations for my Books?</h4>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
        If You want to check which users reserved Your books all You ahve to do is open "My Books" page from the menu under You name. In each row You will ahve a buttom "History" which will open You a page with booking history for the book that You choosed.
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        <h4>How to cancel my reservations?</h4>
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
      <div class="card-body">
        If You are a user that wants to cancel a reservation of a book earlier, You can do it on the "My Bookings" panel where for every book that the reservation hasn't ended is provided a "Cancel" button. If You are an owner of the book, You can do the same from the panel "My books" while viewing the history for one specific book. Also, owners of the books can make their books private which will disable other users from reserving them since it won't be shown in the Stock Market. 
      </div>
    </div>
  </div>
</div>
    </div>

@endsection
