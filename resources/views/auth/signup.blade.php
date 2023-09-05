@include('templates.components.head')

<body class="main-body app sidebar-mini">

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
											<div class="mb-5 d-flex"> <a href="index.html"><img src="../../assets/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 mr-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
											<div class="main-signup-header">
												<h2 class="text-primary">أهلا بك !</h2>
												<h5 class="font-weight-normal mb-4">إنشاء حساب مجاني لا يستغرق دقيقة .</h5>
                                                <form method="POST" action="{{ route('register') }}" >
                                                    @csrf
													<div class="form-group">
														<label>الاسم الكامل</label> <input class="form-control" placeholder="أدخل الاسم الكامل" type="text" name="name" required value="{{old('name')}}">
													</div>
													<div class="form-group">
														<label>الإيميل</label> <input class="form-control" placeholder="أدخل الإيميل الخاص بك" type="text" name="email" required value="{{old('email')}}">
													</div>
													<div class="form-group">
														<label>كلمة المرور</label> <input class="form-control" placeholder="أدخل كلمة مرور" type="password" name="password" required>
													</div>

                                                    <div class="form-group">
                                                        <label>تأكيد كلمة المرور</label> <input class="form-control" placeholder="أعد كتابة كلمة المرور" type="password" name="password_confirmation" required>
                                                    </div><button type="submit" class="btn btn-main-primary btn-block">إنشاء حساب</button>

												</form>
												<div class="main-signup-footer mt-5">
													<p>لديك حساب مسبقاً؟ <a href="{{route('login')}}">تسجيل الدخول</a></p>
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
