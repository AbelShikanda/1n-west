@if (Request::path() == '/' || Request::is('home'))
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_1.jpg') }}')">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="status">Rent</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 70,000</h2>
                                        <p>
                                            Looking for a comfortable and well-located home? This 3-bedroom, 
                                            2-bathroom house is available for rent in a quiet and secure neighborhood
                                        </p>
                                        <p class="details">
                                            <span>Spacious living and dining area with natural lighting</span>
                                            <span>4 Bedrooms</span>
                                            <span>3 Bathrooms</span>
                                            <span>Private parking</span>
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_2.jpg') }}')">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="status">Rent</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 30,000<h2>
                                                <p>
                                            Looking for a comfortable and well-located home? This 3-bedroom, 
                                            2-bathroom house is available for rent in a quiet and secure neighborhood
                                                </p>
                                                <p class="details">
                                                    <span>Spacious living and dining area with natural lighting</span>
                                                    <span>4 Bedrooms</span>
                                                    <span>3 Bathrooms</span>
                                                    <span>Private parking</span>
                                                </p>
                                                <p>
                                                    <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_3.jpg') }}')">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="status">Rent</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 50,000</h2>
                                        <p>
                                            Looking for a comfortable and well-located home? This 3-bedroom, 
                                            2-bathroom house is available for rent in a quiet and secure neighborhood
                                        </p>
                                        <p class="details">
                                            <span>Spacious living and dining area with natural lighting</span>
                                            <span>4 Bedrooms</span>
                                            <span>3 Bathrooms</span>
                                            <span>Private parking</span>
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
@else
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_3.jpg') }}');">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h2 class="heading-title">{{ $pageTitle }}</h2>
                                    <p class="fh5co-lead">{{ $breadcrumbLinks['DescriptionOne'] }}<i class="icon-heart3"></i>{{ $breadcrumbLinks['DescriptionTwo'] }}
                                        <a href="{{ $breadcrumbLinks['url'] }}" target="_blank">{{ $breadcrumbLinks['label'] }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
@endif
