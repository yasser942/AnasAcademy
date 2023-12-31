@include('templates.components.head')
@include('templates.components.session-messages')
	<body class="main-body bg-light">

		<!-- Loader -->
		<div id="global-loader">
			<img src="../../assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">
			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2 class="text-primary">أهلا بكم في أكاديمية أنس</h2>
													<h5 class="font-weight-semibold mb-4">الرجاء إدخال الإيميل وكلمة المرور</h5>
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="form-group">
															<label>الإيميل</label> <input class="form-control" placeholder="أدخل الإيميل الخاص بك" type="text" name="email" value="{{old('email')}}">
                                                            @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
														</div>
														<div class="form-group">
															<label>كلمة المرور</label> <input class="form-control" placeholder="أدخل كلمة المرور الخاص بك" type="password" name="password">
                                                            @error('password')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
														</div>
                                                        <div class="checkbox mb-4">
                                                            <div class="custom-checkbox custom-control">

                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2" name="remember">
                                                                <label for="checkbox-2" class="custom-control-label mt-1">تذكرني</label>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary-gradient btn-block">تسجيل الدخول</button>

													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="{{route('password.email')}}">نسيت كلمة المرور ؟</a></p>
														<p>ليس لديك حساب ؟ <a href="{{route('register')}}">إنشاء حساب جديد</a></p>
													</div>
												</div>
											</div>

									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>

		</div>
		<!-- End Page -->

		@include('templates.components.js')

	</body>
</html>
