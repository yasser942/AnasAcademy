
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('lesson.update',$lesson->id)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="unit_id" value="{{$lesson->unit_id}}">

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الدرس" name="name" value="{{$lesson->name}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف الدرس" rows="3" name="description" > {{$lesson->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة الدرس</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$lesson->status}}">
                        {{$lesson->status=='active'? 'مفعل':'غير مفعل'}}
                    </option>
                    <option value="active">
                        مفعل
                    </option>
                    <option value="passive">
                        غير مفعل
                    </option>

                </select>
            </div>
            <div class="form-group">
                <div >
                    <label for="Textarea">الرجاء إدراج صورة</label>

                    <input type="file" class="dropify" data-default-file="../../assets/img/photos/1.jpg" data-height="200"  />
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث الدرس</button>

        </form>
    </div>


@endsection


