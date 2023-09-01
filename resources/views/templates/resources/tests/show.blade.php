@extends('templates.components.index')

@section('content')
    @if(session('success'))

        <script>


            // Automatically trigger the function when the page loads
            window.onload = function() {
                not7('نجاح ', "{{session('success')}}");
            };
        </script>
    @endif

    <div class="row row-xs wd-xl-80p">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('question.create',$test->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء أسئلة</a></div>
    </div>

    <div class="row mt-4">
        @if(count($test->questions)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($test->questions as $question)
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    Custom Checkbox/Radio Validation
                                </div>
                                <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                                <form action="form-validation.html" data-parsley-validate="">
                                    <p class="mg-b-10">What is your favorite browser? <span class="tx-danger">*</span></p>
                                    <div class="parsley-checkbox" id="cbWrapper">
                                            @foreach($question->options as $option)
                                                <label class="ckbox mg-b-5"><input data-parsley-class-handler="#cbWrapper" data-parsley-errors-container="#cbErrorContainer" data-parsley-mincheck="1" name="browser[]" required="" type="checkbox" value="1"><span>{{$option}}</span></label>

                                            @endforeach


                                    </div>
                                    <div id="cbErrorContainer"></div>
                                    <div class="mg-t-20">
                                        <button class="btn btn-main-primary pd-x-20" type="submit" value="5">Validate Form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            @endforeach
        @endif
    </div>




@endsection
