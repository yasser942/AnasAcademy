        @if ($errors->any())
            <div >


                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mg-b-0" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Oh snap!</strong> {{$error}}
                        </div>


                    @endforeach
                </ul>
            </div>
        @endif
