<x-admin title="নতুন বিআরএস">
    <x-page-header head="নতুন বিআরএস" />
    <x-form id="myForm" method="post" action="{{ route('brs.store') }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Assign an id to x-textarea2 -->
                            <x-textarea2 id="name" required name="name" onkeydown="preventLineBreak(event)" />
                        </div>
                    </div>
                    <x-button value="Save"  />
                </div>
            </div>
        </div>
    </x-form>
    @push('js')
        <script>
function preventLineBreak(event) {
    if (event.key === "Enter") {
        event.preventDefault();
    }
}
</script>
    @endpush
</x-admin>

