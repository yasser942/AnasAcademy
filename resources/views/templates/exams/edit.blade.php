
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('exam.update',$exam->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الامتحان" name="name" value="{{$exam->name}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف الامتحان" rows="3" name="description" > {{$exam->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">مستوى الامتحان</p><select class="form-control select2-no-search" name="level">
                    <option value="{{$exam->level}}">
                        {{$exam->level}}
                    </option>
                    <option value="A1">
                        A1
                    </option>
                    <option value="A2">
                        A2
                    </option>
                    <option value="B1">
                        B1
                    </option>
                    <option value="B2">
                        B2
                    </option>
                    <option value="C1">
                        C1
                    </option>
                    <option value="C2">
                        C2
                    </option>


                </select>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة الامتحان</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$exam->status}}">
                        {{$exam->status=='active'? 'مفعل':'غير مفعل'}}
                    </option>
                    <option value="active">
                        مفعل
                    </option>
                    <option value="passive">
                        غير مفعل
                    </option>

                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث الامتحان</button>

        </form>
    </div>


@endsection


