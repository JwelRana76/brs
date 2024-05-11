<x-admin title="নতুন খাজনা">
    <x-page-header head="নতুন খাজনা" />
    <x-form method="post" action="{{ route('khajna.update',$khajna->id) }}">
      <div class="row">
        <div class="col-md-12">
          <div class="card p-3">
            <div class="row">
              <div class="col-md-3">
                <x-input3 id="date" value="{{$khajna->created_at->format('Y-m-d')}}" type="date" label="তারিখ" required />
              </div>
              <div class="col-md-3">
                <x-input3 id="office_name" value="{{ $khajna->office_name }}" label="ভুমি অফিসের নাম" required />
              </div>
              <div class="col-md-3">
                <x-input3 id="khotian_no" value="{{ $khajna->khotian_no }}" label="খতিয়ান নং" required />
              </div>
              <div class="col-md-3">
                <x-select id="district" selectedId="{{ $khajna->district_id }}" label="জেলা" required :options="$districts" />
              </div>
              <div class="col-md-3">
                <x-select id="upazila" selectedId="{{ $khajna->upazila_id }}" label="থানা" required :options="$upazilas" />
              </div>
              <div class="col-md-3">
                <x-input id="holding_no" value="{{ $khajna->holding_no }}" label="হোল্ডিং নং" required />
              </div>
              <div class="col-md-3">
                <x-input id="mouja_no" value="{{ $khajna->mouja_no }}" label="মৌজা ও জে এল নং" required />
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered brs-table" style="font-size:12px">
                    <thead>
                        <tr>
                            <th style="width:730px">মালিক, অকৃষি, প্রজ্জা বা ইজারাদারের নাম ও ঠিকানা</th>
                            <th>জমির অংশ</th>
                        </tr>
                    </thead>
                    <tbody id="test_table">
                      @foreach ($khajna->owners as $owner)
                      <tr>
                        <td>
                          <x-input2 id="name" value="{{ $owner->name }}" required name="name[]" />
                        </td>
                        <td>
                          <x-input2 id="part" value="{{ $owner->land_part }}" name="part[]" />
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    
                    
                </table>
                    <button type="button" class="btn brs-added-button2" id="brs_added_button2"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn brs-added-button mr-2" id="brs_added_button"><i class="fa fa-plus"></i></button>
              </div>
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-12">
              <table class="table table-bordered brs-table" style="font-size:12px">
                  <thead>
                      <tr>
                        <th>দাগ নং</th>
                        <th>জমির শ্রেণী</th>
                        <th>জমির পরিমাণ (শতক)</th>
                      </tr>
                  </thead>
                  <tbody id="sa_table_part_3">
                    @foreach($khajna->lands as $land)
                    <tr>
                      <td>
                        <x-input2 id="dag_no" value="{{ $land->dag_no }}" name="dag_no[]" />
                      </td>
                      <td>
                        <x-input2 id="land_type" value="{{ $land->land_type }}" name="land_type[]" />
                      </td>
                      <td>
                        <x-input2 id="land_qty" value="{{ $land->land_qty }}" name="land_qty[]" />
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              <button type="button" class="btn brs-added-button2" id="sa_added_button_part3_minus"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn brs-added-button mr-2" id="sa_added_button_part3_plus"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-3">
              <x-input id="beforethreeYearDue" value="{{ $khajna->beforethreeYearDue }}" min="0" label="৩ বছরের ঊধ্বের বকেয়া" required />
            </div>
            <div class="col-md-3">
              <x-input id="threeYearDue" value="{{ $khajna->threeYearDue }}" min="0" label="গত ৩ বছরের বকেয়া" required />
            </div>
            <div class="col-md-3">
              <x-input id="due_interest" value="{{ $khajna->due_interest }}" min="0" label="বকেয়ার সুদ ও ক্ষতিপূরণ" required />
            </div>
            <div class="col-md-3">
              <x-input id="haldabi" value="0" min="{{ $khajna->haldabi }}" label="হাল দাবি" required />
            </div>
            <div class="col-md-3">
              <x-input id="totaldabi" value="0" min="{{ $khajna->totaldabi }}" label="মোট দাবি" required />
            </div>
            <div class="col-md-3">
              <x-input id="totalcollect" value="0" min="{{ $khajna->totalcollect }}" label="মোট আদায়" required />
            </div>
            <div class="col-md-3">
              <x-input id="totaldue" value="{{ $khajna->totaldue }}" min="0" label="মোট বকেয়া" required />
            </div>
            <div class="col-md-3">
              <x-textarea id="মন্তব্য" value="{{ $khajna->comment }}" name="comment" label="মন্তব্য"  />
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

        $('#brs_added_button').on('click', function () {
          $('#test_table').append(`
            <tr>
              <td>
                <x-input2 id="name" required name="name[]" />
              </td>
              <td>
                <x-input2 id="part" name="part[]" />
              </td>
            </tr>
          `);
        });

        $('#sa_added_button_part3_plus').on('click', function () {
        $('#sa_table_part_3').append(`
            <tr>
              <td>
                <x-input2 id="dag_no" required name="dag_no[]" />
              </td>
              <td>
                <x-input2 id="land_type" required name="land_type[]" />
              </td>
              <td>
                <x-input2 id="land_qty" required name="land_qty[]" />
              </td>
            </tr>
        `);
      });
      $('#sa_added_button_part3_minus').on('click', function () {
          if ($('#sa_table_part_3 tr').length > 1) {
              $('#sa_table_part_3 tr:last').remove();
          }
      });
        $('#brs_added_button2').on('click', function () {
            if ($('#test_table tr').length > 1) {
                $('#test_table tr:last').remove();
            }
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
      </script>


    @endpush
</x-admin>
