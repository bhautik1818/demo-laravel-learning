<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Add Student Data
                </h1>

                <form method="POST" action="{{url('/create-student')}}">
                    @csrf
                    <div class="form-group">
                        <label for="FirstName">FirstName</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter FirstName"
                            name="firstname" value="{{old('firstname')}}">
                        @error('firstname')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="LastName">Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Enter LastName"
                            name="lastname" value="{{old('lastname')}}">
                        @error('lastname')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                            value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username"
                            name="username" value="{{old('username')}}">
                        @error('username')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone"
                            value="{{old('phone')}}">
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Date of Birth">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob"
                            value="{{old('dob')}}">
                        @error('dob')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="{{url('student')}}">Back</a>
                </form>
                <br>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>