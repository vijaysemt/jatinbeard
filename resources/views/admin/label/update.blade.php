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

    <style>
        .color-picker-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        #foregroundColorPicker,
        #backgroundColorPicker {
            width: 50px;
            height: 50px;
            border: none;
            cursor: pointer;
        }

        #foregroundHexValue,
        #backgroundHexValue {
            font-size: 1.2em;
            padding: 6px;
            width: 200px;
            text-align: center;
            border: 1px solid #626262;
        }

        #contrastRatio {
            font-size: 1.2em;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <title>Jatin Beard Oil - Dashboard</title>
</head>

<body style="font-family:sans-serif;">
    <section class="m-md-5 p-5">
        <a href="/labellist">
            <button class="btn btn-primary  mb-3"><i class="fas fa-long-arrow-alt-left text-white"></i> &nbsp;
                Back!!</button>
        </a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-md-5 p-4 border rounded mb-4">
                    <h4 class="font-weight-bold mb-3">Update <span
                            class="text-danger text-decoration">{{ $data['name'] }}</span> Label info:-</h4>
                    <!-- start  -->
                    <form action="{{ url('updatelabelinfo', $data->id) }}" method="post" enctype="multipart/form-data"
                        class="form-validation">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Label Name*</label>
                                    {{ $data['name'] }}
                                    <input type="text" class="form-control" value="{{ $data['name'] }}" required
                                        name="name">
                                </div>
                            </div>


                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="">Label color code*</label>
                                    <div class="color-picker-container">
                                        <input type="color" name="colorcode" id="foregroundColorPicker"
                                            value="{{ $data['colorcode'] }}">
                                        <input type="text" name="colorcode" class="w-75"
                                            value="{{ $data['colorcode'] }}" id="foregroundHexValue" readonly>
                                    </div>


                                    {{-- <input type="text" class="form-control" required name="order"> --}}
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
                                    <select class="form-control" name="status" required data-toggle="select2">
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


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const foregroundColorPicker = document.getElementById('foregroundColorPicker');
            const foregroundHexValue = document.getElementById('foregroundHexValue');
            const backgroundColorPicker = document.getElementById('backgroundColorPicker');
            const backgroundHexValue = document.getElementById('backgroundHexValue');
            const contrastRatioDisplay = document.getElementById('contrastRatio');

            function hexToLuminance(hex) {
                const rgb = parseInt(hex.slice(1), 16);
                const r = (rgb >> 16) & 0xff;
                const g = (rgb >> 8) & 0xff;
                const b = (rgb >> 0) & 0xff;
                const rsrgb = r / 255;
                const gsrgb = g / 255;
                const bsrgb = b / 255;
                const rLinear = rsrgb <= 0.03928 ? rsrgb / 12.92 : ((rsrgb + 0.055) / 1.055) ** 2.4;
                const gLinear = gsrgb <= 0.03928 ? gsrgb / 12.92 : ((gsrgb + 0.055) / 1.055) ** 2.4;
                const bLinear = bsrgb <= 0.03928 ? bsrgb / 12.92 : ((bsrgb + 0.055) / 1.055) ** 2.4;
                return 0.2126 * rLinear + 0.7152 * gLinear + 0.0722 * bLinear;
            }

            function calculateContrastRatio(fg, bg) {
                const fgLuminance = hexToLuminance(fg) + 0.05;
                const bgLuminance = hexToLuminance(bg) + 0.05;
                return fgLuminance > bgLuminance ? (fgLuminance / bgLuminance) : (bgLuminance / fgLuminance);
            }

            function updateContrastRatio() {
                const fgHex = foregroundColorPicker.value;
                const bgHex = backgroundColorPicker.value;
                const contrastRatio = calculateContrastRatio(fgHex, bgHex).toFixed(2);
                contrastRatioDisplay.textContent = `Contrast Ratio: ${contrastRatio}`;
            }

            foregroundColorPicker.addEventListener('input', () => {
                foregroundHexValue.value = foregroundColorPicker.value;
                updateContrastRatio();
            });

            backgroundColorPicker.addEventListener('input', () => {
                backgroundHexValue.value = backgroundColorPicker.value;
                updateContrastRatio();
            });

            updateContrastRatio();
        });
    </script>

</body>

</html>
