@props(['data', 'name'])         

    <div class="container overflow-hidden mb-5">
        <div class="row gy-3 g-md-3 hcf-isotope-grid">
        @foreach ($data->getMedia($name) as $media)
        <div class="col-12 col-md-6 col-lg-3 hcf-isotope-item">
            <a class="hcf-masonry-card rounded rounded-4 image-box" href="{{ $media->getUrl() }}">
                <img class="card-img img-fluid" loading="lazy" src="{{$media->getUrl()}}" alt="">
                <div class="card-overlay d-flex flex-column justify-content-center bg-dark p-4" style="--bs-bg-opacity: .5;">
                    <h3 class="card-title text-white text-center mb-1">{{$media->getCustomProperty('title')}}</h3>
                    <div class="card-category text-white text-center">Photography</div>
                </div>
            </a>
        </div>
        @endforeach
        </div>
    </div>
