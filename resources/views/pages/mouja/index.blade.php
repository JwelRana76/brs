<x-admin title="মৌজা">
    <x-page-header head="মৌজা" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('mouja.store') }}">
                    <x-input id="id" type="hidden" value="{{ $mouja->id ?? null }}" />
                    <x-select id="upazila" label="থানা" selectedId="{{ $mouja->upazila_id ?? null }}" name="upazila_id" :options="$upazilas" />
                    <x-input id="name" label="নাম" value="{{ $mouja->name ?? null }}" />
                    <x-input id="code" label="কোড" value="{{ $mouja->code ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/mouja" id="mouja" :columns="$columns" />
        </div>
    </div>

</x-admin>
