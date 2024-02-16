<x-admin title="বিভাগ">
    <x-page-header head="বিভাগ" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('division.store') }}">
                    <x-input id="id" type="hidden" value="{{ $division->id ?? null }}" />
                    <x-input id="name" label="নাম" value="{{ $division->name ?? old('name') }}" required />
                    <x-input id="code" label="কোড" value="{{ $division->code ?? null }}" required />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/division" id="division" :columns="$columns" />
        </div>
    </div>
</x-admin>
