<x-admin title="জেএল নং">
    <x-page-header head="জেএল নং" />
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <x-form method="post" action="{{ route('jlno.store') }}">
                    <x-input id="id" type="hidden" value="{{ $jlno->id ?? null }}" />
                    <x-select id="mouja" label="মৌজা" selectedId="{{ $jlno->mouja_id ?? null }}" name="mouja_id" :options="$moujas" />
                    <x-input id="name" label="নাম" value="{{ $jlno->name ?? null }}" />
                    <x-input id="code" label="কোড" value="{{ $jlno->code ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-8">
            <x-data-table dataUrl="/setting/jlno" id="jlno" :columns="$columns" />
        </div>
    </div>

</x-admin>
