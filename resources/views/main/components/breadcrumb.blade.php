<section class="ecommerce-about" style="
    background-image: url('{{ $imageURL }}');
    background-size: cover;
    background-position: center;
">
    <div class="bg-overlay bg-primary-about" style="opacity: 0.7"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center">
                    <h1 class="text-white mb-0">{{ $pageTitle }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light justify-content-center mt-4">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="white-color font-weight-bold" href="{{ $pageRoute ? route($pageRoute) : '#' }}">{{ $pageTitle }}</a>

                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
