
@extends('templates.components.index')

@section('content')
    @include('templates.components.validation-messages')
    <div class="card-body pt-0">
        <form  method="POST" action="{{route('plan.store')}}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="اسم الخطة" name="name">
                </div>
            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" class="form-control" id="price" placeholder="السعر" name="price">
            </div>
            <div class="form-group">
                <label for="duration_in_days">المدة بالأيام</label>
                <input type="number" class="form-control" id="duration_in_days" placeholder="المدة بالأيام" name="duration_in_days">
            </div>
                <div class="form-group">
                    <label for="Textarea"></label>
                    <textarea class="form-control" placeholder="وصف الخطة" rows="3" name="description"></textarea>
                </div>

            <button onclick="showLoader();" type="submit" class="btn btn-primary mt-3 mb-0">إنشاء الخطة</button>

        </form>
    </div>


@endsection


