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
                    Edit Student Data
                </h1>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="POST" action="{{url('/update-student')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                            value="{{$data->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                            value="{{$data->email}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username"
                            name="username" value="{{$data->username}}">
                        @error('username')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone"
                            value="{{$data->phone}}">
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob"
                            value="{{$data->dob}}">
                        @error('dob')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="{{url('student')}}">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>