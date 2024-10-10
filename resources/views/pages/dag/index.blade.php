<x-admin title="দাগ">
    <x-page-header head="দাগ"/>
    <a href="#" class="btn btn-sm btn-primary m-2" data-target="#import_dag" data-toggle="modal" >
        <i class="fas fa-fw fa-upload"></i> Import Dag
    </a>
    <div class="row">
        <div class="col-md-12">
            <x-data-table dataUrl="/dag" id="dags" :columns="$columns" />
        </div>
    </div>
    <x-modal id="import_dag">
        <x-form action="{{ route('dag.import') }}" method="post">
          @csrf
          <x-input id="dag_file" type="file" required />
          <button class="btn btn-primary" type="submit">Submit</button>
        </x-form>
      </x-modal>
</x-admin>
