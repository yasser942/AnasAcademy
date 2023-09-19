
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('pdf.update',$pdf->id)}}">
            @csrf
            @method('PUT')
                <input type="hidden" name="lesson_id" value="{{$pdf->lesson_id}}">
            <input type="hidden" name="type" value="{{$pdf->type}}">

            <input type="hidden" name="type" value="pdf">

            <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم المصدر" name="name" value="{{$pdf->name}}">
                </div>
                <div class="form-group">
                    <label for="Textarea">الوصف</label>
                    <textarea class="form-control" placeholder="وصف المصدر" rows="3" name="description" >{{$pdf->description}}</textarea>
                </div>
            <label for="exampleInputEmail2">رابط الملف</label>
            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="رابط الملف" name="link" value="{{$pdf->link}}">

            <div class="form-group" >
                    <p class="mg-b-10">حالة المصدر</p>
            <select class="form-control select2-no-search" name="status">
                        <option value="{{$pdf->status}}">
                            {{$pdf->status}}
                        </option>
                        <option value="active">
                            مفعل
                        </option>
                        <option value="passive">
                            غير مفعل
                        </option>

                    </select>
                </div>


            <button type="submit" class="btn btn-primary mt-3 mb-0">تحديث المصدر</button>

        </form>
    </div>


@endsection


