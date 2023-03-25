<div class="card-header">
    <h4 class="card-title w-100">{!! $title ?? null !!}

        <a
            href="#"
            class="pull-right btn-sm btn-success newProduct">
            <i class="{!! isset($icon) ? $icon : 'fa fa-lists'  !!}"></i>

            {!! isset($routeText) ? $routeText : null !!}
        </a>
    </h4>
</div>
