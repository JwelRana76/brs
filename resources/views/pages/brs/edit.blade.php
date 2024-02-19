<x-admin title="বিআরএস সংস্করণ">
    <x-page-header head="বিআরএস সংস্করণ" />
    <x-form method="post" action="{{ route('brs.update',$brs->id) }}">
      <div class="row">
        <div class="col-md-12">
          <div class="card p-3">
            <div class="row">
              <div class="col-md-4 m-auto">
                <x-input3 id="khotian_no" value="{{ $brs->khotian_no }}" label="খতিয়ান নং" required />
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-2">
                <x-select id="division" label="বিভাগ" selectedId="{{ $brs->jlno->mouja->upazila->district->division_id }}" required :options="$divisions" />
              </div>
              <div class="col-md-2">
                <x-select id="district" label="জেলা" selectedId="{{ $brs->jlno->mouja->upazila->district_id }}" required :options="$districts" />
              </div>
              <div class="col-md-2">
                <x-select id="upazila" label="থানা" selectedId="{{ $brs->jlno->mouja->upazila_id }}" required :options="$upazilas" />
              </div>
              <div class="col-md-2">
                <x-select id="mouja" label="মৌজা" selectedId="{{ $brs->jlno->mouja_id }}" required :options="$moujas" />
              </div>
              <div class="col-md-2">
                <x-select id="jlno" label="জেএল নং" selectedId="{{ $brs->jlno_id }}" required :options="$jlnos" />
              </div>
              <div class="col-md-2">
                <x-input id="resa_no" label="রেঃসাঃনং" value="{{ $brs->resa_no }}" required />
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-12">
                <button type="button" class="btn brs-added-button2" id="brs_added_button2"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn brs-added-button mr-2" id="brs_added_button"><i class="fa fa-plus"></i></button>
                <table class="table table-bordered brs-table" style="font-size:12px">
                    <thead>
                        <tr>
                            <th>মালিক, অকৃষি, প্রজ্জা বা ইজারাদারের নাম ও ঠিকানা</th>
                            <th>অংশ</th>
                            <th>রাজস্ব</th>
                            <th>দাগ নং</th>
                            <th colspan="2">জমির শ্রেণী</th>
                            <th colspan="2">দাগের মোট পরিমাণ</th>
                            <th>দাগের মধ্যে অত্র খতিয়ানের অংশ</th>
                            <th colspan="2">অংশ অনুযায়ী জমির পরিমাণ</th>
                            <th>দথল বিষয়ক বা অন্যান্য বিষয়ক মন্তব্য</th>
                        </tr>
                        <tr>
                          <th>১ *</th>
                          <th>২</th>
                          <th>৩</th>
                          <th>৪</th>
                          <th>কৃষি ৫(ক)</th>
                          <th>অকৃষি ৫(খ)</th>
                          <th>একর ৬(ক)</th>
                          <th>শতাংশ ৬(খ)</th>
                          <th>৭</th>
                          <th>একর ৮(ক)</th>
                          <th>শতাংশ ৮(খ)</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody id="test_table">
                      @foreach ($brs->brs_details as $details)
                      <tr>
                        <td>
                          <x-textarea2 id="name" value="{{ $details->name }}" required name="name[]" />
                        </td>
                        <td>
                          <x-input2 id="part" value="{{ $details->part }}" name="part[]" />
                        </td>
                        <td>
                          <x-input2 id="revenue" value="{{ $details->revenue }}" name="revenue[]" />
                        </td>
                        <td>
                          <x-input2 id="stain" value="{{ $details->stain }}" name="stain[]" />
                        </td>
                        <td>
                          <x-input2 id="plottype1" name="plottype1[]" value="{{ $details->plottype1 }}" />
                        </td>
                        <td>
                          <x-input2 id="plottype2" name="plottype2[]" value="{{ $details->plottype2 }}" />
                        </td>
                        <td>
                          <x-input2 id="amount1" value="{{ $details->amount1 }}" name="amount1[]" />
                        </td>
                        <td>
                          <x-input2 id="amount2" value="{{ $details->amount2 }}" name="amount2[]" />
                        </td>
                        <td>
                          <x-input2 id="khotian_amount" value="{{ $details->khotian_amount }}" name="khotian_amount[]" />
                        </td>
                        <td>
                          <x-input2 id="plot_amount1" value="{{ $details->plot_amount1 }}" name="plot_amount1[]"  />
                        </td>
                        <td>
                          <x-input2 id="plot_amount2" value="{{ $details->plot_amount2 }}" name="plot_amount2[]" />
                        </td>
                        <td>
                          <x-textarea2 id="comment" value="{{ $details->comment }}" name="comment[]" />
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            <x-button value="Save" />
            </div>
          </div>
        </div>
      </div>
          
    </x-form>

    @push('js')
      <script>
        const district = @json($districts);
        const upazila = @json($upazilas);
        const mouja = @json($moujas);
        const jlno = @json($jlnos);
        console.log(district);
        $('#brs_added_button').on('click', function () {
          $('#test_table').append(`
            <tr>
              <td>
                <x-textarea2 id="name" required name="name[]" />
              </td>
              <td>
                <x-input2 id="part" name="part[]" />
              </td>
              <td>
                <x-input2 id="revenue" name="revenue[]" />
              </td>
              <td>
                <x-input2 id="stain" name="stain[]" />
              </td>
              <td>
                <x-input2 id="plottype1" name="plottype1[]" />
              </td>
              <td>
                <x-input2 id="plottype2" name="plottype2[]" />
              </td>
              <td>
                <x-input2 id="amount1" name="amount1[]" />
              </td>
              <td>
                <x-input2 id="amount2" name="amount2[]" />
              </td>
              <td>
                <x-input2 id="khotian_amount" name="khotian_amount[]" />
              </td>
              <td>
                <x-input2 id="plot_amount1" name="plot_amount1[]"  />
              </td>
              <td>
                <x-input2 id="plot_amount2" name="plot_amount2[]" />
              </td>
              <td>
                <x-textarea2 id="comment" name="comment[]" />
              </td>
            </tr>
          `);
        });

        $('#brs_added_button2').on('click', function () {
            if ($('#test_table tr').length > 1) {
                $('#test_table tr:last').remove();
            }
        });

        $('#division').change(function() {
            let division_id = $(this).val();
            $('#district').empty(); // Clear existing options
            district.filter(function(item){
                if((item.division_id == division_id)) {
                    return item;
                }
            }).map(function(item){
                $('#district').append('<option value="' + item.id + '">' + item.name + '</option>');
            });
            $('#district').selectpicker('refresh'); // Refresh the selectpicker
        });
        $('#district').change(function() {
            let district_id = $(this).val();
            $('#upazila').empty(); // Clear existing options
            upazila.filter(function(item){
                if((item.district_id == district_id)) {
                    return item;
                }
            }).map(function(item){
                $('#upazila').append('<option value="' + item.id + '">' + item.name + '</option>');
            });
            $('#upazila').selectpicker('refresh'); // Refresh the selectpicker
        });
        $('#upazila').change(function() {
            let upazila_id = $(this).val();
            $('#mouja').empty(); // Clear existing options
            mouja.filter(function(item){
                if((item.upazila_id == upazila_id)) {
                    return item;
                }
            }).map(function(item){
                $('#mouja').append('<option value="' + item.id + '">' + item.name + '</option>');
            });
            $('#mouja').selectpicker('refresh'); // Refresh the selectpicker
        });
        $('#mouja').change(function() {
            let mouja_id = $(this).val();
            $('#jlno').empty(); // Clear existing options
            jlno.filter(function(item){
                if((item.mouja_id == mouja_id)) {
                    return item;
                }
            }).map(function(item){
                $('#jlno').append('<option value="' + item.id + '">' + item.name + '</option>');
            });
            $('#jlno').selectpicker('refresh'); // Refresh the selectpicker
        });
      </script>


    @endpush
</x-admin>
