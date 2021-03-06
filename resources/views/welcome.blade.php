<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search users" id= "mySearch"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>                    
                </div>
            </form>
            
    </div>
    <div class="container">
    @foreach($data as $d)
        @if($d == "")
            <td></td>
        @else
            <button class="close"  style="font-weight:bold;">{{$d}}  <a href="/search">x</a></button>
        @endif
    @endforeach
    </div>
    <!-- <h1>Hey</h1> -->
    <div class="container">
        @if(isset($users))
        <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th>Parent Email</th>
                        <th>Phone</th>
                        <th>School Name</th>
                        <th>School Equired</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users == [])
                        <td>No data Found</td>
                    @else
                    
                        @foreach($users as $dummy)
                        <tr>
                            <td>{{$dummy->first_name}}</td>
                            <td>{{$dummy->last_name}}</td>
                            <td>{{$dummy->email}}</td>
                            @if($dummy->parent == "")
                                <td>N/A</td>
                                <td>N/A</td>
                            
                            @else
                                <td>{{$dummy->parent->parent_name}}</td>
                                <td>{{$dummy->parent->parent_email}}</td>
                            
                            @endif
                            <td>{{$dummy->phone}}</td>

                            @if($dummy->school == "")
                                <td>N/A</td>
                                <td>N/A</td>
                            
                            @else
                                <td>{{$dummy->school->school_name}}</td>
                                <td>{{$dummy->school->school_equired}}</td>
                            
                            @endif

                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {!! $users->render() !!}@endif
    </div>
    </body>
    <script>
    var closebtns = document.getElementsByClassName("close");
    var i;
    closebtns.addEventListener("click", function() {
        this.parentElement.style.display = 'none';
    }
    </script>
</html>
