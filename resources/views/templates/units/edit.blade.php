<!---Internal Fileupload css-->
<link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

<!---Internal Fancy uploader css-->
<link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@extends('templates.components.index')

@section('content')

    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('unit.update',$unit->id)}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="level_id" value="{{$unit->level_id}}">

            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الوحدة" name="name" value="{{$unit->name}}">
            </div>
            <div class="form-group">
                <label for="Textarea">الوصف</label>
                <textarea class="form-control" placeholder="وصف الوحدة" rows="3" name="description" > {{$unit->description}}</textarea>
            </div>
            <div class="form-group">
                <p class="mg-b-10">حالة الوحدة</p>
                <select class="form-control select2-no-search" name="status">
                    <option value="{{$unit->status}}">
                        {{$unit->status=='active'? 'مفعل':'غير مفعل'}}
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

            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث الوحدة</button>

        </form>
    </div>


@endsection


