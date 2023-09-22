
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('lesson.store')}}">
            @csrf
                <input type="hidden" name="unit_id" value="{{$unit->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الدرس" name="name">
                </div>
                <div class="form-group">
                    <label for="Textarea">الوصف</label>
                    <textarea class="form-control" placeholder="وصف الدرس" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <p class="mg-b-10">حالة الدرس</p><select class="form-control select2-no-search" name="status">
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

                     <input type="file" class="dropify" data-default-file="../../assets/img/photos/1.jpg" data-height="200"  />
                 </div>
             </div>

            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">إنشاء الدرس</button>

        </form>
    </div>


@endsection


