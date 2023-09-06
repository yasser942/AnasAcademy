@extends('templates.components.index')

@section('content')
@include('templates.components.session-messages')
    <div class="row row-xs wd-xl-80p">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0 mb-4"><a href="{{route('card.create',$category->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء كرت جديد</a></div>
    </div>
    @if ($category->cards->count() == 0)
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
                                @foreach($category->cards as $card)
                                    @if($loop->first)
                                        <div class="carousel-item active">
                                            <div class="panel price panel-color">
                                                <div class="badge bg-success text-white m-2 ">جديد</div>
                                                <div class="panel-heading bg-primary p-0 text-center">
                                                    <h3>{{$card->word}}</h3>
                                                </div>
                                                <div class="panel-body text-center">
                                                    <p class="lead"><strong>{{$card->word_translation}}</strong>  </p>
                                                </div>
                                                <ul class="list-group list-group-flush text-center">
                                                    <li class="list-group-item"> {{$card->sentence}}</li>
                                                    <li class="list-group-item"> {{$card->sentence_translation}}</li>


                                                </ul>
                                                <div class="panel-footer text-center">
                                                    <p class="text-success" >{{$loop->index+1}}/{{$category->cards->count()}}</p>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                           <form method="POST" action="{{route('card.delete',$card->id)}}" class="ml-2">
                                                               @csrf
                                                               @method('DELETE')
                                                               <button class="btn btn-danger" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                                   <i class="fa fa-trash"></i> حذف
                                                               </button>
                                                              </form>


                                                        </div>
                                                        <div class="col-md-4">
                                                            <a class="btn btn-warning" href="{{route('card.edit',$card->id)}}">
                                                                <i class="fa fa-edit"></i> تعديل
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @livewire('favorite', ['cardId' => $card->id])

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <div class="panel price panel-color">
                                                <div class="badge bg-success text-white m-2 ">جديد</div>
                                                <div class="panel-heading bg-primary p-0 text-center">
                                                    <h3>{{$card->word}}</h3>
                                                </div>
                                                <div class="panel-body text-center">
                                                    <p class="lead"><strong>{{$card->word_translation}}</strong>  </p>
                                                </div>
                                                <ul class="list-group list-group-flush text-center">
                                                    <li class="list-group-item"> {{$card->sentence}}</li>
                                                    <li class="list-group-item"> {{$card->sentence_translation}}</li>


                                                </ul>
                                                <div class="panel-footer text-center">
                                                    <p class="text-success" >{{$loop->index+1}}/{{$category->cards->count()}}</p>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <form method="POST" action="{{route('card.delete',$card->id)}}" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                                    <i class="fa fa-trash"></i> حذف
                                                                </button>
                                                            </form>


                                                        </div>
                                                        <div class="col-md-4">
                                                            <a class="btn btn-warning" href="{{route('card.edit',$card->id)}}">
                                                                <i class="fa fa-edit"></i> تعديل
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @livewire('favorite', ['cardId' => $card->id])

                                                        </div>                                                    </div>
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

@endsection
