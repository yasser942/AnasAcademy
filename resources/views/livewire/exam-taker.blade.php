<div>
    <h1>{{ $exam->title }}</h1>
    @if(count($questions) > 0)
        <form wire:submit.prevent="submitExam">

            @foreach ($questions as $index => $question)
                <div class="card mt-4 p-4">
                    <p>{{ $index + 1 }}. {{ $question['question'] }}</p>
                    @foreach ($question['options'] as $optionIndex => $optionText)
                        @if ($optionIndex !== 'correct')
                            <label>
                                <input type="radio" wire:model="userAnswers.{{ $index }}" value="{{ $optionIndex }}" required>
                                {{ $optionText }}
                            </label>
                        @endif
                    @endforeach
                    @if ($showCorrectAnswers)
                        @if ($userAnswers[$index] != $question['options']['correct'])
                            <p class="text-danger">الجواب الصحيح : {{ $question['options'][$question['options']['correct']] }}</p>
                        @endif
                    @endif
                    @if(auth()->user()->isAdmin())

                    <div class="row  "  >
                       <button  wire:click="deleteQuestion({{ $index }})" class="btn btn-danger m-2">حذف السؤال</button>


                   </div>
                     @endif







                </div>
            @endforeach

            <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                <button type="submit" class="btn btn-success-gradient btn-block">أرسل للتصحيح</button>
            </div>
        </form>
        <h4 class="text-primary mr-2"><span class="badge badge-primary">الأجوبةالصحيحة: {{ $correctCount }} / {{ count($questions) }}</span></h4>

    @else
        <div class="card-body text-center">
            <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
            <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
        </div>
    @endif
</div>
