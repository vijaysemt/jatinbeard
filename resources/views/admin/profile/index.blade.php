@extends('layouts.components.master')

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                @include('layouts.components.topbar')
            </div>
            <!-- end Topbar -->
            <div class="left-side-menu">
                @include('layouts.components.sidebar')
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>

        <div class="content-page">
            <div class="content">
                <!-- Start container-fluid -->
                <div class="container-fluid">
        
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h4 class="header-title mb-3">Jatin Beard Oil - Profile!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
        
                    <!-- Display Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
        
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        
                    <!-- start  -->
                    <div class="row my-5">
                        <div class="col-md-5 my-auto">
                            <img src="{{ url('admin/assets/images/security.svg') }}" class="img-fluid mb-md-0 mb-4">
                        </div>
                        <div class="col-md-7">
                            @foreach(App\Models\Users::get() as $date)
                            <form action="{{ route('admin.update.password', $date->id) }}" method="POST" class="p-2">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="username">Name</label>
                                    <input class="form-control input-lg" type="text" id="username" value="{{ $date->name }}" disabled>
                                </div>
        
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control input-lg" type="email" id="emailaddress" value="{{ $date->email }}" disabled>
                                </div>
        
                                <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <input type="password" class="form-control input-lg" id="old-password" name="old_password" placeholder="Old Password" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="new-password">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-lg" id="new-password" name="new_password" placeholder="New Password" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" id="toggleNewPassword">
                                                <i class="fa fa-eye"></i> <!-- Eye Icon -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-lg" id="confirm-password" name="new_password_confirmation" placeholder="Confirm New Password" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword">
                                                <i class="fa fa-eye"></i> <!-- Eye Icon -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->
        
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                © 2024 Jatin Beard Oil - Dashboard | All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- end content -->
        </div>
        
     
        
      
        
        <!-- END content-page -->
    </div>
    <!-- END wrapper -->

    

    @include('layouts.components.footer-cdn-master')


    <!-- JavaScript for show/hide password -->
    <script>
        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            var passwordField = document.getElementById('new-password');
            var type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
        });
    
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            var passwordField = document.getElementById('confirm-password');
            var type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
        });
    </script>