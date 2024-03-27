<!-- Start box__dashboard -->
<section class="box__dashboard">
    <div class="group">
        <div class="item_link">
            <div class="icon bg-green text-white">
                Rp.
            </div>
            <div class="txt">
                <p>Capaian</p>
                <span id="capaian"></span>
            </div>
        </div>
        <div class="item_link">
            <div class="icon bg-yellow">
                <i class="ri-user-2-line"></i>
            </div>
            <div class="txt">
                <p>Canvaser</p>
                <span id="canvaser"></span>
            </div>
        </div>
    </div>
    <div class="group">
        <div class="item_link">
            <div class="icon bg-red">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

            </div>
            <div class="txt">
                <p>Jumlah Box</p>
                <span id="jumlah_box"></span>
            </div>
        </div>
        <div class="item_link">
            <div class="icon bg-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>

            </div>
            <div class="txt">
                <p>Program</p>
                <span id="program"></span>
            </div>
        </div>
    </div>
</section>
<!-- End. box__dashboard -->

<section class="mt-3" style="">
    <div class="swiper margin-l-20 margin-r-20" style="height:200px; overflow-x: hidden; border-radius: 10px;">
        <div class="swiper-wrapper">

        </div>
        <!-- <div class="program-swiper-pagination"></div> -->
    </div>
</section>

<section>
    <div class="padding-20">
        <span class="size-12 text-uppercase color-text d-block">settings</span>
    </div>

    <div class="em__pkLink emBlock__border bg-white border-t-0">
        <ul class="nav__list mb-0">
            <li>
                <a data-toggle="modal" data-target="#modal_history" class="item-link" id="history_btn">
                    <div class="group">
                        <div class="icon bg-purple">
                            <i class="ri-history-line"></i>
                        </div>
                        <span class="path__name">Riwayat</span>
                    </div>
                    <div class="group">
                        <i class="tio-chevron_right -arrwo"></i>
                    </div>
                </a>
            </li>
            <!-- <li>
                <a href="page-notification.html" class="item-link">
                    <div class="group">
                        <div class="icon bg-orange">
                            <i class="ri-notification-2-line"></i>
                        </div>
                        <span class="path__name">Notifikasi</span>
                    </div>
                    <div class="group">
                        <span class="short__name"></span>
                        <i class="tio-chevron_right -arrwo"></i>
                    </div>
                </a>
            </li>
            <li>
                <a href="page-notification.html" class="item-link">
                    <div class="group">
                        <div class="icon bg-secondary">
                            <i class="ri-information-line"></i>
                        </div>
                        <span class="path__name">Tentang Aplikasi</span>
                    </div>
                    <div class="group">
                        <span class="short__name"></span>
                        <i class="tio-chevron_right -arrwo"></i>
                    </div>
                </a>
            </li> -->
        </ul>
    </div>
</section>

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal_history" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable height-full">
        <div class="modal-content rounded-0">
            <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                <div class="itemProduct_sm">
                    <h1 class="size-18 weight-600 color-secondary m-0">Riwayat Kolektif</h1>
                </div>
                <div class="absolute right-0 padding-r-20">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body p-0">
                <div class="em__pkLink emBlock__border bg-white border-t-0">
                    <ul class="nav__list mb-0 history-list">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>