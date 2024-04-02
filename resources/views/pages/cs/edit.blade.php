<x-admin title="সিএস সংস্করণ">
  <style>
      table .form-group{
          margin-bottom:0px !important;
      }
  </style>
  <x-page-header head="সিএস সংস্করণ" />
  <x-form method="post" action="{{ route('cs.update',$sa->id) }}">
    <div class="row">
      <div class="col-md-12">
        <div class="card p-3">
          <div class="row">
            <div class="col-md-4 m-auto">
              <x-input3 id="khotian_no" value="{{ $sa->khotian_no }}" label="খতিয়ান নং" required />
            </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-2">
              <x-select id="district" label="জেলা" selectedId="{{ $sa->jlno->mouja->upazila->district_id }}" required :options="$districts" />
            </div>
            <div class="col-md-2">
              <x-select id="upazila" label="থানা" selectedId="{{ $sa->jlno->mouja->upazila_id }}" required :options="$upazilas" />
            </div>
            <div class="col-md-2">
              <x-select id="mouja" label="মৌজা" selectedId="{{ $sa->jlno->mouja_id }}" required :options="$moujas" />
            </div>
            <div class="col-md-2">
              <x-select id="jlno" label="জেএল নং" selectedId="{{ $sa->jlno_id }}" required :options="$jlnos" />
            </div>
            <div class="col-md-2">
              <x-input id="resa_no" label="রেঃসাঃনং" value="{{ $sa->resa_no }}" required />
            </div>
            <div class="col-md-2">
              <x-input id="tougi_no" value="{{ $sa->touja_no }}" label="তৌজি নং" required />
            </div>
            <div class="col-md-2">
              <x-input id="porogona" value="{{ $sa->porogona }}" label="পরগণা" required />
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
                    @if ($sa->csDetailsTwo)
                      @foreach ($sa->csDetailsThree as $detailsone)
                      <tr>
                        <td>
                          <x-input2 id="part11" value="{{ $detailsone->one }}" name="part11[]" />
                        </td>
                        <td>
                          <x-textarea2 id="part12" value="{{ $detailsone->two }}" name="part12[]" />
                        </td>
                        <td>
                          <x-input2 id="part13" value="{{ $detailsone->three }}" name="part13[]" />
                        </td>
                        <td>
                          <x-input2 id="part14" value="{{ $detailsone->four }}" name="part14[]" />
                        </td>
                        <td>
                          <x-input2 id="part15" value="{{ $detailsone->five }}" name="part15[]" />
                        </td>
                        <td>
                          <x-input2 id="part16" value="{{ $detailsone->six }}" name="part16[]" />
                        </td>
                        <td>
                          <x-textarea2 id="part17" value="{{ $detailsone->seven }}" name="part17[]" />
                        </td>
                      </tr>
                      @endforeach
                    @endif
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
                    @if ($sa->csDetailsTwo)
                      @foreach ($sa->csDetailsTwo as $detailsone)
                      <tr>
                        <td>
                          <x-input2 id="part9" value="{{ $detailsone->one }}" name="part9[]" />
                        </td>
                        <td>
                          <x-input2 id="part10" value="{{ $detailsone->two }}" name="part10[]" />
                        </td>
                      </tr>
                      @endforeach
                    @endif
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
                          <th>{{ $sa->khotian_no }}</th>
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
                    @if ($sa->csDetailsOne)
                      @foreach ($sa->csDetailsOne as $detailsone)
                      <tr>
                        <td>
                          <x-input2 id="part1" value="{{ $detailsone->one }}" name="part1[]" />
                        </td>
                        <td>
                          <x-input2 id="part2" value="{{ $detailsone->two }}" name="part2[]" />
                        </td>
                        <td>
                          <x-input2 id="part3" value="{{ $detailsone->three }}" name="part3[]" />
                        </td>
                        <td>
                          <x-input2 id="part4" value="{{ $detailsone->four }}" name="part4[]" />
                        </td>
                        <td>
                          <x-input2 id="part5" value="{{ $detailsone->five }}" name="part5[]" />
                        </td>
                        <td>
                          <x-input2 id="part6" value="{{ $detailsone->six }}" name="part6[]" />
                        </td>
                        <td>
                          <x-input2 id="part7" value="{{ $detailsone->seven }}" name="part7[]" />
                        </td>
                        <td>
                          <x-input2 id="part8" value="{{ $detailsone->eight }}" name="part8[]" />
                        </td>
                      </tr>
                      @endforeach
                    @endif
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
                    @if ($sa->csDetailsTwo)
                      @foreach ($sa->csDetailsFour as $detailsone)
                      <tr>
                        <td>
                          <x-textarea2 id="part20" value="{{ $detailsone->one }}" name="part20[]" />
                        </td>
                        <td>
                          <x-input2 id="part21" value="{{ $detailsone->two }}" name="part21[]" />
                        </td>
                        <td>
                          <x-input2 id="part22" value="{{ $detailsone->three }}" name="part22[]" />
                        </td>
                        <td>
                          <x-input2 id="part23" value="{{ $detailsone->four }}" name="part23[]" />
                        </td>
                        <td>
                          <x-input2 id="part24" value="{{ $detailsone->five }}" name="part24[]" />
                        </td>
                      </tr>
                      @endforeach
                    @endif
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
