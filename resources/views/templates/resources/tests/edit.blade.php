
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('test.update',$test->id)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="lesson_id" value="{{$test->lesson_id}}">

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الاختبار" name="name" value="{{$test->name}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف الاختبار" rows="3" name="description" > {{$test->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة الاختبار</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$test->status}}">
                        {{$test->status=='active'? 'مفعل':'غير مفعل'}}
                    </option>
                    <option value="active">
                        مفعل
                    </option>
                    <option value="passive">
                        غير مفعل
                    </option>

                </select>
            </div>


            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">تحديث الاختبار</button>

        </form>
    </div>


@endsection


