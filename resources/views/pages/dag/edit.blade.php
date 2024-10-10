<x-admin title="দাগ সংস্করণ">
  <x-page-header head="দাগ সংস্করণ" />
  <x-form method="post" action="{{ route('dag.update',$dag->id) }}">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <div class="row">
            <div class="col-md-4 mb-3">
              <x-input3 id="date" value="{{$dag->created_at->format('Y-m-d')}}" type="date" label="তারিখ" required />
            </div>
            <div class="col-md-4 mb-3">
              <x-select id="mouja_id" selectedId="{{ $dag->mouja_id }}" label="সিলেক্ট মৌজা" required :options="$mouja" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="cs_dag" value="{{$dag->cs_dag}}" label="সিএস দাগ" required />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="cs_land_type" value="{{$dag->cs_land_type}}" label="সিএস জমির শ্রেণী" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="cs_khotian" value="{{$dag->cs_khotian}}" label="সিএস খতিয়ান" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="cs_land_qty" value="{{$dag->cs_land_qty}}" label="সিএস জমির পরিমাণ " />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="cs_mouja_sheet_no" value="{{$dag->cs_mouja_sheet_no}}" label="সিএস মৌজা ম্যাপ শিট নং" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="sa_dag" value="{{$dag->sa_dag}}" label="এসএ দাগ" required />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="sa_land_type" value="{{$dag->sa_land_type}}" label="এসএ জমির শ্রেণী" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="sa_khotian" value="{{$dag->sa_khotian}}" label="এসএ খতিয়ান" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="sa_land_qty" value="{{$dag->sa_land_qty}}" label="এসএ জমির পরিমাণ " />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="sa_mouja_sheet_no" value="{{$dag->sa_mouja_sheet_no}}" label="এসএ মৌজা ম্যাপ শিট নং" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="brs_dag" value="{{$dag->brs_dag}}" label="বিআরএস/আরএস দাগ" required />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="brs_land_type" value="{{$dag->brs_land_type}}" label="বিআরএস/আরএস জমির শ্রেণী" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="brs_khotian" value="{{$dag->brs_khotian}}" label="বিআরএস/আরএস খতিয়ান" />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="brs_land_qty" value="{{$dag->brs_land_qty}}" label="বিআরএস/আরএস জমির পরিমাণ " />
            </div>
            <div class="col-md-4 mb-3">
              <x-input3 id="brs_mouja_sheet_no" value="{{$dag->brs_mouja_sheet_no}}" label="বিআরএস/আরএস মৌজা ম্যাপ শিট নং" />
            </div>
          <div class="col-md-12 text-right">
            <x-button value="Save" />
          </div>
          </div>
        </div>
      </div>
    </div>
        
  </x-form>

  @push('js')
    <script>

    </script>


  @endpush
</x-admin>
