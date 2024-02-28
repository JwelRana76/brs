<div class="dropdown">
  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    অপশন
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item text-info" href="{{ route('brs.edit',$item->id) }}" ><i class="fas fa-fw fa-pen"></i> Edit</a>
    <a class="dropdown-item text-info" href="{{ route('brs.view',$item->id) }}" target="_blank" ><i class="fas fa-fw fa-eye"></i> View</a>
    <a class="dropdown-item text-danger" href="{{ route('brs.delete',$item->id) }}"  onclick="return confirm('Are you sure to delete this record')"><i class="fas fa-fw fa-trash"></i> Delete</a>
  </div>
</div>