@extends('layouts.app')

@section('content')
    <x-header/>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center pt-5 pb-5">
                <div class="col-lg-2 col-xl-13">
                    <div class="formCard text-black h-100" style="border-radius: 25px;">
                        <div class="card-body p-md-4">
                            <div class="card1">
                                <ul id="progress-bar" class="text-center">
                                    <li class="active step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                    <li class="step0"></li>
                                </ul>
                                <h6>Help</h6>
                                <h6>Step 1</h6>
                                <h6>Step 2</h6>
                                <h6>Step 3</h6>
                                <h6>Step 4</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-xl-13">
                    <div class="formCard text-black" style="border-radius: 25px;">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <!-- Początek ekranu powitalnego -->
                            <div class="card2 step1 show">
                                <div class="card-header">
                                    <div class="row">
                                        <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                        <div class="col">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Help</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-md-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">How to create a good announcement?
                                            </p>
                                            <p class="text-center h4 mb-3 mx-1 mx-md-2 mt-1">Every detail is important! 
                                                Example: Imagine having appointment with someone for a dog walking without mention that you have a Pitbull... <br>and someone came with York.<br>
                                                That could end up horribly!<br>
                                                The announcement must be well thought out and clear to avoid any misunderstandings.
                                                On every step we give you freedom in choice and the results will be yours alone - remember about this when you will describe it on the last step.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="quiz_next">
                                    <button class="quiz_continueBtn nextstep" type="button">Let's start!</button>
                                </div>
                            </div>
                            <!-- Koniec ekranu powitalnego -->
                            <!-- Poczatek ekranu 1 -->
                            <div class="card2">
                                <div class="card-header">
                                    <div class="row">
                                        <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                        <div class="col">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 1</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-md-4">
                                    <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Choose category</p>
                                    <div class="container">
                                        @php
                                            $lastType = '';
                                        @endphp
                                        @foreach ($categories as $type)
                                            @if ($type->categoryType != $lastType)
                                                <div class="accordion">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $type->id }}" aria-expanded="false" aria-controls="collapse{{ $type->id }}"><h4>{{ $type->categoryType }}</h4> </a>
                                                        </div>
                                                    </div>                                                                                                         
                                                    <div id="collapse{{ $type->id }}" class="collapse multi-collapse form-check">
                                                        @foreach ($categories->where('categoryType', $type->categoryType) as $category)
                                                            <div class="form-group form-check pl-4">
                                                                <input type="checkbox" class="form-check-input file_checkbox" name="categoryCheck[]" id="{{ $category->id }}" value="{{ $category->id }}">
                                                                <label class="form-check-label"> {{ $category->categoryName }}</label>
                                                            </div>  
                                                        @endforeach                                                             
                                                    </div>                                                                                                     
                                                </div>
                                            @endif
                                            @php
                                                $lastType = $type->categoryType;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>
                                <div class="quiz_next">
                                    <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                                </div>
                            </div>
                            <!-- Koniec ekranu 1 -->

                            <!-- Początek ekranu drugiego -->
                            <div class="card2">
                                <div class="card-header">
                                    <div class="row">
                                        <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                        <div class="col">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 2</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-md-4">
                                    <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Amount of people you want to
                                        envolved</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="quiz_card_area">
                                                    <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                        id="1" value="1" />
                                                    <div class="single_quiz_card">
                                                        <div class="quiz_card_content">
                                                            <div class="quiz_card_icon">
                                                                <img src="https://img.freepik.com/premium-vector/bearded-man-smiling-showing-thumbs-up-sign-guy-with-gesture-meaning-approval-okay-like_316839-1218.jpg?w=826" class="img-fluid"/>
                                                            </div>
                                                            <div class="quiz_card_title">
                                                                <h4>1</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="quiz_card_area">
                                                    <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                        id="2" value="2" />
                                                    <div class="single_quiz_card">
                                                        <div class="quiz_card_content">

                                                            <div class="quiz_card_icon">
                                                                <img
                                                                    src="https://img.freepik.com/free-vector/happy-friendly-women-talking-outside-female-friends-accidental-meeting-flat-vector-illustration-communication-public-place_74855-13109.jpg?w=2000" />
                                                            </div>

                                                            <div class="quiz_card_title">
                                                                <h4>2</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="quiz_card_area">
                                                    <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                        id="3" value="3" />
                                                    <div class="single_quiz_card">
                                                        <div class="quiz_card_content">
                                                            <div class="quiz_card_icon">
                                                                <img
                                                                    src="https://img.freepik.com/darmowe-wektory/zbior-ludzi-patrzacych-w-gore_23-2148990806.jpg?t=st=1665581146~exp=1665581746~hmac=e663a7fcdb5f071bd7e6f41f354e74c804bd4b35adcc61b52ef5a37d2d09f4fe" />
                                                            </div>
                                                            <div class="quiz_card_title">
                                                                <h4>3</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="quiz_card_area">
                                                    <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                        id="4" value="999" />
                                                    <div class="single_quiz_card">
                                                        <div class="quiz_card_content">

                                                            <div class="quiz_card_icon">
                                                                <img
                                                                    src="https://img.freepik.com/free-vector/group-people-illustration-collection_52683-33805.jpg?w=1380&t=st=1665579718~exp=1665580318~hmac=8c0213d714b091380f965118dd63eb49e3e2b491fddcae956edfc676fcb9375d" />
                                                            </div>

                                                            <div class="quiz_card_title">
                                                                <h4>>More than 3</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="quiz_card_area">
                                                    <input class="quiz_checkbox" type="radio" name="amountPeople"
                                                        id="5" value="999" />
                                                    <div class="single_quiz_card">
                                                        <div class="quiz_card_content">

                                                            <div class="quiz_card_icon">
                                                                <img
                                                                    src="https://img.freepik.com/free-vector/business-multinational-character-team-different-pose-diverse-office-worker-people-set-standing_90220-503.jpg?w=1380&t=st=1665580633~exp=1665581233~hmac=4270292ae9f32bced7b6e48d22371498bd6f5e552fc10f6f80d258c75a46f15b" />
                                                            </div>

                                                            <div class="quiz_card_title">
                                                                <h4>>Any</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz_next">
                                    <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                                </div>

                            </div>
                            <!-- Koniec ekranu drugiego -->

                            <!-- Początek ekranu trzeciego -->
                            <div class="card2">
                                <div class="card-header">
                                    <div class="row">
                                        <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                        <div class="col">
                                            <p class="text-center h2 fw-bold mb-2 mx-1 mx-md-2 mt-1">Step 3</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body p-md-4">
                                    <p class="text-center h3 fw-bold mb-3 mx-1 mx-md-2 mt-1">Choose localization</p>
                                    <div class="row">
                                        <div class="col" style="border-right: 5px dotted #bbb; border-radius:5px;">
                                            <div class="form-group">
                                                <img src="https://img.freepik.com/free-vector/tiny-people-using-mobile-application-with-map-outdoors_74855-7881.jpg?w=1380&t=st=1665697832~exp=1665698432~hmac=809399f6cc1eaaa8f3c82f2a40e4627249dddf79eaf1ea3fabe27128796b9b35"
                                                    class="img-fluid" alt="Sample image">
                                                <input type="text" id="address" class="form-control" name="address"
                                                    placeholder="Address" readonly>
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="hidden" id="latitude" name="latitude">
                                                <input type="hidden" id="longitude" name="longitude">
                                                <input class="quiz_localization" type="button" value="Choose Location"
                                                    onclick="Modal()">
                                            </div>
                                        </div>
                                        <div class="col align-self-start">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-check-label" for="date1">Date since</label>
                                                        <input type="date" id="date1" class="form-control"
                                                            min="{{ date('Y-m-d') }}" name="date">
                                                        <img
                                                            src="https://img.freepik.com/free-vector/illustration-calendar-icon_53876-5588.jpg?w=826&t=st=1665699177~exp=1665699777~hmac=408590667928e396b0be3765548edc8c37629b7731797ef52e18b47b0d8c1f36">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="oneDay" id="oneDay"
                                                                type="checkbox" onchange="dateDisabled()">
                                                            <label class="form-check-label" for="oneDay">This day
                                                                only</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="form-check-label" for="date2">Date for</label>
                                                    <input type="date" id="date2" class="form-control oneDay"
                                                        min="{{ date('Y-m-d') }}" name="date2">
                                                    <img
                                                        src="https://img.freepik.com/free-vector/illustration-calendar-icon_53876-5588.jpg?w=826&t=st=1665699177~exp=1665699777~hmac=408590667928e396b0be3765548edc8c37629b7731797ef52e18b47b0d8c1f36">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="quiz_next">
                                    <button class="quiz_continueBtn nextstep" type="button">Continue</button>
                                </div>
                            </div>
                            <!-- Koniec ekranu trzeciego -->

                            <!-- Początek ekranu czwartego -->
                            <div class="card2">
                                <div class="card-header">
                                    <div class="row">
                                        <p class="fas fa-arrow-left prevstep"><span>Return</span></p>
                                        <div class="col">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Step 4</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-md-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-2 mt-1">Describe your meeting!
                                            </p>
                                            <p class="text-center h4 mb-3 mx-1 mx-md-2 mt-1">Again remember about this: and
                                                this: XD</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="p-3">
                                            <textarea id="address" class="form-control" name="description" placeholder="Describe it..." rows="13"
                                                cols="45"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <button type="submit" class="quiz_continueBtn mt-5">Finish</button>
                                </div>
                            </div>
                            <!-- Koniec ekranu czwartego -->
                        </form>
                    </div>
                    <!--FormCard styling formy koniec  -->
                </div> <!-- Kolumna prawa koniec -->
            </div>
            <div class="modal fade" id="location-modal" tab-index="-1" role="dialog" aria-labelled="location-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="address-label">Choose Location</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i
                                    class="fa fa-check"></i>Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>

    $(document).ready(function(){

var step, nextstep, prevstep;

    if ($(".show").hasClass("step1")) {
        $(".prevstep").css({
            'display': 'none'
        });
    }

    $(".nextstep").click(function() {
        step = $(this).parent().parent();
        nextstep = $(this).parent().parent().next();
        $(".prevstep").css({
            'display': 'block'
        });
        $(step).removeClass("show");
        $(nextstep).addClass("show");

        $("#progress-bar li").eq($(".card2").index(nextstep)).addClass("active");

        step.animate({}, {
        step: function() {

            step.css({
        'display': 'none',
        'position': 'relative'
        });

        nextstep.css({
        'display': 'block'
        });
        }
        });
    });

    $(".prevstep").click(function() {
        step = $(".show");
        prevstep = $(".show").prev();
        $(step).removeClass("show");
        $(prevstep).addClass("show");
        $(".prevstep").css({
            'display': 'block'
        });
        if ($(".show").hasClass("step1")) {
            $(".prevstep").css({
                'display': 'none'
            });
        }

        $("#progress-bar li").eq($(".card2").index(step)).removeClass("active");

        
        step.animate({}, {
        step: function() {

            step.css({
        'display': 'none',
        'position': 'relative'
        });

        prevstep.css({
        'display': 'block'
        });
        }
        });
    });      



    window.dateDisabled = function() {
        if ($('input[name="oneDay"]').is(':checked')) {
            $(".oneDay").val("");
            $(".oneDay").prop('disabled', true);
        } else {
            $(".oneDay").prop('disabled', false);
        }
    }

var map, marker, geocode;
window.Modal = function() {
    $("#location-modal").modal('show');
    var location = new google.maps.LatLng(0, 0);
    var mapProperty = {
        center: location,
        zoom: 25,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapProperty);
    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: location
    });

    geocodePosition(marker.getPosition());

    google.maps.event.addListener(marker, 'dragend', function() {
        map.setCenter(marker.getPosition());
        geocodePosition(marker.getPosition());
        $("#latitude").val(marker.getPosition().lat());
        $("#longitude").val(marker.getPosition().lng());

    });
    currentLat = $("#latitude").val();
    currentLng = $("#longitude").val();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            $("#latitude").val(pos.lat);
            $("#longitude").val(pos.lng);
            marker.setPosition(pos);
            map.setCenter(marker.getPosition());
            geocodePosition(marker.getPosition());
        });
    }
}

window.geocodePosition = function (pos) {

    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
            latLng: pos
        },
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $("#address-label").html(results[0].formatted_address);
                $("#address").val(results[0].formatted_address);

            } else {
                $("#address-label").html('Cannot determine address at that location');
            }
        }
    );
}
});
</script>
@endpush