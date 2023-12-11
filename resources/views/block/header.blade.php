<div class="header_block justify-content-center row">
    <div class="header_item col-sm-4">
        <div class="header_small_button">
            <span class="header_link"><a href="https://www.facebook.com/aurarie.vs.md/" target="_blank" title="AURARIE Facebook"><i class="bi bi-facebook"></i></a></span>
            <span class="header_link"><a href="https://www.instagram.com/aurarie.vs/" target="_blank" title="AURARIE Instagram"><i class="bi bi-instagram"></i></a></span>
        </div>
    </div>
    <div class="header_item col-4 col-sm">
        <a href="/"><img class="header_img" src="/images/logo_aurarie.png" alt="Aurarie.MD"/></a>
    </div>
    <div class="header_item col-sm-4">
        <div class="header_small_button">
            <span class="header_link"><i class="bi bi-heart"></i></span>
            @guest()
            <span class="header_link"><a href="/login"><i class="bi bi-people-fill"></i></a></span>
            @else
                <div class="dropdown">
                    <a href="#" onclick="myFunction()" class="dropbtn"><i class="bi bi-people-fill"></i></a>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            @endguest
            <span class="header_link"><i class="bi bi-bag-heart-fill"></i></span>
        </div>
    </div>
</div>
@include('block.top_nav')
<div class="header_black_line">
    @include('block.category_nav')
</div>
