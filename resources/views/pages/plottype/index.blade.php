<x-admin title="জমির শ্রেণী">
    <x-page-header head="জমির শ্রেণী" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('plottype.store') }}">
                    <x-input id="id" type="hidden" value="{{ $plottype->id ?? null }}" />
                    <x-select id="type" label="জমির ধরণ" selectedId="{{ $plottype->type ?? null }}" name="type" :options="$plots" />
                    <x-input id="name" label="নাম" value="{{ $plottype->name ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/plottype" id="plottype" :columns="$columns" />
        </div>
    </div>

</x-admin>
