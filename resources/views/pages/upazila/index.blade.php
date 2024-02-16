<x-admin title="থানা">
    <x-page-header head="থানা" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('upazila.store') }}">
                    <x-input id="id" type="hidden" value="{{ $upazila->id ?? null }}" />
                    <x-select id="district" label="জেলা" selectedId="{{ $upazila->district_id ?? null }}" name="district_id" :options="$districts" />
                    <x-input id="name" label="নাম" value="{{ $upazila->name ?? null }}" />
                    <x-input id="code" label="কোড" value="{{ $upazila->code ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/upazila" id="upazila" :columns="$columns" />
        </div>
    </div>

</x-admin>
