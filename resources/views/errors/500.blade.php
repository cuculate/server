@extends('frontend.base.base')

@section('title','500 Error Page')

@section('main')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="main-body d-flex m-3">
                <div class="link-dinhhuong">
                    <a href="{{route('home')}}">Trang chủ </a> &gt;
                    <label style="color:#777777">500 Error Page</label>
                </div>
            </div>
            <div class="error-page ml-5">
                <h2 class="headline text-danger">500</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>

                    <p>
                        We will work on fixing that right away.
                        Meanwhile, you may <a href="{{ route('home') }}">return to Home</a> or try using the search
                        form.
                    </p>

                </div>
            </div>
            <!-- /.error-page -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
