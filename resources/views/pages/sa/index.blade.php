<x-admin title="বিআরএস">
    <x-page-header head="বিআরএস" />
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/brs" id="brss" :columns="$columns" />
        </div>
    </div>

</x-admin>
