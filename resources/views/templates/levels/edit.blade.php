
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('level.update',$level->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="curriculum_id" value="{{$level->curriculum_id}}">

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم المستوى" name="name" value="{{$level->name}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف المستوى" rows="3" name="description" > {{$level->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة المستوى</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$level->status}}">
                        {{$level->status=='active'? 'مفعل':'غير مفعل'}}
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
                    @if($level->image)
                        <input type="file" class="dropify" data-default-file="{{Storage::url('levels/'.$level->image->filename)}}" data-height="200"  name="image"  />


                    @else
                        <img src="{{asset('assets/img/noimg.png')}}" alt="..." class="card-img">

                    @endif

                </div>
            </div>

            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">تحديث المستوى</button>

        </form>
    </div>


@endsection


