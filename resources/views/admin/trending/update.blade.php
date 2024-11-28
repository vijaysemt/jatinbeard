<!doctype html>
<html lang="en">

<head>
    <!--   meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/197305d821.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <title>Jatin Beard Oil - Dashboard</title>
</head>

<body style="font-family:sans-serif;">
    <section class="m-md-5 p-5">
        <a href="/trendinglist">
            <button class="btn btn-primary  mb-3"><i class="fas fa-long-arrow-alt-left text-white"></i> &nbsp;
                Back!!</button>
        </a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-md-5 p-4 border rounded mb-4">
                    <h4 class="font-weight-bold mb-3">Update <span
                        class="text-danger text-decoration">{{ $data['name'] }}</span> Trending info:-</h4>
                        <!-- start-->
                    <form action="{{ url('updatetrendinginfo', $data->id) }}" method="post"
                        enctype="multipart/form-data" class="form-validation">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Name*</label>
                                    <input type="text" class="form-control" value="{{ $data['name'] }}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Order*</label>
                                    <input type="text" class="form-control"  value="{{ $data['order'] }}" name="order">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for=""> Old Status
                                        @if ($data['status'] == 1)
                                            <span class="font-weight-bold text-primary">
                                                @php
                                                    echo 'Visible!!';
                                                @endphp
                                            </span>
                                        @else
                                            <span class="font-weight-bold text-danger">
                                                @php
                                                    echo 'Hidden!!';
                                                @endphp
                                            </span>
                                        @endif
                                    </label>
                                    <select class="form-control" name="status" data-toggle="select2">
                                        <option
                                            value="
                                                @if ($data['status'] == 1) @php
                                                            echo "1";
                                                            @endphp
                                                    @else
                                                        @php
                                                            echo "0";
                                                            @endphp @endif
                                                    ">
                                            @if ($data['status'] == 1)
                                                <span class="font-weight-bold text-primary">
                                                    @php
                                                        echo 'Visible!!';
                                                    @endphp
                                                </span>
                                            @else
                                                <span class="font-weight-bold text-danger">
                                                    @php
                                                        echo 'Hidden!!';
                                                    @endphp
                                                </span>
                                            @endif
                                        </option>
                                        <option value="1">Visible!!</option>
                                        <option value="0">Hidden!!</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- end container-fluid -->
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
