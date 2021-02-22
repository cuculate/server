@extends('frontend.base.base')

@section('title','Góp ý')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Góp ý</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Góp ý</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-primary"> Đã gửi góp ý đến shop!</h2>

                <div class="content">
                    <p>
                        Cám ơn bạn đã gửi góp ý cho chúng tôi!
                    </p>
                    <p>
                        Mọi góp ý của bạn đều giúp cho shop hoàn thiện hơn.
                        Một lần nữa xin cám ơn bạn!
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
