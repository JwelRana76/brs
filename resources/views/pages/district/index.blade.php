<x-admin title="District">
    <x-page-header head="District" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('district.store') }}">
                    <x-input id="id" type="hidden" value="{{ $district->id ?? null }}" />
                    <x-select id="division" selectedId="{{ $district->division_id ?? null }}" name="division_id" :options="$divisions" />
                    <x-input id="name" value="{{ $district->name ?? null }}" />
                    <x-input id="code" value="{{ $district->code ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/district" id="district" :columns="$columns" />
        </div>
    </div>

</x-admin>
