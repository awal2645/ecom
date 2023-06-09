@php
$data = App\Models\FrontnendSetting::all()->first();
$socialAccounts = App\Models\SocialAccount::all();
@endphp
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img src="{{$data->logo}}" alt=""></a>
                    </div>
                    <ul>
                       
                        {{-- <li>{{ GoogleTranslate::trans('Address', app()->getLocale()) }}:{{ GoogleTranslate::trans($data->address, app()->getLocale()) }}
                        </li>
                        <li>{{ GoogleTranslate::trans('Phone', app()->getLocale()) }}:{{ GoogleTranslate::trans($data->tel, app()->getLocale()) }}
                        </li>
                        <li>{{ GoogleTranslate::trans('Email', app()->getLocale()) }}:{{ GoogleTranslate::trans($data->email, app()->getLocale()) }}
                        </li> --}}
                        <li>Address:{{ $data->address }}</li>
                        <li>Phone:{{ $data->tel}}</li>
                        <li>Email:{{ $data->email }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    {{-- <h6> {{ GoogleTranslate::trans('Join Our Newsletter Now', app()->getLocale()) }}</h6>
                    <p> {{ GoogleTranslate::trans('Get E-mail updates about our latest shop and special offers.', app()->getLocale()) }}</p> --}}
                    <h6> Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="{{ route('news.letter') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your mail" required>
                        @error('email')
                        <p class=" text-danger" role="alert">
                            {{ $message }}
                        </p>
                    @enderror
                        {{-- <button type="submit" class="site-btn"> {{ GoogleTranslate::trans('Subscribe', app()->getLocale()) }}</button> --}}
                        <button type="submit" class="site-btn"> Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        @foreach ($socialAccounts as $socialAccount)
                            <a href="{{ $socialAccount->link }}"><i class="{{ $socialAccount->icon_name }}"></i></a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            {{-- {{ GoogleTranslate::trans('All rights reserved | This template is made with', app()->getLocale()) }} --}}
                            All rights reserved | This template is made with
                            <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
