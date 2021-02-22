@extends('frontend.base.base')

@section('title','404 Error Page')

@section('main')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="main-body d-flex m-3">
                <div class="link-dinhhuong">
                    <a href="{{route('home')}}">Trang chủ </a> &gt;
                    <label style="color:#777777">404 Error Page</label>
                </div>
            </div>
            <div class="error-page ml-5">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="{{ route('home') }}">return to Home</a> or try using the search form.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
