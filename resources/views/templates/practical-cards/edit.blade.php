
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('practical-card.update',$practicalCard->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم المجموعة" name="name" value="{{$practicalCard->name}}">
            </div>
            <div class="form-group">
                <label for="link">الاسم</label>
                <input type="text" class="form-control" id="link" placeholder="اسم المجموعة" name="link" value="{{$practicalCard->link}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف المجموعة" rows="3" name="description" > {{$practicalCard->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة المجموعة</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$practicalCard->status}}">
                        {{$practicalCard->status=='active'? 'مفعل':'غير مفعل'}}
                    </option>
                    <option value="active">
                        مفعل
                    </option>
                    <option value="passive">
                        غير مفعل
                    </option>

                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث المجموعة</button>

        </form>
    </div>


@endsection


