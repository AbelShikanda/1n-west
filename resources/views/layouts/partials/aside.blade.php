@if (Request::path() == '/' || Request::is('home'))
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_1.jpg') }}')">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <!-- <div class="desc">
                                        <span class="status">Sale</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 7,000,000</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis placeat ea
                                            repellat, cumque soluta velit obcaecati, nulla omnis quas quasi eos sint
                                            incidunt in saepe, excepturi consequuntur! Velit, facere fuga?
                                        </p>
                                        <p class="details">
                                            <span>2000 ft sq</span>
                                            <span>4 Bedrooms</span>
                                            <span>3 Bathrooms</span>
                                            <span>2 Garage</span>
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                        </p>
                                    </div> -->
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
                                    <!-- <div class="desc">
                                        <span class="status">Rent</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 10,000,000<h2>
                                                <p>
                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                                                    veniam ducimus error voluptatum atque voluptate in vitae cum saepe
                                                    possimus magni ipsa nihil nostrum voluptatem incidunt, explicabo
                                                    vero,
                                                    tempora nisi?
                                                </p>
                                                <p class="details">
                                                    <span>2000 ft sq</span>
                                                    <span>4 Bedrooms</span>
                                                    <span>3 Bathrooms</span>
                                                    <span>2 Garage</span>
                                                </p>
                                                <p>
                                                    <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                                </p>
                                    </div> -->
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
                                    <!-- <div class="desc">
                                        <span class="status">Sale</span>
                                        <h1>New House in Nairobi, Kenya</h1>
                                        <h2 class="price">Ksh 5,000,000</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, eaque
                                            cumque. Neque repellendus, velit a ipsum amet culpa expedita, illo quis,
                                            totam
                                            sequi placeat laborum recusandae commodi iure! Sint, repellendus.
                                        </p>
                                        <p class="details">
                                            <span>2000 ft sq</span>
                                            <span>4 Bedrooms</span>
                                            <span>3 Bathrooms</span>
                                            <span>2 Garage</span>
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-lg" href="#">Learn More</a>
                                        </p>
                                    </div> -->
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
