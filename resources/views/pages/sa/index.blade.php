<x-admin title="এসএ">
    <x-page-header head="এসএ" />
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/sa" id="sas" :columns="$columns" />
        </div>
    </div>

</x-admin>
