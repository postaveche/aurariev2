<div class="header_block">
    <div class="row w-100 d-flex">
        <div class="col-sm-4 col-xs-1 header_item">
            <div class="header_small_button">
                <span class="header_link"><a href="https://www.facebook.com/aurarie.vs.md/" target="_blank"
                                             title="AURARIE Facebook"><i class="bi bi-facebook"></i></a></span>
                <span class="header_link"><a href="https://www.instagram.com/aurarie.vs/" target="_blank"
                                             title="AURARIE Instagram"><i class="bi bi-instagram"></i></a></span>
            </div>
        </div>
        <div class="col-sm-4 col-xs-1 header_item">
            <a href="/"><img class="header_img" src="/images/logo_aurarie.png" alt="Aurarie.MD"/></a>
        </div>
        <div class="col-sm-4 col-xs-1 header_item">
            <div class="header_small_button">
                <div class="header_link"><i class="bi bi-heart"></i></div>
                @guest()
                    <div class="header_link"><a href="/login"><i class="bi bi-people-fill"></i></a></div>
                @else
                    <div class="header_link dropdown">
                        <button class="dropbtn" onclick="userMenu()"><i onclick="userMenu()"
                                                                        class="bi bi-people-fill"></i> {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            @if(Auth::user()->role == '1')
                                <a href="/admincp">Admin</a>
                            @endif
                            <a href="/home">Profil</a>
                            <a href="/orders">Comenzi</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
                <div class="header_link"><a href="/cart"><i class="bi bi-bag-heart-fill"></i></a>
                    @php
                        if (auth()->check()){
                            $card_count = App\Http\Controllers\CartController::cart_count(\Illuminate\Support\Facades\Auth::user()->id);
                            }
                    @endphp
                    @if(auth()->check() and $card_count > 0)
                        <span class="cart_count">
                   {{$card_count}}
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('block.top_nav')
<div class="header_black_line">
    @include('block.category_nav')
</div>
