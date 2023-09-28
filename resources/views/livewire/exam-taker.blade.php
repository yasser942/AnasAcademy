<div>
    <style>
        .modal-body {
            max-height: 400px; /* Set the desired max height */
            overflow-y: auto; /* Enable vertical scrollbar */
        }
    </style>
    @if(count($questions) > 0)
        <h1>{{ $exam->title }}</h1>

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
                <button type="submit" class="btn btn-success-gradient btn-block" data-toggle="modal" data-target="#solvedQuestionsModal">أرسل للتصحيح</button>
            </div>
        </form>
        <h4 class="text-primary mr-2"><span class="badge badge-primary">الأجوبةالصحيحة: {{ $correctCount }} / {{ count($questions) }}</span></h4>

    @else
        <div class="card-body text-center">
            <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
            <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
        </div>
    @endif
    <div>
        <!-- Your exam submission form and other content -->

        <!-- Modal -->
        @if($showModal)
            <div class="modal show" style="display: block;" id="examSolvedModal" tabindex="-1" role="dialog" aria-labelledby="examSolvedModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="examSolvedModalLabel">الأسئلة المحلولة ({{ $correctCount }} / {{ count($questions) }})</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$set('showModal', false)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Display the solved questions here -->
                            @foreach($questions as $index => $question)
                                <div class="card mt-4 p-4">
                                    <p>{{ $index + 1 }}. {{ $question['question'] }}</p>
                                    @foreach($question['options'] as $optionIndex => $optionText)
                                        @if($optionIndex !== 'correct')
                                            <label>
                                                <input type="radio" wire:model="userAnswers.{{ $index }}" value="{{ $optionIndex }}" disabled>
                                                {{ $optionText }}
                                            </label>
                                        @endif
                                    @endforeach
                                    @if($showCorrectAnswers && $userAnswers[$index] != $question['options']['correct'])
                                        <p class="text-danger">الإجابة الصحيحة: {{ $question['options'][$question['options']['correct']] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('exam.show',$exam->id)}}" class="btn btn-primary-gradient" >إعادة الامتحان</a>

                            <a type="button" class="btn btn-secondary-gradient text-white" data-dismiss="modal" wire:click="$set('showModal', false)">إغلاق</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show" wire:click="$set('showModal', false)"></div>
        @endif
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.hook('element.updating', (fromEl, toEl, component) => {
                // Check if the showModal property has changed
                if (component.showModal) {
                    $('#examSolvedModal').modal('show');
                } else {
                    $('#examSolvedModal').modal('hide');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
            @this.set('showModal', false);
            }
        });
    </script>
</div>

