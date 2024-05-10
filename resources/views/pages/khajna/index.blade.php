<x-admin title="খাজনা">
    <x-page-header head="খাজনা" />
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/khajna" id="khajnas" :columns="$columns" />
        </div>
    </div>

</x-admin>
