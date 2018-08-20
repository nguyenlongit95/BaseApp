<footer>
    <div class="container">
        <div class="row">
            @include('frontend.widgets.footer-menu')
            <div class="col-sm-12 copyright">
                <span>@if(isset($settings['copyright'])) {{ $settings['copyright'] }} @endif</span>
            </div>
        </div>
    </div>
</footer>