@extends('layouts.frontend')
@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">  مستخدم جديد</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active">دخول</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>تسجيل عميل</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>تسجيل  تاجر</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('frontend.register_customer') }}" method="post">
                                            @csrf
                                            <input type="text" name="name" placeholder="اسم المستخدم" />
                                            <input type="password" name="password" placeholder="كلمة المرور" />
                                            <input name="email" placeholder="البريد الالكتروني" type="email" />
                                            <select id="country-select" name="country_id" ng-options="country.name for country in countriesWithPhoneCode" class="ng-pristine ng-valid ng-touched" fdprocessedid="zzeu6">
                                                <option value="" class="" selected="selected">الدولة                                    </option>
                                                <option value="6">السعوديه</option>
                                            </select>
                                            <input type="text" name="phone" placeholder="رقم الهاتف" />
                                            <div class="button-box">
                                            <button type="submit"><span>تسجيل</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('frontend.register_seller') }}" method="post">
                                        @csrf
                                            <input type="text" name="name" placeholder="اسم المستخدم" />
                                            <input type="password" name="password" placeholder="كلمة المرور" />
                                            <input name="email" placeholder="البريد الالكتروني" type="email" />
                                            <select id="country-select" name="country_id" ng-options="country.name for country in countriesWithPhoneCode" class="ng-pristine ng-valid ng-touched" fdprocessedid="zzeu6">
                                                <option value="" class="" selected="selected">الدولة </option>
                                                <option value="6">السعوديه</option>
                                            </select>
                                            <input type="text" name="phone" placeholder="رقم الهاتف" />
                                            <input type="text" name="user-name" placeholder="اسم المتجر عربي" />
                                            <input type="text" name="user-name" placeholder=" اسم المتجر انجليزي" />
                                            <div class="button-box">

                                                <button type="submit"><span>تسجيل</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection