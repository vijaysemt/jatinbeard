<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/197305d821.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <title>Jatin Beard Oil - Dashboard</title>

    <style>
        select option:disabled {
            font-weight: 900 !important;
        }
    </style>
</head>

<body style="font-family:sans-serif;">
    <section class="m-md-5 p-5">
        <a href="/productlist">
            <button class="btn btn-primary  mb-3"><i class="fas fa-long-arrow-alt-left text-white"></i> &nbsp;
                Back!!</button>
        </a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-md-5 p-4 border rounded mb-4">
                    <h4 class="font-weight-bold mb-3">Update <span class="text-danger text-decoration">
                            {{ $data['name'] }} </span> Product info:-</h4>
                    <!-- start  -->
                    <form action="{{ url('updateproductinfo', $data->id) }}" method="post"
                        enctype="multipart/form-data" class="form-validation">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Name*</label>
                                    <input type="text" class="form-control" value="{{ $data['name'] }}"
                                        name="name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Old Category*
                                        <span class="font-weight-bold text-danger text-uppercare mark">
                                            @foreach (App\Models\Category::get() as $item)
                                                @if ($data->cate_id == $item->id)
                                                    {{ $item->name }}
                                                @endif
                                            @endforeach
                                        </span>

                                    </label>
                                    <select class="form-control" name="cate_id" data-toggle="select2">
                                        <option
                                            value="
                                            @foreach (App\Models\Category::get() as $item)
                                                @if ($data->cate_id == $item->id)
                                                    {{ $item->id }}
                                                @endif @endforeach ">

                                            @foreach (App\Models\Category::get() as $item)
                                                @if ($data->cate_id == $item->id)
                                                    {{ $item->name }} {{ '- Old Category' }}
                                                @endif
                                            @endforeach

                                        </option>

                                        <option value="" disabled>Choose new Category ↓</option>
                                        @foreach (App\Models\Category::get() as $date)
                                            <option value="{{ $date->id }}">{{ $date->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>



                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Order* <b> <mark class="text-danger px-2">
                                                @foreach (App\Models\Product::get() as $item)
                                                    {{ $item->order }},&nbsp;
                                                @endforeach
                                        </b></mark>

                                    </label>
                                    <input type="text" class="form-control" value=" {{ $data->order }}"
                                        name="order">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Stock Status*
                                        <span class="mark text-danger">
                                            @if ($data['status'] == 0)
                                                <span class="font-weight-bold">
                                                    @php
                                                        echo 'In Stock';
                                                    @endphp
                                                </span>
                                            @else
                                                <span class="font-weight-bold ">
                                                    @php
                                                        echo 'Out of stock!!';
                                                    @endphp
                                                </span>
                                            @endif
                                        </span>
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
                                            @if ($data['status'] == 0)
                                                <span class="font-weight-bold text-primary">
                                                    @php
                                                        echo 'In stock!!' . '- Old Selected Status';
                                                    @endphp
                                                </span>
                                            @else
                                                <span class="font-weight-bold text-danger">
                                                    @php
                                                        echo 'Out of stock!!' . '- Old Selected Status';
                                                    @endphp
                                                </span>
                                            @endif
                                        </option>
                                        <option value="" disabled>Choose new Status ↓</option>
                                        <option value="0">In stock!!</option>
                                        <option value="1">Out of stock!!</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Stock QTY*</label>
                                    <input type="number" class="form-control" value="{{ $data['stock'] }}" name="stock">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Delivery Charge</label>
                                    <input type="number" class="form-control" value="{{ $data['delivery'] }}" name="delivery">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Weight</label>
                                    <input type="text" class="form-control" value="{{ $data['weight'] }}" name="weight">
                                </div>
                            </div>


                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Length</label>
                                    <input type="text" class="form-control" value="{{ $data['length'] }}" name="length">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Breadth</label>
                                    <input type="text" class="form-control" value="{{ $data['breadth'] }}" name="breadth">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Height</label>
                                    <input type="text" class="form-control" value="{{ $data['height'] }}" name="height">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">HSN</label>
                                    <input type="text" class="form-control" value="{{ $data['hsn'] }}"  name="hsn">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Tax</label>
                                    <input type="text" class="form-control" value="{{ $data['tax'] }}"  name="tax">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">SKU</label>
                                    <input type="text" class="form-control" value="{{ $data['sku'] }}"  name="sku">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12"></div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Short Description*</label>
                                    <textarea name="description" id="editor1" rows="10" cols="80">{{ $data['description'] }}</textarea>
                                    <script>
                                        // Initialize CKEditor
                                        CKEDITOR.replace('editor1');
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Full Description*</label>
                                    <textarea name="fdescription" id="editor2" rows="10" cols="80">{{ $data['fdescription'] }}</textarea>
                                    <script>
                                        // Initialize CKEditor
                                        CKEDITOR.replace('editor2');
                                    </script>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Original Price*</label>
                                    <input type="text" class="form-control" value="{{ $data['oprice'] }}"
                                        name="oprice">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Selling Price*</label>
                                    <input type="text" class="form-control" value="{{ $data['price'] }}"
                                        name="price">
                                </div>
                            </div>



                            <div class="col-lg-12 col-12">
                                <h4 class="font-weight-bold">SEO Options:-</h4>
                                <div class="form-group">
                                    <label for="">Meta Title*</label>
                                    <input type="text" class="form-control" value="{{ $data['metatitle'] }}"
                                        name="metatitle">
                                </div>
                            </div>

                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Meta Description*</label>
                                    <textarea type="textarea" class="form-control" name="metadescription" cols="30" rows="10">{{ $data['metadescription'] }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Meta Keywords*</label>
                                    <textarea type="textarea" class="form-control" name="metakeywords" cols="30" rows="10">{{ $data['metakeywords'] }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">SEO Head*</label>
                                    <textarea type="textarea" class="form-control" name="seohead" cols="30" rows="10">{{ $data['seohead'] }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <h5 class="font-weight-bold text-danger">Home page Product image</h5>
                                    <img src="{{ url('admin/assets/uploads/product/home/' . $data->pimage) }}"
                                        alt="" width="50px" class=" pr-3">
                                    <input type="file" class="filestyle" name="image">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <h5 class="font-weight-bold text-danger">Loan page Product image</h5>
                                    <img src="{{ url('admin/assets/uploads/product/cover/' . $data->pcover) }}"
                                        alt="" width="50px" class=" pr-3">
                                    <input type="file" class="filestyle" name="cover">
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
