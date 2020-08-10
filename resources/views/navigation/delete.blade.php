<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#navigation-{{ $navigation->id }}">
    Delete
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="navigation-{{ $navigation->id }}" tabindex="-1" aria-labelledby="navigation-{{ $navigation->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="navigation-{{ $navigation->id }}Label">Are You Sure?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mb-2">
                {{ $navigation->name }} - <a href="{{ url($navigation->url) }}">{{ $navigation->url }}</a>
            </div>
          <div class="d-flex justify-content-between">
            <div class="w-100">
                <form action="{{ route('navigation.delete', $navigation) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-block">Yes</button>
                </form>
            </div>
            <div class="w-100">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>