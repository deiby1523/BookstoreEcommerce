<!doctype html>
<html lang="es">


<head>
    <title>{{$book->book_name}}</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>
</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

@php
    function convertToISBN($number):string {
         return substr($number, 0, 3) . '-' . substr($number, 3, 1) . '-' . substr($number, 4, 4) . '-' . substr($number, 8, 4) . '-' . substr($number, 12, 1);
     }

     $number = $book->book_isbn;
     $isbn = convertToISBN($number);

@endphp


<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    <span class="mask bg-gradient-dark opacity-6"></span>
</div>

<div class="card card-body blur shadow-blur mx-4 mx-md-5 mx-lg-10 mt-n9">
    <button class="btn btn-white ms-auto mt-n6 me-n3" type="button" name="button"><i class="material-icons me-2">shopping_cart</i>0 items</button>
    <div class="section my-4 my-lg-5">
        <div class="container">
            <div class="row flex-row">
                <div class="col-lg-5">
                    <img class="w-80 border-radius-lg ms-2" src="../assets/img/examples/product2.png" alt="ladydady" loading="lazy">
                    <div class="my-gallery d-flex mt-4 pt-2" itemscope="" itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">
                        <figure itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                            <a href="../assets/img/examples/product3.png" itemprop="contentUrl" data-size="500x600">
                                <img class="w-100 min-height-100 max-height-100 border-radius-lg" src="../assets/img/examples/product3.png" alt="Image description" loading="lazy">
                            </a>
                        </figure>
                        <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                            <a href="../assets/img/examples/product1.jpg" itemprop="contentUrl" data-size="500x600">
                                <img class="w-100 min-height-100 max-height-100 border-radius-lg" src="../assets/img/examples/product1.jpg" itemprop="thumbnail" alt="Image description" loading="lazy">
                            </a>
                        </figure>
                        <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                            <a href="../assets/img/examples/product4.jpg" itemprop="contentUrl" data-size="500x600">
                                <img class="w-100 min-height-100 max-height-100 border-radius-lg" src="../assets/img/examples/product4.jpg" itemprop="thumbnail" alt="Image description" loading="lazy">
                            </a>
                        </figure>
                        <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                            <a href="../assets/img/examples/product2.png" itemprop="contentUrl" data-size="500x600">
                                <img class="w-100 min-height-100 max-height-100 border-radius-lg" src="../assets/img/examples/product2.png" itemprop="thumbnail" alt="Image description" loading="lazy">
                            </a>
                        </figure>
                    </div>

                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true" style="">

                        <div class="pswp__bg" style=""></div>

                        <div class="pswp__scroll-wrap">


                            <div class="pswp__container" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="pswp__item" style="display: block; transform: translate3d(-1429px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(388px, 131px, 0px) scale(0.776197);"><img class="pswp__img border-radius-lg" src="../assets/img/examples/product3.png" style="opacity: 1; width: 644px; height: 773px;"></div></div>
                                <div class="pswp__item" style="transform: translate3d(0px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(302.645px, 629.782px, 0px) scale(0.103474);"><img class="pswp__img pswp__img--placeholder" src="../assets/img/examples/product1.jpg" style="width: 644px; height: 773px; display: none;"><img class="pswp__img" src="../assets/img/examples/product1.jpg" style="display: block; width: 644px; height: 773px;"></div></div>
                                <div class="pswp__item" style="display: block; transform: translate3d(1429px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(388px, 131px, 0px) scale(0.776197);"><img class="pswp__img border-radius-lg" src="../assets/img/examples/product4.jpg" style="opacity: 1; width: 644px; height: 773px;"></div></div>
                            </div>

                            <div class="pswp__ui pswp__ui--fit pswp__ui--hidden">
                                <div class="pswp__top-bar">

                                    <div class="pswp__counter">2 / 4</div>
                                    <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                                    <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                    <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                                    </button>
                                    <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                    </button>


                                    <div class="pswp__preloader">
                                        <div class="pswp__preloader__icn">
                                            <div class="pswp__preloader__cut">
                                                <div class="pswp__preloader__donut"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                    <div class="pswp__share-tooltip"></div>
                                </div>
                                <div class="pswp__caption">
                                    <div class="pswp__caption__center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div>
                        <h3 class="mt-lg-0 mt-4">Black Silk Suit</h3>
                        <span class="badge badge-success">In Stock</span>
                        <h6 class="mb-0 mt-2">Price</h6>
                        <h5>$2,099</h5>
                        <div class="accordion" id="accordionProduct">
                            <div class="accordion-item mb-1">
                                <h6 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-bottom font-weight-bold text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Description
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                    </button>
                                </h6>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionProduct" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        Eres' daring 'Grigri Fortune' swimsuit has the fit and coverage of a bikini in a one-piece silhouette. This fuchsia style is crafted from the label's sculpting peau douce fabric and has flattering cutouts through the torso and back. Wear
                                        yours with mirrored sunglasses on vacation.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-1">
                                <h6 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-bottom font-weight-bold text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Designer Information
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                    </button>
                                </h6>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionProduct" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        An infusion of West Coast cool and New York attitude, Rebecca Minkoff is synonymous with It girl style. Minkoff burst on the fashion scene with her best-selling 'Morning After Bag' and later expanded her offering with the Rebecca Minkoff
                                        Collection - a range of luxe city staples with a "downtown romantic" theme.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-1">
                                <h6 class="accordion-header" id="headingThree">
                                    <button class="accordion-button border-bottom font-weight-bold text-start collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Details and Care
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0" aria-hidden="true"></i>
                                    </button>
                                </h6>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body text-sm opacity-8">
                                        <ul>
                                            <li>Storm and midnight-blue stretch cotton-blend</li>
                                            <li>Notch lapels, functioning buttoned cuffs, two front flap pockets, single vent, internal pocket</li>
                                            <li>Two button fastening</li>
                                            <li>84% cotton, 14% nylon, 2% elastane</li>
                                            <li>Dry clean</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6 mt-lg-0 mt-2">
                                <label class="ms-0">Select Color</label>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-material" id="choices-material" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Black</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Black</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-material-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 1" data-select-text="" data-choice-selectable="" aria-selected="true">Black</div><div id="choices--choices-material-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 2" data-select-text="" data-choice-selectable="">Blue</div><div id="choices--choices-material-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 4" data-select-text="" data-choice-selectable="">Brown</div><div id="choices--choices-material-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 3" data-select-text="" data-choice-selectable="">Gray</div></div></div></div>
                            </div>
                            <div class="col-lg-6 mt-lg-0 mt-2">
                                <label class="ms-0">Select Size</label>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-colors" id="choices-colors" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Small</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Small</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-colors-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 2" data-select-text="" data-choice-selectable="" aria-selected="true">Extra Small</div><div id="choices--choices-colors-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 4" data-select-text="" data-choice-selectable="">Large</div><div id="choices--choices-colors-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="" data-choice-selectable="">Medium</div><div id="choices--choices-colors-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 1" data-select-text="" data-choice-selectable="">Small</div><div id="choices--choices-colors-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 5" data-select-text="" data-choice-selectable="">XXL</div></div></div></div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 ms-auto">
                                <button class="btn bg-gradient-primary mb-0 mt-lg-auto w-100" type="button" name="button">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
