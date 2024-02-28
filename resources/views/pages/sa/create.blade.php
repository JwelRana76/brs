<x-admin title="নতুন এসএ">
    <x-page-header head="নতুন এসএ" />
    <x-form method="post" action="{{ route('sa.store') }}">
      <div class="row">
        <div class="col-md-12">
          <div class="card p-3">
            <div class="row">
              <div class="col-md-4 m-auto">
                <x-input3 id="sa_khotian" label="এসএ খতিয়ান" required />
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-2">
                <x-select id="division" label="বিভাগ" required :options="$divisions" />
              </div>
              <div class="col-md-2">
                <x-select id="district" label="জেলা" required :options="$districts" />
              </div>
              <div class="col-md-2">
                <x-select id="upazila" label="থানা" required :options="$upazilas" />
              </div>
              <div class="col-md-2">
                <x-select id="mouja" label="মৌজা" required :options="$moujas" />
              </div>
              <div class="col-md-2">
                <x-select id="jlno" label="জেএল নং" required :options="$jlnos" />
              </div>
              <div class="col-md-2">
                <x-input id="resa_no" label="রেঃসাঃনং" required />
              </div>
              <div class="col-md-2">
                <x-input id="tougi_no" label="তৌজি নং" required />
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
                            <th colspan="3">উপরিস্থ স্বত্তের</th>
                            <th colspan="3">অত্র স্বত্তের দেয়</th>
                            <th>মন্তব্য</th>
                            <th colspan="2">২৪/১ ধারামতে কোন তারিখ হইতে</th>
                        </tr>
                        <tr>
                          <th>খতিয়ান নং বা মায় বাটা</th>
                          <th>বিবরণ বা দখলদার (সংক্ষিপ্ত)</th>
                          <th>পরস্পর অংশ</th>
                          <th>খাজনা</th>
                          <th>সেল</th>
                          <th>শিক্ষা সেল</th>
                          <th></th>
                          <th>খাজনা</th>
                          <th>সেল</th>
                        </tr>
                    </thead>
                    <tbody id="sa_table">
                      <tr>
                        <td>
                          <x-input2 id="khotian_no" name="khotian_no[]" />
                        </td>
                        <td>
                          <x-textarea2 id="details" required name="details[]" />
                        </td>
                        <td>
                          <x-input2 id="part" name="part[]" />
                        </td>
                        <td>
                          <x-input2 id="khajna" name="khajna[]" />
                        </td>
                        <td>
                          <x-input2 id="cell" name="cell[]" />
                        </td>
                        <td>
                          <x-input2 id="edu_cell" name="edu_cell[]" />
                        </td>
                        <td>
                          <x-textarea2 id="comment" required name="comment[]" />
                        </td>
                        <td>
                          <x-input2 id="khanja2" name="khanja2[]" />
                        </td>
                        <td>
                          <x-input2 id="cell2" name="cell2[]" />
                        </td>
                      </tr>
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

        $('#brs_added_button').on('click', function () {
          $('#sa_table').append(`
            <tr>
              <td>
                <x-input2 id="khotian_no" name="khotian_no[]" />
              </td>
              <td>
                <x-textarea2 id="details" required name="details[]" />
              </td>
              <td>
                <x-input2 id="part" name="part[]" />
              </td>
              <td>
                <x-input2 id="khajna" name="khajna[]" />
              </td>
              <td>
                <x-input2 id="cell" name="cell[]" />
              </td>
              <td>
                <x-input2 id="edu_cell" name="edu_cell[]" />
              </td>
              <td>
                <x-textarea2 id="comment" required name="comment[]" />
              </td>
              <td>
                <x-input2 id="khanja2" name="khanja2[]" />
              </td>
              <td>
                <x-input2 id="cell2" name="cell2[]" />
              </td>
            </tr>
          `);
        });

        $('#brs_added_button2').on('click', function () {
            if ($('#sa_table tr').length > 1) {
                $('#sa_table tr:last').remove();
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
