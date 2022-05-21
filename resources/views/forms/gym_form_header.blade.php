<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <img
                    @if(isset($gym))
                        src="{{Storage::url($gym->cover_image)}}"

                    @else
                        src="{{Storage::url(env('DEFAULT_GYM_LOGO'))}}"
                    @endif

                    class="rounded-circle mt-5" alt="User Image"
                    style="width: 200px;height: 200px">

                <span class="font-weight-bold"></span>
                <span class="text-black-50"></span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i
                            class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>Back to home</h6>
                    </div>

                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
