@include('layouts.components.master')

<body>

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


    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            @include('layouts.components.topbar')
        </div>
        <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('layouts.components.sidebar')
            <!-- End Sidebar -->
            <div class="clearfix"></div>
            <!-- Left Sidebar End -->
        </div>
        <!-- END wrapper -->



        <div class="content-page">
            <div class="content">
                <!-- Start container-fluid -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <h4 class=" mb-3">Labels List:-</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <a href="/createlabel">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> Add New Category
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- end row -->
                    <!-- start  -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="table-responsive">
                                <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Name</th>
                                            <th>Label Color Code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 0;
                                        @endphp
                                        @foreach (App\Models\Label::get() as $date)
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr>
                                                <td>{{ $sr }}</td>
                                                <td>{{ $date->name }}</td>
                                                <td>

                                                    <div class="color-picker-container">
                                                        <input type="color" id="foregroundColorPicker"
                                                            value="{{ $date->colorcode }}">
                                                        <div id="foregroundHexValue">{{ $date->colorcode }}</div>
                                                    </div>

                                                </td>
                                                <td>
                                                    @if ($date->status == 1)
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
                                                </td>
                                                <td>
                                                    <a href="{{ url('updatelabel/' . $date->id . '/edit') }}">
                                                        <span class="btn btn-success btn-sm">
                                                            <i class="far fa-edit"></i> Update
                                                        </span>
                                                    </a>
                                                    <a href="{{ url('deletelabel/' . $date->id . '/delete') }}">
                                                        <span class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </span>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- end container-fluid -->
                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    © 2024 Jatin Beard Oil - Dashboard | All Rights Reserved. Designed by
                                    DigitalMagnetix
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->
                    <!-- Button trigger modal -->


                </div>
                <!-- end content -->
            </div>
            <!-- END content-page -->

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



            @include('layouts.components.footer-cdn-master')
