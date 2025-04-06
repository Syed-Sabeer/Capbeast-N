<section class="page-wrapper bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center d-flex align-items-center justify-content-between">
                    <h4 class="text-white mb-0">{{ $pageTitle }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light justify-content-center mb-0 fs-15">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" ><a class="white-color font-weight-bold" href="{{ $pageRoute ? route($pageRoute) : '#' }}" >{{ $pageTitle }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>