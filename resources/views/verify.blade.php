<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Verify Student
                </h1>
                <form method="POST" action="{{url('/verify-email')}}">
                    @csrf
                    <input type="hidden" name="id" value=" {{Session::get('data.id')}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">OTP</label>
                        <input type="text" class="form-control" id="otp" placeholder="Enter OTP" name="otp"
                            value="{{old('otp')}}">
                        @error('otp')
                        <div class="alert alert-danger">{{$message}}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>