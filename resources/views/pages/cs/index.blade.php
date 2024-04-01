<x-admin title="এসএ">
    <x-page-header head="সিএস" />
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/cs" id="css" :columns="$columns" />
        </div>
    </div>

</x-admin>
