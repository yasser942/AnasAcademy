
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('level.store')}}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="curriculum_id" value="{{$curriculum->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم المستوى" name="name">
                </div>
                <div class="form-group">
                    <label for="Textarea">الوصف</label>
                    <textarea class="form-control" placeholder="وصف المستوى" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <p class="mg-b-10">حالة المستوى</p><select class="form-control select2-no-search" name="status">
                        <option label="اختر من القائمة">
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

                     <input type="file" class="dropify" data-default-file="../../assets/img/photos/1.jpg" data-height="200" required name="image" />
                 </div>
             </div>

            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">إنشاء المستوى</button>

        </form>
    </div>


@endsection


