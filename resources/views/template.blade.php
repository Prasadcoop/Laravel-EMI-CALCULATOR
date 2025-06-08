<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        /* Set the height of the wrapper div to 100% of the viewport */
        html,
        body {
            height: 100%;
            width: 100%;
        }

        /* Style the footer */
        .footer {
            background-color: #f8f9fa;
            /* padding: 20px; */
            position: fixed;
            bottom: 0;
            left: 0;
            /* width: 100%; */
        }
    </style>
</head>

<body >

   <form method="POST" action="{{ route('calculate') }}">
    @csrf
    <label>Amount:</label>
    <input type="number" name="amount" required><br>

    <label>Tenure:</label>
    <select name="tenure_id" required>
        @foreach($tenures as $tenure)
            <option value="{{ $tenure->id }}">{{ $tenure->months }} Months</option>
        @endforeach
    </select><br>

    <button type="submit">Calculate EMI</button>
</form>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <div class="container mt-4">
        <div class="content-wrapper">
            @yield('content-wrapper')
        </div>

    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
</body>

</html>