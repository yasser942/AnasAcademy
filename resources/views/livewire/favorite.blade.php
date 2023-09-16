<div>


    @if ($cards->count() == 0)
        <div class="card-body text-center">
            <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
            <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
        </div>
    @else
        <div class="col-lg-6 col-md-6 mx-auto">
            <div class="card custom-card">
                <div class="card-body ht-100p">

                    <div>
                        <div class="carousel slide" data-ride="carousel" id="carouselExample2">
                            <div class="carousel-inner">
                                @foreach($cards as $card)
                                    @if($loop->first)
                                        <div class="carousel-item active">
                                            <div class="panel price panel-color">
                                                <div class="panel-heading bg-primary p-0 text-center">
                                                    <h3>{{$card->word}}</h3>
                                                </div>
                                                <div class="panel-body text-center">
                                                    <p class="lead"><strong>{{$card->word_translation}}</strong>  </p>
                                                </div>
                                                <ul class="list-group list-group-flush text-center">
                                                    <li class="list-group-item"> {{$card->sentence}}</li>
                                                    <li class="list-group-item"> {{$card->sentence_translation}}</li>
                                                    <li class="list-group-item">
                                                        <button class="btn btn-primary-gradient play-btn" data-audio-path="{{ Storage::url('audio/' . $card->audio) }}" onclick="playAudio(this)">
                                                            <i class="fa fa-play"></i>
                                                        </button>
                                                        <button class="btn btn-secondary-gradient pause-btn" onclick="pauseAudio()">
                                                            <i class="fa fa-pause"></i>
                                                        </button>
                                                    </li>

                                                </ul>
                                                <div class="panel-footer text-center">
                                                    <p class="text-success" >{{$loop->index+1}}/{{$cards->count()}}</p>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <div class="row ">

                                                        <div class="col-md-4 mx-auto">
                                                            <button wire:click="deleteFavorite({{$card->id}})" class="btn btn-primary-gradient">
                                                                إزالة من المفضلة
                                                            </button>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <div class="panel price panel-color">
                                                <div class="panel-heading bg-primary p-0 text-center">
                                                    <h3>{{$card->word}}</h3>
                                                </div>
                                                <div class="panel-body text-center">
                                                    <p class="lead"><strong>{{$card->word_translation}}</strong>  </p>
                                                </div>
                                                <ul class="list-group list-group-flush text-center">
                                                    <li class="list-group-item"> {{$card->sentence}}</li>
                                                    <li class="list-group-item"> {{$card->sentence_translation}}</li>
                                                    <li class="list-group-item">
                                                        <button class="btn btn-primary-gradient play-btn" data-audio-path="{{ Storage::url('audio/' . $card->audio) }}" onclick="playAudio(this)">
                                                            <i class="fa fa-play"></i>
                                                        </button>
                                                        <button class="btn btn-secondary-gradient pause-btn" onclick="pauseAudio()">
                                                            <i class="fa fa-pause"></i>
                                                        </button>
                                                    </li>

                                                </ul>
                                                <div class="panel-footer text-center">
                                                    <p class="text-success" >{{$loop->index+1}}/{{$cards->count()}}</p>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <div class="row ">

                                                        <div class="col-md-4 mx-auto">

                                                            <button wire:click="deleteFavorite({{$card->id}})" class="btn btn-primary-gradient">
                                                                إزالة من المفضلة
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif


                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample2" role="button" data-slide="prev">
                    <i class="fa fa-angle-left bg-danger fs-30" aria-hidden="true"></i>
                </a>
                <a class="carousel-control-next" href="#carouselExample2" role="button" data-slide="next">
                    <i class="fa fa-angle-right bg-danger fs-30" aria-hidden="true"></i>
                </a>
            </div>


            @endif
</div>
