<x-admin title="নতুন সিএস">
  <style>
      table .form-group{
          margin-bottom:0px !important;
      }
  </style>
  <x-page-header head="নতুন সিএস" />
  <x-form method="post" action="{{ route('cs.store') }}">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <div class="row">
            <div class="col-md-4 m-auto">
              <x-input3 id="khotian_no" label="খতিয়ান নং" required />
            </div>
            <div class="col-md-12">
              <hr>
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
            <div class="col-md-2">
              <x-input id="porogona" label="পরগণা" required />
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered brs-table" style="font-size:12px">
                  <thead>
                      <tr>
                          <th colspan="2">উপরিস্থ স্বত্তের</th>
                          <th colspan="2">অত্র স্বত্তের দেয়</th>
                          <th>মন্তব্য</th>
                          <th colspan="2">২৪/১ ধারামতে কোন তারিখ হইতে</th>
                      </tr>
                      <tr>
                        <th>বিবরণ বা দখলদার (সংক্ষিপ্ত)</th>
                        <th>পরস্পর অংশ</th>
                        <th>খাজনা</th>
                        <th>সেল</th>
                        <th></th>
                        <th>খাজনা</th>
                        <th>সেল</th>
                      </tr>
                  </thead>
                  <tbody id="sa_table">
                    <tr>
                      <td>
                        <x-input2 id="part11" name="part11[]" />
                      </td>
                      <td>
                        <x-textarea2 id="part12" name="part12[]" />
                      </td>
                      <td>
                        <x-input2 id="part13" name="part13[]" />
                      </td>
                      <td>
                        <x-input2 id="part14" name="part14[]" />
                      </td>
                      <td>
                        <x-input2 id="part15" name="part15[]" />
                      </td>
                      <td>
                        <x-input2 id="part16" name="part16[]" />
                      </td>
                      <td>
                        <x-textarea2 id="part17" name="part17[]" />
                      </td>
                    </tr>
                  </tbody>
              </table>
              <button type="button" class="btn brs-added-button2" id="brs_added_button2"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn brs-added-button mr-2" id="brs_added_button"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered brs-table" style="font-size:12px;text-align:center">
                  <thead>
                      <tr>
                          <th>অধীনস্থ স্বত্তের খাজানা প্রাপকের খতিয়ান নম্বর (মায় বাটা)</th>
                          <th>অধীনস্থ স্বত্তের বিভিন্ন খতিয়ানের নম্বর</th>
                      </tr>
                  </thead>
                  <tbody id="sa_table_part_2">
                    <tr>
                      <td>
                        <x-input2 id="part9" name="part9[]" />
                      </td>
                      <td>
                        <x-input2 id="part10" name="part10[]" />
                      </td>
                    </tr>
                  </tbody>
              </table>
              <button type="button" class="btn brs-added-button2" id="sa_added_button_part2_minus"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn brs-added-button mr-2" id="sa_added_button_part2_plus"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered brs-table" style="font-size:12px;text-align:center">
                  <thead>
                      <tr>
                          <th>খতিয়ান নং *</th>
                          <th id="khotian"></th>
                          <th colspan="6">অত্র সত্বের নিজ দখলীয় জমি</th>
                      </tr>
                      <tr>
                          <th rowspan="2">দাগ নং</th>
                          <th rowspan="2">জমির রকম</th>
                          <th rowspan="2">মন্তব্য</th>
                          <th colspan="2">দাগের মোপ পরিমাণ</th>
                          <th rowspan="2">অত্র সত্বের অংশ</th>
                          <th colspan="2">অত্র সত্বের অংশের জমির পরিমাণ</th>
                      </tr>
                      <tr>
                        <th>একক</th>
                        <th>শতক</th>
                        <th>একক</th>
                        <th>শতক</th>
                      </tr>
                  </thead>
                  <tbody id="sa_table_part_1">
                    <tr>
                      <td>
                        <x-input2 id="part1" name="part1[]" />
                      </td>
                      <td>
                        <x-input2 id="part2" name="part2[]" />
                      </td>
                      <td>
                        <x-input2 id="part3" name="part3[]" />
                      </td>
                      <td>
                        <x-input2 id="part4" name="part4[]" />
                      </td>
                      <td>
                        <x-input2 id="part5" name="part5[]" />
                      </td>
                      <td>
                        <x-input2 id="part6" name="part6[]" />
                      </td>
                      <td>
                        <x-input2 id="part7" name="part7[]" />
                      </td>
                      <td>
                        <x-input2 id="part8" name="part8[]" />
                      </td>
                    </tr>
                  </tbody>
              </table>
              <button type="button" class="btn brs-added-button2" id="sa_added_button_part1_minus"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn brs-added-button mr-2" id="sa_added_button_part1_plus"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered brs-table" style="font-size:12px">
                  <thead>
                      <tr>
                        <th>অত্র স্বত্তের বিবরণ ও দখলকার</th>
                        <th>অংশ</th>
                        <th>অত্র স্বত্তের বিবরণ ও দখলকার</th>
                        <th>অংশ</th>
                        <th>অত্র স্বত্তের শ্রেণী (এবং বিশেষ নিয়ম ও অনুসঙ্গ  )</th>
                      </tr>
                  </thead>
                  <tbody id="sa_table_part_3">
                    <tr>
                      <td>
                        <x-textarea2 id="part20" name="part20[]" />
                      </td>
                      <td>
                        <x-input2 id="part21" name="part21[]" />
                      </td>
                      <td>
                        <x-input2 id="part22" name="part22[]" />
                      </td>
                      <td>
                        <x-input2 id="part23" name="part23[]" />
                      </td>
                      <td>
                        <x-input2 id="part24" name="part24[]" />
                      </td>
                    </tr>
                  </tbody>
              </table>
              <button type="button" class="btn brs-added-button2" id="sa_added_button_part3_minus"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn brs-added-button mr-2" id="sa_added_button_part3_plus"><i class="fa fa-plus"></i></button>
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
      const district = @json($districts);
      const upazila = @json($upazilas);
      const mouja = @json($moujas);
      const jlno = @json($jlnos);

      $('#sa_added_button_part1_plus').on('click', function () {
        $('#sa_table_part_1').append(`
          <tr>
              <td>
                <x-input2 id="khotian_no" name="khotian_no[]" />
              </td>
              <td>
                <x-input2 id="details" required name="details[]" />
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
                <x-input2 id="comment" required name="comment[]" />
              </td>
              <td>
                <x-input2 id="khanja2" name="khanja2[]" />
              </td>
            </tr>
        `);
      });
      $('#sa_added_button_part1_minus').on('click', function () {
          if ($('#sa_table_part_1 tr').length > 1) {
              $('#sa_table_part_1 tr:last').remove();
          }
      });
      $('#sa_added_button_part2_plus').on('click', function () {
        $('#sa_table_part_2').append(`
          <tr>
              <td>
                <x-input2 id="khotian_no" name="khotian_no[]" />
              </td>
              <td>
                <x-input2 id="details" required name="details[]" />
              </td>
            </tr>
        `);
      });
      $('#sa_added_button_part2_minus').on('click', function () {
          if ($('#sa_table_part_2 tr').length > 1) {
              $('#sa_table_part_2 tr:last').remove();
          }
      });
      $('#sa_added_button_part3_plus').on('click', function () {
        $('#sa_table_part_3').append(`
            <tr>
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
            </tr>
        `);
      });
      $('#sa_added_button_part3_minus').on('click', function () {
          if ($('#sa_table_part_3 tr').length > 1) {
              $('#sa_table_part_3 tr:last').remove();
          }
      });
      
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
