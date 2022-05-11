@extends('templates.default-page')
@section('content')
    <section class="ftco-section ftco-services">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Dịch vụ của chúng tôi</h2>
                    <p>Đây là những dịch vụ được quan tâm, ưa chuộng nhất hiện nay</p>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 ftco-animate">
                        <div class="media d-block text-center block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-5">
                                <span class="{{ $service->icon }}"></span>
                            </div>
                            <div class="media-body">
                                <a href="{{ URL::to('/service/' . $service->id) }}">
                                    <h3 class="heading">{{ $service->name }}</h3>
                                </a>

                                <p>{{ $service->detail }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
