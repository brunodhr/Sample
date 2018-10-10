<footer>
    <section style="padding-top:5rem;" class="footer footer-dark h-100">
        <div class="container">
            <div class="footer-sections">
                <div class="row">
                    <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                        <div class="footer-sections-contato">
                            <div class="footer-sections-item pb-5 text-center text-md-left">
                                <a href="/">
                                    <img class="img-fluid" src="{{asset('img/example-foto.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-xs-6 col-md-4 col-lg-3">
                        <div class="pl-5">
                            <div class="footer-sections-navegacao py-5 py-md-0">
                                <h4 class="title-sections-footer">Navegação</h4>
                                <div class="footer-sections-item">
                                    <ul style="list-style:none;">
                                        @foreach($items as $menu_item)
                                            <li>
                                                <a class="sub-sections-footer" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-xs-6 col-md-4 col-lg-3">
                        <div class="pl-5">
                            <div class="footer-sections-navegacao py-5 py-md-0">
                                <h4 class="title-sections-footer">Contato</h4>
                                <div class="footer-sections-item">
                                    <ul style="list-style:none;">
                                        <div class="mt-4 row">
                                            <div class="col-md-1">
                                                <i style="transform: rotate(-270deg);font-size:3rem;color:white;" class="fas fa-phone"></i> 
                                            </div>
                                            <div class="ml-2 col-md-10">
                                                <li class="sub-contact-footer">
                                                    (31) 99455-5364
                                                </li>
                                            </div>
                                        </div>
                                        <div class="mt-4 row">
                                            <div class="col-md-1">
                                                <i style="font-size:3rem;color:white;" class="fas fa-envelope"></i>
                                            </div>
                                            <div class="ml-2 col-md-10">
                                                <li class="sub-contact-footer">
                                                    brunofiliperamos@hotmail.com
                                                </li>
                                            </div>
                                        </div>

                                        <div class="mt-4 row">
                                            <div class="col-md-1">
                                                <i style="font-size:3rem;color:white;" class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <li class="d-flex sub-contact-endereco-footer">
                                                    Rua exemplo,100 - BH/MG
                                                </li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-xs-6 col-md-4 col-lg-3">
                        <div class="pl-5">
                            <div class="footer-sections-navegacao py-5 py-md-0">
                                <h4 class="title-sections-footer">Siga nos</h4>
                                <div class="footer-icons">
                                    <div class="container">
                                        <div class="contact-info col-md-12 col-lg-4">
                                            <span class="facebook">
                                                <a style="text-decoration:none;color:white;" target="_blank" href="{{setting('contato.facebook')}}">
                                                    <i class="icon-face fab fa-facebook-f"></i>
                                                </a>
                                            </span>
                                            <span class="instagram">
                                                <a style="text-decoration:none;color:white;" target="_blank" href="{{setting('contato.instagram')}}">
                                                    <i class="icons-sociais fab fa-instagram"></i>
                                                </a>
                                            </span>
                                            <span class="linkedin">
                                                <a style="text-decoration:none;color:white;" target="_blank" href="{{setting('contato.linkedin')}}">
                                                    <i class="icons-sociais fab fa-linkedin-in"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright copyright-white">
        <div class="container h-100">
            <div class="d-flex justify-content-md-between align-items-center h-100">
                <div style="font-size:1.4rem;color:white;" class="h-100 d-flex align-items-center justify-content-center">
                    <p class="mb-0">© Basic - Todos os direitos reservados</p>
                </div>
                <div class="h-100 d-flex align-items-center pt-4 pt-md-0">
                    <a href="http://www.criasol.com.br/" target="_blank">
                        <img class="" src="{{asset('img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
</footer>