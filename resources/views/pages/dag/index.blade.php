<x-admin title="দাগ">
    <x-page-header head="দাগ" />
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/dag" id="dags" :columns="$columns" />
        </div>
    </div>

</x-admin>
