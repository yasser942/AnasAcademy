
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('unit.store')}}">
            @csrf
                <input type="hidden" name="level_id" value="{{$level->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الوحدة" name="name">
                </div>
                <div class="form-group">
                    <label for="Textarea">الوصف</label>
                    <textarea class="form-control" placeholder="وصف الوحدة" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <p class="mg-b-10">حالة الوحدة</p><select class="form-control select2-no-search" name="status">
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


            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">إنشاء الوحدة</button>

        </form>
    </div>


@endsection


