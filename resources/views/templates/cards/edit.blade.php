
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('card.update',$card->id)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="word_category_id" value="{{$card->word_category_id}}">


            <div class="form-group">
                    <label for="exampleInputEmail1">الكلمة  بالتركية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="الكلمة باللغة التركية" name="word" value="{{$card->word}}">
                </div>
            <div class="form-group">
                <label for="exampleInputEmail1">الترجمة بالعربية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="الترجمة بالعربية" name="word_translation" value="{{$card->word_translation}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">الجملة بالتركية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="الجملة بالتركية" name="sentence" value="{{$card->sentence}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">الجملة بالعربية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="الجملة بالعربية" name="sentence_translation" value="{{$card->sentence_translation}}">
            </div>
            <div class="form-group">
                <label for="audio_file">حمل الملف الصوتي</label>
                <input type="file" name="audio" id="audio_file" class="form-control-file" accept="audio/*">
                @if($card->audio)
                    <audio controls>
                        <source src="{{ Storage::url('audio/' . $card->audio) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                @endif
            </div>





            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث الكرت</button>

        </form>
    </div>


@endsection


