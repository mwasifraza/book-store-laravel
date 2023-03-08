<!-- Modal -->
<div class="modal modal-lg fade" id="book-modal-{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">About Book</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="bg-white text-center" style="height:250px;">
            <img src="{{ asset($book->cover_photo) }}" alt="book cover" class="h-100 img-thumbnail">
          </div>
          <div class="mt-3">
            <h1 class="text-center">{{ $book->title }}</h1>
            <div class="text-center mb-3">
                <span class="me-2">
                    <i class="fa-solid fa-tag text-muted"></i>&nbsp; 
                    <span class="text-decoration-none text-muted fw-normal">
                      @foreach($book->categories_info as $category)
                        {{ $category->category_name }}{{ $loop->last ? "" : "," }}
                      @endforeach
                    </span>
                </span>
                <span class="me-2">
                    <i class="fa-solid fa-user text-muted"></i>&nbsp;
                    <span class="text-decoration-none text-muted fw-normal">{{ $book->author }}</span>
                </span>
                <span class="me-2">
                    <i class="fa-solid fa-calendar text-muted"></i>&nbsp;
                    <span class="text-decoration-none text-muted fw-normal">{{ $book->created_at->format("d-m-Y") }}</span>
                </span>
            </div>
            <p>{{ $book->description }} Order yours in just {{ $book->price }} rupees only!</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>